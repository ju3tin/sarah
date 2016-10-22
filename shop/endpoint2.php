<?php
    //Get the JSON data POSTed to the page
    $request = file_get_contents('php://input');

    //Send the JSON data to the right server
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://apisandbox.openbankproject.com/obp/v2.0.0/banks/gh.29.uk/accounts/29PF/owner/transaction-request-types/SANDBOX_TAN/transaction-requests");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json; charset=utf-8","Authorization: DirectLogin token=\"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyIiOiIifQ.2Rx1XlIkpAUiSzAAixGNfWpJOO-FfZXfjbt11BgS9bI\""));
		
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
    $data = curl_exec($ch);
    curl_close($ch);

    //Send the response back to the Javascript code
    echo $data;
?>