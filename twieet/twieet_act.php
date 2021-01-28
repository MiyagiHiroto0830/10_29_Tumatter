<?php
session_start();
include("../functions.php");
check_session_id();
// 項目入力のチェック
// 値が存在しないor空で送信されてきた場合はNGにする
if (
    !isset($_POST['todo']) || $_POST['todo'] == ''
) {
    // 項目が入力されていない場合はここでエラーを出力し，以降の処理を中止する
    echo json_encode(["error_msg" => "no input"]);
    exit();
}
$todo = $_POST['todo'];
// tweet時に投稿内容と同じテーブルに投稿者も登録
$username = $_POST['username'];

$pdo = connect_to_db();
$sql = 'INSERT INTO todo_table(id, todo, deadline, created_at, updated_at,username) VALUES(NULL, :todo, deadline, sysdate(), sysdate(),:username)';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$status = $stmt->execute();
// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    header("Location:../read.php");
    exit();
}
