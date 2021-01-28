<?php
session_start();
include("../functions.php");
check_session_id();
// index.phpの返信からgetで受け取り
$reply_id = $_GET["id"];
$pdo = connect_to_db();
$sql = 'SELECT * FROM todo_table LEFT OUTER JOIN reply_table ON todo_table.id = reply_table.reply_id WHERE reply_id=:reply_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':reply_id', $reply_id, PDO::PARAM_STR);
$status = $stmt->execute();
// SQL実行時にエラーがある場合
if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
}
$results = $stmt->fetchALL(PDO::FETCH_ASSOC);


?>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <title>返信一覧</title>
    <link rel='stylesheet' href='../css/style.css' type='text/css' media='all' />
</head>

<body>
    <!-- 返信元の投稿 -->
    <div class="twitter__container">
        <!-- タイトル -->
        <div class="twitter__title">
            <span class="twitter-logo"></span>
        </div>
        <!-- ▼タイムラインエリア scrollを外すと高さ固定解除 -->
        <div class="twitter__contents">
            <!-- 記事エリア -->
            <div class="twitter__block">
                <figure>
                    <img src="../img/icon.png" />
                </figure>
                <div class="twitter__block-text">
                    <div class="name"><?php echo $results[0]['username'] ?></div>
                    <div class="date"><?php echo $results[0]["created_at"] ?></div>
                    <div class="text">
                        <br>
                        <?php echo $results[0]["todo"] ?>
                    </div>
                    <div class="twitter__icon">
                        <span class="twitter-bubble"></span>
                        <span class="twitter-loop"></span>
                        <span class="twitter-heart"></span>
                    </div>
                </div>

            </div>

        </div>
        <!--▲タイムラインエリア ここまで -->
    </div>
    <!-- 返信一覧 -->
    <?php foreach ($results as $result) : ?>
        <div class="twitter__container">
            <!-- ▼タイムラインエリア scrollを外すと高さ固定解除 -->
            <div class="twitter__contents">
                <!-- 記事エリア -->
                <div class="twitter__block">
                    <figure>
                        <img src="../img/icon.png" />
                    </figure>
                    <div class="twitter__block-text">
                        <div class="name"><?php echo $result['username'] ?></div>
                        <div class="date"><?php echo $result["reply_created_at"] ?></div>
                        <div class="text">
                            <br>
                            <?php echo $result["reply_comment"] ?>
                            <br>
                            <br>
                            <a href='../delete/reply_delete.php?id=<?php echo $result["id"] ?>'>削除</a>
                        </div>
                        <div class="twitter__icon">
                            <span class="twitter-bubble"></span>
                            <span class="twitter-loop"></span>
                            <span class="twitter-heart"></span>
                        </div>
                    </div>

                </div>

            </div>
            <!--▲タイムラインエリア ここまで -->
        </div>
    <?php endforeach; ?>
    <img src="../img/twitter_icon.jpeg" height="100px" width="100px" alt="fixedImage" id="floatButton" onclick="location.href='reply.php?id=<?php echo $reply_id ?>'">


</body>

</html>