<?php

namespace App\Models;

use MF\Model\Model;

class Confid extends Model
{
    private $id_prod;
    private $id_cliente;

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function getTotPedidos()
    {
        $query = "SELECT * FROM tb_pedidos";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $tot_pedidos = $stmt->rowCount();
        return $tot_pedidos;
    }

    public function getTotClientes()
    {
        $query = "SELECT * FROM tb_clientes";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $tot_clientes = $stmt->rowCount();

        return $tot_clientes - 1;
    }

    public function getTotProdutos()
    {
        $query = "SELECT * FROM tb_produtos";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $tot_produtos = $stmt->rowCount();

        return $tot_produtos;
    }

    public function listagem($id_cli)
    {
        if ($id_cli == '') {
            $query = "SELECT * FROM tb_clientes";
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $query = "SELECT * FROM tb_clientes WHERE cli_id = :CLIID";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':CLIID', $id_cli);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function listaPedidos($id_ped)
    {
        if ($id_ped == "") {
            $query = "SELECT * FROM tb_pedidos";
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $query = "SELECT * FROM tb_pedidos WHERE id_pedido = :PEDID";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':PEDID', $id_ped);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function getLastId()
    {
        $selectquery = "SELECT id_pedido FROM tb_pedidos ORDER BY id_pedido DESC LIMIT 1";
        $stmt = $this->db->prepare($selectquery);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function listaProdutos($id_prod)
    {
        if ($id_prod == "") {
            $query = "SELECT * FROM tb_produtos";
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $query = "SELECT * FROM tb_produtos WHERE prod_id = :PRODID";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':PRODID', $id_prod);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function cad_produto($prod_title, $file_name, $file_temp, $file_error, $prod_category, $prod_desc, $prod_value)
    {
        if ($file_error) {
            throw new \Exception("Error: " . $file_error);
        } //Conferindo erros

        $dirUploads = "produtos";

        if (!is_dir($dirUploads)) {
            mkdir($dirUploads);
        } // Conferindo e criando a pasta

        if (move_uploaded_file($file_temp, $dirUploads . DIRECTORY_SEPARATOR . $file_name)) {
            // Fazer insert de protudo
            $query = "INSERT INTO tb_produtos (prod_title,prod_name_image,prod_category,prod_description,prod_value) VALUES (
                :title,:prodName,:category,:descrip,:pvalue
            )";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':title', $prod_title);
            $stmt->bindValue(':prodName', $file_name);
            $stmt->bindValue(':category', $prod_category);
            $stmt->bindValue(':descrip', $prod_desc);
            $stmt->bindValue(':pvalue', $prod_value);
            $stmt->execute();

            return $this;
        } else {
            return false;
        }
    }

    public function remove_prod($id_prod)
    {
        $query = "DELETE FROM tb_produtos WHERE prod_id = :PRODID";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':PRODID', $id_prod);
        $stmt->execute();
        return $this;
    }

    public function remove_cliente($id_cli)
    {
        $query = "DELETE FROM tb_clientes WHERE cli_id = :CLIID";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':CLIID', $id_cli);
        $stmt->execute();
        return $this;
    }

    public function getProduto($category)
    {
        $query = "SELECT * FROM tb_produtos WHERE prod_category = :CATEGORY";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':CATEGORY', $category);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAdress($cli_id)
    {
        $query = "SELECT * FROM tb_cli_endereco WHERE id_cliente = :CLI_ID";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':CLI_ID', $cli_id);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function salvaPedido($cli_id, $pValue)
    {
        $query = "INSERT INTO tb_pedidos (id_cliente,pedi_value) VALUES (:CLIID,:PVALUE)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':CLIID', $cli_id);
        $stmt->bindValue(':PVALUE', $pValue);
        $stmt->execute();

        return $this;
    }
    public function getInfoProd($id_prod)
    {
        $query = "SELECT * FROM tb_produtos WHERE prod_id = :IDPROD";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':IDPROD', $id_prod);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    
	
}
