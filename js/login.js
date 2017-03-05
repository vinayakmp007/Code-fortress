


        
            $(document).ready(function() {

            $('#login').click(function()
            {
            var username=$("#teamname").val();
            var password=$("#password").val();
            var submit="submit";
            var dataString = 'teamname='+username+'&password='+password+'&submit='+submit;;
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
                location.href = "./index.php";
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
        
