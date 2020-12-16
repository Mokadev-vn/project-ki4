<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Payment;
use App\Models\Company;

class MomoController extends Controller
{

    public function init()
    {
        header('Content-type: text/html; charset=utf-8');
        $result = [
            'status' => 'error',
            'message' => '',
            'error' => false
        ];

        $id = getSession('user')['id'];
        $name = getSession('user')['fullname'];
        $amount = request("amount");
        

        if (!$amount) {
            $result['error']['amount'] = "Please enter a value";
            setSession('error', $result);
            back();
            return;
        }

        if($amount < 1000){
            $result['error']['amount'] = "Amount must be > 1000";
            setSession('error', $result);
            back();
            return;
        }

        $payment = new Payment();
        $orderId = "MD" . $id . time();
        $payment->orderId = $orderId;
        $payment->company_id = $id;
        $payment->amount = $amount;
        $payment->status = 0;
        $payment->create_at = now();
        $getId = $payment->save();

        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";
        $partnerCode = MOMO_CONFIG["partnerCode"];
        $accessKey = MOMO_CONFIG["accessKey"];
        $secretKey = MOMO_CONFIG["secretKey"];
        $amt2 = money($amount);
        $orderInfo = "Payment of $amt2 from $name via MoMo";
        $requestId = $orderId;
        $returnUrl = APP_CONFIG['url'] . "pay/return";
        $notifyurl = APP_CONFIG['url'] . "pay/notify";
        $extraData = "id=$getId";
        $requestType = "captureMoMoWallet";

        //before sign HMAC SHA256 signature
        $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data = [
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
        ];
        $result = execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);

        header("Location: " . $jsonResult['payUrl']);
    }

    public function payReturn()
    {
        header('Content-type: text/html; charset=utf-8');
        $userId = getSession('user')['id'];
        $secretKey = MOMO_CONFIG["secretKey"];

        $partnerCode  = request("partnerCode");
        $accessKey    = request("accessKey");
        $orderId      = request("orderId");
        $localMessage = request("localMessage");
        $message      = request("message");
        $transId      = request("transId");
        $orderInfo    = request("orderInfo");
        $amount       = request("amount");
        $errorCode    = request("errorCode");
        $responseTime = request("responseTime");
        $requestId    = request("requestId");
        $extraData    = request("extraData");
        $payType      = request("payType");
        $orderType    = request("orderType");
        $extraData    = request("extraData");
        $m2signature  = request("signature");


        //Checksum
        $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo .
            "&orderType=" . $orderType . "&transId=" . $transId . "&message=" . $message . "&localMessage=" . $localMessage . "&responseTime=" . $responseTime . "&errorCode=" . $errorCode .
            "&payType=" . $payType . "&extraData=" . $extraData;

        $partnerSignature = hash_hmac("sha256", $rawHash, $secretKey);

        $result = [
            'status' => 'error',
            'message' => '',
            'error' => false
        ];

        if ($m2signature == $partnerSignature) {
            if ($errorCode == '0') {
                $getId = explode('=', $extraData);
                $payment = new Payment();
                $getPay = $payment->where('id', $getId[1])->getOne();

                if ($getPay['status'] == 0) {
                    $payment->momopay_id = $transId;
                    $payment->status = 1;
                    $payment->update_at = now();
                    $payment->where('id', $getId[1])->update();

                    $company = new Company();
                    $get = $company->params(['coin'])->where('id', $userId)->getOne();
                    $company->coin = $get['coin'] + $amount;
                    $company->where('id', $userId)->update();

                    $result['status'] = 'success';
                    $result['message'] = 'Payment successfully';
                }
            } else {
                $result['message'] = $message;
            }
        } else {
            $result['message'] = 'This transaction could be hacked, please check your signature and returned signature';
        }
        setSession('error', $result);
        redirect('wallet');
        return;
    }

    public function payNotify()
    {
        header("content-type: application/json; charset=UTF-8");
        http_response_code(200);

        $secretKey = MOMO_CONFIG["secretKey"];

        $response = [];


        $partnerCode  = request("partnerCode");
        $accessKey    = request("accessKey");
        $orderId      = request("orderId");
        $localMessage = request("localMessage");
        $message      = request("message");
        $transId      = request("transId");
        $orderInfo    = request("orderInfo");
        $amount       = request("amount");
        $errorCode    = request("errorCode");
        $responseTime = request("responseTime");
        $requestId    = request("requestId");
        $extraData    = request("extraData");
        $payType      = request("payType");
        $orderType    = request("orderType");
        $extraData    = request("extraData");
        $m2signature  = request("signature");

        //Checksum
        $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo .
            "&orderType=" . $orderType . "&transId=" . $transId . "&message=" . $message . "&localMessage=" . $localMessage . "&responseTime=" . $responseTime . "&errorCode=" . $errorCode .
            "&payType=" . $payType . "&extraData=" . $extraData;

        $partnerSignature = hash_hmac("sha256", $rawHash, $secretKey);

        if ($m2signature == $partnerSignature) {
            if ($errorCode == '0') {
                // $getId = explode('=', $extraData);
                // $payment = new Payment();
                // $payment->status = 1;
                // $payment->update_at = now();
                // $payment->where('id', $getId[1])->update();
            } else {
                $result = '<div class="alert alert-danger">' . $message . '</div>';
            }
        } else {
            $result = '<div class="alert alert-danger">This transaction could be hacked, please check your signature and returned signature</div>';
        }

        $debugger = [];
        $debugger['rawData'] = $rawHash;
        $debugger['momoSignature'] = $m2signature;
        $debugger['partnerSignature'] = $partnerSignature;

        if ($m2signature == $partnerSignature) {
            $response['message'] = "Received payment result success";
        } else {
            $response['message'] = "ERROR! Fail checksum";
        }
        $response['debugger'] = $debugger;
        echo json_encode($response);
    }
}
