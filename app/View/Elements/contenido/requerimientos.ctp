<div class="container-fluid" style="min-height: 800px;">
	<div class="row-fluid">
		<div class="span12">
		<?php  foreach ($charges as $charge) { ?>	
			<div class="row-fluid">
				
			
					
						<div class="span12">
							<div class="row-fluid">
								<div class="span12">
									<h3 class = "otrostitle">Aplicar para <?php echo h($charge['Charge']['title']); ?> <span style="float: right;"><h4><?php echo $this->Html->link(h("Volver"),array('controller'=>'Branches','action'=>'select'),array('style'=>'color: #06816A;text-decoration: none;'));  ?></h4></span></h3>
									 
								</div>
							</div>
							
							<br>
					
						</div>
			</div>
		
	<div class="row-fluid">
		<div class="sapn12">
			<div class="row-fluid">
			 <div class="span12">
			 	<p style="margin-bottom: 0px;color:#4D5351"><strong>Fecha límite de admisión del currículum Vitae:</strong></p> 
			 	<?php echo $charge['Charge']['deadline']; ?>
			 	<br>
			 	<br>
			 	 
			 </div>
			</div>
			<div class="row-fluid">
			 <div class="span12">
			 	<p style="margin-bottom: 0px;color:#4D5351"><strong>DESCRIPCIÓN DE LA VACANCIA</strong></p>
			 	
			 	<?php echo $charge['Charge']['description']; ?> 
			 	<br>
			 	<br>
			 </div>
			</div>
			<div class="row-fluid">
			 <div class="span12">
			  	<p style="margin-bottom: 0px;color:#4D5351"><strong>FORMACIóN REQUERIDA</strong></p>
			  	
			 	<?php echo $charge['Charge']['formation']; ?> 
			 	<br>
			 	<br>
			 </div>
			</div>


			 		
			</div>
		</div>
	<br/>
	<br/>
	<br/>
		<div class="row-fluid">
			<div class="span12">
				<div class="requirements  cotizartext" style="width: 85%;background-color: #E4DDCA;margin-left: auto;margin-right: auto;">
						<?php echo $this->FormEnum->create('Requirement',array('type' => 'file','controller'=>'Requirements','action' => 'select')); ?>
						<fieldset class="offset1" >
							<legend> <p class="legend_form"><?php echo __('Le pedimos estar atento(a) a su correo electrónico que será el medio de comunicación con usted:'); ?></p></legend>
							<?php
						
					           echo $this->FormEnum->input('charge_id',array('type' => 'hidden','default'=>  $charge['Charge']['id']));?>
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
									<div class="span3"><p class="stylo_form">Dirección:</p></div>
									<div class="span6" style="text-align: left;"><?php echo $this->FormEnum->input('address',array('type'=>'text','label'=>'','class' => 'cotizarfrm')); ?></div>
								</div>
								<div class="row-fluid">
									<div class="span3"><p class="stylo_form">Teléfono/ Celular:</p></div>
									<div class="span5" style="text-align: left;"><?php echo $this->FormEnum->input('phone',array('label'=>'','class' => 'cotizarfrm')); ?></div>
								</div>
								<div class="row-fluid">
									<div class="span3"><p class="stylo_form">E-mail:</p></div>
									<div class="span6" style="text-align: left;"><?php echo $this->FormEnum->input('email',array('label'=>'','class' => 'cotizarfrm')); ?></div>
								</div>

								<div class="row-fluid">
									<div class="span4"><p class="stylo_form">Adjuntar Currículum Vitae:</p></div>

									<div class="span7" style="text-align: left;">
										<?php echo $this->FormEnum->input('curriculum',array('type'=>'file','label'=>'', 'style'=>"display:none;" )); ?>
										<div class="input-append">
										    <input type="text" name="subfile" id="subfile" class="input-xlarge" required="required">
										    <a class="btn" style="color: #50615C;" onclick="$('#RequirementCurriculum').click();"> Subir Archivo</a>
										</div>
								
										<script type="text/javascript">
											$(document).ready(function(){
											 		// This is the simple bit of jquery to duplicate the hidden field to subfile
											 		$('#RequirementCurriculum').change(function(){
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
						<?php echo $this->Form->end(array('label' => __('&nbsp;&nbsp;&nbsp;&nbsp;Enviar datos&nbsp;&nbsp;&nbsp;&nbsp;', true), 'escape' => false ,'class' => 'ok btn btn-warning btn-large','style'=>'margin-right: 15%;')); ?>
							<br>
					</div>
				</div>
		</div>
		<?php	}?>	
	</div>
</div>

		<br>
		<br>
	<div class="row-fluid">
		<div class="span12">
			<p style="color:#889091">Encuentranos en</p> 
		</div>
	</div>
	<div class="row-fluid">
			<div class="span12">

	<div class="list_carousel responsive" style="height:70px">

					<ul id="foo5" style="height:100%">
						<?php foreach($supermarkets as $supermarket) { ?>
							<li style="width:80px">
							<?php 
						echo $this->Html->link($this->Html->image("supermarket/filename/".$supermarket['Supermarket']['filename'], array("alt" => "Empresa")),$supermarket['Supermarket']['link'],array('escape' => false , 'class' => 'brand','target'=>'_blank'));  
				    	    ?>
							</li>
							<?php }	 ?>
						<?php foreach($supermarkets as $supermarket) { ?>
							<li style="width:80px">
							<?php 
						echo $this->Html->link($this->Html->image("supermarket/filename/".$supermarket['Supermarket']['filename'], array("alt" => "Empresa")),$supermarket['Supermarket']['link'],array('escape' => false , 'class' => 'brand','target'=>'_blank'));  
				    	    ?>
							</li>
							<?php }	 ?>
						<?php foreach($supermarkets as $supermarket) { ?>
							<li style="width:80px">
							<?php 
						echo $this->Html->link($this->Html->image("supermarket/filename/".$supermarket['Supermarket']['filename'], array("alt" => "Empresa")),$supermarket['Supermarket']['link'],array('escape' => false , 'class' => 'brand','target'=>'_blank'));  
				    	    ?>
							</li>
							<?php }	 ?>

					</ul>
				</div>



		

	</div>	
	</div>
</div>