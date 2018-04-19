<?php
require_once("vendor/autoload.php");
use \Stonely\Sdk\StonelyClient;

//初始化client,apikey作为所有请求的默认值
$clnt = StonelyClient::create('8e3d983b10d8bb8da013091c67276339');

$param = [
    StonelyClient::MOBILE => '18838978037,15660066689,15517549616,18837191530,15290100661',
    StonelyClient::TEXT => "【豪霆云】自主SDK，群发测试，收到请截图到微信群！！"
];
$r = $clnt->sms()->batch_send($param);
if($r->isSucc()){
    echo "<pre>";
    var_dump($r->data());
}else{
    echo 1111;
}
