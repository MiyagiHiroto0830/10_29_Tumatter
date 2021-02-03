<?php
session_start();
include("functions.php");
check_session_id();


if (!isset($_FILES['upfile']) || $_FILES['upfile']['error'] != 0 || $_FILES['upfile']["name"] === "") {
    // 送られていない，エラーが発生，などの場合
    // exit('Error:画像が送信されていません');
    $filename_to_save = NULL;
} else {
    // 送信が正常に行われたときの処理
    $uploaded_file_name = $_FILES['upfile']['name']; //ファイル名の取得 
    $temp_path = $_FILES['upfile']['tmp_name']; //tmpフォルダの場所 
    $directory_path = 'upload/'; //アップロード先ォルダ
    //  ファイルの拡張子の種類を取得.
    // ファイルごとにユニークな名前を作成.(最後に拡張子を追加) // ファイルの保存場所をファイル名に追加.
    // コード
    $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
    $unique_name = date('YmdHis') . md5(session_id()) . "." . $extension;
    $filename_to_save = $directory_path . $unique_name;
    // 最終的に「upload/hogehoge.png」のような形になる
    if (!is_uploaded_file($temp_path)) {
        // exit('Error:画像がありません'); // tmpフォルダにデータがない 
    } else { // ↓ここでtmpファイルを移動する
        if (!move_uploaded_file($temp_path, $filename_to_save)) {
            // exit('Error:アップロードできませんでした'); // 画像の保存に失敗
        } else {
            chmod($filename_to_save, 0644); // 権限の変更
        }
    }
}

// 受け取ったデータを変数に入れる
$reply_comment = $_POST['reply_comment'];
$reply_id = $_POST['reply_id'];
$reply_username = $_POST["reply_username"];
$pdo = connect_to_db();
$sql = 'INSERT INTO reply_table(id, reply_comment,reply_id, reply_created_at,reply_username,reply_image) VALUES(NULL, :reply_comment, :reply_id, sysdate(),:reply_username,:reply_image)';
// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':reply_comment', $reply_comment, PDO::PARAM_STR);
$stmt->bindValue(':reply_id', $reply_id, PDO::PARAM_STR);
$stmt->bindValue(':reply_username', $reply_username, PDO::PARAM_STR);
$stmt->bindValue(':reply_image', $filename_to_save, PDO::PARAM_STR);
$status = $stmt->execute();
// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    header("Location:read.php");
    exit();
}
