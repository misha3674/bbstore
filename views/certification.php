<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BBStore</title>
    <?php include site_path."views".DIRSEP."partials".DIRSEP."_style.php"; ?>
</head>
<body>

    <?php  $this->partials("_header.php"); ?>

    <div class="container block-certif">
        <h1 class="text-center headline-certif">СЕРТИФІКАТИ ЯКОСТІ</h1>
        <p class="sub-h text-center">Сертифіковане виробницвто.Наше виробницвто і вся продукція пройшла сертифікацію якості міністерства охорони здоров’я</p>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-6">
                <div class="w-img-certif">
                  <a href="/img/one.jpg" target="_blank"><img class="card-img-top rounded mx-auto d-block" src="/img/one.jpg" alt="certifimgication"></a>
                </div>
                <h4 class="card-title text-center">Висновок державної-епдеміологічної експертизи</h4>
            </div>
            <div class="col-md-3 col-sm-6 col-6">
                <div class="w-img-certif">
                  <a href="/img/two.jpg" target="_blank"><img class="card-img-top rounded mx-auto d-block" src="/img/two.jpg" alt="certification"></a>
                </div>
                <h4 class="card-title text-center margin">Висновок державної-епдеміологічної експертизи</h4>
            </div>
            <div class="col-md-3 col-sm-6 col-6">
                <div class="w-img-certif">
                    <a href="/img/three.jpg" target="_blank"><img class="card-img-top rounded mx-auto d-block" src="/img/three.jpg" alt="certification"></a>
                </div>
                <h4 class="card-title text-center">Протокол державної-епідеміологічної експертизи</h4>
            </div>
            <div class="col-md-3 col-sm-6 col-6">
                <div class="w-img-certif">
                    <a href="/img/four.jpg" target="_blank"><img class="card-img-top rounded mx-auto d-block" src="/img/four.jpg" alt="certification"></a>
                </div>
                <h4 class="card-title text-center">Звіт до протоколу державної-епідеміологічної експертизи</h4>
            </div>
        </div>
    </div>
    
   <?php $this->partials("_footer.php"); ?>
    <?php $this->partials("_modal.php"); ?>

   <?php include site_path."views".DIRSEP."partials".DIRSEP."_javascript.php"; ?>
</body>
</html>