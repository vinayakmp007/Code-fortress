<html>
<head>
<script src="./js/sign.js" type="text/javascript"></script>
</head>

<form name="register" method="post" action="">
	<table border="0" width="500" align="center" class="demo-table">
		<tr><td>Team name</td>
		<td><input type="text" class="demoInputBox" name="teamName" value=""></td>
		</tr>
		<tr><td>College Name</td>
		<td><input type="text" class="demoInputBox" name="collegeName" value=""></td>
		</tr>
		<tr><td>Mobile Number</td>
		<td><input type="text" class="demoInputBox" name="pNumber" value=""></td>
		</tr>
		<tr><td>Password</td>
		<td><input type="password" class="demoInputBox" name="password" value=""></td>
		</tr>
		<tr><td>Confirm Password</td>
		<td><input type="password" class="demoInputBox" name="cpassword" value=""></td>
		</tr>
		<tr><td>Email</td>
		<td><input type="text" class="demoInputBox" name="userEmail" value=""></td>
		</tr>
		<tr><td>Language</td>
		<td><input type="radio" name="lang" value="C" checked>C
		<input type="radio" name="lang" value="C++" > C++
		</td>
		</tr>
		<tr>
		
          

		<td></td>
		<td><input type="checkbox" name="terms"> I accept Terms and Conditions</td>
		</tr>
	</table>
	<div><input type="submit" name="submit" value="Register" class="btnRegister"></div>
</form>
<script  type="text/javascript">
var frmvalidator = new Validator("register");
//frmvalidator.EnableOnPageErrorDisplaySingleBox();
frmvalidator.EnableMsgsTogether();
frmvalidator.addValidation("cpassword","eqelmnt=password","The confirmed password is not same as password");


frmvalidator.addValidation("teamName","req","Please enter your Team Name");
frmvalidator.addValidation("teamName","maxlen=20","Max length for Team is 20");
frmvalidator.addValidation("collegeName","req","Please enter your college name");
frmvalidator.addValidation("userEmail","maxlen=50");
frmvalidator.addValidation("userEmail","req","Please enter your email  id");
frmvalidator.addValidation("userEmail","email","Please enter a valid emailid");
frmvalidator.addValidation("pNumber","maxlen=50");
frmvalidator.addValidation("pNumber","numeric","Please enter valid number");
frmvalidator.addValidation("Terms","dontselectchk=y","Please select an option from 'Agree to Terms'");

</script>
</body>
</html>

