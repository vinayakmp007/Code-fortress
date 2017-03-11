


        


            function clicksin() {
                var username=$("#teamname1").val();
                var password=$("#password1").val();
                var submit="submit1";
                var dataString = 'teamname='+username+'&password='+password+'&submit='+submit;
                if($.trim(username).length>0 && $.trim(password).length>0) {
                    $.ajax({
                        type: "POST",
                        url: "./loging.php",
                        data: dataString,
                        cache: false,
                        beforeSend: function() {
                        },
                        success: function(data) {
                                if(data=="YES") {
                                }else if(data=="AL") {
                                        alert("User already logged in");
                                }else if(data=="NO") {
                                        alert("Invalid user, please sign up");
                                }else {
                                }
                        }
                   });
               return ;
               }
               return false;
           }

        
