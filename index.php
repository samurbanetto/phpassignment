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
    $path = pg_connect("host=localhost dbname=inventory user=postgres password=postgres")
    if (!$dbconn = pg_connect($path)) die('Could not connect');

    if (!empty($_POST['remove'])) {
        $remove = $_POST['remove'];
        pg_query($dbconn, "DELETE FROM Items WHERE item_id = $remover");
    }
?>

    <div class="left">
        <div class="inputs">
            <h1>inputs</h1>

        </div>
    </div>

    <div class="right">
        <h1>ID Sort</h1>
        <table>
            <tr>
                <th>id</th>
                <th>item</th>
                <th>format</th>
                <th>qnt</th>
                <th>price</th>
                <th>delete</th>
            </tr>
        <?php
        $result = pg_query($dbconn, "SELECT item_id, item_name, item_format, item_qnt, item_price FROM Items");
        while ($row = pg_fetch_row($result)) {
            echo "
            <tr>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>R$$row[3]</td>
                <td>
                    <form action='./index.php' method='post' class='remove-form'>
                        <input type='hidden' id='inputHidden' name='remover' value='$row[0]'>
                        <button type='submit' class='button'>❌</button>
                    </form>
                </td>
            </tr>"
        }
        ?>
        </table>
        <h1>Highest Price sort</h1>
        <table>
            <tr>
                <th>id</th>
                <th>item</th>
                <th>quantidade</th>
                <th>preço</th>
            </tr>
            <?php
                $result = pg_query($dbconn, "SELECT item_id, item_name, item_format, item_qnt, item_price FROM Items WHERE item_price = (SELECT MAX(item_price) FROM Items)");
                while ($row = pg_fetch_row($result)) {
                    echo "
                    <tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>R$$row[3]</td>
                    </tr>";
                }
            ?>
        </table>
        <h1>Lowest Price sort</h1>
        <table>
                <tr>
                    <th>id</th>
                    <th>item</th>
                    <th>quantidade</th>
                    <th>preço</th>
                </tr>
                <?php
                    $result = pg_query($dbConnection, "SELECT item_id, item_name, item_format, item_qnt, item_price FROM Itens WHERE preco_item = (SELECT MIN(item_price) FROM Items)");
                    while ($row = pg_fetch_row($result)) {
                        echo "
                        <tr>
                            <td>$row[0]</td>
                            <td>$row[1]</td>
                            <td>$row[2]</td>
                            <td>R$$row[3]</td>
                        </tr>";
                    }
                ?>
            </table>
    </div>
</body>
</html>