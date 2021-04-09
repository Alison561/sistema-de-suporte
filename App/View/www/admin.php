<?php foreach ($this->selectAssID() as $key => $value) {?>
    <a href="<?php echo url.'admin/'.$value['id'];?>"><?php echo $value['descricao'];?></a>
<?php } ?>