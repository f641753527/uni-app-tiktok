<?php
header("Content-Type: text/json;charset=utf-8");
$url=$_GET["url"];
$UserAgent = 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; SLCC1; .NET CLR 2.0.50727; .NET CLR 3.0.04506; .NET CLR 3.5.21022; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_ENCODING, '');
curl_setopt($curl, CURLOPT_USERAGENT, $UserAgent);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
$data = curl_exec($curl);
curl_close($curl);
preg_match('/<p class="desc">(?<desc>[^<>]*)<\/p>/i', $data, $name);
preg_match('/playAddr: "(?<url>[^"]+)"/i', $data, $url);
if (empty($url['url'])) {
echo '没有地址参数';
}else{
$array = ['name' => $name['desc'],'url' => $url['url'],];
$json = json_encode($array,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
echo $json;
}
?>