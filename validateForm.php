<!DOCTYPE html>
<!-- -->
<html>
    <head>
        <meta charset="utf-8">
        <title>Recipt</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
		<h1>Order recipt:</h1>
		<?php
			
			$nameRegEx = "~^[a-zA-Z]+$~";
			$emailRegEx = "~^[a-zA-Z0-9!#$%&'*+\\-/=?^_`{|}~]+@[a-z0-9._-]+\.[a-z]+$~";
			$phoneRegEx = "~^[0-9]{4,16}~";
			$postalRegEx = "~^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$~";
							
			if (isset($_POST))
			{
				$standard = $_POST['standard'];
				$platinum = $_POST['platinum'];
				$first_name = $_POST['first_name'];
				$last_name = $_POST['last_name'];
				$phone_number = $_POST['phone_number'];
				$email = $_POST['email'];
				$street_number = $_POST['street_number'];
				$address = $_POST['address'];
				$city = $_POST['city'];
				$province = $_POST['province'];
				$postal_code = $_POST['postal_code'];
				$hear = $_POST['hear'];
				
				
				if (!is_numeric($standard)){
					$standard=0;
				}
				if (!is_numeric($platinum)){
					$platinum=0;
				}
				$check = $standard;
				$check += $platinum;
				if ($check <= 0)
				{
					$errorMessage=errorMessage.concat("You must order at least one item.<br/><br/>");
				}
				if (!preg_match($nameRegEx,$first_Name))
				{
					$errorMessage=errorMessage.concat("Invalid First Name: Must consist of only letters.<br/><br/>");
				}
				print($last_name);
				if (!preg_match($nameRegEx,$last_name))
				{
					$errorMessage=errorMessage.concat("Invalid Last Name: Must consist of only letters<br/><br/>");
				}
				print($phone_number);
				if (!preg_match($phoneRegEx,$phone_number))
				{
					$errorMessage=errorMessage.concat("Invalid Phone Number: Must consist of only numbers, and no special characters or spaces. Must be between 4 and 16 digits.<br/><br/>");
				}
				print($email);
				if (!preg_match($emailRegEx,$email))
				{
					$errorMessage=errorMessage.concat("Invalid Email Address: letters, numbers, and special characters such as !#$%&'*+-/=?^_`{|}~ are only allowed in the local part. The domain may only contain letters, numbers, or hyphens [-]. The email address must be formatted as such: ---@----.--- though length may vary.<br/><br/>");
				}
				print($street_number);
				if ($street_number=="")
				{
					$errorMessage=errorMessage.concat("You must enter a Street Number / Apartment Number<br/><br/>");
				}
				print($address);
				if ($address==""||strlen($address)<5)
				{
					$errorMessage=errorMessage.concat("You must enter sufficient address information (at least 5 characters in length)<br/><br/>");
				}
				print($city);
				if ($city==""||strlen($city)<3)
				{
					$errorMessage=errorMessage.concat("You must enter a city (at least 3 characters in length)<br/><br/>");
				}
				print($province);
				if ($province==""||strlen($province)<3)
				{
					$errorMessage=errorMessage.concat("You must enter a province (at least 2 characters in length)<br/><br/>");
				}
				print($postal_code);
				if (!preg_match($postalRegEx,$postal_code))
				{
					$errorMessage=errorMessage.concat("Invalid Postal Code: Must comply with standard Canadian format: e.g. A1A 1A1.<br/><br/>");
				}
				if (errorMessage != ""){
					print($errorMessage);
				}
			}
			else
			{
				print("ERROR: Please select a guess next time");
			}
		?>
    </body>
</html>