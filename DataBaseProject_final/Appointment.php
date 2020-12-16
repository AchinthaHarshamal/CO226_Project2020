<?php require_once('include/connection.php'); ?>
<html>
    <head><title>Doctor Channeling</title>
    <style>
		
      .myHomeButton {
          border-radius: 15px;
          padding: 10px;
          display:block;
          background-color:darkblue;;
          color: white;
          text-align:center;
          position: absolute;
          top: 15px;
          right: 20px;
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
          font-family: Arial, Helvetica, sans-serif;
          font-weight: bold;

      }
       body{
        background-repeat: no-repeat;
        background-size: cover;
        min-height:100%;
}
    </style>
        <link href="sty.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
	<body background="include/bg2.png">
	<!--<body background="include/BG.jpg">-->
	<a href="./Home.php" class="myHomeButton">HOME</a>
        <h1>Make an Appointment</h1></div>
        <hr width="100%" align="left" style="height:2px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">
        <br>
		
        <div class="w3-bar w3-black">
            <button class="w3-bar-item w3-button" onclick="openTab('Doctor')">BY DOCTOR</button>
            <button class="w3-bar-item w3-button" onclick="openTab('ChannelCenter')">BY ChannelCenter</button>
          </div>
		  
		  
          <hr width="100%" align="left" style="height:2px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">
		  
		  
          <div id="Doctor" class="w3-container mytabs">
		  
            <h2>Find: Doctors</h2>
			
            <form method="post" ><tr>
			
                <th><h3>Enter the  name:</h3></th>
				
                <th style="text-align: left;"><input id="SearchInput" type="text" name="DocName"/>
				
                <th><h3>Speciality</h3></th>
				
                <th style="text-align: left;">
					<select name="speciality" id="SearchInput">
						<option value=""></option>
						<?php
							$query = "SELECT DISTINCT Speciality FROM Doctor";
							
							if ($result = $connection->query($query)) {
						
								while ($row = $result->fetch_assoc()) {
									$speciality = $row["Speciality"];
									
									echo '<option value="'.$speciality.'">'.$speciality.'</option>';
								}
								
								$result->free();			
							}
						?>
					</select>
				</th>
				
				<th><button type="submit" name="Docsearch" value="Find">Search</button></th></tr>
				
                <hr width="100%" align="left" style="height:2px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">
				
            </form>
			
			
			
			<form action="MakeAppDoc.php" method="post">
			
				<?php
				
					if (array_key_exists('Docsearch', $_POST)) {
						
						$Uname = $connection->real_escape_string($_POST['DocName']);
						$Uspeciality = $connection->real_escape_string($_POST['speciality']);
						
						$query = "SELECT DoctorID, Name, Speciality, Gender FROM Doctor WHERE (Name LIKE '%{$Uname}%') AND Speciality LIKE '%{$Uspeciality}%'";
						
						echo '<h5>Select a Doctor</h5>
							<table border="0" cellspacing="2" cellpadding="2">
								<tr>
									<th></th>
									<th>Doctor Name</th>
									<th>Speciality</th>
									<th>Gender</th>
								</tr>';
						
						if ($result = $connection->query($query)) {
							
							while ($row = $result->fetch_assoc()) {
								$docID = $row["DoctorID"];
								$name = $row["Name"];
								$speciality = $row["Speciality"];
								$gender = $row["Gender"];
							
								echo '<tr>
										<td><input type="radio" id="radiobutton" name="doctor" value="'.$docID.'" onclick="enableApp()"></td>
										<td>'.$name.'</td>
										<td>'.$speciality.'</td>
										<td>'.$gender.'</td>
									  </tr>';
							}
							
							$result->free();
							echo '</table>';
						}
					}
				?>
				
				<br>
				
				<th><button type="submit" name="makeapp" id="makeapp" value="makeapp">Make Appointment</button></th></tr>
				
				<script>
					const makeapp = document.getElementById("makeapp");
					
					makeapp.disabled = true;
					
					function enableApp(){
						makeapp.disabled = false;
					}
					
				</script>
			</form>
			
				
          </div>
          
          <div id="ChannelCenter" class="w3-container mytabs" style="display:none">
		  
            <h2>Find: Channel Centers</h2>
            <form method="post" >
			
				<tr>
					<th><h3>Enter the Center name:</h3></th>
					
					<th style="text-align: left;"><input id="SearchInput" type="text" name="CCName"/>
					
					<th><h3>Enter the location:</h3></th>
					
					<th style="text-align: left;"><input id="SearchInput" type="text" name="Location"/>
					
					<th> <button type="submit" name="CCsearch" value="Find">Search</button></th>
				</tr>
				
                <hr width="100%" align="left" style="height:2px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">

            </form>
			
			
			<form action="MakeAppCC.php" method="post">
			
				<?php
					
					if (array_key_exists('CCsearch', $_POST)) {
						
						echo '<script>
							var i;
							var x = document.getElementsByClassName("mytabs");
							for (i = 0; i < x.length; i++) {
							  x[i].style.display = "none";  
							}
							document.getElementById("ChannelCenter").style.display = "block";  
						
						</script>';
						

						$Uname = $connection->real_escape_string($_POST['CCName']);
						$Ulocation = $connection->real_escape_string($_POST['Location']);
						
						$query = "SELECT CenterID, Name, Location FROM ChannelCenter WHERE (Name LIKE '%{$Uname}%') AND Location LIKE '%{$Ulocation}%'";
						
						echo '<h5>Select a Channel Center</h5>
							<table border="0" cellspacing="2" cellpadding="2">
								<tr>
									<th></th>
									<th>Center Name</th>
									<th>Location</th>
								</tr>';
						
						if ($result = $connection->query($query)) {
							
							while ($row = $result->fetch_assoc()) {
								$ccID = $row["CenterID"];
								$name = $row["Name"];
								$location = $row["Location"];
							
								echo '<tr>
										<td><input type="radio" id="radiobutton" name="center" value="'.$ccID.'" onclick="enableApp2()"></td>
										<td>'.$name.'</td>
										<td>'.$location.'</td>
									  </tr>';
							}
							
							$result->free();
							echo '</table>';
						}
					}
				?>
				
				<br>
				
				<th><button type="submit" name="makeapp" id="makeapp2" value="makeapp">Make Appointment</button></th></tr>
				
				<script>
					const makeapp2 = document.getElementById("makeapp2");
					
					makeapp2.disabled = true;
					
					function enableApp2(){
						makeapp2.disabled = false;
					}
					
				</script>
				
				</form>
			
          </div>
          
        
    </body>
	
	<script>
          function openTab(tabName) {
            var i;
            var x = document.getElementsByClassName("mytabs");
            for (i = 0; i < x.length; i++) {
              x[i].style.display = "none";  
            }
            document.getElementById(tabName).style.display = "block";  
          }
    </script>

</html>
<?php mysqli_close($connection) ?>