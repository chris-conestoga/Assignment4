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
			
			var nameRegEx= new RegExp("^[a-zA-Z]+$");
			var emailRegEx= new RegExp("^[a-zA-Z0-9!#$%&'*+\\-/=?^_`{|}~]+@[a-z0-9._-]+\.[a-z]+$");
			var phoneRegEx= new RegExp("^[0-9]{4,16}");
			var postalRegEx= /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;
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
				$postal_code = $_POST['postal_code'];
				$hear = $_POST['hear'];
				
			}
			else
			{
				print("ERROR: Please select a guess next time");
			}
		?>
    </body>
</html>