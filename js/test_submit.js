



            $(document).ready(function() {
            $('#submit').click(function()
            {
            var code=$("#codes").val();
            alert(code);
              var le =$('.active').attr('round');
              var qno =$('.active').attr('level');
            var timea = 0;
            var ok = 'OK';
            var dataString ='code='+code+'&OK='+ok+'&qstnno='+qno+'&level='+le+'&time='+timea;
            var dat=jQuery.param({ code: code, OK : "OK",qstnno:qno,level:le,time:timea});
            if($.trim(code).length>0)
            {


            $.ajax({
            type: "POST",
            url: "./submit.php",
            data: dat,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            cache: false,
            beforeSend: function(){ $("#status").html('Evaluating');},
            success: function(data){
            if(data==0)
            {
          //  window.setTimeout(function () {
                 $("#status").html('UNSUCCESSFUL');
            //}, 0001);
            }
            else if(data==1)
            {
                $("#status").html('UNSUCCESSFUL');
            }


            else if(data==2)
            {
                $("#status").html('SUCCESSFUL');

            }
            else if(data==10)
            {
                $("#status").html('PASSED');

            }
            
            else {
             $("#status").html('ERROR='+data);

            }



            }
            });

            }
            return false;
            });



            });
