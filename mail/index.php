<?php
function send_mail ($title,$content,$from,$to,$charset='gbk',$attachment ='') { 
	include 'PHPMailer.class.php'; 
	header('Content-Type: text/html; charset='.$charset); 
	$mail = new PHPMailer(); 
	$mail->CharSet = $charset; //���ò���gb2312���ı��� 
	$mail->IsSMTP(); //���ò���SMTP��ʽ�����ʼ� 
	$mail->Host = "smtp.126.com"; //�����ʼ��������ĵ�ַ 
	$mail->Port = 25; //�����ʼ��������Ķ˿ڣ�Ĭ��Ϊ25 
	$mail->From = $from; //���÷����˵������ַ 
	$mail->FromName = "ʢ��"; //���÷����˵����� 
	$mail->SMTPAuth = true; //����SMTP�Ƿ���Ҫ������֤��true��ʾ��Ҫ 
	$mail->Username = $from; //���÷����ʼ������� 
	$mail->Password = "shengwei!"; //������������� 
	$mail->Subject = $title; //�����ʼ��ı��� 
	$mail->AltBody = "text/html"; // optional, comment out and test 
	$mail->Body = $content; //�����ʼ����� 
	$mail->IsHTML(true); //���������Ƿ�Ϊhtml���� 
	$mail->WordWrap = 50; //����ÿ�е��ַ��� 
	$mail->AddReplyTo("��ַ","����"); //���ûظ����ռ��˵ĵ�ַ 
	$mail->AddAddress($to,"��ģʵѵ"); //�����ռ��ĵ�ַ 
	if ($attachment != '') //���ø��� 
	{ 
		$mail->AddAttachment($attachment, $attachment); 
	} 
	var_dump($mail->Send());
	if(!$mail->Send()) { 
		echo "����ʧ��"; 
	}else{ 
		echo "���ͳɹ�";
	} 
} 
send_mail('����һ�������ʼ�','�����ʼ���','a1104201@126.com','9132761@qq.com');
?>