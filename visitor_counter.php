<?php
$file_name='visitor_counter.log';
$handle = fopen($file_name, "r");

if (!$handle) {
   echo "could not open the file" ;
   $handle=fopen($file_name, "w");
}

fclose($handle) ;



$ip=$_SERVER['REMOTE_ADDR'];
$hash = sha1($_SERVER['HTTP_USER_AGENT'].$ip);
date_default_timezone_set("Europe/Rome");
$ip_hash_date = $ip.":".$hash.":".date("j-M-Y");
if (filter($ip,$ip_hash_date,$file_name)) {
   $myfile = file_put_contents($file_name, $ip_hash_date.PHP_EOL, FILE_APPEND | LOCK_EX);
}

response(200,"ok",null);

function filter($ip,$ip_hash_date,$file_name){
   $blacklist='.*(Thailand Company|Information Centre|NEWTREND|ONLINE SAS|RWTH|Tele |Hepingli|HangZhou|Censys|Volume|Host|HOST|Server|Max-Pl|FirstByte|Cloud|Global Frag|LLC|China Mobile|Trading|CLOUD|CariNet|Baidu|Tier.net|ZENLA|Oracle|JSC|Tencent|Hurricane|ZUMY|Linode|Amazon|Facebook|Google|DigitalOcean|CHINANET).*';
   if(strcmp($ip, "192.168.1.254")==0){return false;}
   if(strcmp($ip, "2.229.167.128")==0){return false;}
   $visitor_count = (int)(`cat $file_name | wc -l`);
   $tail_size = max(ceil($visitor_count*0.05),50);

   $matches_tail = (int)( `tail -n $tail_size $file_name|grep $ip_hash_date| wc -l`);
   if($matches_tail>0){return false;}

   if(preg_match($blacklist,$whois)){return false;}
   return true;
}

function response($status,$status_message,$data)
{
header("HTTP/2.0 ".$status);

$response['status']=$status;
$response['status_message']=$status_message;
$response['data']=$data;

$json_response = json_encode($response);
echo $json_response;

}


?>
