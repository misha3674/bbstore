<header>
    <nav class="navbar navbar-dark bg-custom">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        <a class="navbar-brand" href="/">
        <img src="/img/logo.jpg" id="logo" class="d-inline-block align-top" alt="BestBlanket">
      </a>
    <button id="shop-basket" title="Go to top">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
          <span id="count-offer">0</span>
    </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/' ? 'active':''?>">
            <a class="nav-link" href="/">Головна</a>
          </li>
          <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/catalog' ? 'active':''?>">
            <a class="nav-link" href="/catalog">Каталог товарів</a>
          </li>
          <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/delivery' ? 'active':''?>">
            <a class="nav-link" href="/delivery">Доставка і Оплата</a>
          </li>
          <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/certification' ? 'active':''?>">
            <a class="nav-link" href="/certification">Сертифікати</a>
          </li>
          <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/gallery' ? 'active':''?>">
            <a class="nav-link" href="/gallery">Галерея</a>
          </li>
          <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/contacts' ? 'active':''?>">
            <a class="nav-link" href="/contacts">Контакти</a>
          </li>
        </ul>
      </div>
    </nav>
</header>