import sys;
import os;


user=sys.argv[1]


directory="/home/vinayak/ENV/USERS/"+user
if not os.path.exists(directory):
    os.makedirs(directory);
for i in range(0,20):
        d=directory+"/"+str(i);
        if not os.path.exists(d):
                os.makedirs(d);
        for j in range(0,20):
                dd=d+"/"+str(j)+"/out";
                if not os.path.exists(dd):
                        os.makedirs(dd);
    
