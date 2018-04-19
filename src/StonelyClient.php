<?php

namespace Stonely\Sdk;

use Stonely\Sdk\Api\VideoSmsApi;

/**
 *
 * @author dzh
 * @since 1.0
 */
class StonelyClient implements Constant\StonelyConstant {
    use StonelyGuzzle;

    /**
     *
     * @var ApiFactory
     */
    private $api;

    /**
     *
     * @var StonelyConf
     */
    private $conf;

    function __construct() {
        $this->api = new Api\ApiFactory($this);
        $this->conf = new StonelyConf();
    }

    /**
     * Initialize/Create StonelyClient
     *
     * @param string $apikey
     * @param array $conf
     * @return \Stonely\SDK\StonelyClient
     */
    static function create($apikey, array $conf = []) {
        $clnt = new StonelyClient();
        $clnt->conf->init()->with($apikey, $conf);
        $clnt->initHttp($clnt->conf); // StonelyGuzzle->initHttp
        return $clnt;
    }

    /**
     *
     * @param string $name
     * @return \Stonely\Sdk\Api\StonelyApi
     */
    private function api($name) {
        return $this->api->api($name);
    }

    /**
     *
     * @return SmsApi
     */
    function sms() {
        return $this->api(Api\SmsApi::NAME);
    }

    /**
     *
     * @return VideoSmsApi
     */
    function vsms() {
        return $this->api(Api\VideoSmsApi::NAME);
    }

    /**
     *
     * @return UserApi
     */
    function user() {
        return $this->api(Api\UserApi::NAME);
    }

    /**
     *
     * @return VoiceApi
     */
    function voice() {
        return $this->api(Api\VoiceApi::NAME);
    }

    /**
     *
     * @return SignApi
     */
    function sign() {
        return $this->api(Api\SignApi::NAME);
    }

    /**
     *
     * @return TplApi
     */
    function tpl() {
        return $this->api(Api\TplApi::NAME);
    }

    /**
     *
     * @return FlowApi
     */
    function flow() {
        return $this->api(Api\FlowApi::NAME);
    }

    function conf($key = null) {
        return is_null($key) ? $this->conf : $this->conf->conf($key);
    }

    function apikey() {
        return $this->conf->apikey();
    }

    function __destruct() {
        // print "Destroying $this\n";
    }

    function __toString() {
        return "StonelyClient-{$this->apikey()}";
    }

}

