<?php
include './alipay_wap/alipay_submit.class.php';

include './alipay_wap/config.php';


//�����������������������������Ϣ���������demo������������������������������
$params = array(
    "notify_url"=>"http://1.96567.com/alipay/notify.php",
    "return_url"=>"http://1.96567.com/alipay/return.php",
    "show_url"=>"http://1.96567.com/alipay/return.php",
    "out_trade_no"=>"C".time(),
    "subject"=>'����',
    "total_fee"=>"0.01",
    "body"=>"",
);
//�����������������������������Ϣ��������������������


//����Ҫ����Ĳ������飬����Ķ�
$parameter = array(
    "service" => "alipay.wap.create.direct.pay.by.user",
    "partner" => trim($alipay_config['partner']),
    "seller_id" => trim($alipay_config['seller_id']),
    "payment_type"	=> '1',//֧������ 1:��Ʒ����
    "notify_url"	=> $params['notify_url'],//�������첽֪ͨҳ��·��
    "return_url"	=> $params['return_url'],//ҳ����תͬ��֪ͨҳ��·��
    "out_trade_no"	=> $params['out_trade_no'],//�̻���վ����ϵͳ��Ψһ�����ţ�����
    "subject"	=> $params['subject'],//��������
    "total_fee"	=> $params['total_fee'],//������  ��λ��Ԫ ��Сȡֵ0.01
    "show_url"	=> $params['show_url'],//����http://��ͷ������·��������û�����֧������ת��ҳ��
    "body"	=> $params['body'],//��������
    "_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
);

//��������
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "ȷ��");
echo $html_text;