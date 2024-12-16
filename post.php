<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>体調に関するアンケート</title>
</head>

<body>
    
    <h1>体調に関するアンケート</h1>
   
    <div class="container">
        <p>下記の質問にお答えください</p>
        <form id="survey-form1" method="post" action="condition.php">
            <div class="survey">
                <ol type="1">
                    <!-- radio-button -->
                    <li>性別</li>
                    <label><input type="radio" name="gender" value="男性" required>男性</label><br>
                    <label><input type="radio" name="gender" value="女性" required>女性</input><br>
                    <label><input type="radio" name="gender" value="未回答" required>回答したくない</label>
                    <li>年代</li>
                    <label><input type="radio" name="generation" value="10代以下" required>10代以下</input><br>
                    <label><input type="radio" name="generation" value="20代" required>20代</label><br>
                    <label><input type="radio" name="generation" value="30代" required>30代</label><br>
                    <label><input type="radio" name="generation" value="40代" required>40代</label><br>
                    <label><input type="radio" name="generation" value="50代" required>50代</label><br>
                    <label><input type="radio" name="generation" value="60代以上" required>60代以上</label><br>
                    <label><input type="radio" name="generation" value="未回答" required>回答したくない</label>
                </ol>
            </div>
           
            <button id="submit-button" type="submit">次の質問へ</button>
        </form>
    </div>
</body>
</html>