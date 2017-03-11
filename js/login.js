


        
            $(document).ready(function() {

            $('#login').click(function()
            {
            var username=$("#teamname1").val();
            var password=$("#password1").val();
            var submit="submit1";
            var dataString = 'teamname1='+username+'&password1='+password+'&submit1='+submit;
            if($.trim(username).length>0 && $.trim(password).length>0)
            {


            $.ajax({
            type: "POST",
            url: "./loging.php",
            data: dataString,
            cache: false,
            beforeSend: function(){ $("#login").val('Connecting');$("#error").html(" ");},
            success: function(data){
            if(data=="YES")
            {
            window.setTimeout(function () {
                location.href = "./index.php";              //TODO changes to rules
            }, 0001);
            }
            else if(data=="AL")
            {
             
             $("#login").val('Login')
             $("#error").html("<span style='color:#cc0000'>Error:</span> Already logged in "+data);
            }
            
            
            else
            {
             
             $("#login").val('Login')
             $("#error").html("<span style='color:#cc0000'>Error:</span> Invalid Teamname or Password. ");
            }
            
            
             
            }
            });

            }
            return false;
            });
            


            });
        
