<?php
require_once __DIR__.'/vendor/autoload.php';
use SensioLabs\AnsiConverter\AnsiToHtmlConverter;
use SensioLabs\AnsiConverter\Theme\SolarizedTheme;

/*
https://stackoverflow.com/questions/20107147/php-reading-shell-exec-live-output
https://developer.mozilla.org/en-US/docs/Web/API/Streams_API/Using_readable_streams
https://www.sitepoint.com/php-streaming-output-buffering-explained/

*/

$orig = $_SERVER['HTTP_ORIGIN'];
// TODO check list;

header('Access-Control-Allow-Origin: '.$orig);
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Max-Age: 1000');
if(array_key_exists('HTTP_ACCESS_CONTROL_REQUEST_HEADERS', $_SERVER)) {
  header('Access-Control-Allow-Headers: '
         . $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']);
} else {
//   header('Access-Control-Allow-Headers: *');
}

header('Access-Control-Allow-Credentials: true');
#  header('Access-Control-Allow-Headers: Authorization');
header('Access-Control-Expose-Headers: Authorization');

if("OPTIONS" == $_SERVER['REQUEST_METHOD']) {
  exit(0);
}

$dir = __DIR__.'/../web';
$cmd = "cd $dir; gridsome build";
#$cmd = __DIR__."/build.sh";

$ok = check_referer($_SERVER);
if(!$ok){
  print "\nfailed\n";
  exit;
}


header('X-Accel-Buffering: no');
header("Content-Type: text/plain; charset=utf-8");
//header("Content-Type: application/json");
// print $cmd;
$result = liveExecuteCommand($cmd);

if($result['exit_status'] === 0){
   // do something if command execution succeeds
   print "\nok\n";
   `cd $dir; rsync -avz dist/ ../htdocs/`;
} else {
    // do something on failure
	print "\nfailed\n";
}

function check_referer($headers){
  $allowed = ['localhost', 'kurparkverlag-gs-studio.netlify.app', 'kurparkverlag.sanity.studio'];

  if(!preg_match("!/dashboard$!", $headers['HTTP_REFERER'])) return false;

  $remote = parse_url($headers['HTTP_ORIGIN'], PHP_URL_HOST);

  return in_array($remote, $allowed);
}
/**
 * Execute the given command by displaying console output live to the user.
 *  @param  string  cmd          :  command to be executed
 *  @return array   exit_status  :  exit status of the executed command
 *                  output       :  console output of the executed command
 */
function liveExecuteCommand($cmd)
{
    $theme = new SolarizedTheme();
    $converter = new AnsiToHtmlConverter($theme);
    
	$lbr = "\n";
	$lbr = "";
    while (@ ob_end_flush()); // end all output buffers if any

    // $proc = popen("$cmd 2>&1 ; echo Exit status : $?", 'r');
    $proc = popen("$cmd 2>&1 ; echo Exit status : $?", 'r');
    $live_output     = "";
    $complete_output = "";

    while (!feof($proc))
    {
        $live_output     = fread($proc, 4096);
        $complete_output = $complete_output . $live_output;
        echo "$live_output".$lbr."<br>";
        // echo($converter->convert($live_output.$lbr)."<br>");
       // echo json_encode(['txt'=>$live_output]);
        @ flush();
    }

    pclose($proc);

    // get exit status
    preg_match('/[0-9]+$/', $complete_output, $matches);

    // return exit status and intended output
    return array (
                    'exit_status'  => intval($matches[0]),
                    'output'       => str_replace("Exit status : " . $matches[0], '', $complete_output)
                 );
}
