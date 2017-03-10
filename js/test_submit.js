



            $(document).ready(function() {

            $('#submit').click(function()
            {
            var code=$("#codes").val();
              var le =$('.active').attr('round');
              var qno =$('.active').attr('level');
            var dataString = 'code='+code+'&qstnno='+qno+'&level='+le;
            if($.trim(code).length>0)
            {


            $.ajax({
            type: "POST",
            url: "./submit.php",
            data: dataString,
            cache: false,
            beforeSend: function(){ $("#status").val('Evaluating');},
            success: function(data){
            if(data==0)
            {
          //  window.setTimeout(function () {
                 $("#status").val('UNSUCCESSFUL');
            //}, 0001);
            }
            else if(data==1)
            {
                $("#status").val('UNSUCCESSFUL');
            }


            else if(data==2)
            {
                $("#status").val('UNSUCCESSFUL');

            }



            }
            });

            }
            return false;
            });



            });
