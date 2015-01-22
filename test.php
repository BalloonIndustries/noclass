<?php

//Create the connection handle
$curl_conn = curl_init();

//$keywordId = ""; //id of the keyword
$subscribe  = "http://api.optitmobile.com/1/sendmessage.xml";
$postVars = "phone=17349457337&keyword_id=19172&title=test&message=conduit success";//add phone, first name and last name";
$username = "conduitweb"; //username
$password = "alerttext"; //password


//Set cURL options
curl_setopt($curl_conn, CURLOPT_URL, $subscribe); //URL to connect to
curl_setopt($curl_conn, CURLOPT_POST, 1); //Use POST method
curl_setopt($curl_conn, CURLOPT_POSTFIELDS, $postVars); //Use POST method
curl_setopt($curl_conn, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); //Use basic authentication
curl_setopt($curl_conn, CURLOPT_USERPWD, $username.":".$password); //Set u/p
curl_setopt($curl_conn, CURLOPT_RETURNTRANSFER, 1); //Return the result as string

// Result from querying URL. Will parse as xml
$output = curl_exec($curl_conn);

echo $output;

// close cURL resource.
curl_close($curl_conn);

?>