<LINK href="1.css" rel="stylesheet" type="text/css">
<?php
session_start();
$username=$_POST['name'];
$password=$_POST['password'];



$dbh=mysql_connect('localhost','root','');
$bool=mysql_select_db('test6');

$query="select * from users where username='$username' and password='$password' ";
$result=mysql_query($query);
#echo $result;

$count=mysql_num_rows($result);
#echo $count;

if($count==1){
	
	
#echo "in if";
while($row = mysql_fetch_array($result))
{
		#echo "In while";
	if(($row['username']==$username)&&($row['password']==$password)){
		$_SESSION['name']=$username;
	
	
		echo "<div class='c6' ><h1>Welcome"."  ".$_SESSION['name']."</h1></div><br />";
		echo "<br /><div class='c1' ><h1>Your profile</h1><br />";
		
	echo "Username: ".$row['username'] . "<br /> " ."Password: ". $row['password'] . "<br /> " ."profile picture: ". $row['imagelocation']. "<br /> " ;
	$imagelocation=$row['imagelocation'];
	echo "<br />";
	echo "<img src='$imagelocation' height='100' /></div><br />";
	
	
	echo "<a href='edit.php' class='c4'>Edit profile</a><br />";
	echo "<a href='logout.php' class='c2' >Logout</a><br />";
}

}

}


#else {

if(!isset($_SESSION['name'])){
	echo "<br />Invalid username or password";
	echo "<a href='login.php' >Click here to return</a>";
}
#}
?>


