<?php

var_dump($_POST);
if(!empty($_POST)){
    $usermail = $_POST['email'];
    $sql = "SELECT userr_password FROM userr WHERE userr_email='$usermail'";
    $statement = $connection->query($sql);
    $result = $statement->fetch();
    $hash=$result;
    var_dump($result);
    if (password_verify($_POST['password'],$hash['userr_password']))
    {
        $_SESSION['email'] = $_POST['email'];
        echo "Le mot de passe est correct.";
        header('location:index.php?login=success');
    } else {
        echo "Le mot de passe est incorrect.";
    }
}


?>
<form action="" method="post">
    <div class="mb-3">
        <label for="email" class="form-label">usermail</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>