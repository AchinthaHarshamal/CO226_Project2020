<?php 
	require_once('include/connection.php');
	
	$dID = null;

	if (array_key_exists('doctor', $_POST)) {
		$dID = $connection->real_escape_string($_POST['doctor']);
	}

?>

<html>
    <head><title>Doctor Channeling</title>
        <link href="sty.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
	
    <body>
	<body background="include/bg2.png">
        <h1>Appointment</h1></div>
        <hr width="100%" align="left" style="height:2px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">
        <br>
        <h2>Make an Appointment</h2>

       
        <hr width="100%" align="left" style="height:2px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">
        
		<form action = "insert.php" method ="post">
			<div class="main-block">
     
              <div class="colums">
			  
				<div class="item">
					<label for="PName">Patient Name<span>*</span></label>
					<input type="text" id="PName" name="PName" required>
				</div>
				
				<div class="item">
					<label for="PAge">Age<span>*</span></label>
					<input type="text" id="PAge" name="PAge" required>
				</div>
				
				<div class="item">
					<label for="PGender">Gender<span>*</span></label><br>
					<th><select id="PGender" name="PGender" required>
						<option value="M" >Male</option>
						<option value="F">Female</option>
					</select></th>
				</div>
				
				<div class="item">
					<label for="PAddress">Address<span>*</span></label>
					<input type="text" id="PAddress" name="PAddress" required>
				</div>
				
				<div class="item">
					<label for="PContact">Contact Number<span>*</span></label>
					<input type="text" id="PContact" name="PContact" required>
				</div>
				
				<div class="item"></div>
				
                <div class="item">
                  <label for="DName">Doctor Name</label>
				  <?php
						echo '<input id="DName" type="text" name="DName" ';
						
						if ($dID) {
							$query = "SELECT Name FROM Doctor WHERE DoctorID='{$dID}'";
							
							
							if ($result = $connection->query($query)) {
								$dname = $result->fetch_assoc()["Name"];
								echo 'value="'.$dname.'" ';
							}
							
						}

						echo 'disabled />';
				  ?>
                </div>
      
                <div class="item">
                  <label for="Special">Speciality</label>
				  
				  <?php
						echo '<input id="Special" type="text" name="Special" ';
						
						if ($dID) {
							$query = "SELECT Speciality FROM Doctor WHERE DoctorID='{$dID}'";
							
							
							if ($result = $connection->query($query)) {
								$special = $result->fetch_assoc()["Speciality"];
								echo 'value="'.$special.'" ';
							}
							
						}
						
						echo 'disabled />';
				  ?>
                </div>
				
				
				<br>
				
          </div>
		  
		  <div>
					<table border="0" cellspacing="2" cellpadding="2">
						<tr>
							<th></th>
							<th>Channel Center</th>
							<th>Location</th>
							<th>Date</th>
							<th>Time</th>
						</tr>
						
						<?php
							
							$query = "SELECT c.CenterID, c.Name as CenterName, Location, VDate, VTime FROM ChannelCenter c, Visits v WHERE c.CenterID=v.CenterID AND v.DoctorID='{$dID}'";
							
							if ($result = $connection->query($query)) {
								
								while ($row = $result->fetch_assoc()) {
									$ccID = $row["CenterID"];
									$cname = $row["CenterName"];
									$location = $row["Location"];
									$date = $row["VDate"];
									$time = $row["VTime"];
								
									echo '<tr>
											<td><input type="radio" id="radiobutton" name="app" value="'.$ccID.'+'.$dID.'+'.$date.'+'.$time.'" onclick="enableConfirm()"></td>
											<td>'.$cname.'</td>
											<td>'.$location.'</td>
											<td>'.$date.'</td>
											<td>'.$time.'</td>
										  </tr>';
								}
								
								$result->free();
								
							}
						?>
						
						
					</table>
				
					<div class="item">
						<button type="submit" name="MakeApp" id="confirmbtn" value="Find">Confirm Appointment</button>
					</div>
					
					<script>
					const confirmbtn = document.getElementById("confirmbtn");
					
					confirmbtn.disabled = true;
					
					function enableConfirm(){
						confirmbtn.disabled = false;
					}
					
					</script>
				
		</form>
		  
		  </div>
        </body>

    </body>

</html>