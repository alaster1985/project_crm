<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use Illuminate\Http\Request;


class  GroupSendSmsController extends Controller
{
    public function sendGroupSms(Request $request)
    {
        $mobila ="+380955702380";
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
        return view('GroupSendSms');
    }

}