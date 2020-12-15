<?php

namespace App\Controllers;

use Core\Controller;

class MomoController extends Controller
{

    public function init()
    {
        header('Content-type: text/html; charset=utf-8');

        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";
        $partnerCode = MOMO_CONFIG["partnerCode"];
        $accessKey = MOMO_CONFIG["accessKey"];
        $secretKey = MOMO_CONFIG["secretKey"];
        $orderInfo = "Thanh toán qua MoMo";
        $amount = "10000";
        $orderId = time() . "";
        $returnUrl = APP_CONFIG['url']."paymomo/return";
        $notifyurl = APP_CONFIG['url']."paymomo/noti";

        $extraData = "merchantName=MoMo Partner";

        $orderId = time() . ""; // Mã đơn hàng

        $requestId = time() . "";
        $requestType = "captureMoMoWallet";

        //before sign HMAC SHA256 signature
        $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data = array(
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'returnUrl' => $returnUrl,
            'notifyUrl' => $notifyurl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);

        redirect($jsonResult['payUrl']);
    }

    public function payReturn(){
        header('Content-type: text/html; charset=utf-8');
        $secretKey = MOMO_CONFIG["secretKey"];

        

    }

    public function payNotify(){

    }
}
