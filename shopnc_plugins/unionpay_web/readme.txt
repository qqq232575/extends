增加银联支付（证书5.0版本） 需开启openssl

web端：
INSERT INTO `shop_payment` (`payment_id`, `payment_code`, `payment_name`, `payment_config`, `payment_state`) VALUES
('6','unionpay', '银联支付', 'a:1:{s:17:"chinabank_account";s:9:"123123123";}', '1');

E:\xin\web\shopNC_b2b2c\admin\templates\default\payment.edit.php  后台银行支付模板  78-93行
E:\xin\web\shopNC_b2b2c\shop\control\payment.php  接口增加unionpay判断 122行   notify方法 returnpay方法
E:\xin\web\shopNC_b2b2c\shop\templates\default\images\payment\unionpay_logo.gif
E:\xin\web\shopNC_b2b2c\shop\api\payment\unionpay\    整个目录

E:\xin\web\shopNC_b2b2c\shop\templates\default\buy\buy_step2.php //开启银行直接付款
E:\xin\web\shopNC_b2b2c\shop\templates\default\css\home_cart.css
