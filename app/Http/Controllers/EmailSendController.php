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
    function SendMail(Request $request)
    {
        $email = $request->email;
        $text = $request->msg;
        $tema = $request->tema;

        Mail::raw("$text", function ($message) {
            $message->subject("qwe");
            $message->to("igor.baranchuk333@gmail.com");
        });
        return redirect()->back() ->with('alert  ', 'Новая версия');
    }

    public function index()
    {
        return view('mailTo');
    }
}