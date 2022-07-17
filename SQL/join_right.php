<?php
require_once 'MySQL.php';

$sql = new MySQL;

$sql1 = "SELECT categories.id as id, products.title as name, categories.title as title 
         FROM `products` 
         RIGHT JOIN `categories` 
         ON `products`.`category_id` = `categories`.`id`;";

$resultQuery = $sql->query($sql1);
if ($resultQuery === false) {
    throw new \Exception('Не вірний SQL запит!');
}

?>
<h1>Вивід даних</h1>
<table border="1">
    <thead>
    <th>ID</th><th>name</th><th>title</th>
    </thead>
    <tbody>
    <?php foreach ($resultQuery as $row){ ?>
        <tr>
            <td><?=$row["id"]?></td><td><?=$row["title"]?></td><td><?=$row["name"]?></td>
        </tr>
    <?php } ?>
    </tbody>

</table>
