<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>体調に関するアンケート</title>
</head>


<body>
    <h2>ご協力ありがとうございました🤗</h2>
    <p>質問は以上です</p>    
    <p>入力内容をご確認ください</p>

    <?php 
    // エラー確認のための設定（開発中のみ有効にしてください）
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // POSTまたはGETでデータを取得
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
    $generation = isset($_POST['generation']) ? $_POST['generation'] : null;
    $agree = isset($_POST['agree']) ? $_POST['agree'] : null;
    // 条件が複数の場合に備えて
    $condition = isset($_POST['condition']) ? $_POST['condition'] : [];

    // デバッグ: POSTデータを確認
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';

    // データが正しく送信されているか確認
    if ($gender === null || $generation === null || $agree === null) {
        echo "<p style='color:red;'>エラー: データが送信されていません。</p>";
        exit; // 処理を中断
    }

    // ファイル保存処理
    $filename = "data/data.txt"; // 保存先ファイル
    $data_directory = dirname($filename);

    // ディレクトリが存在しない場合は作成
    if (!file_exists($data_directory)) {
        mkdir($data_directory, 0777, true); // フォルダを作成
    }

    // カンマ区切り用
    $c = ",";
    // データのまとめ
    $file_content = $gender. $c. $generation. $c. $agree. $c. implode(";", $condition);


    // ファイルを開く
    $file = fopen($filename, "a");
    if ($file) {
        // ファイルにデータの書き込み
        fwrite($file, $file_content. "\n");
        // ファイルを閉じる
        fclose($file);
    } else {
        echo "<p style='color:red;'>エラー: ファイルを開けませんでした。</p>";
        exit;
    }
    ?>


    <div class="survey">
        <p>性別：<?= htmlspecialchars($gender, ENT_QUOTES, 'UTF-8') ?></p>
        <p>年代：<?= htmlspecialchars($generation, ENT_QUOTES, 'UTF-8') ?></p>
        <p>体調不良を感じることはありますか？：<?= htmlspecialchars($agree, ENT_QUOTES, 'UTF-8') ?></p>
        <p>気になる症状：<?= empty($condition) 
            ? "なし" 
            : implode(', ', array_map(fn($c) => htmlspecialchars($c, ENT_QUOTES, 'UTF-8'), $condition)) ?></p>
    </div>
    <h3>データが保存されました。</h3>

    <p><a href="read.php">結果を見る</a></p>
</body>
</html>