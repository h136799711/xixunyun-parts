<?php

class FujianService
{
    protected $appId;
    protected $appKey;
    protected $appSecret;
    protected $prefixKey = 'fujian_';

    public function __construct()
    {
        $this->appId = 'hx63f0bfy1crqppcwy8veh9eisxj2ksz';
        $this->appKey = '20210901528514329515917066977281671';
        $this->appSecret = 'a9e6e23d8b51da347bd54f6907ab7a2619137162';
    }

    // 获取组织机构
    function getOrgToken()
    {
        $url = 'https://appzb.fjcpc.edu.cn/mwcztymh/interface/gettoken.do';
        $poData = [
            'appId' => $this->appId,
            'time'  => time()
        ];
        $poData['MD5Str'] = md5($poData['appId'] . $poData['time'] . $this->appKey);
        $result = $this->curlPost($url, $poData);
        return $result;
    }

    function getOrgList() {

    }

    function curlPost($url, $data = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        // POST数据
        curl_setopt($ch, CURLOPT_POST, 1);
        // 把post的变量加上
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}
