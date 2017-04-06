<!DOCTYPE html>
<!-- -->
<html>
    <head>
        <meta charset="utf-8">
        <title>Recipt</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
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
					$errorMessage=$errorMessage."You must order at least one item.<br/><br/>";
				}
				if (!preg_match($nameRegEx,$first_name))
				{
					$errorMessage=$errorMessage."Invalid First Name: Must consist of only letters.<br/><br/>";
				}
				if (!preg_match($nameRegEx,$last_name))
				{
					$errorMessage=$errorMessage."Invalid Last Name: Must consist of only letters<br/><br/>";
				}
				if (!preg_match($phoneRegEx,$phone_number))
				{
					$errorMessage=$errorMessage."Invalid Phone Number: Must consist of only numbers, and no special characters or spaces. Must be between 4 and 16 digits.<br/><br/>";
				}
				/*
				if (!preg_match($emailRegEx,$email))
				{
					$errorMessage=$errorMessage."Invalid Email Address: letters, numbers, and special characters such as !#$%&'*+-/=?^_`{|}~ are only allowed in the local part. The domain may only contain letters, numbers, or hyphens [-]. The email address must be formatted as such: ---@----.--- though length may vary.<br/><br/>";
				}
				*/
				if ($street_number=="")
				{
					$errorMessage=$errorMessage."You must enter a Street Number / Apartment Number<br/><br/>";
				}
				if ($address==""||strlen($address)<5)
				{
					$errorMessage=$errorMessage."You must enter sufficient address information (at least 5 characters in length)<br/><br/>";
				}
				if ($city==""||strlen($city)<3)
				{
					$errorMessage=$errorMessage."You must enter a city (at least 3 characters in length)<br/><br/>";
				}
				if ($province==""||strlen($province)<2)
				{
					$errorMessage=$errorMessage."You must enter a province (at least 2 characters in length)<br/><br/>";
				}
				if (!preg_match($postalRegEx,$postal_code))
				{
					$errorMessage=$errorMessage."Invalid Postal Code: Must comply with standard Canadian format: e.g. A1A 1A1.<br/><br/>";
				}
				if ($errorMessage != ""){
					print('<span id="dialogue"><h1>ERROR:</h1><br/>'.$errorMessage.'</span>');
				}
				else
				{
					print('<h1>Order recipt:</h1>');
					print("<br/>Shipping to:");
					print("<br/>$last_name, $first_name");
					print("<br/>$street_number $address");
					print("<br/>$city, $province");
					print("<br/>$postal_code");
					print("<br/><br/>Order Information:");
					$exstand = $standard * 9.95;
					$explat = $platinum * 29.95;
					$base_total = $exstand + $explat;
					if ($base_total > 0 && $base_total <= 25)
					{
						$delivery_time = 1;
						$delivery_charge = 3.00;				
					}
					elseif ($base_total > 25 && $base_total <= 50)
					{
						$delivery_time = 1;
						$delivery_charge = 4.00;
					}
					elseif ($base_total >50 && $base_total <=75)
					{
						$delivery_time = 3;
						$delivery_charge = 5.00;
					}
					else
					{
						$delivery_time = 4;
						$delivery_charge = 6.00;
					}

					if ($standard > 0)
					{
						print("<br/>$standard standard Widgets @ $9.95 each, extended cost $$exstand");
					}
					if ($platinum > 0)
					{
						print("<br/>$platinum platinum Widgets @ $29.95 each, extended cost $$explat");
					}
					print("<br/>Your base cost is $$base_total");
					print("<br/>Your total delivery charge is $$delivery_charge");

					if ($province == "AB")
					{
						$prov_tax = $base_total * 0.05;
					}
					elseif ($province == "BC")
					{
						$prov_tax = $base_total * 0.12;
					}
					elseif ($province == "MB")
					{
						$prov_tax = $base_total * 0.13;
					}
					elseif ($province == "NB")
					{
						$prov_tax = $base_total * 0.15;
					}
					elseif ($province == "NL")
					{
						$prov_tax = $base_total * 0.15;
					}
					elseif ($province == "NS")
					{
						$prov_tax = $base_total * 0.15;
					}
					elseif ($province == "NT")
					{
						$prov_tax = $base_total * 0.05;
					}
					elseif ($province == "NU")
					{
						$prov_tax = $base_total * 0.05;
					}
					elseif ($province == "ON")
					{
						$prov_tax = $base_total * 0.13;
					}
					elseif ($province == "PE")
					{
						$prov_tax = $base_total * 0.15;
					}
					elseif ($province == "QC")
					{
						$prov_tax = $base_total * 0.14975;
					}
					elseif ($province == "SK")
					{
						$prov_tax = $base_total * 0.11;
					}
					elseif ($province == "YT")
					{
						$prov_tax = $base_total * 0.05;
					}
					else
					{
						$prov_tax = $base_total * 1;
					}
					$prov_tax=round($prov_tax,2);
					print("<br/>Your total taxes: $$prov_tax");
					$total_cost = $base_total + $prov_tax + $delivery_charge;
					$total_cost = round($total_cost, 2);
					print("<br/><br/>The total cost for your order is $$total_cost");
					$delivery_date = 
					print("<br/><br/>Your Estimated Delivery Date: ".(date("d")+$delivery_time).date("/m/y"));
				}
			}
			else
			{
				print("ERROR: Please select a guess next time");
			}
		?>
    </body>
</html>
