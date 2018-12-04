<?php
/**
 * Created by PhpStorm.
 * User: ihorbaranchuk
 * Date: 02.12.18
 * Time: 22:47
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailSendController
{
    function sendMail(Request $request)
    {

        $text = $request->msg;
        $mail = $request->email;
        Mail::raw("$text", function ($message) use ($mail) {
            $message->subject("Информация от A-level");
            $message->to("$mail");
        });
            return redirect()->back() ->with('alert  ', 'Молодец');
        }

    public function index()
    {
        return view('mailTo');
    }
}