<div class="presentations form">
<?php echo $this->Form->create('Presentation'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Presentacion Producto'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label'=>'Nombre'));
		echo ('Descipción derecha');
		echo $this->Form->textarea('description_1',array('class'=>'ckeditor'));
		echo ('Descipción abajo');
		echo $this->Form->textarea('descripcion',array('class'=>'ckeditor'));
		echo $this->Form->input('item_id',array('label' => '','type' => 'hidden','default'=> $items));
		echo $this->Form->input('removed',array('label' => '','type' => 'hidden','default'=> 'no'));
	?>
	</fieldset>
<?php echo $this->Form->end(array('label' => __('&nbsp;&nbsp;&nbsp;&nbsp;Guardar datos&nbsp;&nbsp;&nbsp;&nbsp;', true), 'escape' => false ,'class' => 'ok btn btn-info btn-large')); ?>
</div>

 <p>&nbsp; </p>
 <p>&nbsp; </p>