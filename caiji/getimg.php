<?php
header("Content-type: text/html; charset=utf-8"); 
set_time_limit(0);
for($i=200;$i<400;$i++){
	$url = "http://www.jstv.com/n/ws/fcwr/rqjb/e".$i."/";
	$content = file_get_contents($url);
	$contents = preg_replace('/\r|\n|\t/','', $content);
	$str = str_replace(' ','',$contents);
	$parm = '/<ulid=\"mdi\">(.+?)<\/ul>/';
	preg_match_all($parm,$str,$results);
	$pattern_src = '/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/';  
	preg_match_all($pattern_src, $results[1][0], $match_src);  
	$arr_src=$match_src[1];//获得图片数组  
	echo "期数：".$i;
	foreach ($arr_src as $k=>$v){
		echo " <img src='http://www.jstv.com/n/ws/fcwr/rqjb/e469/".$v."'>";
	}
	echo "<br />";

}
//get_name($arr_src);

/*得到图片类型，并将其保存到与该文件同一目录*/  
function get_name($pic_arr)
{  
    //图片类型  
    $pattern_type = '/(/.(jpg|bmp|jpeg|gif|png))/';
      
    foreach($pic_arr as $pic_item){//循环取出每幅图的地址
        $num = preg_match_all($pattern_type, $pic_item, $match_type);
        $pic_name = '';//图片名称
        //以流的形式保存图片  
        $write_fd = @fopen($pic_name,"wb");
        @fwrite($write_fd, CurlGet($pic_item));
        @fclose($write_fd);  
        echo "[OK]..!";  
    }
    return 0;  
}  

//抓取网页内容  
function CurlGet($url){   
    $url=str_replace('&amp;','&',$url);  
    $curl = curl_init();  
    curl_setopt($curl, CURLOPT_URL, $url);  
    curl_setopt($curl, CURLOPT_HEADER, false);  
      
    //curl_setopt($curl, CURLOPT_REFERER,$url);  
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; SeaPort/1.2; Windows NT 5.1; SV1; InfoPath.2)");  
    curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');  
    curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');  
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 0);  
    $values = curl_exec($curl);  
    curl_close($curl);  
    return $values;  
}  