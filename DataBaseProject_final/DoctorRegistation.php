
<html>
<head><title>Doctor_Registation</title>
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
      include('docRegScript.php');
      $fmSubmit = new dformClass;
      $fmSubmit->dataReadStor();
    ?>
<body background="include/bg2.png">
  
    <h1>Doctor</h1></div>
    <a href="./Home.php" class="myHomeButton">HOME</a>
    <hr width="100%" align="left" style="height:2px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">
    <br>
    <h2>Doctor Details:</h2>

   
    <hr width="100%" align="left" style="height:2px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">
    
    <div class="main-block">
 
        
        <form action="" method="post">

          <div class="title">
            <i class="fas fa-pencil-alt"></i> 
            <h3>Enter here</h3>
          </div>

          <div class="colums">

            <div class="item">
              <label for="dName" >Doctor Name<span>* <?php echo $fmSubmit->errdName?></span></label>
              <input id="dName" type="text" name="dName" required/>
            </div>

            <div class="item">
              <label for="dID">Doctor ID<span>* <?php echo $fmSubmit->errdID?></span></label>
              <input id="dID" type="text" name="dID" required/>
            </div>

            <div class="item">
              <label for="dAge">Age <span>* <?php echo $fmSubmit->errdAge?></span></label>
              <input id="dAge" type="text" name="dAge" required/>
            </div>
  
            <div class="item">
              <label for="dGender">Gender <span>* <?php echo $fmSubmit->errdGender?></span></label>
              <input id="dGender" type="text" name="dGender" required/>
            </div>
            

            <div class="item">
              <label for="speciality">Speciality<span>* </span></label>
              <input id="speciality" type="text"   name="speciality" required/>
            </div>
          </div>

          <hr width="80%" align="left" style="height:1px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">

          <div class="colums">
            <div class="item">
              <label for="email">Email address<span>* <?php echo $fmSubmit->erremail?></span></label>
              <input id="email" type="text" name="email" required/>
            </div>
            <div class="item">
              <label for="pNumber1">Phone number 1<span>*<?php echo $fmSubmit->errdpNumber1?></span></label>
              <input id="pNumber1" type="text"  name="pNumber1" required/>
            </div>

            <div class="item">
              <label for="pNumber2">Phone number 2<span> <?php echo $fmSubmit->errdpNumber2?></span></label>
              <input id="pNumber2" type="text"   name="pNumber2">
            </div>
          </div>  

          <hr width="80%" align="left" style="height:1px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">

          <div class="colums c2">
            <div class="item">
            <label for="qualification">Qualification
            </label>
            <textarea id="qualification" name="qualification" rows="6" cols="100">
            </textarea>
          </div>
            
          <hr width="80%" align="left" style="height:1px;border-width:0;color:rgb(0, 44, 61);background-color:rgb(4, 100, 124)">
          </div>
          
          <button type="submit" href="/">Submit</button>
          
        </form>
    </div>

</body>

</html>