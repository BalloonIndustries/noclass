<?php

//Create the connection handle
$curl_conn = curl_init();

//$keywordId = ""; //id of the keyword
$subscribe  = "http://api.optitmobile.com/1/keywords.xml?keyword=noclass&short_code=46786&page=1";
$postVars = "keyword=noclass&short_code=46786&page=1";//add phone, first name and last name";
$username = "balloontext"; //username
$password = "spaceman85"; //password


//Set cURL options
curl_setopt($curl_conn, CURLOPT_URL, $subscribe); //URL to connect to
//curl_setopt($curl_conn, CURLOPT_POST, 1); //Use POST method
//curl_setopt($curl_conn, CURLOPT_POSTFIELDS, $postVars); //Use POST method
curl_setopt($curl_conn, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); //Use basic authentication
curl_setopt($curl_conn, CURLOPT_USERPWD, $username.":".$password); //Set u/p
curl_setopt($curl_conn, CURLOPT_RETURNTRANSFER, 1); //Return the result as string

// Result from querying URL. Will parse as xml
$output = curl_exec($curl_conn);

echo $output;

// close cURL resource.
curl_close($curl_conn);

?>