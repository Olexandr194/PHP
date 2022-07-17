<?php
require_once '../MySQL.php';

$sql = new MySQL;

$sql1 = "SELECT categories.title as category, MAX(products.price) as price
         FROM products
         INNER JOIN categories ON products.category_id = categories.id
         GROUP BY categories.title";

$resultQuery = $sql->query($sql1);
if ($resultQuery === false) {
    throw new \Exception('Не вірний SQL запит!');
}

?>
<h1>Вивід даних</h1>
<table border="1">
    <thead>
    <th>category</th><th>Max product price</th>
    </thead>
    <tbody>
    <?php foreach ($resultQuery as $row){ ?>
        <tr>
            <td><?=$row["category"]?></td><td><?=$row["price"]?></td>
        </tr>
    <?php } ?>
    </tbody>

</table>