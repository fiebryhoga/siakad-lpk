<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SertifikatResource\Pages;
use App\Models\Sertifikat;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class SertifikatResource extends Resource
{
    protected static ?string $model = Sertifikat::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Sertifikat';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name', modifyQueryUsing: fn ($query) => $query->where('role', 'siswa'))
                    ->searchable()
                    ->preload()
                    ->label('Pilih Siswa')
                    ->required(),
                Forms\Components\TextInput::make('judul_sertifikat')
                    ->required(),
                Forms\Components\FileUpload::make('file_sertifikat')
                    ->label('File Sertifikat (PDF)')
                    ->disk('public')
                    ->directory('sertifikat-siswa')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_diterbitkan')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama Siswa')
                    ->searchable()
                    ->sortable()
                    
                    ->visible(fn () => auth()->user()->role !== 'siswa'),
                Tables\Columns\TextColumn::make('judul_sertifikat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_diterbitkan')
                    ->date()
                    ->sortable(),
            ])
            ->actions([
                
                Tables\Actions\Action::make('unduh')
                    ->label('Unduh')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn (Sertifikat $record): string => Storage::disk('public')->url($record->file_sertifikat))
                    ->openUrlInNewTab(),
                
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        
        if (auth()->user()?->role === 'siswa') {
            return parent::getEloquentQuery()->where('user_id', auth()->id());
        }
        
        return parent::getEloquentQuery();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSertifikats::route('/'),
            'create' => Pages\CreateSertifikat::route('/create'),
            'edit' => Pages\EditSertifikat::route('/{record}/edit'),
        ];
    }
}
