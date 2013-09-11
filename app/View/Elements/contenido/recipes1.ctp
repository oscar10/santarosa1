
  <div class="row-fluid">
    <section id="contenido">
   <section id="principal">
<article id="galeria-inicio">
         <div class="flexslider">
      <ul class="slides">
      <?php foreach ($carousel as $carousels) { ?>
    
        <li>
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

<div class="container">
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
						foreach ($recipes['ImagesRecipe'] as $ImagesRecipe) {
						echo $this->Html->image(("images_recipe/filename/".$ImagesRecipe['filename'].""),array('class'=>'recipeadsbeneficeimg'));
						break;
						} ?>
				</div>
				<div class="span7">
					<div class="row-fluid">
						<div class="span12">
							<h3 class = "recipeitemtitle"><?php echo $recipes['Recipe']['title'] ?></h3>
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
					<br>


					<div class="row-fluid">
						<div class="span5">
							<?php echo $this->Html->link(__('Volver'), array('controller' => 'Recipes', 'action' => 'select'), array('class' => 'btn btn-info btn-large')); ?>
						</div>
					</div>
				</div>
				</div>
					<p class="visible-desktop">&nbsp; </p>
                	 <p class="visible-desktop">&nbsp; </p>
				<div class="row-fluid">
					<div class="span7">
						<h3 class = "recipeitemsubtitle">Ingredientes</h3>
						<?php foreach ($recipes['Ingredient'] as $ingredients) {?>
						<p class="textoinfo"> <?php echo $ingredients['amount']; ?> : <?php echo $ingredients['name']; ?> </p>
							
						<?php } ?>
					</div>
					
				</div>
				<div class="row-fluid">
					<div class="span7">
						<h3 class = "recipeitemsubtitle">Preparacion</h3>
						<p class="textoinfo"><?php echo $recipes['Recipe']['preparation'] ?>personas</p>
					</div>
				</div>
			</div>
			<?} ?>
<div class="paginator" style="float: right;">
<?php 


// Shows the next and previous links
echo $this->Paginator->prev('« Anterior Receta', null, null, array('class' => 'disabled'));
  //Shows the page numbers
echo "&nbsp;".$this->Paginator->numbers()."&nbsp;";
echo $this->Paginator->next('Siguiente Receta »', null, null, array('class' => 'disabled'));

// prints X of Y, where X is current page and Y is number of pages
//echo $this->Paginator->counter();
        ?>
</div>


			
				</div>

			</div>

			

		</div>
		<div class="span3">
		
				<div class="row-fluid">
		<?php foreach ($ads as $value) { ?>
				<div class="span12 " style="margin: 0;" >

				<?php if($value['Ad']['type'] !='video'){
				echo $this->Html->image(('ad/filename/'.$value['Ad']['filename']),array('class'=>'noticias'));
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
</div>


         <p>&nbsp; </p>
 <p>&nbsp; </p>