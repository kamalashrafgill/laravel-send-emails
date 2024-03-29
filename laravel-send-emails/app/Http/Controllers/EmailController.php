<?php

namespace App\Http\Controllers;

use App\Mail\OrderEmail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(): void
    {
        $name = 'put-your-name-here';
        $email = 'put-your-email-address-here';
        $file = public_path('order-receipt.txt');
        $products = [
            [
                'name' => 'Product A',
                'price' => '50',
                'quantity' => 5,
            ],
            [
                'name' => 'Product B',
                'price' => '30',
                'quantity' => 4,
            ],
            [
                'name' => 'Product C',
                'price' => '20',
                'quantity' => 2,
            ]
        ];
        try{
           Mail::to($email)->send(new OrderEmail($name, $products, $file));
        }
        catch(\Throwable $error){
            echo $error->getMessage();
        }
    }
}
