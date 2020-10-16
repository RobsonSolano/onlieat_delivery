<?php

namespace App;  

use MF\Init\Bootstrap;

class Route extends Bootstrap
{

	protected function initRoutes()
	{

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['inscreverse'] = array(
			'route' => '/inscreverse',
			'controller' => 'indexController',
			'action' => 'inscreverse'
		);

		$routes['registrar'] = array(
			'route' => '/registrar',
			'controller' => 'indexController',
			'action' => 'registrar'
		);

		$routes['entrar'] = array(
			'route' => '/entrar',
			'controller' => 'AuthController',
			'action' => 'autenticar'
		);
		$routes['identifica'] = array(
			'route' => '/identifica',
			'controller' => 'IndexController',
			'action' => 'identifica'
		);

		$routes['sair'] = array(
			'route' => '/sair',
			'controller' => 'AuthController',
			'action' => 'sair'
		);

		$routes['menu_digital'] = array(
			'route' => '/menu_digital',
			'controller' => 'indexController',
			'action' => 'menu_digital'
		);

		$routes['pedido'] = array(
			'route' => '/pedido',
			'controller' => 'IndexController',
			'action' => 'pedido'
		);

		$routes['acao'] = array(
			'route' => '/acao',
			'controller' => 'AppController',
			'action' => 'acao'
		);

		$routes['cadastra'] = array(
			'route' => '/cadastra',
			'controller' => 'AuthController',
			'action' => 'cadastra'
		);

		$routes['formModal'] = array(
			'route' => '/formModal',
			'controller' => 'AuthController',
			'action' => 'formModal'
		);

		// Admin

		$routes['administration'] = array(
			'route' => '/administration',
			'controller' => 'IndexController',
			'action' => 'confid_rm'
		);

		$routes['/admin_adm/listagem_clientes'] = array(
			'route' => '/admin_adm/listagem_clientes',
			'controller' => 'IndexController',
			'action' => 'listaCliente'
		);


		$routes['/admin_adm/cad_prod'] = array(
			'route' => '/admin_adm/cad_prod',
			'controller' => 'IndexController',
			'action' => 'cad_prod'
		);

		$routes['/admin_adm/cad_produto'] = array(
			'route' => '/admin_adm/cad_produto',
			'controller' => 'AppController',
			'action' => 'cad_produto'
		);

		$routes['/admin_adm/remove_prod'] = array(
			'route' => '/admin_adm/remove_prod',
			'controller' => 'AppController',
			'action' => 'remove_prod'
		);

		$routes['/admin_adm/remove_cliente'] = array(
			'route' => '/admin_adm/remove_cliente',
			'controller' => 'AppController',
			'action' => 'remove_cliente'
		);

		$routes['/envia_pedido'] = array(
			'route' => '/envia_pedido',
			'controller' => 'AppController',
			'action' => 'envia_pedido'
		);

		$routes['/admin_adm/listagem_pedidos'] = array(
			'route' => '/admin_adm/listagem_pedidos',
			'controller' => 'IndexController',
			'action' => 'ListaPedidos'
		);

		$routes['/admin_adm/listagem_produtos'] = array(
			'route' => '/admin_adm/listagem_produtos',
			'controller' => 'IndexController',
			'action' => 'ListaProdutos'
		);

		// Recuperar senha

		$routes['/forgot'] = array(
			'route' => '/forgot',
			'controller' => 'IndexController',
			'action' => 'forgot'
		);
		$routes['/forgot-send'] = array(
			'route' => '/forgot-send',
			'controller' => 'AuthController',
			'action' => 'sendForgot'
		);

		$routes['/forgot/verify/send'] = array(
			'route' => '/forgot/verify/send',
			'controller' => 'IndexController',
			'action' => 'verifySendForgot'
		);
		
		$routes['/forgot/verify'] = array(
			'route' => '/forgot/verify',
			'controller' => 'AuthController',
			'action' => 'VerifyCode'
		);
		
		$routes['/forgot/new/pass'] = array(
			'route' => '/forgot/new/pass',
			'controller' => 'IndexController',
			'action' => 'formPass'
		);

		$routes['/forgot/reset'] = array(
			'route' => '/forgot/reset',
			'controller' => 'AuthController',
			'action' => 'PasswordReset'
		);

		$this->setRoutes($routes);
	}
}
