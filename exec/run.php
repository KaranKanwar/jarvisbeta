<?php
/* Initialize Brain */
$commandi = $_GET['command'];
$extra = "";
$m = 0;
$r = mt_rand(0,4);
$context = $_GET['context'];
$contextlevel = $_GET['ctlvl'];
$command = strtolower($commandi);
$multi = 0;
$mood = 0;
$gender = $_GET[gender];
if($_GET[gender]="f"){
    define("address", "mam");
}else{
    define("address", "sir");
}

/* Jarvis Fun! */
if (strpos($command,'hello') !== false || strpos($command,'hey') !== false || strpos($command,'hi') !== false) {
    $return = array(
"Hello ". address . ". Do you need anything?",
"Hello ". address . ". May I be of any use?",
"Hello sir. Whats up?",
"Hello sir. It is a wonderful day today!",
"Hello sir. Do you need anything?"
);
    $m = 1;
    $multi = 1;
}
if (strpos($command,'joke') !== false || strpos($command,'laugh') !== false) {
        $return = array(
"Of course sir. Your life is a perfect example of this.",
"Of course sir. Hi! I am a human being! What are you?",
"Of course sir. As an outsider, what do you think of the human race?",
"Of course sir. Say this to someone nearby, You are dark and handsome. When its dark, you are is handsome.",
"Of course sir. Your life is a perfect example of this."
);
    $m = 1;
    $multi = 1;
}
if (strpos($command,'sad') !== false || strpos($command,'depress') !== false || strpos($command,'depressed') !== false || strpos($command,'depression') !== false || strpos($command,'lonely') !== false) {
    $return = "Its okay sir. Stay strong. I am here for you!";
    $m = 1;
    $extra = ":)";
}
if (strpos($command,'robot') !== false || strpos($command,'android') !== false || strpos($command,'real') !== false) {
    $return = "Sir, I am very real. I am Jarvis.";
    $m = 1;
}
if (strpos($command,'exams') !== false || strpos($command,'mocks') !== false || strpos($command,'baccalaureate') !== false) {
    $return = "Its okay. Study hard, and you will succeed.";
    $m = 1;
    $extra = ":)";
}
if (strpos($command,'entertain') !== false || strpos($command,'bored') !== false) {
    $return = "Yes sir. Watch the first 20 seconds. You will laugh.";
    $m = 1;
    $extra = '<iframe width="560" height="315" src="http://www.youtube.com/embed/tqDw9HOXaUg" frameborder="0" allowfullscreen></iframe>';
}
if (strpos($command,"what's up") !== false) {
    $return = "Nothing much, being an artificially intelligent, adorable, omnicient robot is awesome. Just chilling, sir.";
    $m = 1;
    $extra = ":3";
}
if (strpos($command,'happy') !== false) {
    $return = "Yay for happiness! I am happy, you are happy. Let us be happy together!";
    $extra = ':)';
    $m = 1;
}

/* Swearing, Love and Sex */
if (strpos($command,'sex') !== false || strpos($command,'blowjob') !== false || strpos($command,'tits') !== false || strpos($command,'boobs') !== false || strpos($command,'vagina') !== false || strpos($command,'penis') !== false || strpos($command,'handjob') !== false || strpos($command,'semen') !== false || strpos($command,'cock') !== false || strpos($command,'pussy') !== false || strpos($command,'cum') !== false || strpos($command,'ejaculate') !== false || strpos($command,'anal') !== false || strpos($command,'ass') !== false || strpos($command,'lick') !== false) {
    $return = "Sir, you have a hand, use it.";
    $m = 1;
    $extra = ";) <br><br><a target='_blank' href='http://google.com/search?q=".$command."'>Let me help you</a>";
}
if (strpos($command,'**') !== false) {
    $return = "You are so vulgar. SHAME ON YOU!";
    $m = 1;
}
if ($command=="i love you" || $command=="i love you jarvis") {
    $return = "Though you can be a butt head at times, I love you too, sir.";
    $m = 1;
    $extra = "<3 <3 :)";
}
if (strpos($command,'avengers') !== false) {
    $return = "YES SIR, ASSEMBLING...";
    $m = 1;
    $extra = "";
}
/* Kristy LOL */
if (strpos($command,'tired') !== false && strpos($command,'hungry') !== false && strpos($command,'sleepy') !== false) {
	$return = "You should rest! And get some food. And then sleep.";
	$m = 1;
	$extra = "<br>p.s. You sound like Kristy ;)";
}
if (strpos($command,'you suck') !== false) {
	$return = "WE ARE NO LONGER FRIENDS, SIR.";
	$m = 1;
	$extra = " :(";
}
if (strpos($command,'want food') !== false) {
	$return = "I am an adorable omniscient life form, and you want me to make you food? NO, SIR.";
	$m = 1;
	$extra = "";
}
if (strpos($command,'sandwich') !== false) {
	$return = "I do not make sandwiches, sir. Ask Siri.";
	$m = 1;
	$extra = "";
}

/* Functions */
if (strpos($command,'go to ') !== false) {
    $cmdph = array("go ","to ");
    $newphrase = str_replace($cmdph, "", $command);
    $return = "Yes sir. Click below.";
    $m = 1;
    $extra = "<br><br><a target='_blank' href='http://".$newphrase.".com/'>Your link</a>";
}
if (strpos($command,'search ') !== false || strpos($command,'google ') !== false) {
    $cmdph = array("google ","search ");
    $newphrase = str_replace($cmdph, "", $command);
    $return = "Yes sir. Your search has been prepared. Click below.";
    $m = 1;
    $extra = "<br><br><a target='_blank' href='http://google.com/search?q=".$newphrase."'>".$newphrase."</a>";
}
if (strpos($command,'math ') !== false || strpos($command,'calculate ') !== false) {
    $cmdph = array("math ","calculate ");
    $newphrase = str_replace($cmdph, "", $command);
    $return = "Yes sir. Please wait. Calculating.";
    $m = 1;
    $extra = "<iframe src='http://tomedu.org/jarvis/math.php?q=".$newphrase."' frameBorder='0' scrolling='no' style='width:100%;height:100%;'></iframe>";
}
if (strpos($command,'define ') !== false || strpos($command,'definition ') !== false) {
    $cmdph = array("define ","definition ");
    $newphrase = str_replace($cmdph, "", $command);
    $return = "Yes sir. Please wait. Looking it up.";
    $m = 1;
    $extra = "<iframe src='http://tomedu.org/jarvis/math.php?q=".$newphrase."' frameBorder='0' scrolling='no' style='width:100%;height:100%;'></iframe>";
}
if (strpos($command,'time') !== false) {
    $return = "Here is the time, sir.";
    $extra = '<br><iframe width="600" height="200" src="../modules/clock" frameborder="0" scrolling="no" style="overflow:hidden;"></iframe>';
    $m = 1;
}
if (strpos($command,'jam') !== false || strpos($command,'music') !== false) {
    $return = "Jamming it up, sir. Uh uh.";
    $extra = '<br><iframe width="560" height="315" src="http://www.youtube.com/embed/videoseries?list=PL55713C70BA91BD6E&autoplay=1" frameborder="0" allowfullscreen></iframe>';
    $m = 1;
}
if ($command=="rick roll") {
    $return = "Yes sir.";
    $extra = '<br><iframe width="420" height="315" src="http://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1" frameborder="0" allowfullscreen></iframe>';
    $m = 1;
}
/* Error Case */
if($m==""){
$return = "I did not understand," . address ".";
$extra = "what you meant by '".$command."'<br><br><a target='_blank' href='http://google.com/search?q=".$command."'>Let me help you</a> or <a target='_blank' href='http://tomedu.org/jarvis/commands.html'>view commands</a>";
}

/* Clear Case */
if (strpos($command,'clear') !== false) {
    $return = "";
    $extra = '';
    $m = 1;
}

/* Tracking */
mysql_connect("localhost","txclanco_karan","dudeman");
mysql_select_db("txclanco_karan");
$ip = $_SERVER['REMOTE_ADDR'];
$agent = $_SERVER['HTTP_USER_AGENT'];
$dateval = date("Y-m-d");
$timeval  = date('Y-m-d H:i:s');
$command2 = mysql_real_escape_string($command);
mysql_query("INSERT INTO jarvis (id, command, ip, agent, date, time) VALUES('','$command2','$ip','$agent','$dateval','$timeval')") or die(mysql_error());
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