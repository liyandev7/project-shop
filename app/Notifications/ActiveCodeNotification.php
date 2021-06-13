<?php

namespace App\Notifications;

use App\Notifications\Channel\GhasedakSmsChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ActiveCodeNotification extends Notification
{
    use Queueable;

    public $code;
    public $phone;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($code,$phone)
    {
        $this->code=$code;
        $this->phone=$phone;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [GhasedakSmsChannel::class];
    }


    public function toGasedakSms($notifiable)
    {
        return[
            'text'=>"  کد احراز هویت شما برابر است با :$this->code
              با تشکر وب سایت :" . env('APP_NAME'),
            'phone'=>$this->phone
        ];
    }


}
