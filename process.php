<?php
	if(isset($_POST['listing'])){
 
		session_start();
		include('conn.php');
 
		$hotelname=$_POST['hotelname'];
	
		$query=mysqli_query($conn,"select * from `hotel` where hotelname='$hotelname'");

            if (mysqli_num_rows($query) == 0){
				header('location:index.php');
        		$_SESSION['message']="Login Failed. User not Found!";
	   			}
			else{
				$row=mysqli_fetch_array($query);
				if ($row['position']=='Nurse'){
					$_SESSION['id']=$row['EmpID'];
					?>
					<script>
						window.alert('Login Success, Welcome Nurse <?php echo $row['fname']; ?> <?php echo $row['lname']; ?>!');
						window.location.href='nurse/homepage.php';
					</script>
					<?php
				}
				elseif ($row['position']=='Pharmacist'){
					$_SESSION['id']=$row['EmpID'];
					?>
					<script>
						window.alert('Login Success, Welcome Pharmacist <?php echo $row['fname']; ?> <?php echo $row['lname']; ?>!');
						window.location.href='pharmacy/homepage.php';
					</script>
					<?php
				}
				elseif ($row['position']=='Midwife'){
					$_SESSION['id']=$row['EmpID'];
					?>
					<script>
						window.alert('Login Success, Welcome Midwife <?php echo $row['fname']; ?> <?php echo $row['lname']; ?>!');
						window.location.href='midwife/homepage.php';
					</script>
					<?php
				}
				elseif ($row['position']=='Head Nurse'){
					$_SESSION['id']=$row['EmpID'];
					?>
					<script>
						window.alert('Login Success, Welcome Head Nurse <?php echo $row['fname']; ?> <?php echo $row['lname']; ?>!');
						window.location.href='main-data/homepage.php';
					</script>
					<?php
				}
				else{
					$_SESSION['id']=$row['EmpID'];
					?>
					<script>
						window.alert('Login Success, Welcome Doctor <?php echo $row['fname']; ?> <?php echo $row['lname']; ?>!');
						window.location.href='doctor/homepage.php';
					</script>
					<?php
				}
		   	}
		}
	else{
		header('location:index.php');
		$_SESSION['message']="Please Login!";
	}
?>