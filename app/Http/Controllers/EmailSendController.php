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
        $email = $request->email;
        $text = $request->msg;
        $tema = $request->tema;
        $po4ty = array("igor.baranchuk333@gmail.com","igor.baranchuk.st@gmail.com");

        Mail::raw("$text", function ($message) {
            $message->subject("С уважением, администрация A-level!");
            $message->to("igor.baranchuk333@gmail.com","igor.baranchuk.st@gmail.com");
        });
        return redirect()->back() ->with('alert  ', 'Новая версия');
    }

    public function index()
    {
        return view('mailTo');
    }
}