<?php
session_start();
include("../functions.php");
check_session_id();
// 送信データ受け取り
$reply_id = $_GET["id"];
$username = $_SESSION["username"];
$pdo = connect_to_db();
// $sql = 'SELECT * FROM reply_table';
// $stmt = $pdo->prepare($sql);
// $status = $stmt->execute();
// if ($status == false) {
//     // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
//     $error = $stmt->errorInfo();
//     echo json_encode(["error_msg" => "{$error[2]}"]);
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>返信</title>
</head>

<body>
    <form action="reply_act.php" method="POST">
        <fieldset>
            <legend>返信
            </legend>
            <!-- <a href="todo_read.php">一覧画面</a> -->
            <div>
                コメント <input type="text" name="reply_comment">
            </div>
            <div>
                <button>submit</button>
            </div>
            <input type="hidden" name="reply_id" value="<?php echo $reply_id ?>">
            <input type="hidden" name="username" value="<?php echo $username ?>">
        </fieldset>
    </form>

</body>

</html>