<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action
{
	private $email_admin = "admin@rm.ceunsp.com";
	private $pass_admin = "rmceunsp";
	public $hostmail = "onlieatdelivery@gmail.com";
	public $passhost = "Onlieat2020@";
	public $namecompany = "OnliEat Delivery";

	public function __get($atributo)
	{
		return $this->$atributo;
	}

	public function __set($atributo, $valor)
	{
		$this->$atributo = $valor;
	}

	public function cadastra()
	{
		$usuario = Container::getModel('Usuario');

		if (strlen($_POST['cli_pass']) < 6) {
			header("location: /inscreverse?pass=error");
			exit;
		}

		$usuario->__set('cli_name', trim($_POST['cli_name']));
		$usuario->__set('cli_phone', trim($_POST['cli_phone']));
		$usuario->__set('cli_email', trim($_POST['cli_email']));
		$usuario->__set('cli_pass', str_replace(' ', '', (md5($_POST['cli_pass']))));

		if ($usuario->cadastrar()) {
			header("location: /inscreverse?cad=success");
		} else {
			header("location: /inscreverse?cad=error");
			exit;
		}
	}

	public function autenticar()
	{

		$usuario = Container::getModel('Usuario');

		$usuario->__set('cli_email', trim($_POST['cli_email']));
		$usuario->__set('cli_pass', trim(md5($_POST['cli_pass'])));

		$usuario->autenticar();

		if ($usuario->__get('cli_id') != '' && $usuario->__get('cli_name') != '') {

			// echo $this->__get('email_admin');
			// echo "<br>" . $usuario->__get('cli_email');

			if ($usuario->__get('cli_email') == $this->__get('email_admin')) {
				session_start();
				$_SESSION['cli_name'] = $usuario->__get('cli_name');

				header('location: /administration');
			} else {
				session_start();

				$_SESSION['cli_id'] = $usuario->__get('cli_id');
				$_SESSION['cli_name'] = $usuario->__get('cli_name');

				header('Location: /menu_digital');
			}
		} else {
			header('Location: /identifica?login=erro');
		}
	}

	public function sendForgot()
	{

		$usuario = Container::getModel('Usuario');
		$email = $_POST['email'];

		$user = $usuario->verifyEmailToForgot($email);

		if (!$user) {
			header("Location: /forgot?user=false");
		}
		$nome = $user['cli_name'];

		$msg = "";

		$code = NULL;
		$i = 0;

		do {
			$rand = rand(0, 9);
			$code .= $rand;
			$i++;
		} while ($i < 6);

		$message = "Utilize o codigo: $code";
		$toAdress = $email;

		$subject = "Recuperar senha";

		$mail = Container::getModel('PHPMailer');

		//Server settings
		$mail->SMTPDebug = 0;                                 // Enable verbose debug output
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = $this->hostmail;                 // SMTP username
		$mail->Password = $this->passhost;                           // SMTP password
		$mail->SMTPSecure = 'tls';
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		$mail->CharSet = 'utf-8';                          // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		//Recipients
		$mail->setFrom($this->hostmail, $this->namecompany);
		$mail->addAddress($toAdress);     // Add a recipient

		//Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body    = $message;
		$mail->AltBody = '';

		if (!$mail->send()) {
			header("Location: /forgot/verify/send?send=error");
		} else {
			header("Location: /forgot/verify/send?send=success");
		}
		session_start();
		$_SESSION['code'] = $code;
		$_SESSION['id_cli_forgot'] = $user['cli_id'];
		$_SESSION['id_cli_pass'] = $user['cli_pass'];
	}

	public function VerifyCode()
	{
		session_start();
		$codeForgot = $_SESSION['code'];
		$msg = "";
		$code = $_POST['code_post'];
		if ($code === $codeForgot) {
			header("Location:/forgot/new/pass");
		} else {
			header("Location: /forgot/verify/send?code=error&codigo=$code");
		}
	}

	public function PasswordReset()
	{
		// status 1,2,3
		session_start();
		$new_pass = trim(md5($_POST['new_pass']));
		$pass = $_SESSION['id_cli_pass'];

		if ($new_pass == $pass) {
			header("Location: /forgot/new/pass?status=1");
		}
		$id = $_SESSION['id_cli_forgot'];
		$user = Container::getModel('Usuario');
		if ($user->updatePass($new_pass, $id)) {
			header("Location: /forgot/new/pass?status=2");
		} else {
			header("Location: /forgot/new/pass?status=3");
		}
	}

	public function sair()
	{
		session_start();
		session_destroy();
		header('Location: /');
	}

	public function formModal()
	{
		$usuario = Container::getModel('Usuario');

		$usuario->__set('cli_name', trim($_POST['cli_name']));
		$usuario->__set('cli_email', trim($_POST['cli_email']));
		$usuario->__set('cli_phone', trim($_POST['cli_phone']));

		if ($usuario->cadUserModal()) {
			header('Location: /?modal=success');
		} else {
			header('Location: /?modal=error');
		}
	}
}
