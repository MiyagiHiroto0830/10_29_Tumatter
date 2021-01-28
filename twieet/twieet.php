<?php
session_start();
include("../functions.php");
check_session_id();
// ログインしているユーザーのid受け取り
// tweet時に投稿内容と同じテーブルに投稿者も登録
$username = $_SESSION["username"];

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../css/style.css' type='text/css' media='all' />
    <title>ツイート</title>
</head>

<body>
    <form action="twieet_act.php" method="POST">
        <fieldset>
            <legend>twieet
            </legend>
            <!-- <a href="todo_read.php">一覧画面</a> -->
            <div>
                <textarea name="todo"></textarea>
            </div>
            <div>
                <button>submit</button>
            </div>
            <input type="hidden" name="username" value="<?php echo  $username ?>">
        </fieldset>
    </form>

</body>

</html>