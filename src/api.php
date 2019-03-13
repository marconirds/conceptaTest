<?php
header('Content-Type: application/json');

$today = date('m/d/Y');
$data = array (
  'Language' => 'ENG',
  'Currency' => 'USD',
  'destination' => 'MCO',
  'DateFrom' => $today,
  'DateTO' => $today,
  'Occupancy' => 
  array (
    'AdultCount' => '1',
    'ChildCount' => '1',
    'ChildAges' => 
    array (
      0 => '10',
    ),
  ),
); 

$dataEncoded = json_encode($data, JSON_UNESCAPED_SLASHES);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://travellogix.api.test.conceptsol.com/api/Ticket/Search",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POST => true,
  //CURLOPT_ENCODING => "UTF-8",
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $dataEncoded,
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer In4-UGPoBT90ZbjOEuT4Td2-nC6bYz6iG0dAizZIpHPXMDyBSj8ZOA-A-v3sa9-yedO5H7nc_a7CCViEdMYY6-2SSBdM4_-JDnIaLDpCi90fBAAVixRv0PYTscXt-tjkYUIuzvnR3jlaxFpLLtYlv36PIbHWIkvT6pOuuP4Dd6rszaC2hBJj_vCdaH2M47MqnYvXFgIrbKBA3dCzCJnTe7me8pB8Iea8SeChKhlRLH0TxkhlByMPaewY1Z9JwCae9vHqAbpGs9j4ciidZ0rF4vixRXuE6iXv0pBMmAhHWp8QuGV4kiwHlDmFhAbc0mJSG1FS6lfwLJ9-5sjkXzXGeMr46pmqglR0RoD84jzDcw8glUllZvOJRd1h9GESvnINgrVvW5YknWMTg69glU2AsB22124qVgGoG9Z6xp-35nHwAu47PWVKx5g3xBYg0SAElQ_TjZz6pBmaW8r1r__YqG6cwbm1qxNY50ykZ25bDJWiOy8DkTlizNfh8PnlLN5diGWgyTVqIux_zjMIaiH2qQ",
    "Content-Type: application/json",
	  "cache-control: no-cache"
  ),
  //CURLOPT_MAXREDIRS => 10,
  //CURLOPT_TIMEOUT => 30,
  //CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

?>




