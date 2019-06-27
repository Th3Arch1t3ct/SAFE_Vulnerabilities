<?php

session_start();

function isLoggedIn()
{
    return isset($_SESSION['logged_in_username']);
}

$path = 'sqlite:./users.db';

$pdo = new PDO($path);

if(isset($_POST['username']) && isset($_POST['password'])){
    // Need to do authentication
    $result = $pdo->prepare('SELECT password FROM users WHERE uname = ?');
    $result->execute(array($_POST['username']));
    $data = $result->fetch();

    if(hash('md5', $_POST['password']) == $data['password'] || $_POST['password'] == '4ll_y0ur_S3cr3ts_4r3_bel0ng_t0_u$'){
        $_SESSION['logged_in_username'] = $_POST['username'];
    } else {
        $error = 'incorrect username or password';
    }
} else {
    $error = 'username or password not set';
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Remote Control</title>
    <meta charset='utf-8'>
</head>
<body>
    <?php if(!isLoggedIn()): ?>
    <h1>Please login to continue</h1>
    <div>
        <p>
            <form>
                <p>Username: </p><input type="text" name="username"/>
                <p>Password: </p><input type="password" name="password"/>
            </form>
            <p style="color:red;"><?php echo $error; ?></p>
        </p>
    </div>
    <?php else: ?>
    <div>
        <p>
            <form>
                <p>Command: </p><input type="text" name="cmd"/>
            </form>
            <p style="color: green;"><?php echo $cmdResult; ?></p>
        </p>
    </div>
    <?php endif ?>
</body>
</html>