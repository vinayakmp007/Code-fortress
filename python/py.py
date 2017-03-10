import sys;
import os;


user=sys.argv[1]
directory=sys.argv[2];

directory=directory+"/"+user
if not os.path.exists(directory):
    os.makedirs(directory);
for i in range(1,20):
        d=directory+"/"+str(i);
        if not os.path.exists(d):
                os.makedirs(d);
        for j in range(1,20):
                dd=d+"/"+str(j)+"/output";
                if not os.path.exists(dd):
                        os.makedirs(dd);
    
