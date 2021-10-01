<?php
    if(!isset($_SESSION['carrinho'])){
        die('Você não possui items no carrinho');
    }
?>
<section class="mapContent">
    <div class="wrap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2822.7806761080233!2d-93.29138368446431!3d44.96844997909819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52b32b6ee2c87c91%3A0xc20dff2748d2bd92!2sWalker+Art+Center!5e0!3m2!1sen!2sus!4v1514524647889" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div><!--wrap-->
</section><!--mapContent-->

<section class="productContent cardItems">
    <div class="wrap">
        <div class="infosProduct positionRelative center">
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
            ?>
            <div class="boxFood marginDownSmall itemsFlex">
                <figure class="w25 marginRightDefault">
                    <img src="<?php echo INCLUDE_PATH; ?>images/<?php echo $items['imagem']; ?>" />
                </figure>
                <div class="row itemsFlex w75">
                    <div class="col w70">
                        <h4 class="marginDownSmallIn"><?php echo $items['nome']; ?> <br /> Coffe Medium</h4>
                        <p class="limitLineClampOne"><?php echo $items['descricao']; ?></p>
                    </div><!--col-->
                    <div class="col w30">
                        <div class="textRight marginDownSmallIn">
                            <p>R$ 96.00</p>
                        </div>
                        <div class="textRight">
                            <input type="number" class="w70 textCenter" value="1" />
                        </div>
                    </div><!--col-->
                </div><!--row-->
            </div><!--boxFood-->
        <?php } ?>
            <div class="title itemsFlex alignCenter marginDownSmallIn w100 center">
                <h3 class="w70"><a href="<?php echo INCLUDE_PATH; ?>finalizar-pedido">Finalizar</h3></a>
                <div class="itemsFlex alignCenter justEnd w30">
                    <h4>R$ <?php echo number_format($valor, 2, ',', ' '); ?></h4>
                </div><!---->
            </div><!--title-->
        </div><!--infosProduct-->
    </div><!--wrap-->
</section><!--productContent-->