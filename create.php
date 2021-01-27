<?php 
	error_reporting(0);
	include 'inc/header.php'; 
	include 'config.php'; 
	include 'Database.php'; 
?>
<?php  
	$db = new Database();
	if (isset($_POST['submit'])) {
		$name  = mysqli_real_escape_string($db->link, $_POST['name']);
		$email = mysqli_real_escape_string($db->link, $_POST['email']);
		$skill = mysqli_real_escape_string($db->link, $_POST['skill']);
		if ($name == '' || $email == '' || $skill == '') {
			$err_msg = "Field must not be empty!";
		}else{
			$query = "INSERT INTO tbl_user(name, email, skill) VALUES('$name', '$email', '$skill')";
			$insert_data = $db->insert($query);
		}
	}
?>

<?php  
	if (isset($err_msg)) {
		echo "<span style = 'color:red;'>".$err_msg."</span>";
	}
?>
<form action="create.php" method="POST">
	<table>
		<tr>
			<td>Name : </td>
			<td><input type="text" name="name" placeholder="Enter your name.." autocomplete="off"></td>
		</tr>
		<tr>
			<td>Email : </td>
			<td><input type="text" name="email" placeholder="Enter your email.." autocomplete="off"></td>
		</tr>
		<tr>
			<td>Skill : </td>
			<td><input type="text" name="skill" placeholder="Enter your skill.." autocomplete="off"></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="submit" value="Add">
				<input type="reset" value="Cancel">
			</td>
		</tr>
	</table>
</form>
<button><a href="index.php">Back to Home</a></button>

<?php include 'inc/footer.php'; ?>