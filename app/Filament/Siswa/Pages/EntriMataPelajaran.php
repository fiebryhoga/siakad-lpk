<?php

namespace App\Filament\Siswa\Pages;

use App\Filament\Siswa\Widgets\MataPelajaranDiambilWidget;
use App\Models\MataPelajaran;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class EntriMataPelajaran extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Mata Pelajaran';
    protected static ?string $title = 'Entri Mata Pelajaran';
    protected static string $view = 'filament.siswa.pages.entri-mata-pelajaran';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('pilihan_mapel')
                    ->label('Pilih mata pelajaran baru untuk ditambahkan')
                    ->multiple()
                    ->searchable()
                    
                    ->preload() 
                    ->placeholder('Cari atau pilih mata pelajaran...')
                    
                    ->options(
                        MataPelajaran::whereDoesntHave('siswa', function ($query) {
                            $query->where('user_id', auth()->id());
                        })->pluck('nama_pelajaran', 'id')
                    )
                    ->required(),
            ])
            ->statePath('data');
    }

    public function tambah(): void
    {
        $data = $this->form->getState();
        auth()->user()->mataPelajaranDiambil()->attach($data['pilihan_mapel']);
        Notification::make()
            ->title('Mata pelajaran berhasil ditambahkan!')
            ->success()
            ->send();

        
        $this->redirect(static::getUrl(), navigate: true);
    }

    protected function getFooterWidgets(): array
    {
        return [
            MataPelajaranDiambilWidget::class,
        ];
    }
}