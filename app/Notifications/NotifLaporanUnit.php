<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifLaporanUnit extends Notification
{
    use Queueable;
    public $laporan;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($laporan)
    {
        $this->laporan =$laporan;
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
                    ->line('Terdapat Laporan Baru Yang Dikirimkan Oleh PPID Untuk Ditinjau ')
                    ->line('Deskripsi Laporan Sebagai Berikut : ')
                    ->line($this->laporan->laporan)
                    ->line('Segera Ditinjau Atas Laporan Tersebut')
                    ->line('Klik Tombol Dibawah Ini Untuk Melihat Laporan')
                    ->action('View', url(route('unit.laporan.show',$this->laporan->id)))
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
