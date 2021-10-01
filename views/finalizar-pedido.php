<style> footer{display:none !important;} </style>

<?php
    $carrinhoItems = $_SESSION['carrinho'];
    $total = 0;
    foreach($carrinhoItems as $key => $value){
        $idItem = $value;
        $items = \MySql::conectar()->prepare("SELECT * FROM `tb_foods` WHERE id = $idItem");
        $items->execute();
        $items = $items->fetch();
        @$valor = $value * $items['preco'];
        $total+=$valor;
    }
?>
<form method="post">
<header class="searchContent marginDownDefault">
    <div class="wrap w90 center">
        <div class="search itemsFlex alignCenter justSpaceEvenly ">
            <a href="<?php echo INCLUDE_PATH; ?>"><i data-feather="arrow-left"></i></a>
            <input type="search" placeholder="Pesquisar aqui..." class="w90" />
        </div><!--search-->
    </div><!--wrap-->
</header><!--searchContent-->

<section class="optionsMethods">
    <div class="wrap">
        <div class="row w95 center marginDownDefault">
            <div class="tabs">
                <select name="opcao_pagamento" class="w100">
                    <option value="cartao credito">Cartão de crédito</option>
                    <option value="cartao debito">Cartão de Débito</option>
                    <option value="dinheiro">Dinheiro</option>
                </select>
            </div><!--tabs-->
        </div><!--row-->
        <div class="row">
            <div class="card w95 cartao center marginDownSmall">
                <div class="row">
                    <h4>Número do Cartão</h4>
                    <input type="text" placeholder="0000 0000 0000 0000" />
                </div><!--row-->
                <div class="row itemsFlex alignCenter justSpaceBetween marginDownSmallIn">
                    <div class="col">
                        <h4>Data de Expiração</h4>
                        <input type="text" placeholder="MM/YY" />
                    </div><!--col-->
                    <div class="col">
                        <h4>Data de Expiração</h4>
                        <input type="text" placeholder="MM/YY" />
                    </div><!--col-->
                </div><!--row-->
                <div class="total textRight">
                    <p>R$<?php echo number_format($valor, 2, ',', ' '); ?></p>
                </div><!--total-->
            </div><!--card-->
            <div class="card w95 center marginDownSmall troco" style="display:none">
                <div class="row">
                    <h4>Troco para quanto:</h4>
                    <input type="text" name="troco" placeholder="Troco" />
                </div><!--row-->
                <div class="total textRight">
                    <p>R$<?php echo number_format($valor, 2, ',', ' '); ?></p>
                </div><!--total-->
            </div><!--card-->
        </div><!--row-->
    </div><!--wrap-->
</section><!--optionsMethods-->

<div class="divisor"></div><!--divisor-->
<section class="addToCartContent w100">
    <div class="wrap itemsFlex alignCenter w90 center justCenter">
        <button type="submit" name="acao" class="w80 textCenter itemsFlex"><a class="button w100">Comprar Agora</a></button><!--button-->
    </div><!--wrap-->
</section><!--addToCartContent-->
</form>

<?php
    if(isset($_POST['acao'])){
        if(!isset($_SESSION['carrinho'])){
            die('Você não possui items no carrinho');
        }

        $metodoPagamento = $_POST['opcao_pagamento'];
        $_SESSION['tipo_pagamento'] = $metodoPagamento;
        $_SESSION['total'] = $valor;
        if($metodoPagamento == 'dinheiro'){
            if($_POST['troco'] != ''){
                $valorTroco = $_POST['troco'] - $valor;
                if($valorTroco >= 0){
                    $_SESSION['valor_troco'] = $valorTroco;
                }else{
                    die('Você não especificou um valor correto para o troco!');
                }
            }else{
                die('Você escolheu dinheiro como pagamento, portanto precisa especificar o troco');
            }
        }
        echo '<script> location.href="'.INCLUDE_PATH.'historico" </script>';
    }

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/finalizar.js"></script>