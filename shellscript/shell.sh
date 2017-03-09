#echo $1 $2;                #$1 test case directory        $2 exeecutedtest case output directory  $3 program name with directory   
input=$1'/input/';
output=$1'/output/';
out=$2'/output/';
pro=$3;
#echo $input $output $out;
inlist=$(ls $input);
for m in $inlist
do
#echo $pro;
echo "./$pro <$input$m >$out$m";
rm $out$m;
#$pro <$input$m >$out$m & PID=$!;
#sleep 5;
#kill -HUP $PID
timeout 2 $pro <$input$m >$out$m ;
done

