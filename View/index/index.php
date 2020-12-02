<?php
$msg = "";
if (isset($_SESSION["btnsubmit"])) {
  header("location:?controller=index&action=index");
}

?>

<!DOCTYPE html>
<html lang='en'>

<head>

  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Login</title>
</head>
<link href="img/favicon.png" rel="icon">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script>
<style>
  .login-popup-heading>h4 {
    color: #258b47;
    font-size: 18px;
    line-height: 30px;
  }

  .new_reg_popup,
  .new_login_popup {
    border-radius: 2px;
    min-height: 332px;
    width: 500px;
    margin: 0px auto;
  }

  .login-popup-btn {
    background: #258b47;
    border: none;
    border-radius: 25px;
    color: #fff;
    display: block;
    font-size: 18px;
    height: 38px;
    line-height: 28px;
    margin: 20px auto 5px;
    width: 150px;
    -webkit-transition: all 700ms ease;
    -moz-transition: all 700ms ease;
    -ms-transition: all 700ms ease;
    -o-transition: all 700ms ease;
  }

  a {
    color: #258b47;
    font-size: 18px;
  }
</style>

<body>
  <div class="login-popup-wrap new_login_popup">
    <div class="login-popup-heading text-center">
      <h4><i class="fa fa-lock" aria-hidden="true"></i> Admin </h4>
    </div>
    <!--<form accept-charset="utf-8" method="post" action="">-->
    <form id="loginMember" role="form" action="" method="post">
      <div class="form-group">
        <input type="text" class="form-control" id="user_id" placeholder="e-mail / Mobile no" name="username">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        <?php
          if (isset($error)) {
            echo "<b style='color:red'>" . $error . '</b>';
          }

        ?>
      </div>
      <button type="submit" class="btn btn-default login-popup-btn" name="btnsubmit" value="1">Login</button>
    </form>

  </div>
</body>

<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>

</html>