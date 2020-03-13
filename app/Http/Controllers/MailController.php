<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function index()
    {
        return view('mail.index');
    }

    public function sendEmail(Request $request)
    {
        //siapkan data
        $email = $request->email;
        $data = array(
            'name' => $request->name,
            'email_body' => $request->email_body
        );

        //kirim email
        Mail::send('mail.email_template', $data, function ($mail) use ($email) {


            $mail->to($email, 'no_reply')->subject("Sample Email Laravel");
            $mail->from('hariskazim@gmail.com', 'Testing');
        });

        //cek kegagalan
        if (Mail::failures()) {
            return "gagal mengirim Email";
        }
        return redirect()->route('mail.email')->with('pesan', 'Email berhasil dikirim');
    }
}
