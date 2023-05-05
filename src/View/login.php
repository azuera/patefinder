<?php


use Model\User;

var_dump($_POST);
if (!empty($_POST)) {
    $usermail = trim($_POST['email_username']);
    $sql = "SELECT * FROM userr WHERE userrEmail='$usermail' ";
    $statement = $connection->prepare($sql);
    $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
    $statement->execute();
    $result = $statement->fetch();
    $hash = $result->getUserrPassword();

    if (password_verify($_POST['password'],$hash)) {
        $_SESSION['user'] = $result;
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