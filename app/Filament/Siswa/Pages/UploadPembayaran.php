<?php
namespace App\Filament\Siswa\Pages;

use App\Models\Pembayaran;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Pages\Page;


use App\Filament\Siswa\Widgets\HistoriPembayaranWidget;



class UploadPembayaran extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-arrow-up-tray';

    protected static string $view = 'filament.siswa.pages.upload-pembayaran';

    protected static ?string $title = 'Upload Pembayaran';

    protected static ?string $navigationLabel = 'Upload Pembayaran';

    
    protected function getHeaderActions(): array
    {
        return [
            Action::make('uploadPembayaran')
                ->label('Upload Bukti Bayar Baru')
                ->form([
                    FileUpload::make('file_bukti')
                        ->label('File Bukti Pembayaran')
                        ->required()
                        ->disk('public')
                        ->directory('bukti-pembayaran')
                        ->image()        
                        ->imageEditor(), 
                ])
                ->action(function (array $data) {
                    
                    Pembayaran::create([
                        'user_id'    => auth()->user()?->id,
                        'file_bukti' => $data['file_bukti'],
                        'status'     => 'pending',
                    ]);

                    
                    Notification::make()
                        ->title('Upload berhasil, pembayaran Anda akan segera diperiksa.')
                        ->success()
                        ->send();
                }),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            HistoriPembayaranWidget::class,
        ];
    }
}
