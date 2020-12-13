<?php

namespace EdyWladson\SendMail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Class SendMail
 * @package EdyWladson\SendMail
 */
class SendMail
{
    private $data;

    private $mail;

    private $message;

    public function __construct(
        string $mail_host,
        string $mail_port,
        string $mail_user,
        string $mail_pass,
        string $mail_lang = "en",
        string $mail_secure = "tls",
        string $mail_charset = "utf-8",
        bool $mail_html = true,
        bool $mail_auth = true
    ) {
        $this->mail = new PHPMailer(true);
        $this->data = new \stdClass();

        //setup
        $this->mail->isSMTP();
        $this->mail->setLanguage($mail_lang);
        $this->mail->isHTML($mail_html);
        $this->mail->SMTPAuth = $mail_auth;
        $this->mail->SMTPSecure = $mail_secure;
        $this->mail->CharSet = $mail_charset;

        //auth
        $this->mail->Host = $mail_host;
        $this->mail->Port = $mail_port;
        $this->mail->Username = $mail_user;
        $this->mail->Password = $mail_pass;

        $this->mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
    }

    public function mail(string $subject, string $body, string $recipientMail, string $recipientName): SendMail
    {
        $this->data->subject = $subject;
        $this->data->body = $body;
        $this->data->recipientMail = $recipientMail;
        $this->data->recipientName = $recipientName;
        return $this;
    }

    public function send(string $fromMail, string $fromName): bool
    {
        if (empty($this->data)) {
            $this->message = "Error sending, please check the data";
            return false;
        }

        if (!filter_var($this->data->recipientMail, FILTER_VALIDATE_EMAIL)) {
            $this->message = "The recipient's email is not valid";
            return false;
        }

        if (!filter_var($fromMail, FILTER_VALIDATE_EMAIL)) {
            $this->message = "The sender's email is not valid";
            return false;
        }

        try {
            $this->mail->setFrom($fromMail, $fromName);
            $this->mail->Subject = $this->data->subject;
            $this->mail->msgHTML($this->data->body);
            $this->mail->addAddress($this->data->recipientMail, $this->data->recipientName);

            $this->mail->send();
            return true;
        } catch (Exception $exception) {
            $this->message = $exception->getMessage();
            return false;
        }
    }

    public function message(): string
    {
        return $this->message;
    }
}
