<?php

namespace Amiminn\Support;

use Illuminate\Support\Facades\Mail;

class EmailService
{
    public static function send($email_tujuan, $subject, $path, $from="Yo Amiminn Official", $data = [], $files = [])
    {
        try {
            $maindata = [
                'data' => $data
            ];

            Mail::send('mailTemplates.' . $path, $maindata, function ($message) use ($email_tujuan, $subject, $files, $from) {
                $message->to($email_tujuan)
                    ->subject($subject);
                $message->from("admin@amiminn.my.id", $from);
                foreach ($files as $file) {
                    $message->attach($file);
                }
            });

            return true;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
