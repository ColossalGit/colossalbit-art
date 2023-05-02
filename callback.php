<?php print_r($_REQUEST); 

$code = $_REQUEST['code'];

?>

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.coinbase.com/oauth/token?grant_type=authorization_code&code='.$code.'&client_id=3a7919501840daaafeb6f9e2282b967988f4cc196cecea62dcba8e1519a395b1&client_secret=e3d19a3ec58deda8814c88cd0a3b9f8fab2cba39a04a1ed6bb519f77bd0d059f&redirect_uri=https://colossalbit.art/callback.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_HTTPHEADER => array(),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

$access_token = json_decode($response, TRUE)["access_token"]

?>

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.coinbase.com/v2/user',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array( 'Authorization: Bearer '.$access_token),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;


