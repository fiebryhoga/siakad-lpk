<?php
namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Daftar Siswa';

    
    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),

                
                Forms\Components\TextInput::make('nama_lengkap')->required(),
                Forms\Components\TextInput::make('nama_panggilan')->required(),
                Forms\Components\Radio::make('jenis_kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])->required(),
                Forms\Components\TextInput::make('tempat_lahir')->required(),
                Forms\Components\DatePicker::make('tanggal_lahir')->required(),
                Forms\Components\TextInput::make('agama')->required(),
                Forms\Components\TextInput::make('status')->required(),
                Forms\Components\Textarea::make('alamat')->required()->columnSpanFull(),
                Forms\Components\TextInput::make('tinggi_badan')->numeric(),
                Forms\Components\TextInput::make('berat_badan')->numeric(),
                Forms\Components\TextInput::make('nomor_telp')->tel()->required(),
                Forms\Components\TextInput::make('nomor_telp_orang_tua')->tel()->required(),
                Forms\Components\TextInput::make('pendidikan_terakhir')->required(),
                Forms\Components\TextInput::make('asal_sekolah')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->defaultSort('created_at', 'desc')
            ->columns([
                
                Tables\Columns\TextColumn::make('user.name')->label('Akun User')->searchable(),
                Tables\Columns\TextColumn::make('nama_lengkap')->searchable(),
                Tables\Columns\TextColumn::make('nomor_telp'),
                Tables\Columns\TextColumn::make('asal_sekolah'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit'   => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}