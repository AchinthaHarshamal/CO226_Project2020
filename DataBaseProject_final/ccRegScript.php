<?php
	/**
	 * 
	 */

	/*
	cName
	cID
	address
	email_1
	pNumber_1
	pNumber_2
	email_2
	facilities
	*/

	class cformClass
	{
		protected $conn;
		protected $cName , $cID , $address,$email_1 , $email_2, $pNumber_1,$pNumber_2 , $facilities;
		public $errcName , $errcID , $erraddress,$erremail_1 , $erremail_2, $errpNumber_1,$errpNumber_2;
		protected $isError=0;

		
		function __construct(){
			$username = "root";
	    	$password = "root";
	    	$database = "channeling_system";
	    	$port = 3306;
	    	$this->conn = new mysqli("localhost", $username, $password, $database,$port);

		 

		    if(!$this->conn){
		    	die('Some Connection Issue'.mysql_error());
		    }
		}


		function dataStore(){
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				if(	$this->nameValidation( trim($_POST["cName"])) ){
					$this->cName = trim($_POST["cName"]);
				}
				if(	$this->idValidatation( trim($_POST["cID"])) ){
		    		$this->cID = trim($_POST["cID"]);
		    	}
		    	if(	$this->addressValidation( trim($_POST["address"])) ){
		    		$this->address = trim($_POST["address"]);
		    	}
		    	if(	 $this->maileValidation(trim($_POST["email_1"])) ){
		    		$this->email_1 = trim($_POST["email_1"]);
		    	}else{
		    		$this->erremail_1 = "Invalid Email";
		    	}
		    	if(	 $this->maileValidation(trim($_POST["email_2"])) ){
		    		$this->email_2 = trim($_POST["email_2"]);
		    	}
		    	else{
		    		$this->erremail_2 = "Invalid Email";
		    	}

		    	if(	 $this->pnumValidation(trim($_POST["pNumber_1"])) ){
		    		$this->pNumber_1 = trim($_POST["pNumber_1"]);
			    }else{
			    	$this->errpNumber_1 = "Invalid Number";

			    }
			    if(	 $this->pnumValidation(trim($_POST["pNumber_2"])) ){
		    		$this->pNumber_2 = trim($_POST["pNumber_2"]);
			    }else{
			    	$this->errpNumber_2 = "Invalid Number";

			    }


			    $this->facilities = explode("\n",$_POST["facilities"]);

			    //echo "Print Some thing<br>";

			    //$this->printer();
			    $this->storData();


			}

		}

		function printer(){
			echo "Center Name : " . $this->cName."<br>";
			echo "Center ID : " . $this->cID."<br>";
			echo "Email 1 : " . $this->email_1."<br>";
			echo "Email 2 : " . $this->email_2."<br>";
			echo "Contact 1 : " . $this->pNumber_1."<br>";
			echo "Contact 2 : " . $this->pNumber_2."<br>";
			

			for($i=0 ;$i<count($this->facilities);$i++){
			    	echo "Center Facility : ". $this->facilities[$i]."<br>";
			}

		}
		function nameValidation($name){
			if (!preg_match("/^[a-zA-Z0-9-' ]*$/",$name) ) {
				$this->errcName = "Only letters are allowed";
				$this->isError = 1;
				return 0;
			}

			return 1 ; 
    	}

    	function idValidatation($id){
	    	if(strlen($id)==4)
	    	{
	    		if (!preg_match("/^[a-zA-Z0-9]*$/",$id)) {
	  				$this->errcID = "Only Numbers and letters are allowed";
	  				$this->isError = 1;
	  				return  0;
				}
	    	}else
	    	{
	  				$this->errcID = "Only 6 characters are allowed";
	  				$this->isError = 1;
	  				return  0;
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

	    function addressValidation($address){
	    	if (!preg_match("/^[a-zA-Z0-9,()' ]*$/",$address) ) {
				$this->erraddress = "Only letters,numbers and (,') are allowed";
				$this->isError = 1;
				return 0;
			}

			return 1 ; 
	    }

	    function maileValidation($email){
    		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  					$this->isError = 1; 
  					return 0 ;
  			}
  				return  1;
    	}


    	function storData(){
    		
    		if($this->isError==0){
    			$query_1 = sprintf("INSERT INTO ChannelCenter VALUES ('%s','%s','%s');",$this->cID,$this->cName,$this->address);
    			$isSuccess = mysqli_query($this->conn,$query_1);

    			$query_2 = sprintf("INSERT INTO CenterContacts VALUES ('%s','%s');",$this->cID ,$this->email_1);
    			$isSuccess = mysqli_query($this->conn,$query_2);

    			$query_3 = sprintf("INSERT INTO CenterContacts VALUES ('%s','%s');",$this->cID ,$this->email_2);
    			$isSuccess = mysqli_query($this->conn,$query_3);


    			$query_4 = sprintf("INSERT INTO CenterContacts VALUES ('%s','%s');",$this->cID ,$this->pNumber_1);
    			$isSuccess = mysqli_query($this->conn,$query_4);

    			$query_5 = sprintf("INSERT INTO CenterContacts VALUES ('%s','%s');",$this->cID ,$this->pNumber_2);
    			$isSuccess = mysqli_query($this->conn,$query_5);


    			for($i=0 ;$i<count($this->facilities);$i++){

    				$query_6 = sprintf("INSERT INTO Facility VALUES  ('%s','%s');",$this->cID ,$this->facilities[$i]);
    				$isSuccess = mysqli_query($this->conn,$query_6);
			    	
				}
    			if($isSuccess==1){
    				$this->printer();
    				echo "Successfuly stored<br>";
    			}
    			else{
    				echo "Faile to sublmit<br>";
    			}

    		
    		}else{
    			echo "Faile to store Data".mysqli_error($this->conn)."<br>";
    		}
    	}


	}


?>