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

        $po4ty = array("igor.baranchuk333@gmail.com","igor.baranchuk.st@gmail.com");

        Mail::send(array('text' => 'view'), $po4ty);
        return redirect()->back() ->with('alert  ', 'Новая версия');
    }

    public function index()
    {
        return view('mailTo');
    }
}