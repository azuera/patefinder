<?php

var_dump($_POST);
if (!empty($_POST)) {
    $usermail = $_POST['email_username'];
    $sql = "SELECT userr_password FROM userr WHERE userr_email='$usermail' OR userr_name='$usermail'";
    $statement = $connection->query($sql);
    $result = $statement->fetch();
    $hash = $result;
    var_dump($result);
    if (password_verify($_POST['password'], $hash['userr_password'])) {
        $_SESSION['email_username'] = $_POST['email_username'];
        echo "Le mot de passe est correct.";
        header('location:index.php?login=success');
    } else {
        echo "Le mot de passe est incorrect.";
    }
}


?>
<form action="" method="post">
    <div class="mb-3">
        <label for="email_username" class="form-label">usermail/ username</label>
        <input type="text" class="form-control" id="email_username" name="email_username">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>