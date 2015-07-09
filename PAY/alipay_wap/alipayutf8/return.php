<?php
/* * 
 * 功能：支付宝页面跳转同步通知页面
 */

require_once("./alipay_wap/config.php");
require_once("./alipay_wap/alipay_notify.class.php");

$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
if($verify_result) {//签名验证成功
	
	//请在这里加上商户的业务逻辑程序代码

    echo "trade_status=".$_GET['trade_status'];
		
	echo "验证成功<br />";

	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	

}
else {

    echo "验证失败";
}
