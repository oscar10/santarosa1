  <div class="row-fluid">
    <section id="contenido">
   <section id="principal">
   	   	<?php if($this->Session->read('Auth.User.id')){ 
						echo $this->Html->link('Agregar imagen Carousel', array('controller' => 'Carousels', 'action' => 'add',$categories['Category']['id'],$categories['Item']['id'],'1','item'),array('class'=>'btn btn-primary'));

	}?>
<article id="galeria-inicio">
         <div class="flexslider">
      <ul class="slides">
      <?php foreach ($carousel as $carousels) { ?>
    
        <li>
        	<?php if($this->Session->read('Auth.User.id')){ ?>
											
				<?php echo $this->Html->link(__("<i class='icon-pencil'></i>"), array('controller'=>'Carousels','action' => 'edit', $carousels['Carousel']['id'],$categories['Category']['id'],$categories['Item']['id'],'1','item'),array('class' => 'ok btn btn-info ','escape' => false)); ?>
				<?php echo $this->Form->postLink(__("<i class='icon-remove'></i>"), array('controller'=>'Carousels','action' => 'delete', $carousels['Carousel']['id'],$categories['Category']['id'],$categories['Item']['id'],'1','item'),array('class' => 'ok btn btn-info ','escape' => false), __('¿Está seguro de que desea eliminar esta imagen?')); 
			}?>
               <?php echo $this->Html->image("carousel/filename/".$carousels['Carousel']['filename'].""); 
                if($carousels['Carousel']['description']!=""){
               ?> 
               <p class="flex-caption">
                <?php echo $carousels['Carousel']['description'] ?>
               </p>
               <?php } ?>
        </li>
       <?php } ?>
      </ul>
         </div>
      </article>
   </section>
</section>
  </div>

	<div class="row-fluid">
		<div class="span9">
			
			<div class="row-fluid titutlocategoria">
				<div class="span1">
					
					<?php
					foreach ($categories['Category']['ImagesCategory'] as $ImagesCategory) {
					if($ImagesCategory['type']=='Tres'){	?>					
					<h3 style="float: right;"><?php echo $this->Html->image("images_category/filename/".$ImagesCategory['filename']); ?></h3>
					

				<?php }
					}

					?>

				</div>
				<div class="span11">
					<div class="row-fluid">
						<div class="span12">
							<h3>
							<?php echo $this->Html->link($categories['Category']['name']." ".$categories['Item']['name']."&nbsp;&nbsp;&nbsp;&nbsp;", array( 'controller' => 'Categories', 'action' => "select1",$categories['Category']['id']),array('escape' => false,'class' => 'brand producttitle','style' => "color:".$categories['Category']['description']."; text-decoration: none;border-bottom: 6px solid ".$categories['Category']['description'].";")); 
								?>
								<?php if($this->Session->read('Auth.User.id')){ 
								 echo $this->Html->link('Agregar Presentación', array('controller' => 'Presentations', 'action' => 'add',$categories['Category']['id'],$categories['Item']['id'],''),array('class'=>'btn btn-primary'));


								}?>
							</h3>
						</div>
					</div>
				</div>
			</div>
			
			<div class = "row-fluid">
				<ul class = "thumbnails span12 offset1">
				<li class="span5" style="min-height: 10px;"></li>
				<li class="span5" style="min-height: 10px;"></li>
				<?php foreach ($categories['Presentation'] as $presentation) { 
					if($presentation['removed'] != 'si'){
					?>

				<li class="span5  cuadroproducto" style="margin-right: 25px;" >
					<div class="row-fluid">
							<?php if($this->Session->read('Auth.User.id')){ 
							 echo $this->Html->link(__("<i class='icon-pencil'></i>"), array('controller'=>'Presentations','action' => 'edit',$categories['Category']['id'],$categories['Item']['id'], $presentation['id'],'m'),array('class' => 'ok btn btn-info ','escape' => false)); 
							 echo $this->Form->postLink(__("<i class='icon-remove'></i>"), array('controller'=>'Presentations','action' => 'delete',$categories['Category']['id'],$categories['Item']['id'], $presentation['id'],'m'),array('class' => 'ok btn btn-info ','escape' => false), __('Are you sure you want to delete # %s?',$presentation['id']));  
							 echo $this->Html->link('Agregar imagenes', array('controller' => 'ImagesPresentations', 'action' => 'index',$presentation['id']),array('class'=>'btn btn-primary')); 
						}?>
					</div>
					<div class="row-fluid" style="text-align: center" ><!-- ie width 100%-->
						<div class="span12">
							<?php foreach ($presentation['ImagesPresentation'] as $image){ 
							 echo $this->Html->image("images_presentation/filename/".$image['filename'],array('class'=>'imgproductos'));
								break;
							} ?>
						</div>
						<div class="span12 ">
							<!--<h3 class = "itemname"><?php //echo $item['name'] ?> </h3> -->
							<h5 style = <?="color:".$categories['Category']['description'].";"?> ><?php echo $Category['Item']['name'] ?> </h5>
						</div>
						<div class="span12 ">
							<p class = "itemdescription">Presentación <?php echo $presentation['name'] ?> </p>
						</div>
						<div class="span12">
							<?php echo $this->Html->link(__('Saber más'), array('controller' => 'Quotes', 'action' => 'select',$categories['Category']['id'],$categories['Item']['id'],$presentation['id'],'item'), array('class' => 'btn btn-large btn-danger','style' => "background:".$categories['Category']['description'].";")); ?>
						</div>
					</div>

				</li>
			
			<?php
			 }
			}
			 ?>
	
			</ul>
		</div>
		
		<div class='row-fluid'> 
			<div class='span12 offset1'>
				<h4>
				<?php 
					echo $this->Html->link("Volver", array( 'controller' => 'Categories', 'action' => "select"),array('escape' => false , 'class' => 'brand','style'=>"color:".$categories['Category']['description'].";text-decoration: none")); 
				?>
				</h4>
			</div>
		</div>
		<br><br>
			
		</div>

				
		<div class="span3">
		<div class="row-fluid" >
			<?php if($this->Session->read('Auth.User.id')){ 
						echo $this->Html->link('Agregar noticias', array('controller' => 'Ads', 'action' => 'add',$categories['Category']['id'],$categories['Item']['id'],'1','item'),array('class'=>'btn btn-primary'));
						echo $this->Html->link('ver todas', array('controller' => 'Ads', 'action' => 'index'),array('class'=>'btn btn-primary'));
					}?>
			<div class="span12" style="margin: 0;"  >
					<?php if($this->Session->read('Auth.User.id')){ 
				 echo $this->Html->link(__("<i class='icon-pencil'></i>"), array('controller'=>'Ads','action' => 'edit',$ads['Ad']['id'],$categories['Category']['id'],$categories['Item']['id'],'1','item'),array('class' => 'ok btn btn-info ','escape' => false)); 
				 echo $this->Form->postLink(__("<i class='icon-remove'></i>"), array('controller'=>'Ads','action' => 'delete', $ads['Ad']['id'],$categories['Category']['id'],$categories['Item']['id'],'1','item'),array('class' => 'ok btn btn-info ','escape' => false), __('¿Está seguro de que desea eliminar esta noticia?'));
				 }?>
					 <?php if($ads['Ad']['type'] !='video'){ 

						 echo $this->Html->link($this->Html->image(('ad/filename/'.$ads['Ad']['filename']),array('class'=>'noticias')),'http://new.avicola-santarosa.com/img/ad/filename/'.$ads['Ad']['filename'],array('escape' => false , 'class' => 'brand','target'=>'_blank')); 

						} else{ ?>
						<iframe class="noticiavideo" src= <?=$ads['Ad']['link'] ?> frameborder="0" allowfullscreen></iframe>
					 <?php } ?>
				
				<p></p>
			</div>		
			



			<div class="span12 cuadrorecetad" style="text-align:center;margin: 0;">
				<?php if($this->Session->read('Auth.User.id')){ 
								 echo " ".$this->Html->link('Agregar Receta', array('controller' => 'Recipes', 'action' => 'add','1','1','1','categorias'),array('class'=>'btn btn-primary'));


								}?>
				
				<div class="row-fluid" style="text-align:left;" >
					<div class="span12" >
						<h3 class="recipedia">&nbsp;&nbsp;La receta del día</h3>
					</div>
					
				</div>
				<div class="row-fluid" >
					<div class="span12">
						<?php
	                	 		if($this->Session->read('Auth.User.id')){ 
								 echo $this->Html->link('Ver imagenes', array('controller' => 'ImagesRecipes', 'action' => 'index',$recipes['Recipe']['id'],'index'),array('class'=>'btn btn-primary')); 
							}?>
						<?php 
						foreach ($recipes['ImagesRecipe'] as $ImagesRecipe) {
						echo $this->Html->image(("images_recipe/filename/".$ImagesRecipe['filename'].""),array('style' => 'width: 100%;' ));
						break;
						}
						?>
					</div>
					
				</div>
				<div class="row-fluid" >
					<div class="span12">
						<h5 style="color: #2FA4B8"><?php echo $recipes['Recipe']['title']." ";
							if($this->Session->read('Auth.User.id')){ 
							 echo $this->Html->link(__("<i class='icon-pencil'></i>"), array('controller' => 'Recipes','action' => 'edit',$recipes['Recipe']['id'],'1','1','1','categorias'),array('class' => 'ok btn btn-info ','escape' => false)); 
							 echo $this->Form->postLink(__("<i class='icon-remove'></i>"), array('controller'=>'Recipes','action' => 'delete', $recipes['Recipe']['id'],'1','1','1','categorias'),array('class' => 'ok btn btn-info ','escape' => false), __('¿Está seguro de que desea eliminar %s?',$recipes['Recipe']['title'])); }?></h5>
					</div>
				</div>
				<div class="row-fluid" >
					<div class="span12">
						<h5 style="color: #2D6876" ><?php echo $recipes['Recipe']['time'] ?> Minutos - <?=$recipes['Recipe']['portion'] ?> Personas</h5>
					</div>
				</div>				
				<div class="row-fluid">
					<div class="span12">
						<?php echo $this->Html->link(__('Ver receta'), array('controller' => 'Recipes', 'action' => 'select1',$recipes['Recipe']['id'],1), array('class' => 'btn btn-info btn-large'));
							 ?>
					</div>
					
				</div>
			</div>	
			<div class="sapn112">
						<div style="text-align: right">
				<?php echo $this->Html->link(__('Ver todas las recetas...'), array('controller' => 'Recipes', 'action' => 'select'),array('class'=>'verrecetas','style'=>'text-decoration: inherit;'));
							 ?>
						</div>
			</div>	
		</div>
	</div>
</div>




