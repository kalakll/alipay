<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/10
 * Time: 10:43
 */

namespace Alipay;


class demo
{
    public function alipay($className,$data,$app_auth_token){
        $config = [
            'appId' => '',
            'rsaPrivateKey' => 'MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCDbl1XAud+EK8eHHD46PR2JvlaUrTebqoJKz5la9tjryH9DyTMunp6Af1mFogrl7xUBOFH4HMkmD1r4UTIoodHZldO4oi4/fhKnQg0k2win3S/awGy97DpNYMJis3ElUjHrnbdsTZ43DohftrJ5VWl+y3FaiDG1oLuCrhNjFCAQxOk0W9CJzbXCM49Rx5Xu22/0rG6Eo8mGwukIVXa1Fwav3IjgnuCheFO5WmGMRtP/oID+QVbd536YEwxZOBcOX/AKrnUztsmfY7bmu6Vf2HELBgayyZL+bQ3KB0twmlwxIaY15c5wFJhmgBU13a3C5sn0L6c2XRJ5jMC+zbxVcFJAgMBAAECggEATnu2E0JxuA8Ac2uqboi1imSFnFEtHnJY6TbAgNHiZWlsU3AamoJ0pqzPg4nK8LUgSc/MMx6tw1mBvAz+BQ1A2PsdAcc2u7k07mFNSBAMj7RGhBPDJPrR0sEYqbcQXuaCWnMtGf87tvpTYDMfNVbUSVRvpaZVQkdQUhNmsTAr1hrT5Rjl+eZITQwmFQwNx7c/MS7EVa+hoAb9VizplNQqSyeV0e9OzuDyYxSkcayeg8EZNaM1bExvepQc5uBRJ2rkUzAKvGdBdZEwL/OtrnSrUT8jjhmoNPRKwXO/3lnYtoCQ4shHEr5Znq+qljniso5CdP5Lq4bx3jy7QmNlJXY2/QKBgQD0K6vZ1Yo4aINYCgI81vBzT9fWn6XdlmLf7Ap6/gP4RfFaA1y9u6jD6Oot5+9y614S4QfqSpMSY1gcFrp5MElPSobOPuiUKly+VwdBvQ4zCuVw+m6M9fF+lZIVev28CYT9r71FZ4qZOXGqxJRZjZToAC4QfuPMPpTfIWaaOaXt0wKBgQCJzHDIqIZYlX4OUhQVLPNpYLSzrnHntREvQBqtPn4ktexyX+tVlU6nOF4ahds+U9FTQi5cC6dqsw09xqBG0b6KkvufQcNphmJcjnfqZlSjFx3k8Q8dBlPiC82O9JVw6YNSR9JzFZWInMo2xFyem6bTQ+PAD7iq9eP23GAy0Zu28wKBgQDBnOt9JP2gMweLRQx3L7ykwzgUIK3GYpxukN3Snx+Iu/VgefANJwPwrP0cf6B4kLgc4kGDf7TVTN8uDru4oxhOfnscifeknV7DM4E2mHHs+YPsLTiCH/dpd7LJw6f1ddr1ymeb5DmbvFgsoAo+ZK0hthrQy71YVHt53yNbwcCYLwKBgBvhbYBr+KK7vIGRQdb2/Vj45Bbm2M0U6aExyzP6TPOIi4qotajfSMa0tPWQ18dIljXOUir1gK4qBCfXpF4v2emXy6lxWORk+EnZ2ZFnmwBUkQvdaj1pJle6I6ElA4eQ960SMxZt6490icWC/Wpp+9sLBW26wJZ2oeU0uZIOrv7ZAoGAfoqxmQWiptR4ykICF3ng4DvcmrZEts9IhKO9V7/4mLwOSOORCH2zP/pPaaFIDOr2PFuGW+VAA9p4f+p0cV4bguy8P2x2Ce09U+ZtBjWnEyrEKNgljcuYWGZhHfrHguGbLGgw3f6gf7dndDmFBceuAxyJQiwQv7pk1ibGbYkXJ6g=',
            'alipayrsaPublicKey' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAlsaM/QcnI28kOyHZi9YrirCumllTHZl90sb81lOxHYcgS4mSEkqX8RRw7IPe0kxKBElkAwuvHVQmq5FOUFbUHq0Xq9WUKQPz/HKKQ1EwsEVsTBiJ7Nuy7u3mWc5PnUHCjany98wT2Cj7ZAqhegIvPSsZlI8eXrLztULYLgn8Njsm3WSNg/sTS54w4EcDacZ4G26PImZ3ubmsemLlkF2/mgUiR9rtTAJrPZ2QI9mrvOqsoF7irzYEnvD6ClLwfaaVkyZfEbfdk3o7EmtAqR+F/gsAjM6SmA2EIDGGTlN5M8h2URpW3Ou6/LbDqEiJQyh8mwF1YRPxx9cTpcIY0jN8CwIDAQAB',
            'gatewayUrl'=>'https://openapi.alipay.com/gateway.do',
            'signType' => 'RSA2',
        ];
        $aop = AlipayApi::aop($config);
        $request = AlipayApi::request($className);
        $request->setBizContent(json_encode($data,JSON_UNESCAPED_UNICODE));
        return $aop->execute($request,null,$app_auth_token);
    }

    public function actionAlipay(){
        $data = [
            'community_id'=>'',
        ];
        $result = $this->alipay('AlipayEcoCplifeCommunityDetailsQueryRequest',$data,'201705BBcf90eae8d64a4768a0190be8a8827D46');
        print_r($result);
    }

}