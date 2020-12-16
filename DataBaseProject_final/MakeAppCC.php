<?php 
	require_once('include/connection.php');
	
	$cID = null;

	if (array_key_exists('center', $_POST)) {
		$cID = $connection->real_escape_string($_POST['center']);
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
					<select id="PGender" name="PGender" required>
						<option value="M">Male</option>
						<option value="F">Female</option>
					</select>

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
                  <label for="CName">Channel Center</label>
				  <?php
						echo '<input id="CName" type="text" name="CName" ';
						
						if ($cID) {
							$query = "SELECT Name FROM ChannelCenter WHERE CenterID='{$cID}'";
							
							
							if ($result = $connection->query($query)) {
								$cname = $result->fetch_assoc()["Name"];
								echo 'value="'.$cname.'" ';
							}
							
						}

						echo 'disabled />';
				  ?>
                </div>
      
                <div class="item">
                  <label for="Location">Location</label>
				  
				  <?php
						echo '<input id="Location" type="text" name="Location" ';
						
						if ($cID) {
							$query = "SELECT Location FROM ChannelCenter WHERE CenterID='{$cID}'";
							
							
							if ($result = $connection->query($query)) {
								$location = $result->fetch_assoc()["Location"];
								echo 'value="'.$location.'" ';
							}
							
						}
						
						echo 'disabled />';
				  ?>
                </div>
				
				
				<br>
				
          </div>
		  
		  
					<table border="0" cellspacing="2" cellpadding="2">
						<tr>
							<th></th>
							<th>Doctor Name</th>
							<th>Speciality</th>
							<th>Date</th>
							<th>Time</th>
						</tr>
						
						<?php
							
							$query = "SELECT d.DoctorID, d.Name as DocName, d.Speciality, VDate, VTime FROM Doctor d, Visits v WHERE d.DoctorID=v.DoctorID AND v.CenterID='{$cID}'";
							
							if ($result = $connection->query($query)) {
								
								while ($row = $result->fetch_assoc()) {
									$dID = $row["DoctorID"];
									$dname = $row["DocName"];
									$special = $row["Speciality"];
									$date = $row["VDate"];
									$time = $row["VTime"];
								
									echo '<tr>
											<td><input type="radio" id="radiobutton" name="app" value="'.$cID.'+'.$dID.'+'.$date.'+'.$time.'" onclick="enableConfirm()"></td>
											<td>'.$dname.'</td>
											<td>'.$special.'</td>
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