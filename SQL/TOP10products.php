<?php
require_once 'MySQL.php';

$sql = new MySQL;

$sql1 = "SELECT products.title as title, products.price as price
         FROM products 
         ORDER BY price DESC
         LIMIT 10";

$resultQuery = $sql->query($sql1);
if ($resultQuery === false) {
    throw new \Exception('Не вірний SQL запит!');
}

?>
<h1>Вивід даних</h1>
<table border="1">
    <thead>
    <th>Top 10 most expensive products</th><th>price</th>
    </thead>
    <tbody>
    <?php foreach ($resultQuery as $row){ ?>
        <tr>
            <td><?=$row["title"]?></td><td><?=$row["price"]?></td>
        </tr>
    <?php } ?>
    </tbody>

</table>