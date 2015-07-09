<?php
include dirname(__FILE__).DIRECTORY_SEPARATOR."unionpay".DIRECTORY_SEPARATOR."unionpay.sdk.class.php";
class unionpay{
 
	private $config;
	/**
	*	֧�����
	**/
	
	public function config($config=null){
			$this->config = $config;
	}

	public function send_pay(){
		$config = $this->config;
		$unionpay = new unionpaySDK();

		// ǰ̨�����ַ
		$front_uri = 'https://gateway.95516.com/gateway/api/frontTransReq.do';

		//�̻���
		$merId = $config['merId'];
		//֤��ID
		$certid = $unionpay->getSignCertId();//'KFR734H8TGFJ23480TRNHEYRL348';//

		//����Ҫ����Ĳ�������
		$params = array(
			'version' => '5.0.0',				//�汾��
			'encoding' => 'gbk',				//���뷽ʽ
			'certId' => $certid,			//֤��ID
			'txnType' => '01',				//��������
			'txnSubType' => '01',				//��������
			'bizType' => '000201',				//ҵ������
			'frontUrl' => $config['ReturnUrl'],  		//ǰ̨֪ͨ��ַ
			'backUrl' => $config['NotifyUrl'],		//��̨֪ͨ��ַ
            'signMethod' => '01',			//ǩ������
            'channelType' => '07',		//�������ͣ�07-PC��08-�ֻ�
			'accessType' => '0',		//��������
			'merId' => $merId,		        //�̻����룬����Լ��Ĳ����̻���
			'orderId' => $config['code'],	//�̻�������
			'txnTime' => date('YmdHis'),	//��������ʱ��
			'txnAmt' => $config['money']*100, //������ɷ�,		//���׽���λ��
			'currencyCode' => '156',	//���ױ���
			'defaultPayType' => '0001',	//Ĭ��֧����ʽ
			//'orderDesc' => $config['title'],  //��������������֧����wap֧����ʱ��������
			'reqReserved' =>' ͸����Ϣ', //���󷽱�����͸���ֶΣ���ѯ��֪ͨ�������ļ��о���ԭ������
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