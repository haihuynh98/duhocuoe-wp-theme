<!-- header styles -->

<?php
   $localFonts = apply_filters('get_local_fonts', '');
?>
<?php if ($localFonts) : ?> 
   <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/<?php echo $localFonts; ?>" media="screen" type="text/css" />
<?php else : ?>
   <?php endif; ?>
<link id="u-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
<style> .u-header {
  background-image: none;
}
.u-header .u-sheet-1 {
  min-height: 100px;
}
.u-header .u-image-1 {
  width: 112px;
  height: 66px;
  margin: 17px auto 0 0;
}
.u-header .u-logo-image-1 {
  width: 100%;
  height: 100%;
}
.u-header .u-menu-1 {
  margin: -49px 0 0 auto;
}
.u-header .u-nav-1 {
  font-weight: 700;
  font-size: 1rem;
  text-transform: uppercase;
}
.u-header .u-sidenav-1 {
  width: 301px;
  margin-right: 0;
  margin-left: 0;
}
.u-header .u-nav-5 {
  font-size: 1.25rem;
  width: 240px;
  margin: 20px 20px 0 auto;
}
@media (max-width: 1199px) {
  .u-header .u-image-1 {
    width: 112px;
  }
  .u-header .u-menu-1 {
    width: auto;
    margin-top: -49px;
  }
  .u-header .u-nav-5 {
    margin-right: 20px;
  }
}
@media (max-width: 991px) {
  .u-header .u-nav-5 {
    width: 240px;
  }
}
@media (max-width: 767px) {
  .u-header .u-nav-5 {
    width: 251px;
  }
}
@media (max-width: 575px) {
  .u-header .u-nav-5 {
    width: 260px;
    margin-right: auto;
  }
}</style>
