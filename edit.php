<?php 
	error_reporting(0);
	include 'inc/header.php'; 
	include 'config.php'; 
	include 'Database.php'; 
?>
<?php  
	$id = $_GET['id'];
	$db = new Database();
	$query = "SELECT * FROM tbl_user WHERE id = $id";
	$getData = $db->select($query)->fetch_assoc();

	if (isset($_POST['submit'])) {
		$name  = mysqli_real_escape_string($db->link, $_POST['name']);
		$email = mysqli_real_escape_string($db->link, $_POST['email']);
		$skill = mysqli_real_escape_string($db->link, $_POST['skill']);
		if ($name == '' || $email == '' || $skill == '') {
			$err_msg = "Field must not be empty!";
		}else{
			$query = "UPDATE tbl_user
				SET 
				name  = '$name',
				email = '$email',
				skill = '$skill'
				WHERE id = $id";
			$update_data = $db->update($query);
		}
	}
?>

<?php  
	if (isset($err_msg)) {
		echo "<span style = 'color:red;'>".$err_msg."</span>";
	}
?>
<form action="edit.php?id=<?php echo $id; ?>" method="POST">
	<table>
		<tr>
			<td>Name : </td>
			<td><input type="text" name="name" value="<?php echo $getData['name']; ?>"></td>
		</tr>
		<tr>
			<td>Email : </td>
			<td><input type="text" name="email" value="<?php echo $getData['email']; ?>"></td>
		</tr>
		<tr>
			<td>Skill : </td>
			<td><input type="text" name="skill" value="<?php echo $getData['skill']; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="submit" value="Update">
				<input type="reset" value="Cancel">
			</td>
		</tr>
	</table>
</form>
<a href="index.php">Back to Home</a>

<?php include 'inc/footer.php'; ?>