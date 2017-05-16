<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("include/mysq.php"); //conatins connection information
require_once("include/func.php");
require_once("include/sign2.php");
require_once("include/glob.php");
session_start();
if (!isset($conn))
    die("Unable to connect to mysql"); //checks whether connection is possible
else {
    $retval = mysqli_query($conn, "select status from pagecontrol where page='test'");
    if (!$retval) {
        die('ERROR:' . $retval->errorno);
    }
    if (mysqli_num_rows($retval) == 1) { //TODO also check if team is blocked
        $row = mysqli_fetch_assoc($retval);
        if ($row['status'] == 0 && isset($_POST['OK']) && isset($_SESSION['teamid'])) {
            
            //check wheteherv 
            
            $level = $_POST['level']; // post  should contain level
            $team  = $_SESSION['teamid'];
            $lan   = $_SESSION['lang'];
            
            
            
            
            $retval = mysqli_query($conn, "select status from levels where tlevel=$level");
            if (!$retval) {
                die('ERROR:' . $retval->errorno);
            }
            if (mysqli_num_rows($retval) == 1) {
                $row = mysqli_fetch_assoc($retval);
                
                if ($row['status'] == 0)
                    die("ERR:123");
                
                else if ($row['status'] == 1) { //just to be extra sure
                    
                    
                    $retval = mysqli_query($conn, "select startt from levelstart where tlevel=$level and teamid=$team");
                    if (!$retval) {
                        die('ERROR:' . $retval->errorno); //TODO redirection
                    }
                    
                    if (mysqli_num_rows($retval) == 1) { // already started
                        //$row = mysqli_fetch_assoc($retval);                         //we have nothing to do here(NOW)
                    } else {
                        $tim = time();
                        
                        
                        $retval = mysqli_query($conn, "insert into levelstart(tlevel,teamid,startt) values($level,$team,$tim)");
                        if (!$retval) {
                            die('ERROR:' . $retval->errorno);
                        }
                        
                    }
                    
                    
                    //TODO add the team to levelstart table
                    
                    
                    echo '<!DOCTYPE html>
<html>
<head>
<title>Conjura 17</title>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="National Level Techno Cultural Fest of T.K.M College of Engineering,kollam, kerala">
<meta name="keywords" content="Conjura,Techno Cultural Fest,National Level Techno Cultural Fest,TKM,The Great Legacy">
<meta name="google-site-verification" content="6m27UpS8AbU9FEpqJ7tHcmh8Y-EX_kj4epIcMcsEn5w" />
<meta name="HandheldFriendly" content="true">
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/scrollBar.css">
</head>
<body style="background-color: #fefefe;height: 100%;" class="style-" onload="pageStyle()">
  <header class="z-depth-1" style="background-color: #00796b;margin:0px;">
    <div class="conjuraLogo">
      <img class="logoSrc1" style="width: 150px;margin: 10px;" src="elements/logo.svg">
      <img class="logoSrc2" style="width: 210px;margin: 25px;display:none;" src="elements/logoName.svg">
    </div>
    <div class="codeFortressTimer">
      <div class="CodeFortressTitle">
        <h3 style="color:#fff;padding: 20px 0px;"><span style="font-weight:600;">CODE</span> FORTRESS</h3>
      </div>
      <div class="timerPart" style="text-align:right;margin-top:20px;color:#fff;">
        <p style="margin:0px;">TIME LEFT</p>
        <h3 style="margin:0px;" id="timee">01:00:00</h3>
      </div>
    </div>
  </header>
  <div class="OtherSection" style="margin-bottom:0px;">
    <div class="routeMap" style="padding: 10px 0px;">
      <h5 style="font-size: 25px;color: #616161;padding-left: 30px;">ROUTE MAP</h5>
      <hr style="border: 0px solid #eee;border-bottom: 1px solid #E0E0E0;">
      <ul class="topUl" style="padding-left: 30px;">
        <div class="bar">
        ';
                    echo '<a href="#"><li class="topli">LEVEL:' . $level . '</li></a>';
                    
                    $qry  = "select count(*) from questions where tlevel=1 and lang='$lan'";
                    //echo $qry;
                    $ret4 = mysqli_query($conn, $qry);
                    
                    //echo $qry;
                    if (!$ret4)
                        die("ERR:133"); //TODO replace dir with redirection or error page possible problem here
                    
                    if (mysqli_num_rows($ret4) == 1) { //gets start time for that event
                        
                        $row    = mysqli_fetch_assoc($ret4);
                        $count  = $row['count(*)'];
                        $m      = 0;
                        $active = "active";
                        for ($m = 1; $m <= $count; $m++) {
                            echo '<a href="#"><li class="bottomli ' . $active . '" level="' . $m . '" round="' . $level . '" attr=>Question no : ' . $m . '</li></a>';
                            $active = "";
                            
                        }
                        
                    }
                    
                    else
                        die("ERR:142");
                    
                    
                    
                    
                    
                } else
                    die("ERR:54");
                
                
            } else
                die("ERR:654");
            
            
            
        } else {
            header("Location :./rules.html");
            die("<script type=\"text/javascript\">
    
    
              window.location = './rules.html';
    
    
</script>");
        }
    } else
        die("ERR:146"); //TODO add redirect here
    
    
}

?>



</div>
      </ul>
    </div>
    <div class="contentBar" style="margin-bottom:0px;padding: 0px;">
      <div class="QnAnswer" style="border-right:1px solid #bdbdbd;border-left:1px solid #bdbdbd;padding: 15px;">



      <div class="codeHere">


<div class="span-sm-11 hr_tour-problem-statement problem-statement">
            <div class="content-text challenge-text mlB">
                <div class="challenge_problem_statement"><div class="msB challenge_problem_statement_body"><div class="hackdown-content"><style id="MathJax_SVG_styles">.MathJax_SVG_Display {text-align: center; margin: 1em 0em; position: relative; display: block!important; text-indent: 0; max-width: none; max-height: none; min-width: 0; min-height: 0; width: 100%}
.MathJax_SVG .MJX-monospace {font-family: monospace}
.MathJax_SVG .MJX-sans-serif {font-family: sans-serif}
.MathJax_SVG {display: inline; font-style: normal; font-weight: normal; line-height: normal; font-size: 100%; font-size-adjust: none; text-indent: 0; text-align: left; text-transform: none; letter-spacing: normal; word-spacing: normal; word-wrap: normal; white-space: nowrap; float: none; direction: ltr; max-width: none; max-height: none; min-width: 0; min-height: 0; border: 0; padding: 0; margin: 0}
.MathJax_SVG * {transition: none; -webkit-transition: none; -moz-transition: none; -ms-transition: none; -o-transition: none}
.mjx-svg-href {fill: blue; stroke: blue}
</style><svg style="display: none;"><defs id="MathJax_SVG_glyphs"></defs></svg><p>Given an array of <span style="font-size: 100%; display: inline-block;" class="MathJax_SVG" id="MathJax-Element-1-Frame"><svg xmlns:xlink="http://www.w3.org/1999/xlink" width="2.064ex" height="2.176ex" style="vertical-align: -0.338ex;" viewBox="0 -791.3 888.5 936.9" role="img" focusable="false"><g stroke="currentColor" fill="currentColor" stroke-width="0" transform="matrix(1 0 0 -1 0 0)"><path stroke-width="1" d="M234 637Q231 637 226 637Q201 637 196 638T191 649Q191 676 202 682Q204 683 299 683Q376 683 387 683T401 677Q612 181 616 168L670 381Q723 592 723 606Q723 633 659 637Q635 637 635 648Q635 650 637 660Q641 676 643 679T653 683Q656 683 684 682T767 680Q817 680 843 681T873 682Q888 682 888 672Q888 650 880 642Q878 637 858 637Q787 633 769 597L620 7Q618 0 599 0Q585 0 582 2Q579 5 453 305L326 604L261 344Q196 88 196 79Q201 46 268 46H278Q284 41 284 38T282 19Q278 6 272 0H259Q228 2 151 2Q123 2 100 2T63 2T46 1Q31 1 31 10Q31 14 34 26T39 40Q41 46 62 46Q130 49 150 85Q154 91 221 362L289 634Q287 635 234 637Z"></path></g></svg></span> integers, can you find the sum of its elements?</p></div></div></div><div class="challenge_input_format"><div class="msB challenge_input_format_title"><p><strong>Input Format</strong></p></div><div class="msB challenge_input_format_body"><div class="hackdown-content"><style id="MathJax_SVG_styles">.MathJax_SVG_Display {text-align: center; margin: 1em 0em; position: relative; display: block!important; text-indent: 0; max-width: none; max-height: none; min-width: 0; min-height: 0; width: 100%}
.MathJax_SVG .MJX-monospace {font-family: monospace}
.MathJax_SVG .MJX-sans-serif {font-family: sans-serif}
.MathJax_SVG {display: inline; font-style: normal; font-weight: normal; line-height: normal; font-size: 100%; font-size-adjust: none; text-indent: 0; text-align: left; text-transform: none; letter-spacing: normal; word-spacing: normal; word-wrap: normal; white-space: nowrap; float: none; direction: ltr; max-width: none; max-height: none; min-width: 0; min-height: 0; border: 0; padding: 0; margin: 0}
.MathJax_SVG * {transition: none; -webkit-transition: none; -moz-transition: none; -ms-transition: none; -o-transition: none}
.mjx-svg-href {fill: blue; stroke: blue}
</style><svg style="display: none;"><defs id="MathJax_SVG_glyphs"></defs></svg><p>The first line contains an integer, <span style="font-size: 100%; display: inline-block;" class="MathJax_SVG" id="MathJax-Element-1-Frame"><svg xmlns:xlink="http://www.w3.org/1999/xlink" width="2.064ex" height="2.176ex" style="vertical-align: -0.338ex;" viewBox="0 -791.3 888.5 936.9" role="img" focusable="false"><g stroke="currentColor" fill="currentColor" stroke-width="0" transform="matrix(1 0 0 -1 0 0)"><path stroke-width="1" d="M234 637Q231 637 226 637Q201 637 196 638T191 649Q191 676 202 682Q204 683 299 683Q376 683 387 683T401 677Q612 181 616 168L670 381Q723 592 723 606Q723 633 659 637Q635 637 635 648Q635 650 637 660Q641 676 643 679T653 683Q656 683 684 682T767 680Q817 680 843 681T873 682Q888 682 888 672Q888 650 880 642Q878 637 858 637Q787 633 769 597L620 7Q618 0 599 0Q585 0 582 2Q579 5 453 305L326 604L261 344Q196 88 196 79Q201 46 268 46H278Q284 41 284 38T282 19Q278 6 272 0H259Q228 2 151 2Q123 2 100 2T63 2T46 1Q31 1 31 10Q31 14 34 26T39 40Q41 46 62 46Q130 49 150 85Q154 91 221 362L289 634Q287 635 234 637Z"></path></g></svg></span>, denoting the size of the array. <br>
The second line contains <span style="font-size: 100%; display: inline-block;" class="MathJax_SVG" id="MathJax-Element-2-Frame"><svg xmlns:xlink="http://www.w3.org/1999/xlink" width="2.064ex" height="2.176ex" style="vertical-align: -0.338ex;" viewBox="0 -791.3 888.5 936.9" role="img" focusable="false"><g stroke="currentColor" fill="currentColor" stroke-width="0" transform="matrix(1 0 0 -1 0 0)"><path stroke-width="1" d="M234 637Q231 637 226 637Q201 637 196 638T191 649Q191 676 202 682Q204 683 299 683Q376 683 387 683T401 677Q612 181 616 168L670 381Q723 592 723 606Q723 633 659 637Q635 637 635 648Q635 650 637 660Q641 676 643 679T653 683Q656 683 684 682T767 680Q817 680 843 681T873 682Q888 682 888 672Q888 650 880 642Q878 637 858 637Q787 633 769 597L620 7Q618 0 599 0Q585 0 582 2Q579 5 453 305L326 604L261 344Q196 88 196 79Q201 46 268 46H278Q284 41 284 38T282 19Q278 6 272 0H259Q228 2 151 2Q123 2 100 2T63 2T46 1Q31 1 31 10Q31 14 34 26T39 40Q41 46 62 46Q130 49 150 85Q154 91 221 362L289 634Q287 635 234 637Z"></path></g></svg></span> space-separated integers representing the array's elements.  </p></div></div></div><div class="challenge_output_format"><div class="msB challenge_output_format_title"><p><strong>Output Format</strong></p></div><div class="msB challenge_output_format_body"><div class="hackdown-content"><style id="MathJax_SVG_styles">.MathJax_SVG_Display {text-align: center; margin: 1em 0em; position: relative; display: block!important; text-indent: 0; max-width: none; max-height: none; min-width: 0; min-height: 0; width: 100%}
.MathJax_SVG .MJX-monospace {font-family: monospace}
.MathJax_SVG .MJX-sans-serif {font-family: sans-serif}
.MathJax_SVG {display: inline; font-style: normal; font-weight: normal; line-height: normal; font-size: 100%; font-size-adjust: none; text-indent: 0; text-align: left; text-transform: none; letter-spacing: normal; word-spacing: normal; word-wrap: normal; white-space: nowrap; float: none; direction: ltr; max-width: none; max-height: none; min-width: 0; min-height: 0; border: 0; padding: 0; margin: 0}
.MathJax_SVG * {transition: none; -webkit-transition: none; -moz-transition: none; -ms-transition: none; -o-transition: none}
.mjx-svg-href {fill: blue; stroke: blue}
</style><svg style="display: none;"><defs id="MathJax_SVG_glyphs"></defs></svg><p>Print the sum of the array's elements as a single integer.  </p></div></div></div><div class="challenge_sample_input"><div class="msB challenge_sample_input_title"><p><strong>Sample Input</strong></p></div><div class="msB challenge_sample_input_body"><div class="hackdown-content"><style id="MathJax_SVG_styles">.MathJax_SVG_Display {text-align: center; margin: 1em 0em; position: relative; display: block!important; text-indent: 0; max-width: none; max-height: none; min-width: 0; min-height: 0; width: 100%}
.MathJax_SVG .MJX-monospace {font-family: monospace}
.MathJax_SVG .MJX-sans-serif {font-family: sans-serif}
.MathJax_SVG {display: inline; font-style: normal; font-weight: normal; line-height: normal; font-size: 100%; font-size-adjust: none; text-indent: 0; text-align: left; text-transform: none; letter-spacing: normal; word-spacing: normal; word-wrap: normal; white-space: nowrap; float: none; direction: ltr; max-width: none; max-height: none; min-width: 0; min-height: 0; border: 0; padding: 0; margin: 0}
.MathJax_SVG * {transition: none; -webkit-transition: none; -moz-transition: none; -ms-transition: none; -o-transition: none}
.mjx-svg-href {fill: blue; stroke: blue}
</style><svg style="display: none;"><defs id="MathJax_SVG_glyphs"></defs></svg><pre><code>6
1 2 3 4 10 11
</code></pre></div></div></div><div class="challenge_sample_output"><div class="msB challenge_sample_output_title"><p><strong>Sample Output</strong></p></div><div class="msB challenge_sample_output_body"><div class="hackdown-content"><style id="MathJax_SVG_styles">.MathJax_SVG_Display {text-align: center; margin: 1em 0em; position: relative; display: block!important; text-indent: 0; max-width: none; max-height: none; min-width: 0; min-height: 0; width: 100%}
.MathJax_SVG .MJX-monospace {font-family: monospace}
.MathJax_SVG .MJX-sans-serif {font-family: sans-serif}
.MathJax_SVG {display: inline; font-style: normal; font-weight: normal; line-height: normal; font-size: 100%; font-size-adjust: none; text-indent: 0; text-align: left; text-transform: none; letter-spacing: normal; word-spacing: normal; word-wrap: normal; white-space: nowrap; float: none; direction: ltr; max-width: none; max-height: none; min-width: 0; min-height: 0; border: 0; padding: 0; margin: 0}
.MathJax_SVG * {transition: none; -webkit-transition: none; -moz-transition: none; -ms-transition: none; -o-transition: none}
.mjx-svg-href {fill: blue; stroke: blue}
</style><svg style="display: none;"><defs id="MathJax_SVG_glyphs"></defs></svg><pre><code>31
</code></pre></div></div></div><div class="challenge_explanation"><div class="msB challenge_explanation_title"><p><strong>Explanation</strong></p></div><div class="msB challenge_explanation_body"><div class="hackdown-content"><style id="MathJax_SVG_styles">.MathJax_SVG_Display {text-align: center; margin: 1em 0em; position: relative; display: block!important; text-indent: 0; max-width: none; max-height: none; min-width: 0; min-height: 0; width: 100%}
.MathJax_SVG .MJX-monospace {font-family: monospace}
.MathJax_SVG .MJX-sans-serif {font-family: sans-serif}
.MathJax_SVG {display: inline; font-style: normal; font-weight: normal; line-height: normal; font-size: 100%; font-size-adjust: none; text-indent: 0; text-align: left; text-transform: none; letter-spacing: normal; word-spacing: normal; word-wrap: normal; white-space: nowrap; float: none; direction: ltr; max-width: none; max-height: none; min-width: 0; min-height: 0; border: 0; padding: 0; margin: 0}
.MathJax_SVG * {transition: none; -webkit-transition: none; -moz-transition: none; -ms-transition: none; -o-transition: none}
.mjx-svg-href {fill: blue; stroke: blue}
</style><svg style="display: none;"><defs id="MathJax_SVG_glyphs"></defs></svg><p>We print the sum of the array's elements, which is: <span style="font-size: 100%; display: inline-block;" class="MathJax_SVG" id="MathJax-Element-1-Frame"><svg xmlns:xlink="http://www.w3.org/1999/xlink" width="28.925ex" height="2.343ex" style="vertical-align: -0.505ex;" viewBox="0 -791.3 12453.8 1008.6" role="img" focusable="false"><g stroke="currentColor" fill="currentColor" stroke-width="0" transform="matrix(1 0 0 -1 0 0)"><path stroke-width="1" d="M213 578L200 573Q186 568 160 563T102 556H83V602H102Q149 604 189 617T245 641T273 663Q275 666 285 666Q294 666 302 660V361L303 61Q310 54 315 52T339 48T401 46H427V0H416Q395 3 257 3Q121 3 100 0H88V46H114Q136 46 152 46T177 47T193 50T201 52T207 57T213 61V578Z"></path><g transform="translate(722,0)"><path stroke-width="1" d="M56 237T56 250T70 270H369V420L370 570Q380 583 389 583Q402 583 409 568V270H707Q722 262 722 250T707 230H409V-68Q401 -82 391 -82H389H387Q375 -82 369 -68V230H70Q56 237 56 250Z"></path></g><g transform="translate(1723,0)"><path stroke-width="1" d="M109 429Q82 429 66 447T50 491Q50 562 103 614T235 666Q326 666 387 610T449 465Q449 422 429 383T381 315T301 241Q265 210 201 149L142 93L218 92Q375 92 385 97Q392 99 409 186V189H449V186Q448 183 436 95T421 3V0H50V19V31Q50 38 56 46T86 81Q115 113 136 137Q145 147 170 174T204 211T233 244T261 278T284 308T305 340T320 369T333 401T340 431T343 464Q343 527 309 573T212 619Q179 619 154 602T119 569T109 550Q109 549 114 549Q132 549 151 535T170 489Q170 464 154 447T109 429Z"></path></g><g transform="translate(2446,0)"><path stroke-width="1" d="M56 237T56 250T70 270H369V420L370 570Q380 583 389 583Q402 583 409 568V270H707Q722 262 722 250T707 230H409V-68Q401 -82 391 -82H389H387Q375 -82 369 -68V230H70Q56 237 56 250Z"></path></g><g transform="translate(3446,0)"><path stroke-width="1" d="M127 463Q100 463 85 480T69 524Q69 579 117 622T233 665Q268 665 277 664Q351 652 390 611T430 522Q430 470 396 421T302 350L299 348Q299 347 308 345T337 336T375 315Q457 262 457 175Q457 96 395 37T238 -22Q158 -22 100 21T42 130Q42 158 60 175T105 193Q133 193 151 175T169 130Q169 119 166 110T159 94T148 82T136 74T126 70T118 67L114 66Q165 21 238 21Q293 21 321 74Q338 107 338 175V195Q338 290 274 322Q259 328 213 329L171 330L168 332Q166 335 166 348Q166 366 174 366Q202 366 232 371Q266 376 294 413T322 525V533Q322 590 287 612Q265 626 240 626Q208 626 181 615T143 592T132 580H135Q138 579 143 578T153 573T165 566T175 555T183 540T186 520Q186 498 172 481T127 463Z"></path></g><g transform="translate(4169,0)"><path stroke-width="1" d="M56 237T56 250T70 270H369V420L370 570Q380 583 389 583Q402 583 409 568V270H707Q722 262 722 250T707 230H409V-68Q401 -82 391 -82H389H387Q375 -82 369 -68V230H70Q56 237 56 250Z"></path></g><g transform="translate(5170,0)"><path stroke-width="1" d="M462 0Q444 3 333 3Q217 3 199 0H190V46H221Q241 46 248 46T265 48T279 53T286 61Q287 63 287 115V165H28V211L179 442Q332 674 334 675Q336 677 355 677H373L379 671V211H471V165H379V114Q379 73 379 66T385 54Q393 47 442 46H471V0H462ZM293 211V545L74 212L183 211H293Z"></path></g><g transform="translate(5893,0)"><path stroke-width="1" d="M56 237T56 250T70 270H369V420L370 570Q380 583 389 583Q402 583 409 568V270H707Q722 262 722 250T707 230H409V-68Q401 -82 391 -82H389H387Q375 -82 369 -68V230H70Q56 237 56 250Z"></path></g><g transform="translate(6893,0)"><path stroke-width="1" d="M213 578L200 573Q186 568 160 563T102 556H83V602H102Q149 604 189 617T245 641T273 663Q275 666 285 666Q294 666 302 660V361L303 61Q310 54 315 52T339 48T401 46H427V0H416Q395 3 257 3Q121 3 100 0H88V46H114Q136 46 152 46T177 47T193 50T201 52T207 57T213 61V578Z"></path><path stroke-width="1" d="M96 585Q152 666 249 666Q297 666 345 640T423 548Q460 465 460 320Q460 165 417 83Q397 41 362 16T301 -15T250 -22Q224 -22 198 -16T137 16T82 83Q39 165 39 320Q39 494 96 585ZM321 597Q291 629 250 629Q208 629 178 597Q153 571 145 525T137 333Q137 175 145 125T181 46Q209 16 250 16Q290 16 318 46Q347 76 354 130T362 333Q362 478 354 524T321 597Z" transform="translate(500,0)"></path></g><g transform="translate(8117,0)"><path stroke-width="1" d="M56 237T56 250T70 270H369V420L370 570Q380 583 389 583Q402 583 409 568V270H707Q722 262 722 250T707 230H409V-68Q401 -82 391 -82H389H387Q375 -82 369 -68V230H70Q56 237 56 250Z"></path></g><g transform="translate(9117,0)"><path stroke-width="1" d="M213 578L200 573Q186 568 160 563T102 556H83V602H102Q149 604 189 617T245 641T273 663Q275 666 285 666Q294 666 302 660V361L303 61Q310 54 315 52T339 48T401 46H427V0H416Q395 3 257 3Q121 3 100 0H88V46H114Q136 46 152 46T177 47T193 50T201 52T207 57T213 61V578Z"></path><path stroke-width="1" d="M213 578L200 573Q186 568 160 563T102 556H83V602H102Q149 604 189 617T245 641T273 663Q275 666 285 666Q294 666 302 660V361L303 61Q310 54 315 52T339 48T401 46H427V0H416Q395 3 257 3Q121 3 100 0H88V46H114Q136 46 152 46T177 47T193 50T201 52T207 57T213 61V578Z" transform="translate(500,0)"></path></g><g transform="translate(10396,0)"><path stroke-width="1" d="M56 347Q56 360 70 367H707Q722 359 722 347Q722 336 708 328L390 327H72Q56 332 56 347ZM56 153Q56 168 72 173H708Q722 163 722 153Q722 140 707 133H70Q56 140 56 153Z"></path></g><g transform="translate(11452,0)"><path stroke-width="1" d="M127 463Q100 463 85 480T69 524Q69 579 117 622T233 665Q268 665 277 664Q351 652 390 611T430 522Q430 470 396 421T302 350L299 348Q299 347 308 345T337 336T375 315Q457 262 457 175Q457 96 395 37T238 -22Q158 -22 100 21T42 130Q42 158 60 175T105 193Q133 193 151 175T169 130Q169 119 166 110T159 94T148 82T136 74T126 70T118 67L114 66Q165 21 238 21Q293 21 321 74Q338 107 338 175V195Q338 290 274 322Q259 328 213 329L171 330L168 332Q166 335 166 348Q166 366 174 366Q202 366 232 371Q266 376 294 413T322 525V533Q322 590 287 612Q265 626 240 626Q208 626 181 615T143 592T132 580H135Q138 579 143 578T153 573T165 566T175 555T183 540T186 520Q186 498 172 481T127 463Z"></path><path stroke-width="1" d="M213 578L200 573Q186 568 160 563T102 556H83V602H102Q149 604 189 617T245 641T273 663Q275 666 285 666Q294 666 302 660V361L303 61Q310 54 315 52T339 48T401 46H427V0H416Q395 3 257 3Q121 3 100 0H88V46H114Q136 46 152 46T177 47T193 50T201 52T207 57T213 61V578Z" transform="translate(500,0)"></path></g></g></svg></span>.</p></div></div></div>
            </div>
        </div>




      </div>



        <div>
          <textarea id = "codes" rows="10" style="max-width: 100%;height: 430px;max-height: 430px;margin: 0px;"></textarea>
        </div>
      </div>
      <div class="rigSideBar center-align" style="padding: 15px 10px;">
        <a id="reset" class="waves-effect waves-light btn red" style="width:48%;padding:0px;">RESET</a>
        <a id = "submit" class="waves-effect waves-light btn green" style="width:48%;padding:0px;">SUBMIT</a>
    <p id="demo" style="display = null" attribute="code"></p>
       <div id="status" class="well">UNSUCCESSFUL</div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/test_submit.js"></script>
  <script type="text/javascript">
    function pageStyle() {
      if($(document).scrollTop() >= 50) {
        $('.logoSrc1').css('display', 'none');
        $('.logoSrc2').css('display', 'block');
      }else if($(document).scrollTop() < 50) {
        $('.logoSrc2').css('display', 'none');
        $('.logoSrc1').css('display', 'block');
      };
      if($(document).scrollTop() >= 0 && $(document).scrollTop() <= 70) {
        var h = 150 - $(document).scrollTop();
        var c = -$(document).scrollTop()/3;
        $('header').css('height', h);
        $('.CodeFortressTitle').css({
          'position': 'fixed',
          'top': c + 'px'
        });
        $('.routeMap').css({
          'position': 'relative',
          'top': '0px'
        });
        $('.rigSideBar').css({
          'position': 'relative',
          'top': '0px',
          'right': '0px',
          'width': '25%'
        });
        $('.contentBar').css({
          'margin-left': '0%'
        });
      }else {
        $('header').css('height', '80px');
        $('.CodeFortressTitle').css({
          'position': 'fixed',
          'top': '-22.33333px'
        });
        $('.routeMap').css({
          'position': 'fixed',
          'top': '80px'
        });
        $('.contentBar').css({
          'margin-left': '25%'
        });
        $('.rigSideBar').css({
          'position': 'fixed',
          'top': '80px',
          'right': '0px',
          'width': '18.5%'
        });
      }
    }
    $(document).scroll(function() {
     pageStyle();
    });
    $('.bottomli').click(function() {
      $('.active').removeClass('active');
      $(this).addClass('active');
    })
  </script>
</body>
</html>
