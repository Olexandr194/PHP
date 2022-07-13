<?php

require_once 'MySQL.php';

$sql = new MySQL(array(
    'host' => 'localhost',
    'username' => 'root',
    'passwords' => 'baohrkirkQEF/55',
    'dbname' => 'laravel_shop',
));

$sql1 = "SELECT   new_orders.id as id, users.name as name, new_orders.product_qty as qty, new_orders.price as price
         FROM new_orders 
         INNER JOIN users ON new_orders.user_id = users.id  
         WHERE (new_orders.product_qty * new_orders.price) IN (SELECT (new_orders.product_qty * new_orders.price)
                              FROM new_orders 
                              WHERE (new_orders.product_qty * new_orders.price) > 300)";

$resultQuery = $sql->query($sql1);
if ($resultQuery === false) {
    throw new \Exception('Не вірний SQL запит!');
}

?>
    <h1>Вивід даних</h1>
    <table border="1">
        <thead>
        <th>id</th><th>name</th><th>qty</th><th>price</th>
        </thead>
        <tbody>
        <?php foreach ($resultQuery as $row){ ?>
            <tr>
                <td><?=$row["id"]?></td><td><?=$row["name"]?></td><td><?=$row["qty"]?></td><td><?=$row["price"]?></td>
            </tr>
        <?php } ?>
        </tbody>

    </table>

