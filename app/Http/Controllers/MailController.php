<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;
 
class MailController extends Controller
{
    public function send()
    {
        // $objDemo = new \stdClass();
        // $objDemo->demo_one = 'Demo One Value';
        // $objDemo->demo_two = 'Demo Two Value';
        // $objDemo->sender = 'SenderUserName';
        // $objDemo->receiver = 'ReceiverUserName';
 
        // Mail::to("santi_torri97@hotmail.com")->send(new DemoEmail($objDemo));

        $data = [
            'title' => 'Esto es la prueba de Edwin Diaz',
            'content' => 'A ver si funciona...'
        ];
        Mail::send('mails.demo', $data, function($message){
            $message->to('santi_torri97@hotmail.com','Santi')->subject('Hola a todossss');
        });
    }
}