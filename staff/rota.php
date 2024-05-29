<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <?php include 'includes/header_link.php'; ?>
    
    
  </head>
  <style>
    [v-cloak] {
      display: none;
    }
  </style>
  <body>
    <div id="user" v-cloak class="container-scroller">
      <?php include 'includes/sidebar.php'; ?>
      <div class="container-fluid page-body-wrapper">
        <?php include 'includes/header.php'; ?>
        <div class="main-panel">
        <div class="hero">
          <div id="calendar"></div>
        </div>
        
        </div>
      </div>
    </div>
    
    <?php include 'includes/footer_link.php'; ?>

    
  </body>
</html>