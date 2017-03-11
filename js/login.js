


        


            function clicksin()
            {
            var username=$("#teamname1").val();
            var password=$("#password1").val();
            var submit="submit1";
             alert("im in");
            var dataString = 'teamname='+username+'&password='+password+'&submit='+submit;
            if($.trim(username).length>0 && $.trim(password).length>0)
            {


            $.ajax({
            type: "POST",
            url: "./loging.php",
            data: dataString,
            cache: false,
            beforeSend: function(){    alert(dataString);},
            success: function(data){
                //alert(data);
            if(data=="YES")
            {
            alert("yes");
           
            }
            else if(data=="AL")
            {
           //  alert("nao");
             $("#Submit1").val('Login')
             $("#error").html("<span style='color:#cc0000'>Error:</span> Already logged in "+data);
            }
            
            
            else if(data=="NO")
            {
            //alert("no");
             //$("#login").val('Login')
             $("#error").html("<span style='color:#cc0000'>Error:</span> Invalid Teamname or Password. ");
            }
            else {
            alert("here");
            
            }
            
             
            }
            });

            }
            return false;
            }

        
