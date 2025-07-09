<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PembayaranResource\Pages;
use App\Models\Pembayaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Tabs\Tab;


use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\DateTimePicker;


class PembayaranResource extends Resource
{
    protected static ?string $model = Pembayaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'Pembayaran';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Nama Siswa')
                    ->required()
                    
                    ->disabled(fn (?string $operation) => in_array($operation, ['view', 'edit'])),

                Forms\Components\FileUpload::make('file_bukti')
                    ->label('Bukti Transfer')
                    ->disk('public')
                    ->directory('bukti-pembayaran')
                    ->acceptedFileTypes(['image/*', 'application/pdf']) 
                    ->required()
                    ->openable() 
                    ->downloadable() 
                    
                    ->disabled(fn (?string $operation) => in_array($operation, ['view', 'edit'])),

                Forms\Components\ToggleButtons::make('status')
                    ->options([
                        'pending' => 'Menunggu Konfirmasi',
                        'dikonfirmasi' => 'Dikonfirmasi',
                    ])
                    ->colors([
                        'pending' => 'warning',
                        'dikonfirmasi' => 'success',
                    ])
                    ->icons([
                        'pending' => 'heroicon-o-clock',
                        'dikonfirmasi' => 'heroicon-o-check-circle',
                    ])
                    ->inline()
                    
                    
                    ->disabled(fn (?string $operation) => $operation === 'view'),

                Forms\Components\DateTimePicker::make('created_at')
                    ->label('Tanggal Unggah')
                    ->disabled() 
                    ->dehydrated(false), 

                Forms\Components\DateTimePicker::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->disabled() 
                    ->dehydrated(false), 
            ]);
    }


public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('user.name')->label('Nama Siswa'),
            Tables\Columns\ImageColumn::make('file_bukti')->label('Bukti Transfer'),
            Tables\Columns\TextColumn::make('status')->badge()
                ->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'dikonfirmasi' => 'success',
                }),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Tanggal Upload'),
        ])
        
        ->filters([
            Tables\Filters\SelectFilter::make('status')
                ->label('Status Pembayaran')
                ->options([
                    'pending' => 'Menunggu Konfirmasi',
                    'dikonfirmasi' => 'Sudah Dikonfirmasi',
                ])
        ])
        ->actions([
            
            Tables\Actions\Action::make('konfirmasi')
                ->label('Konfirmasi')
                ->color('success')
                ->icon('heroicon-o-check-circle')
                ->action(function (Pembayaran $record) {
                    $record->status = 'dikonfirmasi';
                    $record->save();
                    Notification::make()->title('Pembayaran berhasil dikonfirmasi')->success()->send();
                })
                ->visible(fn (Pembayaran $record): bool => $record->status === 'pending'),
        
            
            Tables\Actions\ViewAction::make(),
        
            
            Tables\Actions\DeleteAction::make(),
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
        'index' => Pages\ListPembayarans::route('/'),
        'view' => Pages\ViewPembayaran::route('/{record}'), 
    ];
}
}