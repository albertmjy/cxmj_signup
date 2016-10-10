<?php

include "lib/wechat.class.php";
$options = array(
		'token'=>'weixin', //填写你设定的key
//      'encodingaeskey'=>'SWk98CPSEwYDtwQ2iRdFCm9kYCQPGFP8BAnmi7nRIxs' //填写加密用的EncodingAESKey，如接口为明文模式可忽略
        'appid'=>'wx5f08243f1028e98e',//填写高级调用功能的appid
    		'appsecret'=>'7ad6fcbb9aff7c8c6fb1ac9995bf0574' //填写高级调用功能的密钥
	);
$weObj = new Wechat($options);
$weObj->valid();//明文或兼容模式可以在接口验证通过后注释此句，但加密模式一定不能注释，否则会验证失败
$type = $weObj->getRev()->getRevType();
switch($type) {
	case Wechat::MSGTYPE_TEXT:
			$openid = $weObj->getRev()->getRevFrom();
			$info = $weObj->getUserInfo($openid);
//			$weObj->text("hello, I'm wechat")->reply();
//			$weObj->text(json_encode($info))->reply();
			$weObj->text($info['sex'])->reply();
			
			
			
			exit;
			break;
	case Wechat::MSGTYPE_EVENT:
			break;
	case Wechat::MSGTYPE_IMAGE:
			break;
	default:
			$weObj->text("help info")->reply();
}

?>