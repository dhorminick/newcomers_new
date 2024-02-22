<?php 
    include 'inc/config.inc.php'; 
    $file_dir = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document <?php echo $site; ?></title>

    <?php include 'inc/header.layout.php'; ?>
</head>
<body>
    <header class="header_four">
    <?php include 'inc/nav.layout.php'; ?>
    </header>

    
    <?php include 'inc/footer.layout.php'; ?>
    <?php include 'inc/scripts.layout.php'; ?>
</body>
</html>