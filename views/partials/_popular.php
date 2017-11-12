<section>
  <div class="container">
    <div class="row">
      <div class="col">
        <h2 class="text-center">Популярні товари</h2>
        <div id="slider-popular">
            <?php foreach($this->data['products'] as $product) { ?>
              <div class="cart-item">
                <div class="container">
                  <div class="row justify-content-center">
                      <div class="col-9">
                        <?php echo $product->getMainImg(); ?>
                      </div>
                      <div class="col-3">
                        <div class="box-add-photo">
                            <?php echo $product->popAddImg(); ?>
                            <?php echo $product->popAddImg(); ?>
                            <?php  if(preg_match('/luxury/',$product->getName())) { ?>
                            <a href="offer/02.jpg">
                                <img src="offer/002.jpg" alt="sorry">
                            </a>
                            <?php }else { ?>
                                <a href="offer/01.jpg">
                                    <img src="offer/001.jpg" alt="sorry">
                                </a>    
                            <?php } ?>
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
            <?php } ?>   
        </div>
      </div>
    </div>
    <a href="catalog.php" class="btn btn-advice text-center">Весь каталог</span></a>
  </div>
</section>