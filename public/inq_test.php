<?php 
$databaseHost = 'localhost';
$databaseName = 'data';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

$result = mysqli_query($mysqli,"SELECT 'id' FROM pancing");
$num_rows = mysqli_num_rows($result);

$ko = mysqli_query($mysqli,"SELECT ikan,data2 FROM pancing WHERE 'id'=0");
while ($row = $ko->fetch_assoc()) {
	 $kmm = $row['ikan']."<br>";
	 $kmy = $row['data2']."<br>";
}

$data2 = substr($kmy, 0, 6);;
$kn = substr($kmm, 0, 18);

	error_reporting(E_ALL);
	ini_set('display_error',1);
	include('parser.php');
	include('builder.php');
	$socket = socket_create(AF_INET, SOCK_STREAM, 0);	
	socket_bind($socket, '');
	// socket_connect($socket, '202.152.22.118', 1423);
	socket_connect($socket, '10.254.254.12', 1423);/*** IP dan PORT **/
	$acceptor_id	= '200900100800000';
	$jaks	= new JAK8583BUILDER();
	$settledate  	= str_pad(date("d")+1, 2, "0", STR_PAD_LEFT);
	$Rand           = '88'; /** 12 DIGIT **/
	$bit37          = str_pad($Rand, 12, "0", STR_PAD_LEFT);

	$jaks->addMTI('0200');
	$jaks->addData(2,$data2);
	$jaks->addData(3,'171000');
	// $jaks->addData(4,'50000');
	$jaks->addData(7,date("mdhis"));
	$jaks->addData(11,rand(000000,999999));
	$jaks->addData(12,date("his"));
	$jaks->addData(13,date("md"));
	$jaks->addData(15,date("m").$settledate);
	$jaks->addData(18,'6012');
	$jaks->addData(32,substr($acceptor_id,7,3));
	$jaks->addData(37,$bit37);
	$jaks->addData(41,'TESTDEV1');
	$jaks->addData(42,$acceptor_id);
	// $jaks->addData(48,'00020812   3456789');
	$jaks->addData(48,$kn);
	$jaks->addData(49,'360');
	$jaks->addData(62,'');


	$kaki		= '03';
	$message 	= $jaks->getISO();
	$jumlah 	= strlen($message)+1;
	$conn 		= pack("n*",$jumlah);
	$cunn 		= pack("H*",$kaki);

	// $jak = implode("|",(array)$jaks);
	// echo $jak;
	
	$cumi 		= $conn.$message.$cunn; 

	
	socket_write($socket,$cumi);
	
    //JAVA SERVER RECEIVES AND DISPLAYS
 
    //BLOCKS HERE
	$response = socket_read($socket, 1024);
	
	socket_close($socket);
	


	// CUT SERVER RESPONSE 2 BYTE
	$jum = strlen($response)-2;
	$res_srv = substr($response,2,$jum);
	
	$jaks	= new JAK8583PARSER();
	
	$jaks->addISO($res_srv);
	?>