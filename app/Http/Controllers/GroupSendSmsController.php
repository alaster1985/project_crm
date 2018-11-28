<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use Illuminate\Http\Request;


class  GroupSendSmsController extends Controller
{

    public function sendGroupSms(Request $request)
    {
        $text = $request->msg;
        $mobila = array("+380956657569","+380955702380");
        foreach($mobila as $mob)
        {
            if (isset($mob) && isset($text)) {
                $accountSid = "AC1df6f09949519b33a45168cb3c568d24";
                $authToken = "bfff6970a1a4e5913b079b82d4b6c617";
                $client = new Client($accountSid, $authToken);
                $message = $client->messages->create(
                    $mob, array(
                        'from' => '+14133393335',
                        'body' => $text
                    )
                );


            }
        }
        if ($message->sid) {
            return redirect()->back() ->with('alert  ', 'Сообщение отправлено');
        }
    }
}