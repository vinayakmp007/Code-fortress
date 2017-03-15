


        
            $(document).ready(function() {

            $("#login").click(function()
            {
            var username=$("#teamname").val();
            var password=$("#password").val();
            var submit="submit1";
           //  alert("im in");
            var dataString = 'teamname='+username+'&password='+password+'&submit='+submit;
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
           // alert(data);
            window.setTimeout(function () {
                
                window.location = './rules.html';              //TODO changes to rules
            }, 0001);
            }
            else if(data=="AL")
            {
             //alert(data);
             $("#Slogin").val('Login')
             $("#error").html("<span style='color:#cc0000'>Error:</span> Already logged in "+data);
            }
            
            
            else
            {
           // alert(data);
             $("#login").val('Login')
             $("#error").html("<span style='color:#cc0000'>Error:</span> Invalid Teamname or Password. ");
            }
            
            
             
            }
            });

            }
            return false;
            });
            


            });
        
