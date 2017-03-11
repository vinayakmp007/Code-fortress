


               var sub=0;
               var time=0010;
            $(document).ready(function() {
            gettime();
            $('#submit').click(function()
            {
            //timer();
            if(sub==1)return;
            sub=1;
            var code=$("#codes").val();
            //alert(code);
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
            beforeSend: function(){ $("#status").html('Evaluating'); },
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


                sub=0;
            }
            });

            }
            return false;
            });


            timer();
            });
            
            
            function gettime(){
            var le =$('.active').attr('round');
            var dat=jQuery.param({ level:le, OK : "OK"});
            $.ajax({
            type: "POST",
            url: "./timget.php",
            data: dat,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            cache: false,
            beforeSend: function(){  },
            success: function(data){
            //alert(data);
            time=data;
            }
            });
            
            
            
            
            }
            
            function timer() {
            var sec_num = time;
            //alert("time");
            var hours = Math.floor(sec_num / 3600);
            var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
            var seconds = sec_num - (hours * 3600) - (minutes * 60);
            if (hours == 0) {
                if (minutes == 0)
                    $('#timee').html("" + seconds + "s");
                else
                    $('#timee').html("" + minutes + "m " + seconds + "s");
            } else
                $('#timee').html("" + hours + "h " + minutes + "m " + seconds + "s");
            if (time > 0) {
                setTimeout(function () {
                    timer();
                }, 1000);
                time -= 1;
                if (time % 30 == 0) gettime();
            } 
           // else                timer_end(true);                      //putredirecthere
             }
            
            
