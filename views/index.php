<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BBStore</title>
    <?php include site_path."views".DIRSEP."partials".DIRSEP."_style.php"; ?>
</head>
<body>

    <?php 

        $this->partials("_header.php");
        $this->partials("_banner.php");
        $this->partials("_advantage.php");
        $this->partials("_popular.php");
        $this->partials("_advice.php");
        $this->partials("_adItem.php");
        $this->partials("_blockCatalog.php");
        $this->partials("_fan.php");
        $this->partials("_reviews.php");
        $this->partials("_footer.php");
        $this->partials("_modal.php");

    ?>

   <?php include site_path."views".DIRSEP."partials".DIRSEP."_javascript.php"; ?>
</body>
</html>