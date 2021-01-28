<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../css/login.css">
<script src="../login.js"></script>

<title>ログイン画面</title>

<div class="frame">
    <div class="box0">
        <img src="">
        <h3>アカウント作成</h3>
    </div>
    <form action="todo_register_act.php" method="POST">
        <div class="box1">
            <label for="text1" id="l_text1">ユーザー名</label>
            <input id="text1" type="text" name="username">
        </div>
        <div class="box1">
            <label for="text2" id="l_text2">パスワード</label>
            <input id="text2" type="password" name="password">
        </div>
        <button class="btn1" type="submit">アカウント登録</button>
    </form>
</div>