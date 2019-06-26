
<?php
session_start();
require('config.php');

$category=$_POST['category'];
$name=$_POST['name'];
$quantity=$_POST['quantity'];
$purchase=$_POST['purchase'];
$retail=$_POST['retail'];
$supplier=$_POST['supplier'];
$url=$_SERVER['DOCUMENT_ROOT'].'/ubereat/imgplatos/';
$query="SELECT count(ID)+1 FROM ubereat.products;";
	$result=mysqli_query($db_link, $query);
	while ($row=mysqli_fetch_array($result)){
    
	 $cod= $row['0'];
    					
}
if($_FILES['imgref']['name'] != null && $_FILES['imgref']['size'] > 0 )
{ $tipo=new SplFileInfo($_FILES['imgref']['name']);
$ext=$tipo->getExtension();
 $destino= $url.$cod.'.'.$ext;
move_uploaded_file($_FILES['imgref']['tmp_name'],$destino);
$register="INSERT INTO `ubereat`.`products` (`category`, `name`, `quantity`, `purchase`, `retail`, `supplier`, `ext`) VALUES('$category','$name','$quantity','$purchase','$retail','$supplier','$ext')" or die("error".mysqli_errno($db_link));
	$result=mysqli_query($db_link,$register);
		header('location:products.php');
mysqli_close($db_link);

}
else
{
   echo utf8_decode("shit, no llegó nada<br>");
}

?>
	
