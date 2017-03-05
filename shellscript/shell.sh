#echo $1 $2;                #$1 test case directory        $2 exeecutedtest case output directory  $3 program name with directory   
input=$1'/input/';
output=$1'/output/';
out=$2'/out/';
pro=$3;
#echo $input $output $out;
inlist=$(ls $input);
for m in $inlist
do
#echo $pro;
echo "./$pro <$input$m >$out$m";
#rm $out$m;
#./$pro <$input$m >$out$m & PID=$!;
#sleep 5;
#kill -HUP $PID
done

