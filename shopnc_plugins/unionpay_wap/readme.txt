增加银联手机支付（证书5.0版本） 需开启openssl

支付卡：
平安银行借记卡：6216261000000000018
证件号：341126197709218366
手机号：13552535506
密码：123456
姓名：全渠道
短信验证码：123456（wap/控件）111111（PC）
（短信验证码记得点下获取验证码之后再输入）

手机端：
INSERT INTO `shop_mb_payment` (`payment_id`, `payment_code`, `payment_name`, `payment_config`, `payment_state`) VALUES
(3, 'unionpay', '银联手机支付', 'a:2:{s:16:"unionpay_account";s:15:"898111448160854";s:11:"cert_passwd";s:6:"000000";}', '1');

E:\xin\web\shopNC_b2b2c\admin\templates\default\mb_payment.edit.php
E:\xin\web\shopNC_b2b2c\admin\control\mb_payment.php
E:\xin\web\shopNC_b2b2c\mobile\control\member_payment.php
E:\xin\web\shopNC_b2b2c\mobile\control\payment.php
E:\xin\web\shopNC_b2b2c\mobile\api\payment\unionpay\    整个目录