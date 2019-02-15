<?php 

/* Author: ThemeREX */
/* Should you have any questions regarding the theme, please contact us via: http://themerex.net/?p=142/#tickets */

global $_REQUEST;
$response = array('error'=>'');

	$user_name = substr($_REQUEST['user_name'], 0, 20);
	$user_email = substr($_REQUEST['user_email'], 0, 40);
	$user_msg = $_REQUEST['user_msg'];
	
	$contact_email = 'ajrice1018@gmail.com';	
	
	if (trim($contact_email)!='') {
		$subj = 'Message from ShiftCV HTML';
		$msg = "Name: $user_name
		E-mail: $user_email
		Message: $user_msg";
	
		$head = "Content-Type: text/plain; charset=\"utf-8\"\n"
			. "X-Mailer: PHP/" . phpversion() . "\n"
			. "Reply-To: $user_email\n"
			. "To: $contact_email\n"
			. "From: $user_email\n";
	
		if (!@mail($contact_email, $subj, $msg, $head)) {
			$response['error'] = 'Error send message!';
		}
	} else 
			$response['error'] = 'Error send message!';

	echo json_encode($response);
	die();

?>