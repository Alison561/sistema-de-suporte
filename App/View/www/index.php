<div>
    <form method="post">
        <input type="text" name="ass" placeholder="Qual é a sua duvida">
        <button>enviar</button>
    </form>

    <div class="chamado">
        <?php foreach ($this->selectAssID() as $key => $value) {?>
            <div class="sup">
                <a href="<?php echo url,$value['id'];?>"><?php echo $value['descricao'];?></a>
            </div>
        <?php } ?>
    </div>
</div>