<?php

namespace App\Filament\Resources\JobApplications\Pages;

use App\Filament\Resources\JobApplications\JobApplicationResource;
use App\Models\JobApplication;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewJobApplication extends ViewRecord
{
    protected static string $resource = JobApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('mark_review')
                ->label('Tinjau Lamaran (Review)')
                ->icon('heroicon-o-document-magnifying-glass')
                ->color('info')
                ->visible(fn (JobApplication $record): bool => $record->status === 'pending')
                ->action(function (JobApplication $record): void {
                    $record->update(['status' => 'review']);

                    Notification::make()
                        ->title('Lamaran Ditinjau')
                        ->body("Lamaran dari {$record->applicant_name} dipindahkan ke tahap Review.")
                        ->info()
                        ->send();
                }),

            Action::make('invite_interview')
                ->label('Jadwalkan Wawancara')
                ->icon('heroicon-o-calendar')
                ->color('primary')
                ->visible(fn (JobApplication $record): bool => in_array($record->status, ['pending', 'review']))
                ->action(function (JobApplication $record): void {
                    $record->update(['status' => 'interview']);

                    Notification::make()
                        ->title('Tahap Wawancara')
                        ->body("Lamaran dari {$record->applicant_name} dipindahkan ke tahap Interview.")
                        ->success()
                        ->send();
                }),

            Action::make('accept')
                ->label('Terima Pelamar')
                ->icon('heroicon-o-check-badge')
                ->color('success')
                ->visible(fn (JobApplication $record): bool => in_array($record->status, ['pending', 'review', 'interview']))
                ->requiresConfirmation()
                ->modalHeading('Terima Pelamar')
                ->modalDescription('Apakah Anda yakin ingin menerima pelamar ini?')
                ->action(function (JobApplication $record): void {
                    $record->update(['status' => 'accepted']);

                    Notification::make()
                        ->title('Pelamar Diterima')
                        ->body("{$record->applicant_name} telah ditandai Diterima.")
                        ->success()
                        ->send();
                }),

            Action::make('reject')
                ->label('Tolak Lamaran')
                ->icon('heroicon-o-x-circle')
                ->color('danger')
                ->visible(fn (JobApplication $record): bool => in_array($record->status, ['pending', 'review', 'interview']))
                ->requiresConfirmation()
                ->modalHeading('Tolak Lamaran')
                ->modalDescription('Apakah Anda yakin ingin menolak berkas lamaran ini?')
                ->action(function (JobApplication $record): void {
                    $record->update(['status' => 'rejected']);

                    Notification::make()
                        ->title('Lamaran Ditolak')
                        ->body("Lamaran {$record->applicant_name} telah ditolak.")
                        ->warning()
                        ->send();
                }),

            Action::make('download_cv')
                ->label('Unduh CV')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('gray')
                ->visible(fn (JobApplication $record): bool => !empty($record->cv_file))
                ->url(fn (JobApplication $record): string => asset('storage/' . $record->cv_file))
                ->openUrlInNewTab(),

            Action::make('whatsapp')
                ->label('Hubungi WhatsApp')
                ->icon('heroicon-o-chat-bubble-left-ellipsis')
                ->color('success')
                ->visible(fn (JobApplication $record): bool => !empty($record->phone))
                ->url(function (JobApplication $record): string {
                    $phone = preg_replace('/[^0-9]/', '', $record->phone);
                    if (str_starts_with($phone, '0')) {
                        $phone = '62' . substr($phone, 1);
                    }
                    $posisi = $record->vacancy?->title ?? 'posisi yang dilamar';
                    $msg = urlencode("Halo {$record->applicant_name}, kami dari Tim HR Sarana Berbagi mengenai lamaran Anda untuk {$posisi}.");
                    return "https://wa.me/{$phone}?text={$msg}";
                })
                ->openUrlInNewTab(),

            Action::make('send_email')
                ->label('Kirim Email')
                ->icon('heroicon-o-envelope')
                ->color('gray')
                ->visible(fn (JobApplication $record): bool => !empty($record->email))
                ->url(function (JobApplication $record): string {
                    $posisi = $record->vacancy?->title ?? 'Lamaran Kerja';
                    $subject = urlencode("Proses Seleksi ({$posisi}) - Sarana Berbagi");
                    return "mailto:{$record->email}?subject={$subject}";
                })
                ->openUrlInNewTab(),

            EditAction::make(),
        ];
    }
}
