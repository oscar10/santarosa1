<div class="container">

	<?php foreach ($branches as $branch) { ?>
	<div class="row-fluid">
		<div class="span12">


			<div class="row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<div class="span12">
									<h3 class="otrostitle">Cargos en:  <?php echo $branch['Branch']['name']; 
									if($this->Session->read('Auth.User.id')){ 
								 	echo " ".$this->Html->link('Agregar Cargo', array('controller' => 'Charges', 'action' => 'add',$branch['Branch']['id']),array('class'=>'btn btn-primary'));


								}?></h3>
								</div>
							</div>
							
							<br>
					
				</div>
			</div>
	
		<div class="row-fluid">
			<ul class = "thumbnails">
			<li class="span5">
				
			</li >
			<li class="span5">
				
			</li>
			<?php  foreach ($branch['Charge'] as $charge) {
					if( $charge['deadline'] >= date('Y-m-d')){

			 ?>
				
		<li class="span5 ">
		<div class="row-fluid cuadrovacantes">
			<div class = "infovacantes">
			 <div class="span4">
			 	<?php echo $this->Html->image("cargo.png")?>
			 </div>
			 <div class="span8">
			 	<h4 class = "titlevacantes"><?php echo $charge['title']." ";
							if($this->Session->read('Auth.User.id')){ 
							 echo $this->Html->link(__("<i class='icon-home'></i>"), array('controller' => 'Charges','action' => 'edit',$charge['id'],$branch['Branch']['id']),array('class' => 'ok btn btn-info ','escape' => false)); 
							 echo $this->Form->postLink(__("<i class='icon-home'></i>"), array('controller'=>'Charges','action' => 'delete', $charge['id'],$branch['Branch']['id']),array('class' => 'ok btn btn-info ','escape' => false), __('Are you sure you want to delete # %s?',$charge['id'])); }?> </h4>

			 	<p class = "descriptionvacantes">Fecha Limite de Admision de Curriculum Vitae</p>

			 	<p class = "modificacionvacantes"><?php echo $charge['deadline']  ?></p>
			 	<br>
	         
			 </div>
			</div>
			
			 </div>


		 	<div class="row-fluid " >	
			 		<div class="span12" style="text-align: right;">
			 <?php    echo $this->Form->create('Requirement', array('action' => 'select1'));
	             	 echo $this->Form->input('id',array('type' => 'hidden','default'=> $charge['id']));
	         		 echo $this->Form->end(array('label' => __('Click para Aplicar', true), 'escape' => false ,'class' => 'ok btn btn-warning btn-large')); ?>
	         		</div>
				</div>
			 </li>
	
			 <?php }	}?>
			</ul>
			
		</div>
	</div>

		

	</div>
	<br>
	<br>
	<br>
		<div class="row-fluid">
			<div class="span12">
				<div class="NewRequirement form cotizartext" style="width: 85%;background-color: #E4DDCA;margin-left: auto;margin-right: auto;">
					<?php echo $this->FormEnum->create('NewRequirement',array('type' => 'file','controller'=>'newRequirements','action' => 'select',1)); ?>
					<fieldset class="offset1" >
					<legend style="tex"> <p class="legend_form"><?php echo __('Si usted desea enviar su Curriculum y aplicar fuera de estas areas, llene el siguiente formulario:'); ?></p>
					</legend>
					<?php
					 	 echo $this->FormEnum->input('branch_id',array('type' => 'hidden','default'=>  $branch['Branch']['id']));?>
					<div class="row-fluid">
							<div class="span3"><p class="stylo_form">Cargo de Interes:</p></div>
							<div class="span6" style="text-align: left;"><?php echo $this->FormEnum->input('charge',array('label'=>'','class' => 'cotizarfrm')); ?></div>
					</div>
					<div class="row-fluid">
							<div class="span3"><p class="stylo_form">Nombre Completo:</p></div>
							<div class="span6" style="text-align: left;"><?php echo $this->FormEnum->input('fullname',array('label'=>'','class' => 'cotizarfrm')); ?></div>
					</div>
					<div class="row-fluid">
							<div class="span3"><p class="stylo_form">Fecha de Nacimiento:</p></div>
							<div class="span6" style="text-align: left;"><?php echo $this->FormEnum->input('date_of_birth',array('label'=>'','dateFormat' => 'DMY',   'minYear' => date('Y') -70,'maxYear' => date('Y') -0)); ?></div>
						</div>
						<div class="row-fluid">
							<div class="span3"><p class="stylo_form">Sexo:</p></div>
							<div class="span4" style="text-align: left;"><?php echo $this->FormEnum->input('sex',array('label'=>'','class' => 'cotizarfrm')); ?></div>
						</div>
						<div class="row-fluid">
							<div class="span3"><p class="stylo_form">Direccion:</p></div>
							<div class="span6" style="text-align: left;"><?php echo $this->FormEnum->input('address',array('type'=>'text','label'=>'','class' => 'cotizarfrm')); ?></div>
						</div>
						<div class="row-fluid">
							<div class="span3"><p class="stylo_form">Telefono/ Celular:</p></div>
							<div class="span5" style="text-align: left;"><?php echo $this->FormEnum->input('phone',array('type'=>'text','label'=>'','class' => 'cotizarfrm')); ?></div>
						</div>
						<div class="row-fluid">
							<div class="span3"><p class="stylo_form">E-mail:</p></div>
							<div class="span6" style="text-align: left;"><?php echo $this->FormEnum->input('email',array('type'=>'text','label'=>'','class' => 'cotizarfrm')); ?></div>
						</div>

						<div class="row-fluid">
							<div class="span4"><p class="stylo_form">Adjuntar Curriculum Vitae:</p></div>

							<div class="span7" style="text-align: left;">
								<?php echo $this->FormEnum->input('curriculum',array('type'=>'file','label'=>'', 'style'=>"display:none;" )); ?>
								<div class="input-append">
								    <input type="text" name="subfile" id="subfile" class="input-xlarge">
								    <a class="btn" style="color: #50615C;" onclick="$('#NewRequirementCurriculum').click();"> Subir Archivo</a>
								</div>
						
								<script type="text/javascript">
									$(document).ready(function(){
									 		// This is the simple bit of jquery to duplicate the hidden field to subfile
									 		$('#NewRequirementCurriculum').change(function(){
												$('#subfile').val($(this).val());

											}); 
									 });
								</script>

							</div>
						</div>
						<div class="row-fluid">
							<div class="span3"><p class="stylo_form">Mensaje</p></div>
							<div class="span7" style="text-align: left;"><?php echo $this->FormEnum->input('message',array('label'=>'','class' => 'cotizarfrm'));?></div>
						</div>
						</fieldset>
						<?php echo $this->Form->end(array('label' => __('&nbsp;&nbsp;&nbsp;&nbsp;Enviar datos&nbsp;&nbsp;&nbsp;&nbsp;', true), 'escape' => false ,'class' => 'ok btn btn-warning btn-large','style'=>'margin-right: 13.5%;')); ?>
						<br>


				</div>
			</div>
		</div>
		<?php }  ?>

<div class="row-fluid">
		<div class="span12">
<?php if($this->Session->read('Auth.User.id')){ 
								 echo " ".$this->Html->link('Ver supermercados', array('controller' => 'Supermarkets', 'action' => 'index'),array('class'=>'btn btn-primary'));
								}?>
<div class="list_carousel responsive" style="height:70px">

				<ul id="foo5" style="height:100%">
					<?php foreach($supermarkets as $supermarket) { ?>
						<li style="width:80px">
						<?php 
					echo $this->Html->link($this->Html->image("supermarket/filename/".$supermarket['Supermarket']['filename'], array("alt" => "Empresa")),$supermarket['Supermarket']['link'],array('escape' => false , 'class' => 'brand'));  
			    	    ?>
						</li>
						<?php }	 ?>
					<?php foreach($supermarkets as $supermarket) { ?>
						<li style="width:80px">
						<?php 
					echo $this->Html->link($this->Html->image("supermarket/filename/".$supermarket['Supermarket']['filename'], array("alt" => "Empresa")),$supermarket['Supermarket']['link'],array('escape' => false , 'class' => 'brand'));  
			    	    ?>
						</li>
						<?php }	 ?>
					<?php foreach($supermarkets as $supermarket) { ?>
						<li style="width:80px">
						<?php 
					echo $this->Html->link($this->Html->image("supermarket/filename/".$supermarket['Supermarket']['filename'], array("alt" => "Empresa")),$supermarket['Supermarket']['link'],array('escape' => false , 'class' => 'brand'));  
			    	    ?>
						</li>
						<?php }	 ?>

				</ul>
			</div>



	

</div>	
</div>
</div>
