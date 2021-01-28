<?php
session_start();
include("../functions.php");
check_session_id();
if (
    !isset($_POST['reply_comment']) || $_POST['reply_comment'] == ''

) {
    // 項目が入力されていない場合はここでエラーを出力し，以降の処理を中止する
    echo json_encode(["error_msg" => "no input"]);
    exit();
}
// 受け取ったデータを変数に入れる
$reply_comment = $_POST['reply_comment'];
$reply_id = $_POST['reply_id'];
$username = $_POST["username"];
$pdo = connect_to_db();
$sql = 'INSERT INTO reply_table(id, reply_comment,reply_id, reply_created_at,username) VALUES(NULL, :reply_comment, :reply_id, sysdate(),:username)';
// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':reply_comment', $reply_comment, PDO::PARAM_STR);
$stmt->bindValue(':reply_id', $reply_id, PDO::PARAM_STR);
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
