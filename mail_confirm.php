<!doctype HTML>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォームを作る</title>
    <link rel="stylesheet" type="text/css" href="./style2.css">
</head>

<body>
    <h1>お問い合わせ内容確認</h1>

    <div class="confirm">
        <p>お問い合わせ内容はこちらで宜しいでしょうか？
            <br>宜しければ「送信する」ボタンを押して下さい。
        </p>
        
        <p>名前
            <br>
            <?php echo $_POST['name'];?><!--index.htmlから引き渡されたnameという箱を表示する-->
        </p>

        <p>メールアドレス
            <br>
            <?php echo $_POST['mail'];?>
        </p>

        <p>年齢
            <br>
            <?php echo $_POST['age'];?>
        </p>

        <p>コメント
            <br>
            <?php echo $_POST['comments'];?>
        </p>

        <!-----------------------------------------------------
        ボタンを作成してindex.htmlのリンクを貼る
        index.htmlにデータの送信を行うわけではないのでpostは記述しない
        ------------------------------------------------------>

        <div class="buttons">
            <form action="index.html"> <!--actionはリンク先のURL-->
                <input type="submit" class="button1" value="戻って修正する">
            </form>

        <!-----------------------------------------------------
        index.htmlの入力内容をinsert.phpに引き渡す(post通信)
        hiddenにしないと入力内容が表示される
        ------------------------------------------------------>
            <form action="insert.php" method="post">
                <input type="submit" class="button2" value="登録する">
                <input type="hidden" value="<?php echo $_POST['name'];?>" name="name"><!--hiddenにすると代入した内容を非表示にできる-->
                <input type="hidden" value="<?php echo $_POST['mail'];?>" name="mail">
                <input type="hidden" value="<?php echo $_POST['age'];?>" name="age">
                <input type="hidden" value="<?php echo $_POST['comments'];?>" name="comments">
            </form>
        </div>
    </div>
</body>
</html>