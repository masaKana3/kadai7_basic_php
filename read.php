<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>アンケート結果</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        td {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>アンケート結果</h1>
    
    <?php
    // ファイルのパス
    $filename = "data/data.txt";

    // ファイルが存在するか確認
    if (!file_exists($filename)) {
        echo "<p>データがありません。</p>";
        exit;
    }

    // ファイルの内容を読み込む
    $lines = file($filename, FILE_IGNORE_NEW_LINES);

    // データ格納用
    $data = [];

    // 各行のデータを配列に変換
    foreach ($lines as $line) {
        $parts = explode(",", $line); // カンマで分割
        if (count($parts) >= 4) {
            $gender = $parts[0];
            $generation = $parts[1];
            $agree = $parts[2];
            $condition = implode(" / ", array_slice($parts, 3)); // 条件はまとめて結合
            $data[] = [
                "generation" => $generation,
                "gender" => $gender,
                "agree" => $agree,
                "condition" => $condition
            ];
        }
    }

    // データが空の場合の確認
    if (empty($data)) {
        echo "<p>データがありません。</p>";
        exit;
    }

    // テーブルを生成
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>年代</th>";
    echo "<th>性別</th>";
    echo "<th>体調不良を感じるか</th>";
    echo "<th>気になる症状</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($data as $row) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['generation'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['gender'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['agree'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['condition'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    ?>

    <p><a href="post.php">アンケートに戻る</a></p>
</body>
</html>
