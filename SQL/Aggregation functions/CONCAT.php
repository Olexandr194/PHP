<?php
require_once '../MySQL.php';

$sql = new MySQL;

$sql1 = "SELECT CONCAT(products.title, ' ~ ', products.quantity, ' - ', products.price) as info 
         FROM products";

$resultQuery = $sql->query($sql1);
if ($resultQuery === false) {
    throw new \Exception('Не вірний SQL запит!');
}

?>
<h1>Вивід даних</h1>
<table border="1">
    <thead>
    <th>info</th>
    </thead>
    <tbody>
    <?php foreach ($resultQuery as $row){ ?>
        <tr>
            <td><?=$row["info"]?></td>
        </tr>
    <?php } ?>
    </tbody>

</table>