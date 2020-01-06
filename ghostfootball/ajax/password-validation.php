<?php


$uppercase = 0;
$lowercase = 0; 
$number = 0; 
$specialChars = 0; 
 
if (isset($_POST['password'])) {
	
$password = $_POST['password'];
			
if (strlen($password) >= 8) {
	for ($i = 0, $j = strlen($password); $i < $j; $i++){ 

		$index = substr($password,$i,1); 
		
		if (preg_match('/^[[:upper:]]$/',$index)){ 
				$uppercase++; 
			}elseif(preg_match('/^[[:lower:]]$/',$index)){ 
				$lowercase++; 
			}elseif(preg_match('/^[[:digit:]]$/',$index)){ 
				$number++; 
			}else{
				$specialChars++; 
			} 
	}

	if ( $uppercase >= 2 && $number >= 2 && $specialChars >= 2) {
		echo 'Strong password.';
	}elseif ( ( $uppercase == 1 && $number>=1 ) ||  $specialChars >=1) {
		echo 'Meduim password.';
	}else{
		echo "Weak password";
	}
}else{
	echo "Your password should be at least 8 char";
}

}