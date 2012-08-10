<html>
<head>
<LINK href="1.css" rel="stylesheet" type="text/css">
</head>

<?php

#echo "Form submitted";

session_start();
$username=$_POST['name'];
$password=$_POST['password'];
$imagename=$_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];
$location="images/".$imagename;

move_uploaded_file($tmp_name, $location);
$dbh=mysql_connect('localhost','root','');
mysql_select_db('test6');

#echo $username;
$sessionname=$_SESSION['name'];
#echo $sessionname;
$query="update test6.users set username='$username',password='$password' ".
", imagelocation='$location' where users.username='$sessionname'";
$result=mysql_query($query);
#echo $result;
if($result==1){
$_SESSION['name']=$username;
$sessionname=$_SESSION['name'];
echo "<br /><div class='c6'><h2>Welcome ". $_SESSION['name']."</h2></div>";
echo "<br /><div class='c1'><h1>Your Profile</h1><br />";
$query="select * from users where username='$sessionname' ";
$result2=mysql_query($query);
while($row=mysql_fetch_array($result2)){
echo "Username: ".$row['username'] . "<br /> " ."Password: ". $row['password']
. "<br /> " ."profile picture: ". $row['imagelocation']. "<br /> " ;

$imagelocation=$row['imagelocation'];
echo "<br />";
echo "<img src='$imagelocation' height='100' /><br /></div>";
}

}
mysql_close();
?>



<a href="edit.php" class='c4'>Edit Profile</a>
<a href="logout.php"><div class="c2">Logout</div></a>
</html>