<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>W3Cschool在线教程(w3cschool.cn)</title>
    <script src="https://cdn.bootcss.com/jquery/2.0.2/jquery.js"></script>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
<?php
// 定义变量并默认设为空值
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "名字是必须的。";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "邮箱是必须的。";
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "性别是必须的。";
    } else {
        $gender = test_input($_POST["gender"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>PHP 表单验证实例</h2>
<p><span class="error">* 必填字段。</span></p>
<form method="post" action="hello.php">
    名字: <input type="text" name="name">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    E-mail: <input type="text" name="email">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    网址: <input type="text" name="website">
    <span class="error"><?php echo $websiteErr;?></span>
    <br><br>
    备注: <textarea name="comment" rows="5" cols="40"></textarea>

    性别:
    <input type="radio" name="gender" value="female">女
    <input type="radio" name="gender" value="male">男
    <span class="error">* <?php echo $genderErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>您的输入:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>
</body>
</html>