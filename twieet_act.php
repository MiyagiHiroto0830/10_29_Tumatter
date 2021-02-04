<?php
session_start();
include("functions.php");
check_session_id();


// 画像データの取得
// $img_name = $_FILES['img']['name'];
// $img_type = $_FILES['img']['type'];
// $img_content = file_get_contents($_FILES['img']['tmp_name']);
// $img_size = $_FILES['img']['size'];

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




// ファイル関連の取得
// $file = $_FILES["img"];
// $filename = $file["name"];
// $tmp_path = $file["tmp_name"];
// $file_err = $file["error"];
// $filesize = $file["size"];
// $upload_dir = '/Applications/XAMPP/xamppfiles/htdocs/TUMATTER/img/ ';
// $save_filename = date("YmgHis") . $filename;
// $save_path = $upload_dir . $save_filename;
// // ファイルサイズが1MB未満か
// if ($filesize > 1048756 || $file_err == 2) {
//     echo "ファイルは1MBサイズ以下にしてください";
// }
// 拡張子は画像形式か
// $allow_ext = array("jpg", "jpeg", "png");
// pathinfo()で拡張子取得
// $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
// in_array()で配列の中にあればtrue,なけれがfalth
// strtolower()で小文字にする
// 小文字にした拡張子$file_extが$allow_extの配列の中になかったら
// if (!in_array(strtolower($file_ext), $allow_ext)) {
//     echo "画像ファイルを添付してください";
// }
// 画像をimgフォルダに移動

// move_uploaded_file($tmp_path, $save_path);

// tweet時に投稿内容と同じテーブルに投稿者も登録
$username = $_POST['username'];
$todo = $_POST['todo'];
$pdo = connect_to_db();
$sql = 'INSERT INTO todo_table(id, todo, deadline, created_at, updated_at,username,image) VALUES(NULL, :todo, deadline, sysdate(), sysdate(),:username,:image)';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':image', $filename_to_save, PDO::PARAM_STR);
// $stmt->bindValue(':img_name', $img_name, PDO::PARAM_STR);
// $stmt->bindValue(':img_type', $img_type, PDO::PARAM_STR);
// $stmt->bindValue(':img_content', $img_content, PDO::PARAM_STR);
// $stmt->bindValue(':img_size', $img_size, PDO::PARAM_INT);
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
