# sdk demo
下载该类包，解压后直接使用

## 代码示例
```
<?php

require_once("vendor/autoload.php");

use \Stonely\Sdk\StonelyClient;

//初始化client,apikey作为所有请求的默认值

$clnt = StonelyClient::create('xxxxxxxxxxxxx');//apikey请到豪霆云官网申请(http://www.haotingyun.com)

$param = [
    StonelyClient::MOBILE => 'xxxxxxxxx',//接收信息的手机号
    StonelyClient::TEXT => "【豪霆云】你的验证码是1234，请注意查收！！"
];

$r = $clnt->sms()->single_send($param);

if($r->isSucc()){
    echo "<pre>";
    var_dump($r->data());
}else{
   
}

```
