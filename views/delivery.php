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
            <div class="col-md-12">
                <div class="delevery-text text-center">
                    <h1>ДОСТАВКА</h1>
                    <p class="sub-h">Ми доставим Вам товар будь-яким, зручним Вам способом протягом дня або 2-3 дні, якщо відправка Новою&nbsp;Поштою.</p>
                    <p>Доставка на наступний день після оформлення замовлення, при наявності пледів на складі. Відправляємо Новою&nbsp;Поштою або кур'єром  в межах Києва.
                    </p>
                    <br>
                    <p class="item">кур'єрська доставка: Вартість доставки замовлення становить 50 грн. </p>
                    <p class="item">доставка Новою Поштою: Відправляємо замовлення по всій Україні по тарифу Нової Пошти.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pay-text text-center">
                    <h1 class="text-center">ОПЛАТА</h1>
                    <p class="sub-h text-center">Способи&nbsp;оплати:</p>
                    <p class="item">готівкою, при отриманні (Кур'єрська доставка по Києву)</p>
                    <p>(Оплачуєте вартість замовлення готівкою кур'єру)</p>
                    <p class="item">готівкою, при отриманні</p>
                    <p>(Нова пошта, відправляємо замовлення накладним платежем)</p>
                    <p class="item">повна передоплата </p>
                    <p>(Кур'єрська доставка або Нова пошта)</p>
                    <p>100% передоплата на карту Приват, при цьому економите кошти на відправці)</p>
                    <p>Карта ПРИВАТ БАНКА: 4731185614050448 </p>
                </div>
            </div>
        </div> <!-- row -->
    </div>
    <section class="box-add">
      <h4 class="text-center">Вся продукція та ціни в каталозі товарів</h4>
      <a class="btn btn-danger text-center" href="/catalog">Перейти в каталог</a>
    </section>

    <?php $this->partials("_footer.php"); ?>

   <?php include site_path."views".DIRSEP."partials".DIRSEP."_javascript.php"; ?>

</body>
</html>