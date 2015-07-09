<?php
include './alipay_wap/alipay_submit.class.php';

include './alipay_wap/config.php';


//↓↓↓↓↓↓↓↓↓↓请求参数信息，以下组参demo↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
$params = array(
    "notify_url"=>"http://1.96567.com/alipay/notify.php",
    "return_url"=>"http://1.96567.com/alipay/return.php",
    "show_url"=>"http://1.96567.com/alipay/return.php",
    "out_trade_no"=>"C".time(),
    "subject"=>'标题',
    "total_fee"=>"0.01",
    "body"=>"",
);
//↑↑↑↑↑↑↑↑↑↑请求参数信息↑↑↑↑↑↑↑↑↑↑


//构造要请求的参数数组，无需改动
$parameter = array(
    "service" => "alipay.wap.create.direct.pay.by.user",
    "partner" => trim($alipay_config['partner']),
    "seller_id" => trim($alipay_config['seller_id']),
    "payment_type"	=> '1',//支付类型 1:商品购买
    "notify_url"	=> $params['notify_url'],//服务器异步通知页面路径
    "return_url"	=> $params['return_url'],//页面跳转同步通知页面路径
    "out_trade_no"	=> $params['out_trade_no'],//商户网站订单系统中唯一订单号，必填
    "subject"	=> $params['subject'],//订单名称
    "total_fee"	=> $params['total_fee'],//付款金额  单位：元 最小取值0.01
    "show_url"	=> $params['show_url'],//需以http://开头的完整路径，如果用户放弃支付，跳转的页面
    "body"	=> $params['body'],//订单描述
    "_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
);

//建立请求
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
echo $html_text;