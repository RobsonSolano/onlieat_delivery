<?php

namespace App\Models;

use MF\Model\Model;

class Usuario extends Model
{

	private $cli_name;
	private $cli_phone;
	private $cli_email;
	private $cli_pass;
	public $secret = "OnlieatDeliverys";
	public $secretIV = "onlieatdeliverys";


	public function __get($atributo)
	{
		return $this->$atributo;
	}

	public function __set($atributo, $valor)
	{
		$this->$atributo = $valor;
	}

	public function getSecret()
	{
		return $this->secret;
	}

	public function getSecretIV()
	{
		return $this->secretIV;
	}

	public function cadastrar()
	{
		$sql = "SELECT cli_phone FROM tb_clientes WHERE cli_phone = :CLI_PHONE OR cli_email = :CLI_EMAIL";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':CLI_PHONE', $this->__get('cli_phone'));
		$stmt->bindValue(':CLI_EMAIL', $this->__get('cli_email'));
		$stmt->execute();

		$usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

		if ($usuario['cli_phone'] == "" && $usuario['cli_email'] == "") {
			$query = "insert into tb_clientes(cli_name, cli_phone,cli_email, cli_pass)values(:NAME, :PHONE, :EMAIL, :PASS)";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':NAME', $this->__get('cli_name'));
			$stmt->bindValue(':PHONE', $this->__get('cli_phone'));
			$stmt->bindValue(':EMAIL', $this->__get('cli_email'));
			$stmt->bindValue(':PASS', $this->__get('cli_pass')); //md5() -> hash 32 caracteres
			$stmt->execute();

			return $this;
		} else {
			return false;
		}
	}

	public function autenticar()
	{

		$query = "select cli_id, cli_name, cli_email from tb_clientes where cli_email = :EMAIL and cli_pass = :PASS";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':EMAIL', $this->__get('cli_email'));
		$stmt->bindValue(':PASS', $this->__get('cli_pass'));
		$stmt->execute();

		$usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

		if ($usuario['cli_id'] != '' && $usuario['cli_name'] != '') {
			$this->__set('cli_id', $usuario['cli_id']);
			$this->__set('cli_name', $usuario['cli_name']);
		}

		return $this;
	}



	//Informações do Usuário
	public function getInfoUsuario()
	{
		$query = "SELECT cli_id, cli_name, cli_email, cli_data_cadastro FROM tb_clientes WHERE cli_id = :CLI_ID";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':CLI_ID', $this->__get('cli_id'));
		$stmt->execute();

		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	public function cadUserModal()
	{
		$query = "SELECT cli_email FROM tb_clientes_notifi WHERE cli_email = :CLI_EMAIL";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':CLI_EMAIL', $this->__get('cli_email'));
		$stmt->execute();

		$usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

		if ($usuario['cli_email'] != '') {
			return false;
		} else {
			$sql = "INSERT INTO tb_clientes_notifi (cli_name,cli_email,cli_phone) VALUES (:CLI_NAME, :CLI_EMAIL, :CLI_PHONE)";
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(':CLI_NAME', $this->__get('cli_name'));
			$stmt->bindValue(':CLI_EMAIL', $this->__get('cli_email'));
			$stmt->bindValue(':CLI_PHONE', $this->__get('cli_phone'));
			$stmt->execute();

			return $this;
		}
	}
	public function cadAdress($id_cli)
	{
		$city_client = $_POST['cli_city'];

		switch ($city_client) {
			case 1:
				$city_client = "Salto";
				break;
			case 2:
				$city_client = "Itu";
				break;
			case 3:
				$city_client = "Indaiatuba";
				break;
		}


		$complement = "";
		if ($_POST['cli_obs'] != '') {
			$complement = $_POST['cli_obs'];
		}

		$query = "INSERT INTO tb_cli_endereco (
			id_cliente,
			end_city,
			end_street,
			end_num,
			end_district,
			end_complement
			) VALUES (
			:CLI_ID,:END_CITY,:END_STREET,:END_NUM,:END_DISTRICT,:END_COMPLEMENT)";

		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':CLI_ID', $id_cli);
		$stmt->bindValue(':END_CITY', $city_client);
		$stmt->bindValue(':END_STREET', $_POST['cli_street']);
		$stmt->bindValue(':END_NUM', $_POST['cli_n_house']);
		$stmt->bindValue(':END_DISTRICT', $_POST['cli_district']);
		$stmt->bindValue(':END_COMPLEMENT', $complement);

		$stmt->execute();

		return $this;
	}

	public function getAdress($id_cli)
	{
		$sql = "SELECT id_cliente FROM tb_cli_endereco WHERE id_cliente = :CLI_ID";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':CLI_ID', $id_cli);
		$stmt->execute();

		$stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	// Recuperar Senha

	public function verifyEmailToForgot($email)
	{
		$query = "SELECT * FROM tb_clientes WHERE cli_email = :email";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':email', $email);
		$stmt->execute();
		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	public function updatePass($idUser, $password)
	{
		$sql = "UPDATE tb_clientes SET cli_pass = :PASS WHERE cli_id = :iduser";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':PASS', $password);
		$stmt->bindValue(':iduser', $idUser);
		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
}
