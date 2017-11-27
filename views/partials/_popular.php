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
                      <div class="col-12">
                        <?php echo $product->popImg(); ?>
                      </div>
                    </div>
                  </div>
                  <p class="name text-center"><?php echo $product->getName(); ?></p>
                  <p class="info"><?php echo $product->getInfo(); ?></p>
                  <div class="container">
                    <div class="row">
                      <div class="col-xl-6 col-md-12 align-selef-center">
                        <div class="row">
                        <?php 
                          $o = $product->getOldprice();
                          if($o) {
                        ?>
                          <div class="col-6 align-self-center">
                            <p class="oldprice text-center">
                              <?php
                                echo  $o ? $o:""; 
                              ?> грн.
                            </p>
                          </div>
                        <?php } ?>
                        <div class="col">
                          <p class="price text-center">
                            <?php echo $product->getPrice(); ?> грн.
                          </p>
                        </div>
                      </div>
                      </div>
                      <div class="col-xl-6 col-md-12 align-selef-center">
                        <a class="btn btn-success"  
                              href="javascript:cart.add(
                                '<?php echo $product->getName(); ?>', 
                                '<?php echo $product->getPrice(); ?>'
                              )">
                          <span>Замовити</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
            <?php } ?>   
        </div>
      </div>
    </div>
    <a href="catalog.php" class="btn btn-advice text-center">Весь каталог</span></a>
  </div>
</section>