<section>

    <div class="h1">
        <h1><?php echo $this->selectAss()['descricao']; ?></h1>
    </div>
    <div>
        <div class="chat">
            <?php foreach ($this->receberMsg() as $key => $value) {?>
                <p><?php echo  '<span>'.$value['nome'].':</span>  '.$value['texto'];?></p>
            <?php } ?>
        </div>
        <form method="post">
            <textarea name="msg" id="msg"></textarea>
            <button>enviar</button>
        </form>
    </div>
</section>