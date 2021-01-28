<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../css/login.css">
<script src="../login.js"></script>

<title>ログイン画面</title>

<div class="frame">
    <div class="box0">
        <img src="">
        <h3>Tumatterにログイン</h3>
    </div>
    <form action="todo_login_act.php" method="POST">
        <div class="box1">
            <label for="text1" id="l_text1">ユーザー名</label>
            <input id="text1" type="text" name="username">
        </div>
        <div class="box1">
            <label for="text2" id="l_text2">パスワード</label>
            <input id="text2" type="password" name="password">
        </div>
        <button class="btn1" type="submit">ログイン</button>

        <p>
            <br>
            <a href="#">パスワードをお忘れですか？</a>

            <a href="register.php">アカウント作成</a>
        </p>
    </form>
</div>