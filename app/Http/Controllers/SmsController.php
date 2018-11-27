<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use Illuminate\Http\Request;


class SmsController extends Controller
{
    public function sendSmsTo(Request $request)
    {
        $mobila = $request->mobile;
        $text = $request->msg;
        if (isset($mobila) && isset($text)) {
            $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
            $authToken = config('app.twilio')['TWILIO_AUTH_TOKEN'];
            $client = new Client($accountSid, $authToken);
            $message = $client->messages->create(
                $mobila, array(
                    'from' => '+18178138897',
                    'body' => $text
                )
            );
            if ($message->sid) {
                return redirect()->back() ->with('alert  ', 'Сообщение отправлено');
            }
        }
    }

    public function index()
    {
        return view('smsTo');
    }

}