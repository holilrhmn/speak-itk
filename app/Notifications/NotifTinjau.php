<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifTinjau extends Notification
{
    use Queueable;
    public $lapor;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($lapor)
    {
        $this->laporan = $lapor;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->greeting('Assalamualaikum wr.wb')
                ->subject($this->laporan->subjek)
                ->line('Berikut Status Laporan Telah Ditinjau Oleh Unit :')
                ->line($this->laporan->unit->name)
                ->line('Klik Tombol Dibawah Ini Untuk Melihat Laporan')
                ->action('View', url(route('ppid.laporan.show',$this->laporan->id)))
                ->line('Terima Kasih Telah Menggunakan Web Layanan Aspirasi Pengaduan Kampus ITK');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
