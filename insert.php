<!-------------------------------------------------
php上でSQLを書くにはPDOというライブラリ（ツール）を使用する
-------------------------------------------------->

<?php
/*------------------------------------------------
$pdo=new PDO............DBと接続する時の決まり文句
"mysql:dbname=lesson1...DB lesson1を利用するという意味
host=localhost..........今回はローカル環境　通常DB用のサーバー名を記述
"root",""...............ユーザー名とパスワード 
-------------------------------------------------*/ 
mb_internal_encoding("utf8");       //文字化け防止の決まり文句
$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","root");


/*-------------------------------------------------
1 変数sqlにSQL文を文字列として入力　ただしvalues内には具体的な値は書かず？を記述
2 prepareメソッドを実行し作成したSQL文を変数stmtに格納する
-------------------------------------------------*/
$sql = "insert into contactform(name, mail, age, comments) values (?,?,?,?)";
$stmt = $pdo->prepare($sql);

/*-------------------------------------------------
bindValueメソッド　前述の？に対して順番に値を設定
-------------------------------------------------*/
$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['age']);
$stmt->bindValue(4,$_POST['comments']);

/*-------------------------------------------------
executeメソッド　指定されたデータベースのテーブルに対してSQL文が実行される
-------------------------------------------------*/
$stmt->execute();

?>

<!doctype html>
<html lang="ja">

<head>
<meta charset="UTF-8">
    <title>お問い合わせフォームを作る</title>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>

<body>
    <h1>お問い合わせフォーム</h1>

    <div class="confirm">
        <p>
            お問い合わせ有難うございました。<br>３営業日以内に担当者よりご連絡差し上げます。
        </p>
    </div>
</body>
</html>