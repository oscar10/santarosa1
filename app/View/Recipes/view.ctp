<div class="recipes view">
<h2><?php  echo __('Recipe'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Portion'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['portion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ingredients'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['ingredients']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Preparation'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['preparation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Recipe'), array('action' => 'edit', $recipe['Recipe']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Recipe'), array('action' => 'delete', $recipe['Recipe']['id']), null, __('Are you sure you want to delete # %s?', $recipe['Recipe']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images Recipes'), array('controller' => 'images_recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Images Recipe'), array('controller' => 'images_recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Images Recipes'); ?></h3>
	<?php if (!empty($recipe['ImagesRecipe'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Filename'); ?></th>
		<th><?php echo __('Dir'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Recipe Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($recipe['ImagesRecipe'] as $imagesRecipe): ?>
		<tr>
			<td><?php echo $imagesRecipe['id']; ?></td>
			<td><?php echo $imagesRecipe['filename']; ?></td>
			<td><?php echo $imagesRecipe['dir']; ?></td>
			<td><?php echo $imagesRecipe['description']; ?></td>
			<td><?php echo $imagesRecipe['recipe_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'images_recipes', 'action' => 'view', $imagesRecipe['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'images_recipes', 'action' => 'edit', $imagesRecipe['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'images_recipes', 'action' => 'delete', $imagesRecipe['id']), null, __('Are you sure you want to delete # %s?', $imagesRecipe['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Images Recipe'), array('controller' => 'images_recipes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
