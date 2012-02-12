<?php
require_once 'Mail.php';
if (isset($_POST['send'])) {
$from = trim($_POST["email"]);
$message = trim($_POST["tresc"]);
$subject = trim($_POST["temat"]);
$datamax = "wiktor@mecinka.pl";
$params['host'] = 'Kurier.domeny.org';
$params['port'] = 587;
$params['auth'] = true;
$params['username'] = 'wiktor@mecinka.pl';
$params['password'] = 'w1t3k2006';



if (!empty($from) && !empty($message) && !empty($subject)) {
	$headers['Subject'] = $subject;
	$headers['From'] = $from;
	$body = $message;

	$recipients = $datamax;
	if (isset($_POST['kopia'])) $recipients = array($datamax, $from);

	$mail = Mail::factory('smtp', $params);

	if (PEAR::isError($mail)) {
			print $mail->getMessage();
	} else {
		$error = $mail->send($recipients, $headers, $body);
		 if (PEAR::isError($error)) {
			print $error->getMessage();
		 } else {
			$output = "<strong>Wiadomość wysłana.</strong>";
		}
	}
}
else $output = "<strong>Wiadomość nie wysłana - uzupełnij wymagane pola.</strong>";
setcookie('output', $output);
header("Location: index.php?link=kontakt");
header('Content-Type: text/html; charset="iso-8859-2"');
exit();
}

?>
<script>
function sprawdz() {
	
if (!document.getElementById('email').value.match(/^[^@]*@[^@]*$/)) {
		alert('Wprowadz poprawny email');
		return false;
	}
}
</script>

<BR>
<p class='trescform' style='text-align:left'><B>FORMULARZ KONTAKTOWY</B></p>
<BR>	

<form class='trescform'  name="send_form" id="send_form" method="POST" onsubmit="return sprawdz()" action="<?php $_SERVER['PHP_SELF'] ?>">
      <table height="190" border="0" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                            <td class='trescform' align="right" valign="middle">Temat:&nbsp;</td>
                                                            <td align="left"><input  name="temat" type="text" id="temat" size="44" style="width: 300px" /></td>
                                                           </tr>
                                                            <tr>
                                                            <td class='trescform' align="right" valign="middle">Treść wiadomości:&nbsp; </td>
                                                            <td align="left"  ><textarea  name="tresc"  rows="5" style="width:300px" id="tresc"></textarea></td>
                                                           </tr>
                                                            <tr>
                                                            <td class='trescform' align="right" valign="middle">Twój adres e-mail:&nbsp;</td>
                                                            <td align="left"><input  name="email" type="text" id="email" size="44" style="width: 300px" /></td>
                                                           </tr>
                                                            <tr>
                                                            <td height="14">&nbsp;</td>
                                                             <td align="left" valign="middle">&nbsp;</td>
                                                           </tr>
                                                            <tr>
                                                            <td>&nbsp;</td>
                                                            <td align="left" valign="middle"><input  type="submit"  value="Wyślij" />
<input type='hidden' name='send' value='1' /></td>
                                                           </tr>
                                     </table>
     </form>
<p>

<?php
if (isset($_COOKIE['output'])) echo strip_tags($_COOKIE['output']);
setcookie("output");
?>

</p>


