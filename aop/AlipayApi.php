<?php
namespace Alipay;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/10
 * Time: 9:36
 */

namespace Alipay;


class AlipayApi
{

    public static $selfInstance = array();
    public static $selfInstanceRequest = array();


    /**
     * AopClient实例
     * @param $data
     * @return AopClient
     */
    public static function aop($data){
        if(!array_key_exists($data['appId'], self::$selfInstance)){
            $aop = new AopClient();
            $aop->appId = $data['appId'];
            $aop->rsaPrivateKey = $data['rsaPrivateKey'];
            $aop->alipayrsaPublicKey = $data['alipayrsaPublicKey'];
            $aop->signType = $data['signType'];
            $aop->gatewayUrl = $data['gatewayUrl'];
            self::$selfInstance[$data['appId']] = $aop;
        }
        return self::$selfInstance[$data['appId']];
    }


    /**
     * request实例
     * @param $className
     * @return mixed
     */
    public static function request($className){
        if(!array_key_exists($className, self::$selfInstanceRequest)){
            $request_name = __NAMESPACE__ . '\\request\\' . $className;
            $request = new $request_name();
            self::$selfInstanceRequest[$className] = $request;
        }
        return self::$selfInstanceRequest[$className];
    }
}