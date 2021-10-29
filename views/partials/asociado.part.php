   <!-- Box within partners name and logo -->
   <div class="last-box row">
  
        <div class="col-xs-12 col-sm-4 col-sm-push-4 last-block">
        <div class="partner-box text-center">
          <p>
          <i class="fa fa-map-marker fa-2x sr-icons"></i> 
          <span class="text-muted">35 North Drive, Adroukpape, PY 88105, Agoe Telessou</span>
          </p>
          <h4>Our Main Partners</h4>
          <hr>
          <?php foreach ($asociados as $asociadoE):?>
          <div class="text-muted text-left">
            <ul class="list-inline">
              <li><img src="<?=$asociadoE->getUrlLogo()?>" alt="<?=$asociadoE->getDescripcion()?>"></li>
              <li><?=$asociadoE->getNombre()?></li>
            </ul>
          </div>
          <?php  endforeach ?>
        </div>
        </div>
      </div>
    <!-- End of Box within partners name and logo -->
    <!--  <ul class="list-inline">
              <li><img src="images/index/log1.jpg" alt="logo"></li>
              <li>Second Partner Name</li>
            </ul>
            <ul class="list-inline">
              <li><img src="images/index/log3.jpg" alt="logo"></li>
              <li>Third Partner Name</li>

-->