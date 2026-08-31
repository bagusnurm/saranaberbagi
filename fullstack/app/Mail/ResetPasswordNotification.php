<?php

namespace App\Mail;

use Illuminate\Notifications\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public function __construct(protected string $url) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

   public function toMail(object $notifiable): MailMessage
    {
    $expireMinutes = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');

    return (new MailMessage)
        ->subject('Atur Ulang Kata Sandi - Sarana Berbagi')
        ->view('emails.auth.reset-password', [
            'name' => $notifiable->name,
            'url' => $this->url,
            'expireMinutes' => $expireMinutes,
        ]);
    }
}
