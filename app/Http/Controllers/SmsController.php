<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;

class SmsController extends Controller
{
    public function sendSms()
    {
        $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        $client = new Client($accountSid, $authToken);
        try
        {
            // Use the client to do fun stuff like send text messages!
            $client->messages->create(
            // the number you'd like to send the message to
                "+380955702380",
                array(
                    // A Twilio phone number you purchased at twilio.com/console
                    'from' => '+18178138897',
                    // the body of the text message you'd like to send
                    'body' => 'Наконец-то заработало,блять!'
                )
            );
        }
        catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }
}