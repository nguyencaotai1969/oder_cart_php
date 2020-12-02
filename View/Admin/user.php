<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 <!------ Include the above in your HEAD tag ---------->
 <link rel="stylesheet" href="css/index.css">
</head>

<body>
 <?php
 require self::VIEW_FOLDER_NAME . '/Layout/' . str_replace('.', '/', 'header') . '.php';

 ?>
 <div class="container-fluid main-container">
  <?php
  require self::VIEW_FOLDER_NAME . '/Layout/' . str_replace('.', '/', 'left') . '.php';

  ?>
  <div class="col-md-10 content">
   <div class="panel panel-default">
    <div class="panel-heading">
     Dashboard
    </div>
    <div class="panel-body">
     Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
     tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
     quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
     consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
     cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
     proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div>
   </div>
  </div>

 </div>
</body>

</html>