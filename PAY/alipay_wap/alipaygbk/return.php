<?php
/* * 
 * ���ܣ�֧����ҳ����תͬ��֪ͨҳ��
 */

require_once("./alipay_wap/config.php");
require_once("./alipay_wap/alipay_notify.class.php");

$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
if($verify_result) {//ǩ����֤�ɹ�
	
	//������������̻���ҵ���߼��������

    echo "trade_status=".$_GET['trade_status'];
		
	echo "��֤�ɹ�<br />";

	//�������������ҵ���߼�����д�������ϴ�������ο�������
	

}
else {

    echo "��֤ʧ��";
}
