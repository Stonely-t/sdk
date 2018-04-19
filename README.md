# sdk demo

下载该类包，解压后直接使用

require_once("vendor/autoload.php");
use \Yunpian\Sdk\YunpianClient;

//初始化client,apikey作为所有请求的默认值
$clnt = YunpianClient::create('xxxxxx');//apikey请前往（www.haotingyun.com）申请

$param = [
    YunpianClient::MOBILE => 'xxxxxxxxx',
    YunpianClient::TEXT => "【豪霆云】你的验证码是4567，请注意查收！！"
    ];
    $r = $clnt->sms()->batch_send($param);
if($r->isSucc()){
    echo "<pre>";
    var_dump($r->data());
}else{
    
}
