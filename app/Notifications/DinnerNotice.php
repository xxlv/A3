<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DinnerNotice extends Notification
{
    use Queueable;

    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'slack'];
    }

    public function toDatabase()
    {

        return $this->user->toArray();
    }


    public function toSlack($notifiable)
    {
        $content='我已经帮'.$this->user->name.'自动订餐啦！';
        return (new SlackMessage())
            ->success()
            ->content($content);
    }

}
