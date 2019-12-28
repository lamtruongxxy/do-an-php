<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailForgotPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $thongTin;
    public $code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($thongTin, $code)
    {
        $this->thongTin = $thongTin;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                ->view('mails.forgot-password')
                ->subject('Mã xác nhận tài khoản')
                ->with(['code' => $this->code]);
    }
}
