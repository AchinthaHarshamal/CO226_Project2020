<html>
<head><title>CC_Registation</title>
    <link href="styleRegister.css" type="text/css" rel="stylesheet" />
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
    <?php 
      include('ccRegScript.php');
      $fmSubmit = new cformClass;
      $fmSubmit->dataStore();
    ?>
    <h1>Channel Center</h1></div>
    <a href="./Home.php" class="myHomeButton">HOME</a>
    <hr width="100%" align="left" style="height:2px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">
    <br>
    <h2>Channel Center Details:</h2>

   
    <hr width="100%" align="left" style="height:2px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">
    
    <div class="main-block">
 
        <form action="" method="post">

          <div class="title">
            <i class="fas fa-pencil-alt"></i> 
            <h3>Enter here</h3>
          </div>

          <div class="colums">

            <div class="item">
              <label for="cName">Center Name<span>*<?php echo $fmSubmit->errcName?></span></label>
              <input id="cName" type="text" name="cName" required/>
            </div>

            <div class="item">
              <label for="cID">Center ID<span>*<?php echo $fmSubmit->errcID?></span></label>
              <input id="cID" type="text" name="cID" required/>
            </div>
  
            

            <div class="item">
              <label for="address">Address<span>*<?php echo $fmSubmit->erraddress?></span></label>
              <input id="address" type="text"   name="address" required/>
            </div>
          </div>

          <hr width="80%" align="left" style="height:1px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">

          <div class="colums">
            <div class="item">
              <label for="email_1">Email address 1<span>*<?php echo $fmSubmit->erremail_1?></span></label>
              <input id="email_1" type="text" name="email_1" required/>
            </div>
            <div class="item">
              <label for="pNumber_1">Phone number 1<span>*<?php echo $fmSubmit->errpNumber_1 ?></span></label>
              <input id="pNumber_1" type="text"  name="pNumber_1" required/>
            </div>

            <div class="item">
              <label for="email_2">Email address 2<span>*<?php echo $fmSubmit->erremail_2?></span></label>
              <input id="email_2" type="text" name="email_2" required/>
            </div>

            <div class="item">
              <label for="pNumber_2">Phone number 2<span>*<?php echo $fmSubmit->errpNumber_2?></span></label>
              <input id="pNumber_2" type="text"   name="pNumber_2" required/>
            </div>
          </div>  

          <hr width="80%" align="left" style="height:1px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">

          <div class="colums c2">
            <div class="item">
            <label for="facilities">Facilities
            </label>
            <textarea id="facilities" name="facilities" rows="6" cols="100">
            </textarea>
          </div>
            
          <hr width="80%" align="left" style="height:1px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">
          </div>
          
          <button type="submit" href="/">Submit</button>
        </form>
    </div>

</body>

</html>