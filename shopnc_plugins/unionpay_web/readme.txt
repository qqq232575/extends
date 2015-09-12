增加银联支付（证书5.0版本） 需开启openssl

支付卡：
平安银行借记卡：6216261000000000018
证件号：341126197709218366
手机号：13552535506
密码：123456
姓名：全渠道
短信验证码：123456（wap/控件）111111（PC）
（短信验证码记得点下获取验证码之后再输入）


web端：
INSERT INTO `shop_payment` (`payment_id`, `payment_code`, `payment_name`, `payment_config`, `payment_state`) VALUES
('6','unionpay', '银联支付', 'a:3:{s:16:"unionpay_account";s:15:"898111448160854";s:11:"cert_passwd";s:6:"000000";s:10:"bank_state";s:1:"1";}', '1');

E:\xin\web\shopNC_b2b2c\admin\templates\default\payment.edit.php  后台银行支付模板  78-93行
E:\xin\web\shopNC_b2b2c\shop\control\payment.php  接口增加unionpay判断 122行   notify方法 returnpay方法
E:\xin\web\shopNC_b2b2c\shop\templates\default\images\payment\unionpay_logo.gif
E:\xin\web\shopNC_b2b2c\shop\api\payment\unionpay\    整个目录

E:\xin\web\shopNC_b2b2c\shop\templates\default\buy\buy_step2.php //开启银行直接付款
E:\xin\web\shopNC_b2b2c\shop\templates\default\css\home_cart.css
