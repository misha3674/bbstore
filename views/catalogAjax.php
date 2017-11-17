<?php foreach($this->data['products'] as $product) { ?>
  <div class="col-md-6">
    <div class="cart-item">
      <div class="container">
        <div class="row justify-content-center">
            <?php if(count($product->images) > 1) { ?>
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
            <?php } else { ?>
              <div class="col">
                <?php echo $product->popImg(); ?>
              </div>
            <?php } ?>
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
            <a class="btn btn-primary" data-toggle="collapse" 
                href="#info<?php echo $product->id; ?>" 
                aria-expanded="false" aria-controls="collapse">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
            </a>
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
      <div class="collapse show" id="info<?php echo $product->id; ?>">
          <?php echo $product->getInfo(); ?>
      </div>
    </div>
  </div>
  <?php } ?> 