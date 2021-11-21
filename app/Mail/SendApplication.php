<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendApplication extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * The data instance.
     *
     * @var Company
     * @var Phone
     * @var Email
     */
    public $company;
    public $phone;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($company, $phone, $email)
    {
        $this->company = $company;
        $this->phone = $phone;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Заявка')->view('email.application');
    }
}
