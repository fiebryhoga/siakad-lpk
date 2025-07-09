<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Get;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Kelola Pengguna';
    protected static ?string $navigationGroup = 'Manajemen Pengguna';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Akun Login')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nama Lengkap')
                        ->required(),
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->required(),
                    Forms\Components\Select::make('role')
                        ->label('Peran Pengguna')
                        ->options([
                            'staf' => 'Staf',
                            'guru' => 'Guru',
                            'siswa' => 'Siswa',
                        ])
                        ->required()
                        ->live(), 
                    Forms\Components\TextInput::make('password')
                        ->password()
                        ->dehydrateStateUsing(fn ($state) => Hash::make($state)) 
                        ->dehydrated(fn ($state) => filled($state)) 
                        ->required(fn (string $context): bool => $context === 'create'), 
                ]),

            Forms\Components\Section::make('Data Diri Lengkap Siswa')
                ->relationship('siswa') 
                ->schema([
                    Forms\Components\TextInput::make('nama_lengkap')->required(),
                    Forms\Components\TextInput::make('nama_panggilan')->required(),
                    Forms\Components\Radio::make('jenis_kelamin')
                        ->options(['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'])->required(),
                    Forms\Components\TextInput::make('tempat_lahir')->required(),
                    Forms\Components\DatePicker::make('tanggal_lahir')->required(),
                    Forms\Components\Select::make('agama')
                        ->options([
                            'Islam' => 'Islam',
                            'Kristen' => 'Kristen',
                            'Katolik' => 'Katolik',
                            'Hindu' => 'Hindu',
                            'Buddha' => 'Buddha',
                            'Lainnya' => 'Lainnya',
                        ])
                        ->required(),
                    Forms\Components\Select::make('status')
                        ->options([
                            'Belum Menikah' => 'Belum Menikah',
                            'Sudah Menikah' => 'Sudah Menikah',
                        ])
                        ->required(),
                    Forms\Components\Textarea::make('alamat')->required()->columnSpanFull(),
                    Forms\Components\TextInput::make('nomor_telp')->tel()->required(),
                    Forms\Components\TextInput::make('nomor_telp_orang_tua')->tel()->required(),
                    Forms\Components\TextInput::make('pendidikan_terakhir')->required(),
                    Forms\Components\TextInput::make('asal_sekolah')->required(),
                ])
                ->visible(fn (Get $get) => $get('role') === 'siswa'), 
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('role')->label('Peran')->badge(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->label('Peran')
                    ->options([
                        'staf' => 'Staf',
                        'guru' => 'Guru',
                        'siswa' => 'Siswa',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->modal(), 
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}