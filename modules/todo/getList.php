<?php

$json = array();

$query = q("
SELECT *
FROM `info`
");

if(!$query->num_rows) {
$json['info'] = 'no_list';
echo json_encode($json);
exit();
}

$k = 0;
while($row = $query->fetch_assoc()) {
    $json['key'.$k]['id'] = (int)$row['id'];
    $json['key'.$k]['name'] = hc($row['name']);
    $json['key'.$k]['description'] = hc($row['description']);
    $k++;
}
echo json_encode($json);
exit();
