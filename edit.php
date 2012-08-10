<LINK href="1.css" rel="stylesheet" type="text/css">
<body ;>
<?php
session_start();
$dbh=mysql_connect('localhost','root','');
mysql_select_db('test6');
echo "<div class='c6' ><h1>Welcome ".$_SESSION['name']."</h1></div>";
$sessionname=$_SESSION['name'];
$query="select * from users where username='$sessionname'";
$result=mysql_query($query);

#echo $result;
$count=mysql_num_rows($result);
#echo $count;

$row=mysql_fetch_array($result);

#echo $row['username'];
$username=$row['username'];
$password=$row['password'];
$imagelocation=$row['imagelocation'];
#echo $imagelocation;


mysql_close($dbh);





?>
<form class='c5' action='edited.php' method="post" enctype="multipart/form-data">
 username:<input type="text" name="name" id="name" value="<?php echo $username;?>" /><br />
 password:<input type="password" name="password" id="password"  value="<?php echo $password;?>" /><br />
 profile picture:<input type="file" name="image" id="image" value="<?php echo $imagelocation;?>"/><br />
 
<input type="submit" name="submit" id="submit" value="edit" /> 
</form>
<script type="text/javascript" >
function prefilldetails(){
	document.getElementById('name').value="<?php echo $username;?>";
}
</script>

<?php
 
if(isset($_POST['submit'])){
	
echo "IN edit.php";
}
?>


<a href="logout.php" ><div class="c2">Logout</div></a>
</body>