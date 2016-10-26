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
			if($weObj->getRevContent() == "wifi"){
				$weObj->text("wifi pass")->reply();
				break;
			}
		
			$openid = $weObj->getRev()->getRevFrom();
			$info = $weObj->getUserInfo($openid);
//			$weObj->text("hello, I'm wechat")->reply();
//			$weObj->text(json_encode($info))->reply();
			$weObj->text($weObj->getRevContent())->reply();
			
			
			
			exit;
			break;
	case Wechat::MSGTYPE_EVENT:
			$msgEvent = $weObj->getRevEvent();
			switch($msgEvent['event']){
				case Wechat::EVENT_MENU_CLICK:
					$weObj->text("help eventevent")->reply();
					break;
				case Wechat::EVENT_MENU_VIEW:
					// $myfile = fopen("NEWFILE.txt", "w") or die("Unable to open file!");
					// $txt = "John Doe\n";
					// fwrite($myfile, $txt);
					// fclose($myfile);

					$weObj->text("help view view view")->reply();
					break;

				default:
					$weObj->text("Events Exception!")->reply();
			}
//			$weObj->text(json_encode($msgEvent))->reply();
			break;
	case Wechat::MSGTYPE_IMAGE:
			break;
	
			break;
	default:
			$weObj->text("help info")->reply();
}

?>