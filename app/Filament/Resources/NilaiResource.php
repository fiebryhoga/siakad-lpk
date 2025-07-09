<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NilaiResource\Pages;
use App\Models\Nilai;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Get;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;


class NilaiResource extends Resource
{
    protected static ?string $model = Nilai::class;
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';
    protected static ?string $navigationLabel = 'Nilai';

    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name', modifyQueryUsing: fn ($query) => $query->where('role', 'siswa'))
                    ->searchable()
                    ->preload()
                    ->live()
                    ->label('Nama Siswa')
                    ->required(),
    
                    Forms\Components\Select::make('mata_pelajaran_id')
                    ->label('Mata Pelajaran yang Diambil Siswa')
                    ->searchable()
                    ->options(function (Get $get) {
                        $userId = $get('user_id');
                        if (!$userId) return [];
                        return User::find($userId)->mataPelajaranDiambil()->pluck('nama_pelajaran', 'id');
                    })
                    ->required()
                    ->unique(
                        ignoreRecord: true,
                        modifyRuleUsing: fn (Unique $rule, Get $get) => $rule->where('user_id', $get('user_id'))
                    )
                    ->validationMessages([
                        'unique' => 'Mata pelajaran tersebut yang diambil siswa ini telah dinilai.',
                    ]),
                Forms\Components\Select::make('guru_id')
                    ->relationship('guru', 'name', modifyQueryUsing: fn ($query) => $query->where('role', 'guru'))
                    ->searchable()
                    ->preload()
                    ->label('Guru Pengajar')
                    ->required(),
                
                Forms\Components\TextInput::make('nilai')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Nama Siswa')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('mataPelajaran.nama_pelajaran')->label('Mata Pelajaran')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nilai')->sortable(),
                Tables\Columns\TextColumn::make('guru.name')->label('Guru')->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListNilais::route('/'),
            'create' => Pages\CreateNilai::route('/create'),
            'edit' => Pages\EditNilai::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
{
    
    if (auth()->user()->role === 'siswa') {
        
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }

    
    return parent::getEloquentQuery();
}
}
