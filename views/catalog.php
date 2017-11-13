<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Catalog</title>
    <?php include site_path."views".DIRSEP."partials".DIRSEP."_style.php"; ?>
</head>
<body>
    
    <?php  $this->partials("_header.php"); ?>
      <div class="container">
        <div class="row">
              <?php foreach($this->data['products'] as $product) { ?>
              <div class="col-md-6">
                <div class="cart-item">
                  <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-9">
                          <?php echo $product->popImg(); ?>
                        </div>
                        <div class="col-3">
                          <div class="box-add-photo">
                              <?php echo $product->popImg(); ?>
                              <?php echo $product->popImg(); ?>
                              <?php echo $product->popImg(); ?>
                          </div>
                        </div>
                    </div>
                  </div>
                  <p class="name text-left"><?php echo $product->getName(); ?></p>
                  <div class="container">
                    <div class="row">
                      <div class="col-xl-6 col-md-12 col-6 align-selef-center">
                          <p class="oldprice">
                            <?php 
                              $o = $product->getOldprice();
                              echo  $o ? $o:""; 
                            ?>
                          </p>
                          <p class="price">
                            <?php echo $product->getPrice(); ?>
                          </p>
                      </div>
                      <div class="col-xl-6 col-md-12 col-6">
                        <a class="btn btn-success"  
                              href="javascript:cart.add(
                                '<?php echo $product->getName(); ?>', 
                                '<?php echo $product->getPrice(); ?>'
                              )">
                          <i class="fa fa-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="info">
                      <?php echo $product->getInfo(); ?>
                  </div>
                </div>
              </div>
              <?php } ?> 
        </div>
      </div>
    <?php $this->partials("_footer.php"); ?>
    <?php $this->partials("_modal.php"); ?>

   <?php include site_path."views".DIRSEP."partials".DIRSEP."_javascript.php"; ?>

</body>
</html>