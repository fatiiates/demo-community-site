
<?php

$slider_query="select * from ana_slider where slider_durum = 1 order by slider_id desc";
$slidercek=mysqli_query($conn ,$slider_query);

if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
  header("Location:error.php");
  exit;
}


 ?>

<div class="container-limiter">
  <div class="slider-container">
    <div class="slider-control left inactive"></div>
    <div class="slider-control right"></div>
    <ul class="slider-pagi"></ul>
    <div class="slider">
      <?php
        $i=0;
        while ($slider_result=mysqli_fetch_array($slidercek)) {
          $durum="";
          if ($i == 0)
            $durum=" active";
        ?>

        <div class="slide slide-<?php echo $i.$durum; ?>">
          <div class="slide__bg" style="background-image:url(<?php echo $slider_result['slider_resimyolu']; ?>)" ></div>
          <div class="slide__content">
            <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
              <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
            </svg>
            <div class="slide__text">
              <h2 class="slide__text-heading"><?php echo $slider_result['slider_baslik']; ?></h2>
              <p class="slide__text-desc"><?php echo $slider_result['slider_aciklama']; ?></p>
              <a href="<?php echo $slider_result['slider_url']; ?>" class="slide__text-link">Projeyi İncele</a>
            </div>
          </div>
        </div>

        <?php
          $i++;
        }

       ?>
    </div>
      <!--<div class="slide slide-1 ">
        <div class="slide__bg"></div>
        <div class="slide__content">
          <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
            <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
          </svg>
          <div class="slide__text">
            <h2 class="slide__text-heading">Project name 2</h2>
            <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p>
            <a class="slide__text-link">Project link</a>
          </div>
        </div>
      </div>
      <div class="slide slide-2">
        <div class="slide__bg"></div>
        <div class="slide__content">
          <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
            <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
          </svg>
          <div class="slide__text">
            <h2 class="slide__text-heading">Project name 3</h2>
            <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p>
            <a class="slide__text-link">Project link</a>
          </div>
        </div>
      </div>
      <div class="slide slide-3">
        <div class="slide__bg"></div>
        <div class="slide__content">
          <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
            <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
          </svg>
          <div class="slide__text">
            <h2 class="slide__text-heading">Project name 4</h2>
            <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p>
            <a class="slide__text-link">Project link</a>
          </div>
        </div>
      </div>-->
    </div>
  </div>
</div>
