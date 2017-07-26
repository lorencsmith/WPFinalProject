
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Register</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.29" />
	<script type="text/javascript" src="formCheck.js"></script>
	<link rel="stylesheet" type="text/css" href="register.css">
</head>

<body>
	
	<form action="Main.html"
      method="post"
      id="name_form"
      onreset="return window.confirm('Are you sure you want to clear the form?');"
      onsubmit="return checkCompleteness();">
		<label for = "fN" id = "fN_label"> First Name: </label>
		<input type = "text" id = "fN" name = "firstName"><br>
		
		<label for = "midI" id = "mI_label"> Middle Initial: </label>
		<input type = "text" id = "midI" name = "midInit"><br>
		
		<label for = "lN" id = "lN_label"> Last Name: </label>
		<input type = "text" id = "lN" name = "lastName"><br>
		
		<label for = "ad" id = "ad_label"> Address: </label>
		<input type = "text" id = "ad" name = "address"><br>
		
		<label for = "city" id = "city_label"> City: </label>
		<input type = "text" id = "city" name = "city"><br>
		
		<label for = "state" id = "state_label"> State: </label>
		<input type = "text" id = "state" name = "state"><br>
		
		<label for = "pN" id = "pN_label"> Phone Number: </label>
		<input type = "text" id = "pN" name = "PhoneNumber" value = "(###) ###-####"><br>
		
		<label for = "email" id = "email_label"> E-mail: </label>
		<input type = "text" id = "email" name = "email"><br>
		
		<label for = "pw" id = "pw_label"> Password: </label>
		<input type = "password" id = "pw" name = "pass"><br>
		
		<label for = "pwC" id = "pwC_label"> Confirm Password: </label>
		<input type = "password" id = "pwC" name = "pass Confirm"><br>
		
		<label for = "bM" id = "bM_label"> Birthday (optional): </label>
		<input type = "text" id = "bM" name = "month" value = "month">
		<input type = "text" name = "day" value = "day">
		<input type = "text" name = "year" value = "year">

		<br>
		
		<input type = "submit" value = "submit">
		<input type = "reset" value = "reset">
		
	</form>
	
</body>

</html>
