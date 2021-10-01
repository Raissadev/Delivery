<?php

    class deliveryController{
        public function index(){
            $url = (isset($_GET['url'])) ? $_GET['url'] : 'home';
            $slug = explode('/',$url)[0];
            
            if(file_exists('views/'.$slug.'.php')){
                include('views/includes/header.php');
                include('views/'.$slug.'.php');
                include('views/includes/footer.php');
                $this->validarCarrinho();
            }else{
                include('erro404.php'); 
            }
        }
        public function validarCarrinho(){
            if(isset($_GET['addCart'])){
                $idProduto = (int)$_GET['addCart'];
                deliveryModel::addToCart($idProduto);
                header(INCLUDE_PATH);
                die();
            }
        }
    }

?>