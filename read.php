<?php
session_start();
include("functions.php");
check_session_id();
// DB接続します

$pdo = connect_to_db();
// データ取得SQL作成
// テーブル結合
// todo_tableのtodoが投稿内容であり、各todoへの返信。投稿とそれに対する返信でテーブル結合
// todo_tableのtodoへの返信件数をtodo_tableのidとreply_tableのreply_idを結び付けて表す
$sql = 'SELECT*FROM todo_table LEFT OUTER JOIN (SELECT reply_id,COUNT(id) AS cnt FROM reply_table GROUP BY reply_id)AS reply ON todo_table.id=reply.reply_id ORDER BY id DESC;';
$stmt = $pdo->prepare($sql);
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
  <title>Tumatter</title>
  <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>

<body>
  <div class="top">
    <a class="logout" href="login/todo_logout.php"><img width="40px" src="img/logout.jpeg"></a>

  </div>
  <div class="modal">
    <div class="bigimg"><img width="1260px" height="auto" src=""></div>
    <p class="close-btn"><a href="">✖</a></p>
  </div>
  <?php foreach ($results as $result) : ?>
    <?php $id = $result["id"] ?>
    <div class="twitter__container">
      <div class="twitter__title">
        <span class="twitter-logo"></span>
      </div>
      <div class="twitter__contents">
        <div class="twitter__block">
          <figure>
            <img src="img/icon.png" width="100%" height="auto">
          </figure>
          <div class="twitter__block-text">
            <div class="name"><?php echo $result["username"] ?></div>
            <div class="date"><?php echo $result["created_at"] ?></div>
            <div class="text">
              <br>
              <?php echo $result["todo"] ?>
              <?php if ($result["image"] === NULL) : ?>
                <?php echo ""; ?>
              <?php else : ?>
                <ul style="list-style: none;">
                  <li><a href=""><img src="<?php echo $result['image'] ?>" width='150px' height='auto' class='mr-3'></li>
                </ul>
                <!-- <div class="modal">
                  <div class="bigimg" width="700px" height="auto"><img src=""></div>
                  <p class="close-btn"><a href="">✖</a></p>
                </div> -->
                <br>
                <br>
              <?php endif; ?>
              <!-- sql文を返信件数で分岐しているため、返信がないコメントはエラーが出る。だから、飛ばす先を返信があるかないかで変えている -->
              <?php if ($result["cnt"] === NULL) : ?>
                <a href='reply.php?id=<?php echo $result["id"] ?>'>返信<?php echo $result["cnt"] ?></a>
              <?php else : ?>
                <a href='reply.read.php?id=<?php echo $result["id"] ?>'>返信<?php echo $result["cnt"] ?></a>
              <?php endif; ?>
              <a href='delete/main_delete.php?id=<?php echo $result["id"] ?>'>削除</a>
            </div>
            <div class=" twitter__icon">
              <span class="twitter-bubble"></span>
              <span class="twitter-loop"></span>
              <span class="twitter-heart"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <img class="icon" src="img/twitter_icon.jpeg" height="100px" width="100px" alt="fixedImage" id="floatButton" onclick="location.href='twieet.php'">
</body>
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

</html>