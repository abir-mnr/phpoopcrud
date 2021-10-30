<?php  
	include 'include/overallHeader.php';
	include 'config.php';
	include 'Database.php';
?>


	<div class="container">
		
		<?php 
			$db = new Database();
			if(isset($_POST['submit'])){

				$name = $_POST['user_name'];
				$email = $_POST['user_email'];
				$skill = $_POST['user_skill'];
				$password =  $_POST['user_password'];
				if($name ==null||$email==null||$skill==null||$password==null){
					$error = "Field must not be empty";
				}else{
					$query = "INSERT INTO user(user_name,user_email,user_skill,user_password) Values('$name','$email','$skill','$password')";
					$insert = $db->insert($query);
				}
			}
		?>

		<?php 
		if(isset($error)){
		 		echo $error;
		 	}
		?>
		

		<form action="insert.php" method="post">
		<table class="tblone">
			<tr>
				<td>Name</td>
				<td><input type="text" name="user_name" placeholder="please input name"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="user_email" placeholder="please input email"></td>
			</tr>
			<tr>
				<td>Skill</td>
				<td><input type="text" name="user_skill" placeholder="please input skill"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="user_password"></td>
			</tr>

			<tr>
				<td>
					<input type="submit" name="submit" value="Submit">
					<input type="reset" value="Cancel">
				</td>
			</tr>
		</table>
		</form>
		<a href="appointment.php">Appointment List</a>

		
	</div>


<?php
	include 'include/overallFooter.php'; 
 ?>