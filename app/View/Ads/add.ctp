<div class="ads form">
<?php echo $this->FormEnum->create('Ad',array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Agregar notificacion'); ?></legend>
	<?php
		echo $this->FormEnum->input('type',array('label' => 'Tipo'));
		echo $this->FormEnum->input('link',array('label' => 'Url'));
		echo $this->FormEnum->input('filename',array('type' => 'file','label' => 'Seleccione una imagen '));
		echo $this->FormEnum->input('dir', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(array('label' => __('&nbsp;&nbsp;&nbsp;&nbsp;Guardar datos&nbsp;&nbsp;&nbsp;&nbsp;', true), 'escape' => false ,'class' => 'ok btn btn-info btn-large')); ?>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar Notificacion'), array('action' => 'index'),array('class' => 'ok btn btn-info btn-large')); ?></li>
	</ul>
</div>
 <p>&nbsp; </p>
 <p>&nbsp; </p>
