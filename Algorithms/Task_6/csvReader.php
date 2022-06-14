<?php

$csvFile = fopen('data.csv', 'r');
$data = fgetcsv($csvFile, 1000, ',');
$all_record = [];

while (($data = fgetcsv($csvFile, 1000, ',')) !== FALSE){
    $all_record[] = $data;
}
fclose($csvFile);
?>

<h1>Вивід даних</h1>
<table border="1">
    <thead>
    <th>ID</th><th>First name</th><th>Second name</th><th>Email</th><th>Gender</th><th>IP address</th>
    </thead>
    <tbody>
    <?php foreach ($all_record as $r){ ?>
        <tr>
            <td><?=$r[0]?></td><td><?=$r[1]?></td><td><?=$r[2]?></td><td><?=$r[3]?></td><td><?=$r[4]?></td><td><?=$r[5]?></td>
        </tr>
    <?php } ?>
    </tbody>

</table>
