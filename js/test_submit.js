


               var sub=0;
               var time=0010;
            $(document).ready(function() {
            gettime();
            $('#submit').click(function()
            {
            //timer();
            if(sub==1)return;                               //make it more efficent
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
                if (time % 60 == 0) {gettime();sub=0;}
		   if (time % 15 == 0) {syncout();}
		//if(time%10==0) syncin("df");
            } 
           // else                timer_end(true);                      //putredirecthere
             }
            function syncout()
            {
              var code=$("#codes").val();
              var le =$('.active').attr('round');
              var qno =$('.active').attr('level');
              var ok = 'OK';
            //var dataString ='code='+code+'&OK='+ok+'&qstnno='+qno+'&level='+le+'&time='+timea;
            var dat=jQuery.param({ dat: code, OK : "OK",qstnno:qno,level:le});
            if($.trim(code).length>0)
            {


            $.ajax({
            type: "POST",
            url: "./syncin.php",
            data: dat,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            cache: false,
            beforeSend: function(){ /*$("#status").html('Evaluating'); */},
            success: function(data){
 			//alert(data);
			//if(data=="OK") {alert(data);}
            }
            }
		);

            }
            return false;
            }
		
		   function syncin(qst)
            {
              var code=$("#codes").val();
              var le =$('.active').attr('round');
              var qno =$('.active').attr('level');
              var ok = 'OK';
	
            //var dataString ='code='+code+'&OK='+ok+'&qstnno='+qno+'&level='+le+'&time='+timea;
            var dat=jQuery.param({ qstnno:qno,level:le,qry:qst, OK:ok});
            

	    	//alert("syncin scalled");
            $.ajax({
            type: "POST",
            url: "./syncout.php",
            data: dat,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            cache: false,
            beforeSend: function(){ /*$("#status").html('Evaluating'); */},
            success: function(data){
 		
		if(qst=="dt")    {
		      //data values
		  $("#codes").val("");    
		 data=data.trim();
	  $("#codes").val(data);}
		else if(qst=="qs")          //question 
		{$(".codeHere").html(data); }
		
		else if(qst=="df"){          //default values for question
		data=data.trim();
		$("#codes").val(data);
		
		}
            }
            }
		);

            
            return false;
            }
            
            
            $('#reset').click(function()
            {
            //alert("reset");
           syncin("df");                                //can add extra features here
                     
                
            
            });



         $('.bottomli').click(function(){
        syncout();
        var le =$('.active').attr('round');
        var qno =$('.active').attr('level');
        //setTimeout(loadclick,600);
        syncin2("dt",this);
        syncin2("qs",this);
        });


       function loadclick(){                                      //is not called anywhere
      
       var l2=$('.active').attr('round');
       var q2=$('.active').attr('level');
       alert(q2);
       syncin("qs");
       syncin("dt");
        }
        
        
        
        
        
           function syncin2(qst,pa)
            {
              var code=$("#codes").val();
              var le =$(pa).attr('round');
              var qno =$(pa).attr('level');
              var ok = 'OK';
	
            //var dataString ='code='+code+'&OK='+ok+'&qstnno='+qno+'&level='+le+'&time='+timea;
            var dat=jQuery.param({ qstnno:qno,level:le,qry:qst, OK:ok});
            

	    	//alert("syncin scalled");
            $.ajax({
            type: "POST",
            url: "./syncout.php",
            data: dat,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            cache: false,
            beforeSend: function(){ /*$("#status").html('Evaluating'); */},
            success: function(data){
 		
		if(qst=="dt")    {
		      //data values
		  $("#codes").val("");    
		 data=data.trim();
	  $("#codes").val(data);}
		else if(qst=="qs")          //question 
		{$(".codeHere").html(data); }
		
		else if(qst=="df"){          //default values for question
		data=data.trim();
		$("#codes").val(data);
		
		}
            }
            }
		);

            
            return false;
            }
        
       
            
