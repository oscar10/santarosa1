  <?php $id_receta= null; ?>
  <div class="row-fluid">
    <section id="contenido">
   <section id="principal">
   	   	<?php if($this->Session->read('Auth.User.id')){ 
						echo $this->Html->link('Agregar imagen Carousel', array('controller' => 'Carousels', 'action' => 'add',$id_receta,$count,'1','recetas1'),array('class'=>'btn btn-primary'));

	}?>
<article id="galeria-inicio">
         <div class="flexslider">
      <ul class="slides">
      <?php foreach ($carousel as $carousels) { ?>
    
        <li>
        	<?php if($this->Session->read('Auth.User.id')){ ?>
											
				<?php echo $this->Html->link(__("<i class='icon-pencil'></i>"), array('controller'=>'Carousels','action' => 'edit', $carousels['Carousel']['id'],$id_receta,$count,'1','recetas1'),array('class' => 'ok btn btn-info ','escape' => false)); ?>
				<?php echo $this->Form->postLink(__("<i class='icon-remove'></i>"), array('controller'=>'Carousels','action' => 'delete', $carousels['Carousel']['id'],$id_receta,$count,'1','recetas1'),array('class' => 'ok btn btn-info ','escape' => false), __('¿Está seguro de que desea eliminar esta imagen?')); 
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
			<div class="row-fluid">
				<div class="span1">
					<h3 style="float: right;"><?php echo $this->Html->image("icon-recetas.jpg")?></h3>
				</div>
				<div class="span11">
							<h3 class = "recipetitle">Recetas</h3>
					<br>					
				</div>
			</div>

			<div class="row-fluid">
				<div class="span11 offset1">
					<?php
						$coun = 1;
					 foreach ($recipes as $recipes) { ?>
			<div class= "itemreceta">
				<div  class="row-fluid">
				<div class="span5">
						<?php 
						$id_receta = $recipes['Recipe']['id'];						
						 ?>

					<section id="contenido">
					   <section id="principal">
							<article id="galeria-inicio">
					      	   <div class="flexslider">
					    		  <ul class="slides">
					  			    <?php  //variable golbal
					  			   foreach ($recipes['ImagesRecipe'] as $ImagesRecipe) {
									?>										
									<li>								
						    	    <?php echo $this->Html->image(("images_recipe/filename/".$ImagesRecipe['filename'].""),array('style'=>'width: 100%;')) ?>
						    	     <p class="flex-caption" style="background: transparent;">
						                <?php echo $ImagesRecipe['description'] ?>
						             </p>
									</li>
									<?php
								} ?>

					   		      </ul>
					         </div>
					      </article>
					   </section>
					</section>		


				</div>

				<div class="span7">
					<div class="row-fluid">
						<div class="span12">
							<h4 class = "recipeitemtitle"><?php echo $recipes['Recipe']['title'] ?></h4>
						</div>
					</div>
					<div class="row-fluid">
							<div class="span12">
								<div><p class = "recipetitledescription"> Tiempo de cocción:</p></div>
								<div><p  class="textoinfo">&nbsp;<?php echo $recipes['Recipe']['time'] ?>&nbsp;min</p></div> 
							</div>
					</div>
					

					<div class="row-fluid">
							<div class="span12">
								<div><p class = "recipetitledescription"> Número de porciones:</p></div>
								<div><p  class="textoinfo">&nbsp;<?php echo $recipes['Recipe']['portion'] ?>&nbsp;personas</p></div> 
							</div>
					</div>
					<p class="visible-desktop visi">&nbsp; </p>
                	 <p class="visible-desktop visi">&nbsp; </p>
					 <p class="visible-desktop visi">&nbsp; </p>
					 



				</div>
				</div>
					
				<div class="row-fluid">
					<div class="span12">
						<h4 class = "recipeitemsubtitle">Ingredientes</h4>
						<p class="textoinfo"><?php echo html_entity_decode(h($recipes['Recipe']['ingredients'])) ?> </p>
					</div>
					
				</div>
					<div class="row-fluid">
					<div class="span12">
						<h4 class = "recipeitemsubtitle">Preparación</h4>
						<p class="textoinfo"><?php echo html_entity_decode(h($recipes['Recipe']['preparation'])); ?></p>
					</div>
				</div>
				<br>
					<div class="row-fluid">
						<div class="span5">
							<?php echo $this->Html->link(__('Volver'), array('controller' => 'Recipes', 'action' => 'select'), array('class' => 'btn btn-info btn-large')); ?>
						</div>
					</div>
				<br>
				<br>
				<br>
				<br>
				<br>
			</div>
			<?} ?>
			<div class="paginator" style="float: right;">
			<?php 


			// Shows the next and previous links
			echo $this->Paginator->prev('« Anterior', null, null, array('class' => 'disabled'));
			  //Shows the page numbers
			echo "&nbsp;".$this->Paginator->numbers()."&nbsp;";
			echo $this->Paginator->next('Siguiente »', null, null, array('class' => 'disabled'));

			// prints X of Y, where X is current page and Y is number of pages
			//echo $this->Paginator->counter();
			        ?>
			</div>


			
				</div>

			</div>

			

		</div>
		<div class="span3">
		<?php if($this->Session->read('Auth.User.id')){ 
				
			 echo $this->Html->link('ver todas', array('controller' => 'Ads', 'action' => 'index'),array('class'=>'btn btn-primary')); 
		} ?><?php if($this->Session->read('Auth.User.id')){ 
						echo $this->Html->link('Agregar noticias', array('controller' => 'Ads', 'action' => 'add',$id_receta,$count,'1','recetas1'),array('class'=>'btn btn-primary'));
						
					}?>
				<div class="row-fluid">
		<?php foreach ($ads as $value) { ?>
			
				<div class="span12 " style="margin: 0;" >
					<?php if($this->Session->read('Auth.User.id')){ 
				 echo $this->Html->link(__("<i class='icon-pencil'></i>"), array('controller'=>'Ads','action' => 'edit',$value['Ad']['id'],$id_receta,$count,'1','recetas1'),array('class' => 'ok btn btn-info ','escape' => false)); 
				 echo $this->Form->postLink(__("<i class='icon-remove'></i>"), array('controller'=>'Ads','action' => 'delete', $value['Ad']['id'],$id_receta,$count,'1','recetas1'),array('class' => 'ok btn btn-info ','escape' => false), __('¿Está seguro de que desea eliminar esta noticia?'));
				 }?>
				<?php if($value['Ad']['type'] !='video'){
				echo $this->Html->link($this->Html->image(('ad/filename/'.$value['Ad']['filename']),array('class'=>'noticias')),'http://new.avicola-santarosa.com/img/ad/filename/'.$value['Ad']['filename'],array('escape' => false , 'class' => 'brand','target'=>'_blank')); 
					
				} else{ ?>
				<iframe class="noticiavideo" src= <?=$value['Ad']['link'] ?> frameborder="0" allowfullscreen></iframe>
				<?php } ?>
				<p > </p>

				</div>
			<?php } ?>	
		</div>
	</div>
</div>
</div>


<p>&nbsp; </p>
<p>&nbsp; </p>
