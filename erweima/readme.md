【自动生成二维码接口】
调用地址：http://www.xxxxx.com/erweima/getqrcode.php
调用方式统一 ：URL   GET
输入参数↓
名称	类型	是否必须	描述
text	varchar	是	要转成二维码的数据  如果是URL数据，请先做urlencode
size	int	否	二维码大小，默认为3
margin	int	否	二维码周围边框空白区域间距值，默认为4
DEMO↓
<img src=’http://www.xxxxx.com/erweima/getqrcode.php?text=xxxxxx&size=5&margin=2’ />