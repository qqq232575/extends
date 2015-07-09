<?php
function send_mail ($title,$content,$from,$to,$charset='gbk',$attachment ='') { 
	include 'PHPMailer.class.php'; 
	header('Content-Type: text/html; charset='.$charset); 
	$mail = new PHPMailer(); 
	$mail->CharSet = $charset; //设置采用gb2312中文编码 
	$mail->IsSMTP(); //设置采用SMTP方式发送邮件 
	$mail->Host = "smtp.126.com"; //设置邮件服务器的地址 
	$mail->Port = 25; //设置邮件服务器的端口，默认为25 
	$mail->From = $from; //设置发件人的邮箱地址 
	$mail->FromName = "盛威"; //设置发件人的姓名 
	$mail->SMTPAuth = true; //设置SMTP是否需要密码验证，true表示需要 
	$mail->Username = $from; //设置发送邮件的邮箱 
	$mail->Password = "shengwei!"; //设置邮箱的密码 
	$mail->Subject = $title; //设置邮件的标题 
	$mail->AltBody = "text/html"; // optional, comment out and test 
	$mail->Body = $content; //设置邮件内容 
	$mail->IsHTML(true); //设置内容是否为html类型 
	$mail->WordWrap = 50; //设置每行的字符数 
	$mail->AddReplyTo("地址","名字"); //设置回复的收件人的地址 
	$mail->AddAddress($to,"星模实训"); //设置收件的地址 
	if ($attachment != '') //设置附件 
	{ 
		$mail->AddAttachment($attachment, $attachment); 
	} 
	var_dump($mail->Send());
	if(!$mail->Send()) { 
		echo "发送失败"; 
	}else{ 
		echo "发送成功";
	} 
} 
send_mail('我是一个测试邮件','测试邮件啊','a1104201@126.com','9132761@qq.com');
?>