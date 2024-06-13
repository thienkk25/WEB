<?php
header('Content-type: text/html; charset=utf-8');

$config = file_get_contents('config.json');
$array = json_decode($config, true);

include_once ("helper.php");

$orderInfo = "Thanh toán qua MoMo";
if (!empty($_GET['price']) && $_GET['price'])
{
    $amount = $_GET['price'];
}else $amount = "99999999";
// Lưu ý: link notifyUrl không phải là dạng localhost

if (!empty($_POST)) {
    $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";
    $partnerCode = $array["partnerCode"];
         $accessKey = $array["accessKey"];
         $serectkey = $array["secretKey"];
         $orderid = time()."";
         $orderInfo = $_POST["orderInfo"];
         $amount = $_POST["amount"];
         $bankCode = "SML";
         $returnUrl = "http://localhost/Web_thanh_toan_MOMO/result_atm.php";
         $notifyurl = "http://localhost/Web_thanh_toan_MOMO";
         $requestId = time()."";
         $requestType = "payWithMoMoATM";
         $extraData = "";
         //before sign HMAC SHA256 signature
         $rawHashArr =  array(
                        'partnerCode' => $partnerCode,
                        'accessKey' => $accessKey,
                        'requestId' => $requestId,
                        'amount' => $amount,
                        'orderId' => $orderid,
                        'orderInfo' => $orderInfo,
                        'bankCode' => $bankCode,
                        'returnUrl' => $returnUrl,
                        'notifyUrl' => $notifyurl,
                        'extraData' => $extraData,
                        'requestType' => $requestType
                        );
         // echo $serectkey;die;
         $rawHash = "partnerCode=".$partnerCode."&accessKey=".$accessKey."&requestId=".$requestId."&bankCode=".$bankCode."&amount=".$amount."&orderId=".$orderid."&orderInfo=".$orderInfo."&returnUrl=".$returnUrl."&notifyUrl=".$notifyurl."&extraData=".$extraData."&requestType=".$requestType;
         $signature = hash_hmac("sha256", $rawHash, $serectkey);

         $data =  array('partnerCode' => $partnerCode,
                        'accessKey' => $accessKey,
                        'requestId' => $requestId,
                        'amount' => $amount,
                        'orderId' => $orderid,
                        'orderInfo' => $orderInfo,
                        'returnUrl' => $returnUrl,
                        'bankCode' => $bankCode,
                        'notifyUrl' => $notifyurl,
                        'extraData' => $extraData,
                        'requestType' => $requestType,
                        'signature' => $signature);
         $result = execPostRequest($endpoint, json_encode($data));
         $jsonResult = json_decode($result,true);  // decode json
         
         error_log( print_r( $jsonResult, true ) );
         header('Location: '.$jsonResult['payUrl']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css"/>
    <link rel="stylesheet"
          href="./statics/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css"/>
    <!-- CSS -->
</head>
<body>
<div class="container" style="max-width: 400px;">
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Xác nhận thanh toán</h3>
                </div>
                <div class="panel-body">
                    <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="atm_momo.php">
                        <div class="row">
                            <div class="col-md-5" style="width: 100%;">
                                <div class="form-group">
                                    <label for="fxRate" class="col-form-label">Tổng số tiền thanh toán</label>
                                    <div class='input-group date' id='fxRate'>
                                        <input style="width: 368px;" type='text' name="amount" value="<?php echo $amount; ?>" class="form-control" readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5" style="width: 100%;">
                                <div class="form-group">
                                    <label for="fxRate" class="col-form-label">Nội dung thanh toán</label>
                                    <div class='input-group date' id='fxRate'>
                                        <input style="width: 368px;" type='text' name="orderInfo" value="<?php echo $orderInfo; ?>"
                                               class="form-control"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>
                        <div style="margin-top: 1em;">
                            <button type="submit" class="btn btn-primary btn-block">Xác nhận</button>
                        </div>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript" src="./statics/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="./statics/moment/min/moment.min.js"></script>
<script type="text/javascript" src="./statics/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript"
        src="./statics/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

</body>
</html>