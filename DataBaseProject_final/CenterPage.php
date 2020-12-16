<?php require_once('include/connection.php'); ?>
<html>
    <head>
    <style> 
    p.myHeader{
        background-color: lightblue;
        color: black;
        padding: 40px;
        text-align: center;
        font-size: 40px;
        font-weight: 500;
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    .grid-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 10px;
    padding: 30px;
    }
    .squareD{
        height: 350px;
        width: 80%;
        background-color: darkcyan;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        background-position:center;
        background-repeat:no-repeat; 
        background-size:200px 60%; 
    }
    .squareC{
        height: 350px;
        width: 80%;
        background-color: darkcyan;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        background-position:center;
        background-repeat:no-repeat; 
        background-size:200px 60%; 

    }
    .squareA{
        height: 350px;
        width: 80%;
        background-color: darkcyan;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        background-position:center;
        background-repeat:no-repeat; 
        background-size:200px 60%; 

    }
    p.titles{
        color: white;
        text-align: center;
        font-size: 36px;
        font-weight: 500;
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        padding: 20px;
        text-shadow: 2px 2px 4px #000000;
    }
    p.Welcome{
        color: white;
        text-align: center;
        font-size: 60px;
        font-weight: 500;
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        padding: 20px;
    }
    .mycenter{
  margin: 0;
  position: relative;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  color: white;
  background-color: darkblue;
}
.mybox{
    position: relative;
    border-radius: 15px;
        width:1000px;
        height: 230px; 
        top: 0%;
        left: 19%;
        color:white;
        background-color: black;
        opacity: 0.6;
      }
.myboxText{
    font-weight:normal;
    color:white;
    padding: 30px;
    font-size: medium;
}
.vertical-center {
  
  margin: 0;
  position: relative;
  top: 60%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
</style>    
    <title>Center home page</title>
      <link href="sty.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
    <?php 
        $DocID='';
        if(isset($_POST["Enter"])){
            $MyCenterID=$_POST["CenterID"];
        }
    ?>
    <body background="include/BG.jpg">
    <p class="myHeader">E-Channeling Center</p>
    <hr width="100%" align="left" style="height:2px;border-width:0;color:white;background-color:white">
    <br>
     <p  class="Welcome">This is the place to your center!</p>  
     <div class="mybox"> <div class="myboxText">
         
    -> Facilitates finding a doctor according to a patients needs.<br><br>
    -> Booking an appointment with the preferred doctor.<br><br>
    -> Contains details of doctors and the hospitals.<br><br>
    -> It will allow the patients to book appointments

     </div></div>  
    <div class="grid-container">

        <div class="grid-child b1">
            <div class="squareC"><p class="titles">You are a user:</p>
            <form action="HomeChannel1.php" method="post" ><tr>
            <th><h3 style="color:white">&nbsp;&nbsp;&nbsp;&nbsp;Enter Center ID</h3></th>
            <br>
            <th style="text-align: left; color:white;"><input id="SearchInput" class="vertical-center" type="text" name="CenterID"/><br><br>
            <th><button type="submit" name="Enter" class="vertical-center" style="background-color:darkblue" value="Find">Enter</button></th></tr>
            </form>
        </div>
            <!--<img style='height: 100%; width: 100%; object-fit: contain' src ="./images/Docimg.png">-->
        </div>

        <div class="grid-child b2">
            <div class="squareD"><p class="titles">As a new user</p>
            <a href="./ChannelCenterRegistation.php">
            <button type="submit" name="search" value="Find" class="mycenter">Enter</button></a>
        </div>
            
        </div>
</div>

    </body>

</html>
<?php mysqli_close($connection) ?>