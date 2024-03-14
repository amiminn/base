<?php

namespace Amiminn\Support;

class Tripay
{
    public static function generate($method = 'QRIS', $amount = 0, $order_item = [], $callback_url, $return_url = null)
    {
        $apiKey       = 'DEV-sXYoVt41Ll9V3sVZgjy8crNl82LhIJ5AiLc84dzx';
        $privateKey   = 'mkyrx-9Uxz4-xZDJG-kHZkI-RijJo';
        $merchantCode = 'T30149';
        $merchantRef  = "INV" . date("dmY") . "-" . rand(100, 999);
        $url          = "https://tripay.co.id/api-sandbox/transaction/create";

        $data = [
            'method'         => $method,
            'merchant_ref'   => $merchantRef,
            'amount'         => $amount,
            'customer_name'  => 'vmme-commerce',
            'customer_email' => 'cs@vmme.fund',
            'order_items'    => $order_item,
            // 'order_items'    => [
            //     [
            //         'name'        => 'CocaCola',
            //         'price'       => 500,
            //         'quantity'    => 1
            //     ]
            // ],
            'return_url'   => $return_url,
            "callback_url" => $callback_url,
            // 'return_url'   => 'https://domainanda.com/redirect',
            // https://domainanda.com/redirect?tripay_reference=DEV-T30149147344Y1JGV&tripay_merchant_ref=INV13032024-959
            'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
            'signature'    => hash_hmac('sha256', $merchantCode . $merchantRef . $amount, $privateKey)
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => http_build_query($data),
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        return json_decode(empty($error) ? $response : $error);
    }
}
