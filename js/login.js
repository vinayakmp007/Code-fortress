


        
                $('#submit1').click(clicksin());

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
                                
                                window.location = './rules.html';
                                }else if(data=="AL") {
                                        alert("A user has already logged in please signout and login again");
                                }else if(data=="NO") {
                                        alert("Invalid user, please sign up");
                                }else {
                                alert("Try again");
                                }
                        }
                   });
               return false;
               }
               return false;
           }

        
