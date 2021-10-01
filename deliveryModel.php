<?php

    class deliveryModel{
        //public static $items = array();

        public static function search(){
            
        }
        public static function listarFoods(){
            $query = "";
                if(isset($_POST['acao_search'])  == 'Buscar'){
                $nome = $_POST['busca'];
                $query = "WHERE nome LIKE '$nome%'";
            }
            $items = \MySql::conectar()->prepare("SELECT * FROM `tb_foods` $query");
            $items->execute();
            $items = $items->fetchAll();
            return $items;
        }

        public static function listarItems(){
            return self::$items;
        }

        public static function addToCart($idProduto){
            if(!isset($_SESSION['carrinho'])){
                $_SESSION['carrinho'] = array();
            }
            $_SESSION['carrinho'][] = $idProduto;
        }
        
        public static function getItemsCart(){
            return $_SESSION['carrinho'];
        }

        public static function getItem($id){
            return self::$items[$id];
        }

        public static function getTotalPedido(){
            @$valor = $value * $items['preco'];
            $total+=$valor;
        } 

    }

?>