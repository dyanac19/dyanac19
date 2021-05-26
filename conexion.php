<?php
function Conectar(){
$conn=null;	
$host='localhost';
$db='consigueventas';
$user='root';
$pwd='';
try{
$conn= new PDO('mysql:host='.$host.';dbname='.$db,$user,$pwd);
}
catch(PDOException $e){
echo 'Error al conectar'.$e;
}
return $conn;
}
?>