<?php

include "function1.php";

$DB= new DB();

$users=$DB->getTable("users");


//echo json_encode($users);

  
$singledata=$DB->getData("products",55);

echo json_encode($singledata);