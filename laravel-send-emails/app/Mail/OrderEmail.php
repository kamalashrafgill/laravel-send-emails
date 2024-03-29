<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $name, $products, $orderReceiptFile;
    public function __construct($name, $products, $orderReceiptFile)
    {
        $this->name = $name;
        $this->products = $products;
        $this->orderReceiptFile = $orderReceiptFile;
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order receipt',
        );
    }
    public function content(): Content
    {
        return new Content(
            view: 'emails.order',
            with: [
                'name' => $this->name,
                'products' => $this->products,
            ],
        );
    }
    public function attachments(): array
    {
        return [Attachment::fromPath($this->orderReceiptFile),];
    }
}
