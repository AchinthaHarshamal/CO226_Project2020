<?php require_once('include/connection.php'); ?>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $DocID=$_POST["DoctorID"];
    }
    //echo "myresult : ".$Dname;
    $query = "SELECT Name,CenterID,AppCount FROM doctorView
    where doctorID='$DocID'";
    // //echo $query;

    $result_set = mysqli_query($connection,$query);
    $table="";
    if ($result_set) {
        //echo mysqli_num_rows($result_set)."Records found. <hr>";
        $table ='<table>';
        $table .= '<tr><th>Center Name</th><th>Center ID</th><th>Appointment count</th></tr>';

        while($record =mysqli_fetch_assoc($result_set)){
            $table .= '<tr>';
            $table .= '<td>'.$record['Name'].'</td>';
            $table .= '<td>'.$record['CenterID'].'</td>';
            $table .= '<td>'.$record['AppCount'].'</td>';
            $table .= '</tr>';
        }
        $table .= '</table>';
    }
    
?>
<html>
    <head><title>Doctor details</title>
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
        <h1>Doctor</h1></div>
        <a href="./Home.php" class="myHomeButton">HOME</a>
        <hr width="100%" align="left" style="height:2px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">
        <br>
        <h2>View appointments</h2>
          <hr width="100%" align="left" style="height:2px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">
          <div id="Doc" class="w3-container mytabs">
            <h2>Hello Doctor those are your appointments </h2>
                <?php echo $table; ?>
            </form>
          </div>
    </body>

</html>
<?php mysqli_close($connection) ?>