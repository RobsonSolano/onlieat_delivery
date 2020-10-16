<?php

namespace App\Controllers;

//os recursos do miniframework  
use MF\Controller\Action;
use MF\Model\Container;
use MF\Model\Mailer;

class AppController extends Action
{


	public function validaAutenticacao()
	{

		session_start();

		if (!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
			header('Location: /?login=erro');
		}
	}

	public function cad_produto()
	{
		$prod = Container::getModel('Confid');

		$file = $_FILES["file_upload"];
		$file_name = $file['name'];
		$file_temp = $file['tmp_name'];
		$file_error = $file['error'];
		$prod_title = $_POST['prod_title'];
		$prod_category = $_POST['prod_category'];
		$prod_desc = $_POST['prod_desc'];
		$prod_value = $_POST['prod_value'];

		$cadastro = $prod->cad_produto($prod_title, $file_name, $file_temp, $file_error, $prod_category, $prod_desc, $prod_value);

		if ($cadastro) {
			header('location:/admin_adm/cad_prod?status=success');
		} else {
			header('location:/admin_adm/cad_prod?status=error');
		}
	}

	public function remove_prod()
	{
		$confid = Container::getModel('Confid');
		$id_prod = $_POST['remove_prod'];

		if ($confid->remove_prod($id_prod)) {
			header('location:/administration?action=ok');
		} else {
			header('location:/administration?action=error');
		}
	}

	public function remove_cliente()
	{
		$id_cli = $_POST['remove_cli'];
		$confid = Container::getModel('Confid');

		if ($confid->remove_cliente($id_cli)) {
			header('location:/confid_rm?action=ok');
		} else {
			header('location:/confid_rm?action=error');
		}
	}

	public function envia_pedido()
	{
		session_start();
		$pedido = Container::getModel('Confid');


		$carrinho = number_format($_POST['carrinho'], 2, ',', '.');
		$entrega = number_format($_POST['entrega'], 2, ',', '.');

		$vl_total = $_POST['tot_pagar'];

		$pedido->salvaPedido($_SESSION['cli_id'], number_format($vl_total, 2, ',', '.'));
		$troco = 0;

		$url = $_POST['url'];

		if (!empty($_POST['troco']) && $_POST['methodPayment'] == NULL) {

			$payment = $_POST['troco'];

			$troco = number_format((float)$payment - (float)$vl_total, 2, ',', '.');
			$url .= "%0A%0A*Carrinho*%20R$%20" . $carrinho . "%20%0A*Entrega*%20R$%20" . $entrega . "%20%0A*Total*%20R$%20" . number_format($vl_total, 2, ',', '.') . ",%20%0A*Troco:*%20%20R$" . $troco;
			header("location:" . $url);
		}

		if (empty($_POST['troco']) && !empty($_POST['methodPayment'])) {

			$card = $_POST['methodPayment'];

			$url .= "%0A%0A*Carrinho*%20R$%20" . $carrinho . "%20%0A*Entrega*%20R$%20" . $entrega . "%20%0A*Total*%20R$%20" . number_format($vl_total, 2, ',', '.') . ",%20%0A*Cartão%20de%20" . $card . "*";
			header("location:" . $url);
		}

		if (!empty($_POST['troco']) && !empty($_POST['methodPayment'])) {

			$payment = $_POST['troco'];
			$card = $_POST['methodPayment'];

			$dinheiro = number_format((float)$payment, 2, ',', '.');

			$url .= "%0A%0A*Carrinho*%20R$%20" . $carrinho . "%20%0A*Entrega*%20R$%20" . $entrega . "%20%0A*Total*%20R$%20" . number_format($vl_total, 2, ',', '.') . ",%20%0A*cartão%20de%20" . $card . "*%20%0AR$%20" . $dinheiro . "%20em%20dinheiro";
			header("location:" . $url);
		}
	}

}
