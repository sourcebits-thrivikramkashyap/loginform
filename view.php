<?php
$name=$_FILES["image"]["name"];
echo $name;
$username=$_POST['name'];
$password=$_POST['password'];
echo $_FILES["image"]["error"];

if ((($_FILES["image"]["type"] == "image/gif")
		|| ($_FILES["image"]["type"] == "image/jpeg")
		|| ($_FILES["image"]["type"] == "image/pjpeg"))
		&& ($_FILES["image"]["size"] < 500000)){
	

$tmpname=$_FILES["image"]["tmp_name"];
$location="images/".$name;
echo $location;
move_uploaded_file($tmpname,"images/".$name);

#echo "<img src='$location' height='100' />";

#echo "<img src='images/$name' height='100' /><br />";


$dbh=mysql_connect('localhost','root','');
$bool=mysql_select_db('test6');

#echo
echo $dbh;
echo $bool;


$query="insert into users(username,password,imagelocation) values('$username','$password','$location')";
$result=mysql_query($query);
echo $result;


if($result!=0){
	echo "<br /><br />You have successfully registered<br />";
	echo "<a href='login.php'>Click here to login</a>";
}

/*
while($row = mysql_fetch_array($result))
{
	echo $row['username'] . " " . $row['password'] . " " . $row['imagelocation'];
	echo "<br />";
}

#$avalues=mysql_fetch_row($result);

#echo
echo $query;
echo $result;
echo $avalues;


foreach($avalues as $f){
	echo $f." ";
}
*/
mysql_close($dbh);
}
else{
	echo "Invalid file";
	echo "<a href='regform.php'>Click here to return</a>";
}

?>

