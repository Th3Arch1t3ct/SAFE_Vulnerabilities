<?php

$path = 'sqlite:./users.db';

$pdo = new PDO($path);

if(isset($_POST['username']) && isset($_POST['password'])){
    // Need to do authentication
    $result = $pdo->prepare('SELECT password FROM users WHERE uname = ?');
    $result->execute(array($_POST['username']));
    $data = $result->fetch();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Remote Control</title>
    <meta charset='utf-8'>
</head>
<body>
    <h1>Please login to continue</h1>
    <div>
        <p>
            <form>
                <p>Username: </p><input type="text" name="username"/>
                <p>Password: </p><input type="password" name="password"/>
            </form>
        </p>
    </div>
</body>
</html>