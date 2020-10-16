<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action
{

	public function index()
	{

		$this->view->login = isset($_GET['login']) ? $_GET['login'] : '';
		$this->render('index');
	}


	public function menu_digital()
	{
		session_start();
		$confid = Container::getModel('Confid');

		$this->view->lanches = $confid->getProduto("lanche");
		$this->view->porcoes = $confid->getProduto("porcao");
		$this->view->bebidas = $confid->getProduto("bebida");

		$endereço = $confid->getAdress($_SESSION['cli_id']);

		if (!$endereço) {
			$this->view->adressOn = false;
			$this->view->adress = '';
		} else {
			$this->view->adress = $endereço;
			$this->view->adressOn = true;
		}

		$this->view->acesso = $confid;

		$this->render('menu_digital');
	}

	public function inscreverse()
	{

		$this->view->usuario = array(
			'cli_name' => '',
			'cli_phone' => '',
			'cli_email' => '',
			'cli_pass' => ''
		);

		$this->view->erroCadastro = false;

		$this->render('inscreverse','layout2');
	}

	public function identifica()
	{
		$this->render('entrar','layout2');
	}
	public function pedido()
	{
		$adress = Container::getModel('Usuario');
		$confid = Container::getModel('Confid');
		$this->view->confid = $confid;

		session_start();
		$endereço = $confid->getAdress($_SESSION['cli_id']);

		if (!$endereço) {
			$adress->cadAdress($_SESSION['cli_id']);
		} else {
			$this->view->adressOn = true;
		}

		$this->render('finaliza_pedido');
	}

	public function confid_rm()
	{
		session_start();
		$confid = Container::getModel('Confid');

		$tot_pedidos = $confid->getTotPedidos();
		$tot_clientes =  $confid->getTotClientes();
		$tot_produtos =  $confid->getTotProdutos();

		$_SESSION['tot_pedidos'] = $tot_pedidos;
		$_SESSION['tot_clientes'] = $tot_clientes;
		$_SESSION['tot_produtos'] = $tot_produtos;
		$this->render('confid_rm');
	}

	public function cad_prod()
	{
		$this->render('cad_prod');
	} 

	public function listaCliente()
	{
		$confid = Container::getModel('Confid');

		$id_cli = $_POST['cliente_id'];
		$dados = $confid->listagem($id_cli);

		$this->view->dados_cliente = $dados;
		$this->render('listagem');
	}

	public function ListaProdutos()
	{
		$confid = Container::getModel('Confid');

		$id_produto = $_POST['produto_id'];
		$dados = $confid->listaProdutos($id_produto);

		$this->view->dados_produto = $dados;
		$this->render('listagem');

	}

	public function ListaPedidos()
	{
		$confid = Container::getModel('Confid');

		$id_pedido = $_POST['pedido_id'];
		$dados = $confid->ListaPedidos($id_pedido);

		$this->view->dados_pedido = $dados;
		$this->render('listagem');

	}


	// Recuerar senha

	public function forgot()
	{	
		$msgError = "";
		
		if(isset($_GET['user']) && $_GET['user'] == "false"){
			$msgError = "E-mail não encontrado, por favor verifique!";
			$this->view->msgError = $msgError;
		}
		$this->render('forgot','layout2');
	}

	public function verifySendForgot(){
		$msgError = "";
		$msgSuccess = "";
		if(isset($_GET['send'])){
			if($_GET['send'] == "error"){
				$msgError = "Falha ao enviar!";
				$this->view->msgError = $msgError;
			}
			if($_GET['send'] == "success"){
				$msgSuccess = "E-mail enviado com sucesso.";
				$this->view->sendSuccess = $msgSuccess;
			}
		}
		if(isset($_GET['code']) && $_GET['code'] == "error"){
			if(isset($_GET['codigo'])){
				$this->view->code = $_GET['codigo'];
			}
			session_start();
			$msgError = "Código invalido.";
			$this->view->codeError = $msgError;
		}
		$this->render('forgot-send','layout2');

	}

	public function formPass()
	{	
		$msgError = "";
		$msgSuccess = "";

		if(isset($_GET['status'])){
			if($_GET['status'] == 1){
				$msgError = "Não foi possível alterar sua senha!";
				$this->view->msgError = $msgError;
			}  

			if($_GET['status'] == 2){
				$msgError = "Senha alterada com sucesso";
				$this->view->msgSuccess = $msgSuccess;
			}

			if($_GET['status'] == 3){
				$msgError = "Sua nova senha precisa ser diferente da senha atual";
				$this->view->msgError = $msgError;
			}
		}
		$this->render('forgot-new-pass','layout2');
	}

	
}
