<div class="charges form">
<?php echo $this->Form->create('Charge'); ?>
	<fieldset>
		<legend><?php echo __('Edit Charge'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('branch_id');
		echo $this->Form->input('title');
		echo $this->Form->input('deadline');
		echo $this->Form->input('description');
		echo $this->Form->input('formation');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Charge.id')),array('class' => 'ok btn btn-info btn-large'), __('Are you sure you want to delete # %s?', $this->Form->value('Charge.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Charges'), array('action' => 'index'),array('class' => 'ok btn btn-info btn-large')); ?></li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index'),array('class' => 'ok btn btn-info btn-large')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add'),array('class' => 'ok btn btn-info btn-large')); ?> </li>
		<li><?php echo $this->Html->link(__('List Requirements'), array('controller' => 'requirements', 'action' => 'index'),array('class' => 'ok btn btn-info btn-large')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requirement'), array('controller' => 'requirements', 'action' => 'add'),array('class' => 'ok btn btn-info btn-large')); ?> </li>
	</ul>
</div>