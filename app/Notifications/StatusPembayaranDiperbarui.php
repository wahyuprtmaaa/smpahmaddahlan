<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class StatusPembayaranDiperbarui extends Notification
{
    protected $pesan;

    public function __construct($pesan)
    {
        $this->pesan = $pesan;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'pesan' => $this->pesan,
            'role' => $notifiable->getRoleNames(),
        ];
    }
}
