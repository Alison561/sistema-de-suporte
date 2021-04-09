<div class="chat">
<?php foreach ($this->receberMsg() as $key => $value) {?>
    <p><?php echo  $value['nome'].':  '.$value['texto'];?></p>
<?php } ?>
</div>
<form method="post">
    <textarea name="msg" id="msg"></textarea>
    <input type="submit" name="finalizar" value="finalizar">
    <button>enviar</button>
</form>