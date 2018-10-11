<?php

namespace App\Http\Controllers;
use Twilio\Rest\Client;


class SmsController extends Controller
{
    public function sendSms()
    {
        if (isset($_POST['mobile']) && isset($_POST['msg'])) {
            $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
            $authToken = config('app.twilio')['TWILIO_AUTH_TOKEN'];

            $client = new Client($accountSid, $authToken);
            $message = $client->messages->create(
                $_POST['mobile'], array(
                    'from' => '+18178138897',
                    'body' => $_POST['msg']
                )
            );

            if ($message->sid) {
                echo "Ваше сообщение удачно отправлено!";
            }
        }
    }

    public function index()
    {
        return view('sms');
    }
}