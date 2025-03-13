<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue; 
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PatientRegisteredNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {

    }

    public function via($notifiable): array
    {

        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Registro de Paciente')
                    ->line('Te has registrado correctamente en nuestro sistema.')
                    ->action('Ir a la aplicación', url('/'))
                    ->line('¡Gracias por confiar en nosotros!');
    }

    public function toSms($notifiable): string {

        return 'Te has registrado correctamente en nuestro sistema. ¡Gracias por confiar en nosotros!';
    }

    public function toArray($notifiable): array
    {
        return [
            
        ];
    }
}

