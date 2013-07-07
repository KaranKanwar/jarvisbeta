<?php
/* Initialize Brain */
$commandi = $_GET['command'];
$extra = "";
$m = '';
$context = $_GET['context'];
$contextlevel = $_GET['ctlvl'];
$command = strtolower($commandi);
$multi = 0;
$mood = 0;
$gender = $_GET[gender];
if($_GET[gender]=="f"){
    define("address", "mam");
}else{
    define("address", "sir");
}

function keyadd($content, $value){
	global $keyword;
	$key = $keyword[$content];
	$key = $key + $value;
	$keyword[$content] = $key;
    }
    
function keycheck($content, $value){
	global $keyword;
	$key2 = $keyword[$content];
	if ($key2 >= $value){
	    return true;
	}else{
	    return false;
	}
}

function command($string){
    global $command;
    if(strpos($command, $string) !== false){
	return true;
    }else{
	return false;
    }
}

//keyflag
if(command('hi') || command('hello') || command('hey')){
    keyadd('hi',100);
}

if(command('joke') || command('laugh')){
    keyadd('joke', 100);
}

if(command('sad')){
    keyadd('sad', 100);
}

if(command('exams') || command('mocks') || command('baccalaureate')){
    keyadd('exams', 100);
}

if(command('entertain') || command('bored')){
    keyadd('bored', 100);
}

if(command("what's up") || command('wassup')){
    keyadd('wassup', 100);
}


// responses

if(keycheck('hi', 100)){
    $return = "Hello " . address . ".";
}

if(keycheck('joke', 100)){
    $return = "Of course " . address . ". Your life is a perfect example of this.";
}

if(keycheck('sad', 100)){
    $return = "Its okay " . address . ". Stay strong. I am here for you!";
}

if(keycheck('exams', 100)){
    $return = "Its okay. Study hard, and you will succeed.";
    $extra = ":)";
}

if(keycheck('bored', 100)){
    $return = "Yes " . address . ". Watch the first 20 seconds. You will laugh.";
    $extra = '<iframe width="560" height="315" src="http://www.youtube.com/embed/tqDw9HOXaUg" frameborder="0" allowfullscreen></iframe>';

}
if(keycheck('wassup', 100)){
    $return = "Nothing much, being an artificially intelligent, adorable, omnicient robot is awesome. Just chilling, " . address . ".";
    $extra = ":3";
}

//error

if($return == ""){
    $return = "I did not understand, " . address . ".";
    $extra = "What did you mean by '".$command."'?<br><br><a target='_blank' href='http://google.com/search?q=".$command."'>Let me help you</a> or <a target='_blank' href='http://tomedu.org/jarvis/commands.html'>view commands</a>";
}

?>

<!-- OUTPUT -->
<html>
  <head>
<link href='http://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'>
    <script src="speakClient.js"></script><style>a{text-decoration:none;}</style>
  </head>
  <body style="font-family:'Roboto','Gill Sans MT','Calibri','Lucida Grande','Arial';font-size:48px;"><center>
    <body onLoad="speak('<?php if($multi==1){ echo $return[$r]; } else { echo $return; } ?>')"><?php if($multi==1){ echo $return[$r]; } else { echo $return; } ?> <?php echo $extra; ?>
    <div id="audio"></div>
  </body>
</html>