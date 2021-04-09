<form method="post">
    <input type="text" name="ass">
    <button>enviar</button>
</form>

<?php foreach ($this->selectAssID() as $key => $value) {?>
    <a href="<?php echo url,$value['id'];?>"><?php echo $value['descricao'];?></a>
<?php } ?>