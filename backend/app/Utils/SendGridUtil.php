<?php

namespace App\Utils;

use SendGrid;

class SendGridUtil
{
    /**
     * 送信元
     */
    private $apiKey = '';

    /**
     * 送信元
     */
    private $form = '';

    /**
     * 送信先
     */
    private $tos = [];

    /**
     * 添付ファイル
     */
    private $attempt = [];

    /**
     * タイトル
     */
    private $subject = '';

    /**
     * 本文
     */
    private $body = '';

    public function __construct(array $params = [])
    {
        $this->apiKey = getenv('SENDGRID_API_KEY');
        $this->form = $params['form'] ?? '';
        $this->subject = $params['subject'] ?? '';
        $this->body = $params['body'] ?? '';
        foreach ($params['email'] as $email) {
            $userName = $this->user;
            if (is_null($userName)) {
                continue;
            }
            array_push($this->tos, new \SendGrid\Mail\To($$email, $userName));
        }
    }

    public function attempt($objects, string $type)
    {
        return '';
    }

    public function sendMail()
    {
        $validation = $this->validation();
        if (count($validation) > 0) {
            return $validation;
        }

        $subject = new SendGrid\Mail\Subject($this->subject);
        $htmlContent = new SendGrid\Mail\HtmlContent($this->body);
        $email = new SendGrid\Mail\Mail(
            $this->from,
            $this->tos,
            $subject,
            null,
            $htmlContent
        );
        $sendgrid = new SendGrid($this->apiKey);
        $response = $sendgrid->send($email);
        if ($response->statusCode() == 202) {
            return [];
        }
        return ['send error'];
    }

    private function validation(): array
    {
        $errors = [];
        if (is_null($this->apiKey)) {
            $errors[] = 'SENDGRID_API_KEYが設定されていません。';
        }
        return $errors;
    }
}