<?php 
$testcase="/home/vinayak/ENV";    //directory where the test cases are present
/*

The above directory should contain a folder for each level.
And sub folder for each question in that level.
Example is given below


*/ 
$userd="/home/vinayak/ENV/USERS";  //directory where the user details are to be stored
$signscript="/home/vinayak/Debugger/out/Code-fortress/python/py.py";  //location of the python code
$runscript="/home/vinayak/Debugger/out/Code-fortress/shellscript/shell.sh";         //location of the first shell script
$runscript2="/home/vinayak/Debugger/out/Code-fortress/shellscript/shell2.sh";       //location of the second shell script


/*

testcase Directory
├── 1                    // Folder for first level
│   ├── 1                //Folder for first questions
│   │   ├── input       //folder for input test cse
│   │   │   ├── fil1.txt   //input test case
│   │   │   ├── fil2.txt
│   │   │   ├── fil3.txt
│   │   │   └── fil4.txt
│   │   ├── output
│   │   │   ├── fil1.txt    //output test case
│   │   │   ├── fil1.txt~
│   │   │   ├── fil2.txt
│   │   │   ├── fil3.txt
│   │   │   ├── fil4.txt
│   │   │   └── fil4.txt~
│   │   └── tcode.txt
│   ├── 2                 //second questions
│   │   ├── input        //folder for input files
│   │   │   ├── fil1.txt
│   │   │   ├── fil2.txt
│   │   │   ├── fil3.txt
│   │   │   └── fil4.txt 
│   │   ├── output
│   │   │   ├── fil1.txt //output test case
│   │   │   ├── fil2.txt
│   │   │   ├── fil3.txt
│   │   │   └── fil4.txt
│   │   └── tcode.txt
│   ├── 3
│   │   ├── input
│   │   │   ├── file1.txt
│   │   │   ├── file2.txt
│   │   │   ├── file3.txt
│   │   │   ├── file4.txt
│   │   │   ├── file5.txt
│   │   │   ├── file6.txt
│   │   │   └── file7.txt
│   │   ├── output
│   │   │   ├── file1.txt
│   │   │   ├── file2.txt
│   │   │   ├── file3.txt
│   │   │   ├── file4.txt
│   │   │   ├── file5.txt
│   │   │   ├── file6.txt
│   │   │   └── file7.txt
│   │   └── tcode.txt
│   ├── 4
│   │   ├── input
│   │   │   └── fil2.txt
│   │   ├── output
│   │   │   └── fil2.txt
│   │   └── tcode.txt
│   ├── 5
│   │   ├── input
│   │   │   └── fil1.txt
│   │   ├── new2.c
│   │   ├── new2.cpp
│   │   ├── output
│   │   │   └── fil1.txt
│   │   ├── qst.html
│   │   └── tcode.txt
│   ├── 6
│   │   ├── input
│   │   │   └── fil.txt
│   │   ├── output
│   │   │   └── fil.txt
│   │   └── tcode.txt
│   └── 7
│       ├── input
│       │   └── fil.txt
│       ├── output
│       │   └── fil.txt
│       └── tcode.txt
├── 2                                    //
│   ├── 1
│   │   ├── input
│   │   │   └── input00.txt
│   │   ├── output
│   │   │   ├── input00.txt
│   │   │   
│   │   └── tcode.txt
│   ├── 2
│   │   ├── input
│   │   │   ├── input09.txt
│   │   │   ├── input10.txt
│   │   │   └── input11.txt
│   │   ├── output
│   │   │   ├── input09.txt
│   │   │   ├── input10.txt
│   │   │   └── input11.txt
│   │   └── tcode.txt
│   ├── 3
│   │   ├── input
│   │   │   ├── input00.txt
│   │   │   ├── input02.txt
│   │   │   ├── input06.txt
│   │   │   └── input07.txt
│   │   ├── output
│   │   │   ├── input00.txt
│   │   │   ├── input02.txt
│   │   │   ├── input06.txt
│   │   │   └── input07.txt
│   │   └── tcode.txt
│   ├── 4
│   │   ├── input
│   │   │   ├── input03.txt
│   │   │   ├── input09.txt
│   │   │   ├── input13.txt
│   │   │   └── input14.txt
│   │   ├── output
│   │   │   ├── input03.txt
│   │   │   ├── input09.txt
│   │   │   ├── input13.txt
│   │   │   └── input14.txt
│   │   └── tcode.txt
│   ├── 5
│   │   ├── input
│   │   │   ├── input00.txt
│   │   │   ├── input01.txt
│   │   │   └── input02.txt
│   │   ├── output
│   │   │   ├── input00.txt
│   │   │   ├── input01.txt
│   │   │   └── input02.txt
│   │   └── tcode.txt
│   ├── 6
│   │   ├── input
│   │   │   ├── fil2.txt
│   │   │   ├── fil3.txt
│   │   │   ├── fil4.txt
│   │   │   ├── fil5.txt
│   │   │   ├── fil6.txt
│   │   │   └── fil.txt
│   │   ├── output
│   │   │   ├── fil2.txt
│   │   │   ├── fil3.txt
│   │   │   ├── fil4.txt
│   │   │   ├── fil5.txt
│   │   │   ├── fil6.txt
│   │   │   └── fil.txt
│   │   ├── q.cpp
│   │   └── tcode.txt
│   ├── 7
│   │   ├── input
│   │   │   ├── input05.txt
│   │   │   ├── input07.txt
│   │   │   ├── input08.txt
│   │   │   └── input10.txt
│   │   ├── output
│   │   │   ├── input05.txt
│   │   │   ├── input07.txt
│   │   │   ├── input08.txt
│   │   │   └── input10.txt
│   │   ├── pgm.txt
│   │   └── tcode.txt
│   ├── 8
│   │   ├── input
│   │   │   ├── input02.txt
│   │   │   ├── input03.txt
│   │   │   ├── input05.txt
│   │   │   └── input06.txt
│   │   ├── output
│   │   │   ├── input02.txt
│   │   │   ├── input03.txt
│   │   │   ├── input05.txt
│   │   │   └── input06.txt
│   │   ├── pgm.txt
│   │   └── tcode.txt
│   └── 9
│       ├── input
│       ├── output
│       ├── pgm.txt
│       ├── qst.txt
│       └── qst.txt~
└── t.txt

 */
?>


