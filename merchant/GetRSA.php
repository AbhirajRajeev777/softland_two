<?php
$url = "https://secure.ccavenue.com/transaction/getRSAKey";
$fields = array(
        'access_code'=> $_POST['access_code'],
        'order_id'=>$_POST['order_id']
);

$postvars='';
$sep='';
foreach($fields as $key=>$value)
{
        $postvars.= $sep.urlencode($key).'='.urlencode($value);
        $sep='&';
}

$ch = curl_init();

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,count($fields));
curl_setopt($ch, CURLOPT_CAINFO, 'cacert.pem');
curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
writeLog($result);
echo $result;


function writeLog($logdata){
	$logfile=fopen("log.txt",a);
	$DateOfRequest = date('d/m/Y h:i:s a', time());
	$write="[" . $DateOfRequest . " ] - " . $logdata . " - METHOD:$Request -Server:$server";
	fwrite($logfile,$write);
	fwrite($logfile,"\r\n");
	fclose($logfile);
}

?>
