<?php
session_start();
include("functions.php");
check_session_id();
// 送信データ受け取り
$reply_id = $_GET["id"];
$reply_username = $_SESSION["username"];
$pdo = connect_to_db();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>返信</title>
</head>

<body>
    <form action="reply_act.php" enctype="multipart/form-data" method="POST">
        <fieldset>
            <legend>返信
            </legend>
            <div>
                コメント <input type="text" name="reply_comment">
            </div>
            <div class="file_up">
                <!-- accept="image/*で画像しか送れないように指定 -->
                <input name="upfile" type="file" accept="image/*">
            </div>
            <div>
                <button>submit</button>
            </div>
            <input type="hidden" name="reply_id" value="<?php echo $reply_id ?>">
            <input type="hidden" name="reply_username" value="<?php echo $reply_username ?>">
        </fieldset>
    </form>

</body>

</html>