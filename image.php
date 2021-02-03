<?php
require_once 'functions.php';

$pdo = connect_to_DB();

$sql = 'SELECT * FROM todo_table WHERE id = :id LIMIT 1';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$image = $stmt->fetch();

header('Content-type: ' . $image['img_type']);
echo $image['img_content'];

unset($pdo);
exit();
