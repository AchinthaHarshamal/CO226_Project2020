<?php

/**
 *  Doctor Registation Handle by this clss
 *	(Data Validation/ and Stroing in the database)
 */
class dformClass
{
	protected $conn;
	protected $dName , $dID , $dAge , $dGender , $speciality , $email , $dpNumber_1 , $dpNumber_2 ;
	protected $qualiArr ;	 

	public $errdName , $errdID , $errdAge , $errdGender , $errspeciality , $erremail , $errdpNumber1,$errdpNumber2 ;
	//$errqualiArr = '';
	protected $isError = 0; 

	function __construct(){
		$username = "root";
	    $password = "root";
	    $database = "channeling_system";
	    $port = 3306;
	    $this->conn = new mysqli("localhost", $username, $password, $database,$port);

	   // $dName = $dID = $dAge = $dGender = $speciality = $email = $dpNumber_1 = $dpNumber_2  = "";
	   // $errdName = $errdID = $errdAge = $errdGender = $errspeciality = $erremail = $errdpNumber = "";

	    if(!$this->conn){
	    	die('Some Connection Issue'.mysql_error());
	    }

	
	}

	function printArgs(){
		if($_SERVER["REQUEST_METHOD"] == "POST"){

		    echo "Connected Successfully" ."<br>";
		    echo "name ". $_POST["dName"]."<br>" ;
		    echo "Id ". $_POST["dID"]."<br>" ;
		    echo "age ". $_POST["dAge"]."<br>" ;	
		    echo "gender ". $_POST["dGender"]."<br>" ;	
		    echo "speciality ". $_POST["speciality"]."<br>" ;
		    echo "email ". $_POST["email"]."<br>" ;	
		    echo "pNumber1 ". $_POST["pNumber1"]."<br>" ;	
		    echo "pNumber2 ". $_POST["pNumber2"]."<br>" ;	
		    echo "Qualification ". $_POST["qualification"]."<br>" ;	
		}
	}

	function dataReadStor(){
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(	$this->nameValidation( trim($_POST["dName"])) ){
				$this->dName = trim($_POST["dName"]);
			}
		    if(	$this->idValidatation( trim($_POST["dID"])) ){
		    	$this->dID = trim($_POST["dID"]);
		    }
		    if( $this->ageValidatation(trim($_POST["dAge"]) ) ){
		    	$this->dAge = trim($_POST["dAge"]);
		    }
		    if( $this->genderValidation(trim($_POST["dGender"])) ){
		    	//$this->dGender = trim($_POST["dGender"]);

		    }
		    $this->speciality			= $_POST["speciality"];

		    if(	 $this->maileValidation(trim($_POST["email"])) ){
		    	$this->email = trim($_POST["email"]);

		    }
		    if(	 $this->pnumValidation(trim($_POST["pNumber1"])) ){
		    	$this->dpNumber_1 = trim($_POST["pNumber1"]);
		    	
		    }
		    else{
		    	$this->errdpNumber1 = "Invalid Number";

		    }
		    if(!empty($_POST["pNumber2"])){
		    	if(	 $this->pnumValidation(trim($_POST["pNumber2"])) ){
		    	$this->dpNumber_2 = trim($_POST["pNumber2"]);
		    	
		    	}
			    else{
			    		$this->errdpNumber2 = "Invalid Number";	
			    }

		    }
		    
		    $this->qualiArr 		= explode("\n",$_POST["qualification"]);

		    $this->storeData();

		}
	}

	function nameValidation($name){
		if (!preg_match("/^[a-zA-Z-' ]*$/",$name) ) {
				$this->errdName = "Only letters are allowed";
				$this->isError = 1;
				return 0;
		}

		return 1 ; 
    }

    function idValidatation($id){
    	if(strlen($id)==8)
    	{
    		if (!preg_match("/^[a-zA-Z0-9]*$/",$id)) {
  				$this->errdID = "Only Numbers and letters are allowed";
  				$this->isError = 1;
  				return  0;
			}
    	}else
    	{
  				$this->errdID = "Only 8 characters are allowed";
  				$this->isError = 1;
  				return  0;
    	}
    	return  1;	
    }

    function ageValidatation($age){
    	if(is_numeric($age)){
    		if((int)$age<20 || (int)$age >100){
    			$this->errdAge = "Age between 20-100 is allowed";
    			$this->isError = 1;
    			return  0;
    		}
    	}
    	else{
    		$this->errdAge = "Only numbers are allowed";
    		$this->isError = 1;
    		return  0;
    	}

    	return  1;
    }

    function genderValidation($gender){
    	if(strtolower($gender) !='female' && strtolower($gender)!='male'){
    		$this->errdGender = "Male or Female is allowed";
    		$this->isError = 1;
    		return  0;
    	}
    	if(strtoLower($gender)=='female'){
    		$this->dGender = 'F';
    	}
    	else{
    		$this->dGender = 'M';
    	}
    	return  1;
    }

    function maileValidation($email){
    		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  					$this->erremail = "Invalid email format";
  					$this->isError = 1; 
  					return 0;
  			}
  				return  1;
    }

    function pnumValidation($number){
		if(strlen($number) ==10){
			if(!is_numeric($number)){
				
				$this->isError = 1;
				return  0;
			}
		}
		else{
				
				$this->isError = 1;
				return  0;
		}
		return  1;
    }

    function printMsg(){
    		echo "Name : ". $this->dName."<br>";
		    echo "ID : ".$this->dID."<br>";
		    echo "Age : ".$this->dAge."<br>";
		    echo "Gender : ".$this->dGender."<br>";
		    echo "Speciality : ".$this->speciality."<br>";
		    echo "Email : ".$this->email."<br>";
		    echo "Phone Number 1 : " .$this->dpNumber_1."<br>";
		    echo "Phone Number 2 : " .$this->dpNumber_2."<br>";
		    for($i=0; $i<count($this->qualiArr);$i++){
		    	echo "Qualification".$i." : ".$this->qualiArr[$i]."<br>";
		    }
    }

    function storeData(){
    	if($this->isError==0){
    		$query_1 = sprintf("INSERT INTO Doctor VALUES ('%s','%s','%s','%s',%s);",$this->dID ,$this->dName,$this->speciality,$this->dGender,$this->dAge);
	    	$isSuccess = mysqli_query($this->conn,$query_1);

	    	$query_2 = sprintf("INSERT INTO DocContacts VALUES ('%s','%s');",$this->dID,$this->email);
		    $isSuccess = mysqli_query($this->conn,$query_2);

		    $query_3 = sprintf("INSERT INTO DocContacts VALUES ('%s','%s');",$this->dID,$this->dpNumber_1);
		    $isSuccess = mysqli_query($this->conn,$query_3);

		    if(!empty($dpNumber_2)) {
	    		$query_4 = sprintf("INSERT INTO DocContacts VALUES ('%s','%s');",$this->dID,$this->dpNumber_2);
	    		$isSuccess = mysqli_query($this->conn,$query_4);	
	    	}

	    	for ($i = 0 ; $i < count($this->qualiArr) ;$i++){
		    	//echo $qualiArr[$i]."<bt>";
		    	$query_5 = sprintf("INSERT INTO DocQualification VALUES ('%s','%s');",$this->dID ,$this->qualiArr[$i]);
		    	$isSuccess = mysqli_query($this->conn,$query_5);
    		}


	    	if($isSuccess===TRUE){

	    		$this->printMsg();

	    		echo "Successfully stored data"."<br>";
		    }
		    else{
	    		echo "Fail to store Data".mysqli_error($this->conn)."<br>";
	    	}
    	}else{
    		echo "Fail to stordata".mysqli_error($this->conn)."<br>";
    	}

    }

}

?>


