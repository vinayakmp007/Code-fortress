#echo $1 $2;                #$1 test case output directory        $2 exeecutedtest case output directory  
input=$1'/input/';
output=$1'/output/';
out=$2'/output/';
a=0;
b=0;
#pro=$3;
#echo $input $output $out;
inlist=$(ls $output);
for m in $inlist
do
#echo "pro";
a=($(diff   -N  "$output$m" "$out$ma" | grep '^<' | wc -l ))   #take this code to compare check wheuther to ignore the space
let b+=$a;
done
echo $b;
