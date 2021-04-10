<div class="chamado">
    <?php foreach ($this->selectAssID() as $key => $value) {?>
        <div class="sup">
            <a href="<?php echo url.'admin/'.$value['id'];?>"><?php echo $value['descricao'];?></a>
        </div>
    <?php } ?>
</div>