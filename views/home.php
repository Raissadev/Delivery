<header class="searchContent marginDownDefault">
    <div class="wrap w90 center">
        <form method="post" class="search itemsFlex alignCenter justSpaceEvenly ">
            <?php
                deliveryModel::listarFoods();
            ?>
            <input name="busca" type="search" placeholder="Pesquisar aqui..." class="w90" />
            <button name="acao_search"><i data-feather="search"></i></button>
        </form><!--search-->
    </div><!--wrap-->
</header><!--searchContent-->

<section class="shopContent">
    <div class="wrap w95 center">
        <div class="title itemsFlex alignCenter marginDownSmall">
            <h3 class="w70">Coffees</h3>
            <div class="iconsBtns itemsFlex alignCenter justEnd w30">
                <a href="<?php echo INCLUDE_PATH; ?>finalizar-pedido"><i data-feather="credit-card"></i></a>
                <a href="<?php echo INCLUDE_PATH; ?>fechar-pedido"><i data-feather="heart"></i></a>
            </div><!--iconsBtns-->
        </div><!--title-->
        <div class="listFoods">
        <?php
            $foodsList = deliveryModel::listarFoods();
            foreach($foodsList as $key => $value){
        ?>
            <div class="boxFood marginDownSmall">
                <figure class="imgProduct positionRelative">
                    <span class="bag">New</span><!--bag-->
                    <img src="<?php echo INCLUDE_PATH; ?>images/<?php echo $value['imagem']; ?>" />
                    <a href="<?php echo INCLUDE_PATH; ?>?addCart=<?php echo $value['id']; ?>" class="favorite"><i data-feather="heart"></i></a>
                    <div class="textProduct">
                        <div class="row marginDownSmallIn">
                            <h4><a href="<?php echo INCLUDE_PATH; ?>produto?id=<?php echo $value['id']; ?>"><?php echo $value['nome']; ?></a></h4>
                        </div><!--row-->
                        <div class="row gridTwo">
                            <div class="col itemsFlex alignCenter">
                                <p><i data-feather="star"></i> 4.7 Avaliações</p>
                            </div><!--col-->
                            <div class="col itemsFlex alignCenter justEnd">
                                <p>R$<?php echo $value['preco']; ?></p>
                            </div><!--col-->
                        </div><!--row-->
                    </div><!--textProduct-->
                </figure><!--imgProduct-->
            </div><!--boxFood-->
        <?php } ?>
        </div><!--listFoods-->
    </div><!--wrap-->
</section><!--shopContent-->