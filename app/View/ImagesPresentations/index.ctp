<div class="imagesPresentation index">
	<h2><?php echo __('Imagenes Presentacion'); ?></h2>
	<table class = "table" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo ('Seleccione una imagen'); ?></th>
			<th><?php echo ('Directorio'); ?></th>
			<th><?php echo ('Descripcion'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($imagesPresentation as $imagesPresentation): ?>
	<tr>
		
		<td><?php echo $this->Html->image('images_presentation/filename/'.h($imagesPresentation['ImagesPresentation']['filename'])); ?>&nbsp;</td>
		<td><?php echo h($imagesPresentation['ImagesPresentation']['dir']); ?>&nbsp;</td>
		<td><?php echo h($imagesPresentation['ImagesPresentation']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $imagesPresentation['ImagesPresentation']['id'],$id_presentacion),array('class' => 'ok btn btn-info btn-large')); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $imagesPresentation['ImagesPresentation']['id'],$id_presentacion),array('class' => 'ok btn btn-info btn-large'), __('Are you sure you want to delete # %s?', $imagesPresentation['ImagesPresentation']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="row">
		<?php echo $this->Html->link(__('Nueva imagen'), array('action' => 'add',$id_presentacion),array('class' => 'ok btn btn-info btn-large')); ?>
	</div>
</div>
<br><br>
<br>
<br>
 <p>&nbsp; </p>
 <p>&nbsp; </p>