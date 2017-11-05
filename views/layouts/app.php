<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BBStore</title>
    <?php include site_path."views".DIRSEP."partials".DIRSEP."_style.php"; ?>
</head>
<body>
    
    <?php include site_path."views".DIRSEP."partials".DIRSEP."_header.php"; ?>

    <?php echo  $this->registry['content'] ? $this->registry['content']:''; ?>

   <?php include site_path."views".DIRSEP."partials".DIRSEP."_footer.php"; ?>

   <?php include site_path."views".DIRSEP."partials".DIRSEP."_javascript.php"; ?>
</body>
</html>