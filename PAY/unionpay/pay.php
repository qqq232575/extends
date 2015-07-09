<?php
include dirname(__FILE__).DIRECTORY_SEPARATOR."unionpay".DIRECTORY_SEPARATOR."unionpay.sdk.class.php";
class unionpay{
 
	private $config;
	/**
	*	支付入口
	**/
	
	public function config($config=null){
			$this->config = $config;
	}

	public function send_pay(){
		$config = $this->config;
		$unionpay = new unionpaySDK();

		// 前台请求地址
		$front_uri = 'https://gateway.95516.com/gateway/api/frontTransReq.do';

		//商户号
		$merId = $config['merId'];
		//证书ID
		$certid = $unionpay->getSignCertId();//'KFR734H8TGFJ23480TRNHEYRL348';//

		//构造要请求的参数数组
		$params = array(
			'version' => '5.0.0',				//版本号
			'encoding' => 'gbk',				//编码方式
			'certId' => $certid,			//证书ID
			'txnType' => '01',				//交易类型
			'txnSubType' => '01',				//交易子类
			'bizType' => '000201',				//业务类型
			'frontUrl' => $config['ReturnUrl'],  		//前台通知地址
			'backUrl' => $config['NotifyUrl'],		//后台通知地址
            'signMethod' => '01',			//签名方法
            'channelType' => '07',		//渠道类型，07-PC，08-手机
			'accessType' => '0',		//接入类型
			'merId' => $merId,		        //商户代码，请改自己的测试商户号
			'orderId' => $config['code'],	//商户订单号
			'txnTime' => date('YmdHis'),	//订单发送时间
			'txnAmt' => $config['money']*100, //将金额换算成分,		//交易金额，单位分
			'currencyCode' => '156',	//交易币种
			'defaultPayType' => '0001',	//默认支付方式
			//'orderDesc' => $config['title'],  //订单描述，网关支付和wap支付暂时不起作用
			'reqReserved' =>' 透传信息', //请求方保留域，透传字段，查询、通知、对账文件中均会原样出现
		);

        $params['signature'] = $unionpay->sign($params);

		$html_form = $unionpay->create_html ( $params, $front_uri );

		echo $html_form;exit;

	}

 }

$config = array(
	"money" => "1.5",
    "ReturnUrl" => "http://www.go.com/index.php/pay/unionpay_url/qiantai/",
    "NotifyUrl" => "http://www.go.com/index.php/pay/unionpay_url/houtai/",
    "code" => "C12312312313123",
    "merId" => "898111448160854",
);
$pays = new unionpay();
$pays->config($config);
$pays->send_pay();
?>