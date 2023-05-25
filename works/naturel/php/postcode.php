<?php
$postcode=$_GET['postcode'];


$address ='';
$file_name='../csv/KEN_ALL.csv';
$file=fopen($file_name,'r');
$str ='';
while($str=fgetcsv($file)){
    if(preg_match("/\A$postcode */",$str[2])){
        $address=['address1'=>$str[6],'address2'=>$str[7],'address3'=>$str[8]];
        break;
    }
}
if($str==''){
    $address=['address1'=>'該当しません','address2'=>'','address3'=>''];
}
echo json_encode($address);