<?php
session_start();
include("functions.php");
check_session_id();
// index.phpの返信からgetで受け取り
$reply_id = $_GET["id"];
$pdo = connect_to_db();
// 一つの投稿への返信でテーブル結合
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
    <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>

<body>
    <!-- username(投稿主),todo(投稿主の投稿）は全ての配列に入っている。ここは投稿主を表示したいため、配列の最初だけを取り出している -->
    <!-- 返信元の投稿 -->
    <div class="modal">
        <div class="bigimg"><img width="1260px" height="auto" src=""></div>
        <p class="close-btn"><a href="">✖</a></p>
    </div>
    <div class="twitter__container">
        <div class="twitter__title">
            <span class="twitter-logo"></span>
        </div>
        <div class="twitter__contents">
            <div class="twitter__block">
                <figure>
                    <img src="img/icon.png" />
                </figure>
                <div class="twitter__block-text">
                    <div class="name"><?php echo $results[0]['username'] ?></div>
                    <div class="date"><?php echo $results[0]["created_at"] ?></div>
                    <div class="text">
                        <br>
                        <?php echo $results[0]["todo"] ?>
                        <?php if ($results[0]["image"] === NULL) : ?>
                            <?php echo ""; ?>
                        <?php else : ?>
                            <ul style="list-style: none;">
                                <li><a href=""><img src="<?php echo $results[0]['image'] ?>" width='150px' height='auto' class='mr-3'>;</li>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <div class="twitter__icon">
                        <span class="twitter-bubble"></span>
                        <span class="twitter-loop"></span>
                        <span class="twitter-heart"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 返信一覧 -->
    <!-- 投稿主の投稿に対する返信と返信主、時間を回している -->
    <?php foreach ($results as $result) : ?>
        <div class="twitter__container">
            <div class="twitter__contents">
                <div class="twitter__block">
                    <figure>
                        <img src="img/icon.png" />
                    </figure>
                    <div class="twitter__block-text">
                        <div class="name"><?php echo $result['reply_username'] ?></div>
                        <div class="date"><?php echo $result["reply_created_at"] ?></div>
                        <div class="text">
                            <br>
                            <?php echo $result["reply_comment"] ?>
                            <?php if ($result["reply_image"] === NULL) : ?>
                                <?php echo ""; ?>
                            <?php else : ?>
                                <ul style="list-style: none;">
                                    <li><a href=""><img src="<?php echo $result['reply_image'] ?>" width='150px' height='auto' class='mr-3'>;</li>
                                </ul>
                            <?php endif; ?>
                            <br>
                            <br>
                            <a href='delete/reply_delete.php?id=<?php echo $result["id"] ?>'>削除</a>
                        </div>
                        <div class="twitter__icon">
                            <span class="twitter-bubble"></span>
                            <span class="twitter-loop"></span>
                            <span class="twitter-heart"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <img class="icon" src="img/twitter_icon.jpeg" height="100px" width="100px" alt="fixedImage" id="floatButton" onclick="location.href='reply.php?id=<?php echo $reply_id ?>'">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $('.modal').hide();
        $('.close-btn').hide();
        $('ul li a').click(function() {
            var imgSrc = $(this).children().attr('src');
            $('.bigimg').children().attr('src', imgSrc);
            $('.modal').fadeIn();
            // $('body,html').css('overflow-y', 'hidden');
            $('.close-btn').show();
            $(".twitter__container").hide();
            $(".icon").hide();
            $(".top").hide();
            return false
        });

        $('.close-btn').click(function() {
            $('.modal').hide();
            $('body,html').css('overflow-y', 'visible');
            $(".twitter__container").show();
            $(".icon").show();
            $(".top").show();
            return false
        });
    </script>

</body>

</html>