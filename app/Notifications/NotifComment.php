<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifComment extends Notification
{
    use Queueable;



    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->greeting('Assalamualaikum wr.wb')
                ->subject('Komentar Baru')
                ->line('Terdapat Komentar Yang Dikirimkan Oleh Pelapor')
                ->line('Komentar Yang Dikirimkan Sebagai Berikut : '.$this->comment->comment )
                ->line('Pada Laporan : '. $this->comment->commentable_id)
                ->line('Segera Memberikan Balasan Terhadap Komentar Tersebut')
                ->line('Terima Kasih Telah Menggunakan Web LAPOR ITK');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
     public function toDatabase()
    {
        return [
            'comment_id' => $this->comment['id'],
            'comment' => $this->comment['comment'],
            'commentable_id' => $this->comment['commentable_id'],
            'comment_id' => $this->comment['commenter_id'],
        ];
    }

}
