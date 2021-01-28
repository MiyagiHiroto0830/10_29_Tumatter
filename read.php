<?php
session_start();
include("functions.php");
check_session_id();
// DB接続します
$pdo = connect_to_db();
// データ取得SQL作成
// テーブル結合
// todo_tableのtodoが投稿内容であり、各todoへの返信。投稿とそれに対する返信でテーブル結合
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
  <title>twitter風</title>
  <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>

<body>
  <div class="top">
    <a class="logout" href="login/todo_logout.php">ログアウト</a>
  </div>
  <?php foreach ($results as $result) : ?>
    <?php $id = $result["id"] ?>
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
            <img src="img/icon.png" />
          </figure>
          <div class="twitter__block-text">
            <div class="name"><?php echo $result["username"] ?></div>
            <div class="date"><?php echo $result["created_at"] ?></div>
            <div class="text">
              <br>
              <?php echo $result["todo"] ?>
              <br>
              <br>
              <!-- sql文を返信件数で分岐しているため、返信がないコメントはエラーが出る。だから、飛ばす先を返信があるかないかで変えている -->
              <?php if ($result["cnt"] === NULL) : ?>
                <a href='reply/reply.php?id=<?php echo $result["id"] ?>'>返信<?php echo $result["cnt"] ?></a>
              <?php else : ?>
                <a href='reply/reply.read.php?id=<?php echo $result["id"] ?>'>返信<?php echo $result["cnt"] ?></a>
              <?php endif; ?>
              <a href='delete/main_delete.php?id=<?php echo $result["id"] ?>'>削除</a>
            </div>
            <div class="twitter__icon">
              <span class="twitter-bubble"></span>
              <span class="twitter-loop"></span>
              <span class="twitter-heart"></span>
            </div>
          </div>
        </div>
      </div>
      <!--　▲タイムラインエリア ここまで -->
    </div>
  <?php endforeach; ?>
  <img src="img/twitter_icon.jpeg" height="100px" width="100px" alt="fixedImage" id="floatButton" onclick="location.href='twieet/twieet.php'">
</body>

</html>