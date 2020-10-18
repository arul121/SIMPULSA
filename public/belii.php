<?php


switch($op){

    case 1:
           $data2='063001';
        break;
    case 3:
           $data2='063003';
           break;
    case 5:
           $data2='063005';
           break;
    case 13:
           $data2='063013';
           break;
    case 18:
           $data2='063018';
           break;
}
switch($op){

    case 1:
        if ($vo=="a"){
            $vo= "0006";
        }
        if ($vo=="b"){
            $vo= "0012";
        }
        if ($vo=="c"){
            $vo= "0001";
        }
        if ($vo=="d"){
            $vo= "0002";
        }
        break;
    case 3:
        if ($vo=="a"){
            $vo= "0008";
        }
        if ($vo=="b"){
            $vo= "0001";
        }
        if ($vo=="c"){
            $vo= "0002";
        }
        if ($vo=="d"){
            $vo= "0003";
        }
        break;
    case 5:
        if ($vo=="a"){
            $vo= "0008";
        }
        if ($vo=="b"){
            $vo= "0001";
        }
        if ($vo=="c"){
            $vo= "0002";
        }
        if ($vo=="d"){
            $vo= "0003";
        }
        break;
    case 13:
        if ($vo=="a"){
            $vo= "0012";
        }
        if ($vo=="b"){
            $vo= "0014";
        }
        if ($vo=="c"){
            $vo= "0015";
        }
        if ($vo=="d"){
            $vo= "0016";
        }
        break;
    case 18:
        if ($vo=="a"){
            $vo= "0001";
        }
        if ($vo=="b"){
            $vo= "0002";
        }
        if ($vo=="c"){
            $vo= "0003";
        }
        if ($vo=="d"){
            $vo= "0004";
        }
        break;


}

$kn = $vo.$nof.$nob;

$databaseHost = 'localhost';
$databaseName = 'data';
$databaseUsername = 'root';
$databasePassword = '';


$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

$result = mysqli_query($mysqli,"SELECT * FROM pancing");
$idd = mysqli_num_rows($result);

$sql = "INSERT INTO pancing (id,ikan,data2) VALUES ('$idd','$kn','$data2')";
$query = mysqli_query($mysqli,$sql);
// $test = $conn->query("INSERT INTO data48 (data) VALUES ($data48)");
if (mysqli_query($mysqli,$sql)) {
    echo "New record created successfully";
} else {
    mysqli_close($mysqli);
}