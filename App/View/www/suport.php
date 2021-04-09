<h1><?php echo $this->selectAss()['descricao']; ?></h1>


<div class="chat">
<?php foreach ($this->receberMsg() as $key => $value) {?>
    <p><?php echo  $value['nome'].':  '.$value['texto'];?></p>
<?php } ?>
</div>
<form method="post">
    <textarea name="msg" id="msg"></textarea>
    <button>enviar</button>
</form>