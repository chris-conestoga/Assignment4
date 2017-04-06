function validateForm()
{
	var errorMessage="";
	var hasFocused=false;
	var nameRegEx= new RegExp("^[a-zA-Z]+$");
	var emailRegEx= new RegExp("^[a-zA-Z0-9!#$%&'*+\\-/=?^_`{|}~]+@[a-z0-9._-]+\.[a-z]+$");
	var phoneRegEx= new RegExp("^[0-9]{4,16}");
	var postalRegEx= new RegExp("^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$");
	fnameFix();
	lnameFix();
	pcodeFix();
	genericFix("stnumber");
	genericFix("address");
	genericFix("city");
	genericFix("province");
	if (!nameRegEx.test(document.getElementById("fname").value))
	{
		if (!hasFocused){
			document.getElementById('fname').focus();
			hasFocused=true;
		}
		errorMessage=errorMessage.concat("Invalid First Name: Must consist of only letters.<br/><br/>");
	}
	if (!nameRegEx.test(document.getElementById("lname").value))
	{
		if (!hasFocused){
			document.getElementById('lname').focus();
			hasFocused=true;
		}
		errorMessage=errorMessage.concat("Invalid Last Name: Must consist of only letters<br/><br/>")
	}
	if (!phoneRegEx.test(document.getElementById("pnumber").value))
	{
		if (!hasFocused){
			document.getElementById('pnumber').focus();
			hasFocused=true;
		}
		errorMessage=errorMessage.concat("Invalid Phone Number: Must consist of only numbers, and no special characters or spaces. Must be between 4 and 16 digits.<br/><br/>")
	}
	if (!emailRegEx.test(document.getElementById("email").value))
	{
		if (!hasFocused){
			document.getElementById('email').focus();
			hasFocused=true;
		}
		errorMessage=errorMessage.concat("Invalid Email Address: letters, numbers, and special characters such as !#$%&'*+-/=?^_`{|}~ are only allowed in the local part. The domain may only contain letters, numbers, or hyphens [-]. The email address must be formatted as such: ---@----.--- though length may vary.<br/><br/>")
	}
	if (!postalRegEx.test(document.getElementById("postal_code").value))
	{
		if (!hasFocused)
		{
			document.getElementById('postal_code').focus();
			hasFocused=true;
		}
		errorMessage=errorMessage.concat("Invalid Postal Code: Must comply with standard Canadian format: e.g. A1A 1A1.<br/><br/>")
	}
	document.getElementById("dialogue").innerHTML="<h2>ERROR:</h2>"+errorMessage;
	if (errorMessage!=""){
		return false;
	}
}
function setUpPage()
{
	document.getElementById('hear').selectedIndex=-1;
	document.getElementById('province').selectedIndex=-1;
	document.getElementById('fname').focus();
}
function fnameFix()
{
  if (document.getElementById("fname").value!=null&&document.getElementById("fname").value!="")
  {
	  document.getElementById("fname").value=trimWhiteSpace(makeUpperCase(document.getElementById("fname").value));
  }
}
function lnameFix()
{
  if (document.getElementById("lname").value!=null&&document.getElementById("lname").value!="")
  {
	  document.getElementById("lname").value=trimWhiteSpace(makeUpperCase(document.getElementById("lname").value));
  }
}
function pnumberFix()
{
  if (document.getElementById("pnumber").value!=null&&document.getElementById("pnumber").value!="")
  {
	  document.getElementById("pnumber").value=trimWhiteSpace(document.getElementById("pnumber").value);
  }
}
function emailFix()
{
  if (document.getElementById("email").value!=null&&document.getElementById("email").value!="")
  {
	  document.getElementById("email").value=trimWhiteSpace(document.getElementById("email").value);
  }
}
function lnameFix()
{
  if (document.getElementById("lname").value!=null&&document.getElementById("lname").value!="")
  {
	  document.getElementById("lname").value=trimWhiteSpace(makeUpperCase(document.getElementById("lname").value));
  }
}
function genericFix(id)
{
  	if (document.getElementById(id).value!=null&&document.getElementById(id).value!="")
  	{
		document.getElementById(id).value=trimWhiteSpace(document.getElementById(id).value);
  	}
}
function makeUpperCase(input)
{
	for (var i=0; i<input.length; i++)
	{
		if (isLetter(input.charAt(i)))
		{
			input=input.substring(0,i)+input.charAt(i).toUpperCase()+input.substring(i+1,input.length);
		}
	}
	return input;
}
function isLetter(input)
{
	var letterRegEx= new RegExp("[a-z]");
	if (letterRegEx.test(input))
	{
		return true;
	}
	else
	{
		return false;
	}
}
function trimWhiteSpace(input)
{
	while (input.charAt(0)==' ')
	{
		input=input.substring(1);
	}
	while (input.charAt(input.length-1)==' ')
	{
		input=input.substring(0,input.length-1);
	}
	return input;
}
function capitalize(input)
{
	var wordArray=input.split(" ");
	for (i=0;i<wordArray.length;i++)
	{
		wordArray[i]=wordArray[i].charAt(0).toUpperCase()+wordArray[i].substring(1,wordArray[i].length);
	}
	return wordArray.join(" ");
}
