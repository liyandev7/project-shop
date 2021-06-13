<?php


namespace App\Notifications\Channel;


use Illuminate\Notifications\Notification;

class GhasedakSmsChannel
{
    public function send($notifiable,Notification $notification)
    {
        $data=$notification->toGasedakSms($notifiable);

        $message=$data['text'];
        $receptor=$data['phone'];
        try
        {
            $lineNumber = "5000121212";
            $api = new \Ghasedak\GhasedakApi(env('API_KEY_SMS'));
            $api->SendSimple($receptor,$message,$lineNumber);
        }
        catch(\Ghasedak\Exceptions\ApiException $e){
            throw $e;
        }
        catch(\Ghasedak\Exceptions\HttpException $e){
            throw $e;
        }

    }
}
