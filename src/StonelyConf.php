<?php

namespace Stonely\Sdk;

/**
 *
 * @author dzh
 * @since 1.0
 */
class StonelyConf implements Constant\StonelyConstant {
    
    /**
     *
     * @var array
     */
    private $conf = [];

    /**
     * to upsert $conf
     *
     * @param string $apikey            
     * @param array $conf            
     * @return \Stonely\Sdk\StonelyConf
     */
    function with($apikey, array $conf = []) {
        if (!empty($conf)) foreach ($conf as $key => $value) {
            $this->conf[$key] = $value;
        }
        
        if (isset($apikey)) $this->conf[self::YP_APIKEY] = $apikey;
        
        return $this;
    }

    /**
     * load Stonely.ini to initialize StonelyConf firstly:
     * <p>
     *
     * </p>
     *
     * @return Stonely\Sdk\StonelyConf
     */
    function init() {
        if (is_null($this->conf)) {
            $this->conf = [];
        }
        
        $yp = parse_ini_file("Stonely.ini");
        foreach ($yp as $key => $value) {
            $this->conf[$key] = $value;
        }
        return $this;
    }

    /**
     *
     * @param string $key            
     * @param mixed $defval            
     * @return mixed
     */
    function conf($key = null, $defval = null) {
        if (is_null($key)) return $this->conf;
        $val = $this->conf[$key];
        return is_null($val) ? $defval : $val;
    }

    /**
     *
     * @return string
     */
    function apikey() {
        return $this->conf[self::YP_APIKEY];
    }

}