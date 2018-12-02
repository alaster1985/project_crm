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
            $accountSid = "AC1df6f09949519b33a45168cb3c568d24";
            $authToken = "bfff6970a1a4e5913b079b82d4b6c617";
            $client = new Client($accountSid, $authToken);
            $message = $client->messages->create(
                $mobila, array(
                    'from' => '+14133393335',
                    'body' => $text
                )
            );
            if ($message->sid) {
                return redirect()->back() ->with('alert  ', 'Новая версия');
            }
        }
    }

    public function index()
    {
        return view('smsTo');
    }

}