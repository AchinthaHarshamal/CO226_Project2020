<html>
    <head><title>Doctor Channeling</title>
        <link href="sty.css" type="text/css" rel="stylesheet" />
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    </head>
    <body>
	<body background="include/bg2.png">
	<a href="./Home.php" class="myHomeButton">HOME</a>
		<?php 
			require_once('include/connection.php');
			
			$pname = $connection->real_escape_string($_POST['PName']);
			$page = $connection->real_escape_string($_POST['PAge']);
			$pgender = $connection->real_escape_string($_POST['PGender']);
			$paddress = $connection->real_escape_string($_POST['PAddress']);
			$pcontact = $connection->real_escape_string($_POST['PContact']);
			
			$app = $connection->real_escape_string($_POST['app']);
			$cID = explode('+', $app)[0];
			$dID = explode('+', $app)[1];
			$date = explode('+', $app)[2];
			$time = explode('+', $app)[3];
			
			$query = "INSERT INTO Appointment VALUES (null, '{$pname}', '{$paddress}', {$pcontact}, '{$pgender}', {$page}, '{$cID}', '{$dID}', '{$date}', '{$time}')";
			//echo $query;
			if ($connection->query($query)) {
				
				echo '<h1>Appointment Made!</h1><hr>';
				
				$show_query = "SELECT AppID FROM Appointment ORDER BY AppID DESC LIMIT 1";
						
				echo '<table border="0" cellspacing="2" cellpadding="2">
						<tr>
							<th>Appointment ID</th>
							<th>Patient Name</th>
							<th>Age</th>
							<th>Gender</th>
							<th>Date</th>
							<th>Time</th>
						</tr>';
				
				if ($result = $connection->query($show_query)) {
						$appID = $result->fetch_assoc()["AppID"];
						echo '<tr>
								<td>'.$appID.'</td>
								<td>'.$pname.'</td>
								<td>'.$page.'</td>
								<td>'.$pgender.'</td>
								<td>'.$date.'</td>
								<td>'.$time.'</td>
							</tr>
							</table>';
				}
			}
		?>