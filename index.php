<?php

$path = 'sqlite:./users.db';

$pdo = new PDO($path)

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