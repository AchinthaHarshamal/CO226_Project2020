<?php require_once('include/connection.php'); ?>
<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(array_key_exists('CenterID',$_POST)){
      $MyCenterID=$_POST["CenterID"];
      //echo $MyCenterID;
    }
  }
    

    if(isset($_POST['Docsearch'])){
    $Dname=$_POST['Name'];
    //echo "myresult : ".$Dname;
    $query = "SELECT PName,AppDate,Room,AppTime FROM CenterDoctor_view
    where DocName='$Dname' and CenterID='$MyCenterID' ";
    //echo $query;
    $result_set = mysqli_query($connection,$query);
    $table ="";
    if ($result_set) {
        //echo mysqli_num_rows($result_set)."Records found. <hr>";
        $table ='<table>';
        $table .= '<tr><th>Patient Name</th><th>Date</th><th>Room</th><th>Time</th></tr>';

        while($record =mysqli_fetch_assoc($result_set)){
            $table .= '<tr>';
            $table .= '<td>'.$record['PName'].'</td>';
            $table .= '<td>'.$record['AppDate'].'</td>';
            $table .= '<td>'.$record['Room'].'</td>';
            $table .= '<td>'.$record['AppTime'].'</td>';
            $table .= '</tr>';
        }
        $table .= '</table>';
    }
    }else if(isset($_POST['Datesearch'])){
    $AppDate=$_POST['Date'];
    //echo "myresult : ".$Date;
    $query = "SELECT DocName,PName,Room,AppTime FROM CenterDoctor_view
    where AppDate='$AppDate' and CenterID='$MyCenterID'";
    //echo $query;
  //   echo '<script>
  //   var i;
  //   var x = document.getElementsByClassName("mytabs");
  //   for (i = 0; i < x.length; i++) {
  //     x[i].style.display = "none";  
  //   }
  //   document.getElementById("MyDate").style.display = "block";  
  // </script>';

    $result_set = mysqli_query($connection,$query);

    if ($result_set) {
     
        //echo mysqli_num_rows($result_set)."Records found. <hr>";
        $table ='<table>';
        $table .= '<tr><th>Doctor Name</th><th>Patient Name</th><th>Room</th><th>Time</th></tr>';
      
        while($record =mysqli_fetch_assoc($result_set)){
            $table .= '<tr>';
            $table .= '<td>'.$record['DocName'].'</td>';
            $table .= '<td>'.$record['PName'].'</td>';
            $table .= '<td>'.$record['Room'].'</td>';
            $table .= '<td>'.$record['AppTime'].'</td>';
            $table .= '</tr>';
        }
        $table .= '</table>';
    }
  }else if(isset($_POST['Roomsearch'])){
    $RoomNo=$_POST['Room'];
    //echo "myresult : ".$Dname;
    $query = "SELECT DocName,PName,AppDate,AppTime FROM CenterDoctor_view
    where Room='$RoomNo' and CenterID='$MyCenterID'";
    //echo $query;
    // echo '<script>
    // var i;
    // var x = document.getElementsByClassName("mytabs");
    // for (i = 0; i < x.length; i++) {
    //   x[i].style.display = "none";  
    // }
    // document.getElementById("Room").style.display = "block";  
    // </script>';

    $result_set = mysqli_query($connection,$query);

    if ($result_set) {
        //echo mysqli_num_rows($result_set)."Records found. <hr>";
        $table ='<table>';
        $table .= '<tr><th>Doctor Name</th><th>Patient Name</th><th>Date</th><th>Time</th></tr>';

        while($record =mysqli_fetch_assoc($result_set)){
            $table .= '<tr>';
            $table .= '<td>'.$record['DocName'].'</td>';
            $table .= '<td>'.$record['PName'].'</td>';
            $table .= '<td>'.$record['AppDate'].'</td>';
            $table .= '<td>'.$record['AppTime'].'</td>';
            $table .= '</tr>';
        }
        $table .= '</table>';
    }
    }
  
?>
<html>
    <head><title>Lab01</title>
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
        <h1>Channel Center</h1>
        <a href="./Home.php" class="myHomeButton">HOME</a>
        <hr width="100%" align="left" style="height:2px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">
        <br>
        <h2>View appointments</h2>
        <div class="w3-bar w3-black">
            <button class="w3-bar-item w3-button" onclick="openTab('Doc')">BY DOCTOR</button>
            <button class="w3-bar-item w3-button" onclick="openTab('MyDate')">BY DATE</button>
            <button class="w3-bar-item w3-button" onclick="openTab('Room')">BY ROOM</button>
          </div>
          <hr width="100%" align="left" style="height:2px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">
          <div id="Doc" class="w3-container mytabs">
            <h2>BY DOCTOR</h2>
            <form action="HomeChannel1.php" method="post" ><tr>
                <th><h3>Enter the doctor name:</h3></th>
                <th style="text-align: left;"><input id="SearchInput" type="text" name="Name"/>
                <?php echo '<input type="hidden" name="CenterID" value="'.$MyCenterID.'" />'; ?>
                <th> <button type="submit" name="Docsearch" value="Find">Search</button></th></tr>
                <hr width="100%" align="left" style="height:2px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">
                <?php if(isset($_POST['Docsearch'])) {echo $table;} ?>
              
            </form>
          </div>
          
          <div id="MyDate" class="w3-container mytabs" style="display:none">
            <h2>BY DATE</h2>
            <form action="HomeChannel1.php" method="post" ><tr>
                <th><h3>Enter the date:</h3></th>
                <th style="text-align: left;"><input id="SearchInput" type="text" name="Date"/>
                <?php echo '<input type="hidden" name="CenterID" value="'.$MyCenterID.'" />'; ?>
                <th> <button type="submit" name="Datesearch" value="Find">Search</button></th></tr>
                <hr width="100%" align="left" style="height:2px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">
                <?php if(isset($_POST['Datesearch'])) {
                   echo '<script>
                   var i;
                   var x = document.getElementsByClassName("mytabs");
                   for (i = 0; i < x.length; i++) {
                     x[i].style.display = "none";  
                   }
                   document.getElementById("MyDate").style.display = "block";  
                 </script>';

                  echo $table;}  ?>

            </form>
          </div>
          
          <div id="Room" class="w3-container mytabs" style="display:none">
            <h2>BY ROOM</h2>
            <form action="HomeChannel1.php" method="post" ><tr>
                <th><h3>Enter the room number:</h3></th>
                <th style="text-align: left;"><input id="SearchInput" type="text" name="Room"/>
                <?php echo '<input type="hidden" name="CenterID" value="'.$MyCenterID.'" />'; ?>
                <th> <button type="submit" name="Roomsearch" value="Find">Search</button></th></tr>
                <hr width="100%" align="left" style="height:2px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">
                <?php if(isset($_POST['Roomsearch'])) {
                  echo '<script>
                  var i;
                  var x = document.getElementsByClassName("mytabs");
                  for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";  
                  }
                  document.getElementById("Room").style.display = "block";  
                  </script>';

                  echo $table;}  ?>
        
            </form>
          </div>
          
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
        
    </body>

</html>
<?php mysqli_close($connection) ?>