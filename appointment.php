<?php  
	include 'include/overallHeader.php';
	include 'config.php';
	include 'Database.php';
?>


	<div class="container" >

		<?php 
			$db = new Database();
			$query = "SELECT * FROM user";
			$read = $db->select($query);
		 ?>

		 <?php 
		 	if(isset($_GET['msg'])){
		 		echo $_GET['msg'];
		 	}
		 ?>

		<h3>Appointment List</h3>

		<table class="tblone">
			<tr>
				
				<th>Name</th>
				<th>Email</th>
				<th>skill</th>
				<th>password</th>
				<th colspan="2">Action</th>
			</tr>
			<?php if($read){ ?>
				<?php while($row = $read->fetch_assoc()){ ?>

					<tr>
						
						<td><?php echo $row['user_name']; ?></td>
						<td><?php echo $row['user_email']; ?></td>
						<td><?php echo $row['user_skill'] ?></td>
						<td><?php echo $row['user_password']; ?></td>
						<td><a href="update.php?id=<?php echo urlencode($row['user_id']); ?>">Edit</a></td>
						<td>Delete</td>
					</tr>

				<?php } ?>
			<?php } else{ ?>
				<p>Data is not available!!</p>
			<?php } ?>
		</table>

		<a href="index.php">Add appointment</a>
	</div>


<?php
	include 'include/overallFooter.php'; 
 ?>