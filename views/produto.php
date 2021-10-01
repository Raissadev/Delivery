<style> footer{display:none !important;} </style>
<?php
    $id = (int)$_GET['id'];
    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_foods` WHERE id = ?");
    $sql->execute(array($id));

    $food = $sql->fetch();

?>
<section class="productContent">
    <div class="wrap">
        <figure class="singleImg">
            <img src="<?php echo INCLUDE_PATH; ?>images/<?php echo $food['imagem']; ?>" />
        </figure><!--singleImg-->
        <div class="infosProduct positionRelative center">
            <div class="row marginDownSmall">
                <h4 class="marginDownSmallIn"><?php echo $food['nome']; ?></h4>
                <p><?php echo $food['descricao']; ?></p>
            </div><!--row-->
            <div class="row optionsProduct">
                <h5>Tamanho</h5>
                <p><input type="radio" /> <span class="w70">Café Pequeno</span> <span class="ml">45ML</span></p>
                <p><input type="radio" /> <span class="w70">Café Médio</span> <span class="ml">100ML</span></p>
                <p><input type="radio" /> <span class="w70">Café Grande</span> <span class="ml">200ML</span></p>
            </div><!--row-->
        </div><!--infosProduct-->
    </div><!--wrap-->
</section><!--productContent-->

<div class="divisor"></div><!--divisor-->
<section class="addToCartContent w100">
    <div class="wrap itemsFlex alignCenter w90 center">
        <div class="col w30">
            <input type="number" class="w100 textCenter" value="1" />
        </div><!--col-->
        <div class="col w70 itemsFlex alignCenter justCenter">
            <a href="<?php echo INCLUDE_PATH; ?>?addCart=<?php echo $food['id']; ?>" class="button w90 textCenter">Adicionar ao carrinho</a><!--button-->
        </div><!--col-->
    </div><!--wrap-->
</section><!--addToCartContent-->