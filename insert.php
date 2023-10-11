<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho SQL</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
<?php
    error_reporting(0)
    $path = pg_connect("host=localhost dbname=inventory user=admin password=admin")
    if (!$dbconn = pg_connect($path)) die('Could not connect');
?>

    <div class="container">
        <h1>Add Items</h1>
            <form action="./insert.php" method="post">
                <label for="item">Item name:</label>
                <input type="text" name="item">
                <label for="format">Item format:</label>
                <input type="text" name="format">
                <label for="qnt">Item quantity in stock:</label>
                <input type="text" name="qnt">
                <label for="price">Item price:</label>
                <input type="text" name="price">
                <div class="form-buttons">
                    <a href="./index.php" class="button">check inventory</a>
                    <button type="submit" name="add" class="button">post</button>
                </div>
                <?php
                    pg_query($dbConnection, "INSERT INTO Items (item_name, item_format, item_qnt, item_price) VALUES ('".$_POST['item']."','".$_POST['fornat']."',".$_POST['qnt'].",".$_POST['price'].");");
                ?>
            </form>
    </div>
</body>
</html>