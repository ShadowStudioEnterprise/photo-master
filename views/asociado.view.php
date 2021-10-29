<?php
   include __DIR__ . "/partials/inicio-doc.part.php";
   include __DIR__ . "/partials/nav.part.php";
?>

<!-- Principal Content Start -->
   <div id="asociado">
   	  <div class="container">
   	    <div class="col-xs-12 col-sm-8 col-sm-push-2">
       	   <h1>Asociado</h1>
       	   <hr>
	      <?php include __DIR__."/partials/show-messages.part.php"?>  
			 
		  <form class="form-horizontal" action="/asociado.php" method="POST" enctype="multipart/form-data">
	       	  <div class="form-group">
	       	  	<div class="col-xs-6">
	       	  	    <label class="label-control" for="imagen">Imagen</label>
	       	  		<input class="form-control file" type="file" name="imagen">
	       	  	</div>
	       	  <div class="form-group">
	       	  	<div class="col-xs-12">
					 <label class="label-control" for="nombre">Nombre</label>
	       	  		<textarea class="form-control" type="text" name="nombre" ><?=$nombre;?></textarea>
					 <label class="label-control" for="description">Descripción</label>
	       	  		<textarea class="form-control" type="text" name="description" ><?=$description;?></textarea>
	       	  		<button class="pull-right btn btn-lg sr-button">Enviar</button>
	       	  		
	       	  	</div>
	       	  </div>
	       </form>
	    </div>   
   	  </div>
   </div>
<!-- Principal Content Start -->

<?php
  include __DIR__ . "/partials/fin-doc.part.php";
?>