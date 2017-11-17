<button id="scrollup" title="Go to top"><i class="fa fa-angle-up" aria-hidden="true"></i></button>
    
<button id="shop-basket" title="Go to top">
  <i class="fa fa-shopping-cart" aria-hidden="true"></i>
  <span id="count-offer">0</span>
</button>

<div class="modal" id="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
    </div>
  </div>
</div>

    <div class="modal" id="modal-basket">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <table class="table table-striped">
                            <tbody id="list-order">
                                <tr>
                                  <td><h1 class="text-center"><i class="fa fa-spinner fa-spin fa-2x fa-fw" aria-hidden="true"></i></h1></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer justify-content-md-center">
            <div class="wapper-checkout">
                <input type="text" name="namechekout" placeholder="Имя Фамилия" required>
                <input class="phone-mask" type="text" name="phonechekout" placeholder="Телефон" required>
                <a href="javascript:cart.submit()" class="btn btn-primary">Оформить заказ</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <form id="thanks" action="thanks.php" method="POST" style="display:none">
    </form>