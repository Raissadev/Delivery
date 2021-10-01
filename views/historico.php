<?php
     if(!isset($_SESSION['total'])){
        die('Você não possui items no carrinho, e não fechou o pedido');
    }
?>

<header class="searchContent marginDownDefault">
    <div class="wrap w90 center">
        <form method="post" class="search itemsFlex alignCenter justSpaceEvenly ">
            <?php
                $query = "";
                if(isset($_POST['acao_search'])  == 'Buscar'){
                $nome = $_POST['busca'];
                $query = "nome LIKE '$nome%'";
            }
            ?>
            <input name="busca" type="search" placeholder="Pesquisar aqui..." class="w90" />
            <button name="acao_search"><i data-feather="search"></i></button>
        </form><!--search-->
    </div><!--wrap-->
</header><!--searchContent-->

<section class="shopContent history">
    <div class="wrap w95 center">
        <div class="title itemsFlex alignCenter marginDownSmall">
            <h3 class="w70">Histórico</h3>
            <div class="iconsBtns itemsFlex alignCenter justEnd w30">
                <a href="<?php echo INCLUDE_PATH; ?>historico?resetar"><i data-feather="refresh-cw"></i></a>
                <?php
                    if(isset($_GET['resetar'])){
                        session_destroy();
                        header('Location:'.INCLUDE_PATH);
                    }
                ?>
            </div><!--iconsBtns-->
        </div><!--title-->
        <div class="listFoods itemsFlex slider">
        <?php
            $carrinhoItems = $_SESSION['carrinho'];
            $total = 0;
            foreach($carrinhoItems as $key => $value){
            $idItem = $value;
            $items = \MySql::conectar()->prepare("SELECT * FROM `tb_foods` WHERE id = $idItem || nome = ?");
            $items->execute(array($query));
            $items = $items->fetch();
            @$valor = $value * $items['preco'];
            $total+=$valor;
        ?>
            <div class="boxFood marginDownSmall marginRightDefault">
                <figure class="imgProduct positionRelative">
                    <span class="bag">New</span><!--bag-->
                    <img src="<?php echo INCLUDE_PATH; ?>images/<?php echo $items['imagem']; ?>" />
                    <a href="<?php echo INCLUDE_PATH; ?>?addCart=<?php echo $items['id']; ?>" class="favorite"><i data-feather="heart"></i></a>
                    <div class="textProduct">
                        <div class="row marginDownSmallIn">
                            <h4 class="limitLineClampOne"><a href="<?php echo INCLUDE_PATH; ?>produto?id=<?php echo $value['id']; ?>"><?php echo $items['nome']; ?></a></h4>
                        </div><!--row-->
                        <div class="row gridTwo">
                            <div class="col itemsFlex alignCenter">
                                <p><i data-feather="star"></i> 4.7</p>
                            </div><!--col-->
                            <div class="col itemsFlex alignCenter justEnd">
                                <p>R$<?php echo $items['preco']; ?></p>
                            </div><!--col-->
                        </div><!--row-->
                    </div><!--textProduct-->
                </figure><!--imgProduct-->
            </div><!--boxFood-->
        <?php } ?>
        </div><!--listFoods-->
    </div><!--wrap-->
</section><!--shopContent-->
