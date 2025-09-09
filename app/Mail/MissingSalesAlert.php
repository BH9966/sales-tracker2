<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MissingSalesAlert extends Mailable
{
    use Queueable, SerializesModels;

    public $missingSales;

    public function __construct($missingSales)
    {
        $this->missingSales = $missingSales;
    }

    public function build()
    {
        return $this->subject('Missing Sales Report')
                    ->view('mazerpage.emails.missing_sales_alert');
    }
}
