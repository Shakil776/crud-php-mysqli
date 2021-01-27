<?php 
	include 'inc/header.php'; 
	include 'config.php'; 
	include 'Database.php'; 
?>
<?php  
	$db = new Database();
	$query = "SELECT * FROM tbl_user";
	$readData = $db->select($query);
?>
<?php  
	if (isset($_GET['delete'])) {
		$id = $_GET['delete'];
		$query = "DELETE FROM tbl_user WHERE id = $id";
		$delete_data = $db->delete($query);

	}
?>
<?php  
	if (isset($_GET['msg'])) {
		echo "<span style = 'color:green;'>".$_GET['msg']."</span>";
	}
?>

<table class="tblone">
	<tr>
		<th width="10%">Serial</th>
		<th width="25%">Name</th>
		<th width="25%">Email</th>
		<th width="20%">Skill</th>
		<th width="20%">Action</th>
	</tr>
<?php 
	if ($readData) { 
		$i = 0;
		while($result = $readData->fetch_assoc()) {
			$i++;
?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $result['name']; ?></td>
		<td><?php echo $result['email']; ?></td>
		<td><?php echo $result['skill']; ?></td>
		<td>
			<button><a href="edit.php?id=<?php echo $result['id']; ?>">Edit</a></button>
			<button><a href="?delete=<?php echo $result['id']; ?>" onclick="return confirm('Are you sure to delete this?');">Delete</a></button>
		</td>
	</tr>
<?php } }else{ ?>
	<p>No data found.</p>
<?php } ?>
</table>

<button ><a href="create.php">Add Info</a></button>
<button style="display: table; margin: 0 auto;"><a href="index.php">Home</a></button>


<?php include 'inc/footer.php'; ?>