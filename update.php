<?php  
	include 'include/overallHeader.php';
	include 'config.php';
	include 'Database.php';
?>


	<div class="container">

		
		
		<?php 
			$id = $_GET['id'];
			$db = new Database();
			$query = "SELECT * FROM user WHERE user_id=$id";
			$getData = $db->select($query)->fetch_assoc();

			if(isset($_POST['submit'])){

				$name = $_POST['user_name'];
				$email = $_POST['user_email'];
				$skill = $_POST['user_skill'];
				$password =  $_POST['user_password'];
				if($name ==null||$email==null||$skill==null||$password==null){
					$error = "Field must not be empty";
				}else{
					$query = "UPDATE user SET user_name = '$name', 
					user_email = '$email',
					user_skill = '$skill',
					user_password = '$password' WHERE user_id=$id";
					$update = $db->update($query);
				}
			}
		?>

		<?php 
		if(isset($error)){
		 		echo $error;
		 	}
		?>
		

		<form action="update.php?id=<?php echo $id;?>" method="post">
		<table class="tblone">
			<tr>
				<td>Name</td>
				<td><input type="text" name="user_name" value="<?php echo $getData['user_name'];?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="user_email" value="<?php echo $getData['user_email'];?>"</td>
			</tr>
			<tr>
				<td>Skill</td>
				<td><input type="text" name="user_skill" value="<?php echo $getData['user_skill'];?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="user_password" value="<?php echo $getData['user_password'];?>"></td>
			</tr>

			<tr>
				<td>
					<input type="submit" name="submit" value="Submit">
					<a href="appointment.php"><input type="button" value="Cancel"></a>
				</td>
			</tr>
		</table>
		</form>
		<a href="index.php">Home</a>

		
	</div>


<?php
	include 'include/overallFooter.php'; 
 ?>