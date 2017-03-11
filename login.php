<html>
<head>
</head>
<body>

<?php 
session_start(); 
if(!isset($_SESSION['teamid'])||!isset($_SESSION['password'])){

echo '	
        <script src="./js/sign.js" type="text/javascript"></script>
        <script src="./js/jqmin.js" type="text/javascript"></script>
         <script src="./js/login2.js" type="text/javascript"></script>
          
         
        <div id="box">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Log-in</h3>
                            <span id="error" class="error"></span>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div id="box" class="form-bottom">
                        <form class="login-form" action="" method="post"  name="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="teamname">Teamname</label>
                                <input type="text" name="teamname" placeholder="Teamname..." class="form-username form-control" id="teamname">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">Password</label>
                                <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="password">
                            </div>
                            <input type="submit" id="login" class="btn" style="width:100%;background-color:lightblue;" value="Login" name="login"  id="login"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
	<script  type="text/javascript">
var frmvalidator = new Validator("login-form");
//frmvalidator.EnableOnPageErrorDisplaySingleBox();
frmvalidator.EnableMsgsTogether();



frmvalidator.addValidation("teamname","req","Please enter your Team Name");
frmvalidator.addValidation("teamname","maxlen=20","Max length for Team is 20");
frmvalidator.addValidation("password","req","Please enter your password");
frmvalidator.addValidation("password","maxlen=40","max password length");
	</script>
	';
	}
	
else echo 'already logged in';                                             //already logged in
?>
</body>
