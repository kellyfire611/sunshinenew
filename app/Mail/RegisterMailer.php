<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterMailer extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Tạo biến chứa dữ liệu dùng để render email template
     */
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->data['nv_email'];
        return $this->from(env('MAIL_FROM_ADDRESS', 'hotro.nentangtoituonglai@gmail.com'), env('MAIL_FROM_NAME', 'Sunshine'))
            ->replyTo($email)
            ->subject("Có thành viên $email vừa đăng ký")
            ->view('emails.register-email')
            ->with('data', $this->data);
    }
}
