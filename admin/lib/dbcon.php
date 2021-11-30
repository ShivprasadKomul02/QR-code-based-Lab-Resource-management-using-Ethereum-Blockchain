
 
 <?php



$sname="localhost";
$user="root";
$password="1234";
$db= "stc_db";

$conn=mysqli_connect($sname,$user,$password,$db);
//mysqli_select_db($db);

if(!$conn)
{
	echo "connect failed !";
	exit();
}

// // //core
// function dbcon(){
// $sname="localhost:3306";
// $user="root";
// $password="1234";
// $db= "stc_db";

// $conn=mysqli_connect($sname,$user,$password,$db);
// 	mysqli_select_db($conn,$db);
// if(!$conn)
// {
// 	echo "connect failed !";
// 	exit();
// }



// }
// function host(){
// 	$h = "http://".$_SERVER['HTTP_HOST']."/stc_db/";
// 	return $h;
// }

// function hRoot(){
// 	$url = $_SERVER['DOCUMENT_ROOT']."/stc_db/";
// 	return $url;
// }

// //parse string
// function gstr(){
//     $qstr = $_SERVER['QUERY_STRING'];
//     parse_str($qstr,$dstr);
//     return $dstr;
// }

?>
