<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendaftaranResource\Pages;
use App\Models\Pendaftaran;
use App\Models\User;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;

class PendaftaranResource extends Resource
{
    protected static ?string $model = Pendaftaran::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    protected static ?string $navigationLabel = 'Persetujuan Pendaftar';
    protected static ?string $navigationGroup = 'Manajemen Pengguna';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_lengkap')->disabled(),
                Forms\Components\TextInput::make('email')->disabled(),
                Forms\Components\TextInput::make('nomor_telp')->disabled(),
                Forms\Components\TextInput::make('nama_panggilan')->disabled(),
                Forms\Components\TextInput::make('jenis_kelamin')->disabled(),
                Forms\Components\TextInput::make('tempat_lahir')->disabled(),
                Forms\Components\DatePicker::make('tanggal_lahir')->disabled(),
                Forms\Components\TextInput::make('agama')->disabled(),
                Forms\Components\TextInput::make('asal_sekolah')->disabled(),
                Forms\Components\Textarea::make('alamat')->columnSpanFull()->disabled(),
                Forms\Components\TextInput::make('status_pendaftaran')->label('Status')->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap')->searchable(),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('status_pendaftaran')->label('Status')->badge()
                ->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'disetujui' => 'success',
                    'ditolak' => 'danger', //
                }),
            
            ])
            ->actions([
                
                Tables\Actions\Action::make('setujui')
                    ->label('Setujui')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function (Pendaftaran $record) {
                        $user = User::create([
                            'name' => $record->nama_lengkap,
                            'email' => $record->email,
                            'password' => Hash::make($record->password),
                            'role' => 'siswa',
                        ]);

                        Siswa::create([
                            'user_id' => $user->id,
                            'nama_lengkap' => $record->nama_lengkap,
                            'nama_panggilan' => $record->nama_panggilan,
                            'jenis_kelamin' => $record->jenis_kelamin,
                            'tempat_lahir' => $record->tempat_lahir,
                            'tanggal_lahir' => $record->tanggal_lahir,
                            'agama' => $record->agama,
                            'status' => 'Aktif',
                            'alamat' => $record->alamat,
                            'tinggi_badan' => $record->tinggi_badan,
                            'berat_badan' => $record->berat_badan,
                            'nomor_telp' => $record->nomor_telp,
                            'nomor_telp_orang_tua' => $record->nomor_telp_orang_tua,
                            'pendidikan_terakhir' => $record->pendidikan_terakhir,
                            'asal_sekolah' => $record->asal_sekolah,
                        ]);

                        
                        $record->delete();

                        Notification::make()->title('Pendaftar disetujui & dipindahkan ke data siswa!')->success()->send();
                    })
                    ->visible(fn (Pendaftaran $record): bool => $record->status_pendaftaran === 'pending'),

                
                Tables\Actions\DeleteAction::make()
                    ->label('Tolak & Hapus')
                    ->icon('heroicon-o-trash')
                    ->visible(fn (Pendaftaran $record): bool => $record->status_pendaftaran === 'pending'),
                
                Tables\Actions\ViewAction::make()->label('Lihat Detail'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPendaftarans::route('/'),
            'view' => Pages\ViewPendaftaran::route('/{record}'), 

        ];
    }
}