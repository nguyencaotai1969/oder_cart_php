<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">

<head>
 <title>Title</title>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


 <!-- local  -->
 <link rel="stylesheet" href="style.css">

 <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
 <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
 <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">


 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="css/bootstrap.css">


</head>
<style>
 body {
  font-family: "Inconsolata", SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
  font-weight: 300;
  font-size: 18px;

 }


 /* navbar */

 .sidebar {
  height: 100vh;
  background: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .9)), url(images/img1.jpeg);
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  box-shadow: 5px 7px 25px #999;
 }

 .bottom-border {
  border-bottom: 1px groove#eee;
 }

 .sidebar-link {
  transition: all .4s;
 }

 .sidebar-link:hover {
  background-color: #444;
  border-radius: 5px;
 }

 .current {
  background-color: #f44336;
  border-radius: 7px;
  box-shadow: 2px 5px 10px #111;
  transition: all .3s;
 }

 .current:hover {
  background-color: #f66436;
  border-radius: 7px;
  box-shadow: 2px 5px 20px #111;
  transform: translateY(-1px);
 }

 #search-input {
  background: transparent;
  border: none;
  border-radius: 0;
  border-bottom: 2px solid #999;
  transition: all .4s;
 }

 #search-input:focus {
  background: transparent;
  box-shadow: none;
  border-bottom: 2px solid #dc3545;

 }

 #search-button {
  border-radius: 50%;
  padding: 10px 16px;
  transition: all .4s;
 }

 #search-button:hover {
  background-color: #eee;
  transform: translateY(-1px);
 }


 .icon-parent {
  position: relative;


 }

 .icon-bullet::after {
  content: "";
  position: absolute;
  top: 7px;
  left: 15px;
  height: 12px;
  width: 12px;
  background-color: #f44336;
  border-radius: 50%;


 }

 @media (max-width: 768px) {
  .sidebar {
   position: static;
   height: auto;

  }

  .top-navbar {
   position: static;

  }
 }






 /* end navbar */
</style>

<body>


 <!-- navbar -->
 <nav class="navbar navbar-expand-md  navbar-light">
  <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
   <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse " id="myNavbar">
   <div class="container-fluid">
    <div class="row">
     <!-- sidebar navbar -->
     <div class="col-lg-3 col-xl-2 col-md-4 sidebar fixed-top">
      <a href="#" class="navbar-brand text-white d-block mx-auto text-center mb-4 bottom-border pb-2">
       CodeAdmin
      </a>

      <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" width="50" height="50" alt="nice" class="rounded-circle mr-3">
      <a href="#" class="text-white ">Bode Maegsn </a>
      <div class="border-bottom pb-3"></div>
      <ul class="navbar-nav flex-column mt-4">
       <li class="nav-item">
        <a href="#" class="nav-link text-light p-3 mb-2 current"> <i class="fa fa-home text-light fa-lg mr-3" aria-hidden="true"></i> Dashboard
        </a>
       </li>
       <li class="nav-item">
        <a href="#" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-user text-light fa-lg mr-3" aria-hidden="true"></i> Profile
        </a>
       </li>
       <li class="nav-item">
        <a href="#" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-envelope text-light fa-lg mr-3" aria-hidden="true"></i> Inbox
        </a>
       </li>
       <li class="nav-item">
        <a href="#" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-shopping-cart text-light fa-lg mr-3" aria-hidden="true"></i> Sales
        </a>
       </li>
       <li class="nav-item">
        <a href="#" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-table text-light fa-lg mr-3" aria-hidden="true"></i> Analytics
        </a>
       </li>
       <li class="nav-item">
        <a href="#" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fas fa-table text-light fa-lg mr-3" aria-hidden="true"></i> Charts
        </a>
       </li>
       <li class="nav-item">
        <a href="#" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-table text-light fa-lg mr-3" aria-hidden="true"></i> Tables
        </a>
       </li>
       <li class="nav-item">
        <a href="#" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-wrench text-light fa-lg mr-3" aria-hidden="true"></i> Settings
        </a>
       </li>
       <li class="nav-item">
        <a href="#" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-file text-light fa-lg mr-3" aria-hidden="true"></i> Documentation
        </a>
       </li>
      </ul>
     </div>
     <!-- end sidebar -->

     <!--  top nav-->
     <div class="col-lg-9 col-xl-10 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar">
      <div class="row align-items-center">
       <div class="col-md-4">
        <h4 class="text-light text-uppercase mb-0">Dashboard</h4>
       </div>
       <div class="col-md-5">
        <form>
         <div class="input-group">
          <input type="text" class="form-control" id="search-input" placeholder="Search here">
          <button type="button" class="btn btn-light" id="search-button"><i class="fa fa-search text-danger"></i></button>
         </div>
        </form>
       </div>
       <div class="col-md-3">
        <ul class="navbar-nav">
         <li class="nav-item icon-parent">
          <a href="#" class="nav-link icon-bullet "><i class="fa fa-comments text-muted fa-lg"></i></a>
         </li>
         <li class="nav-item icon-parent">
          <a href="#" class="nav-link icon-bullet"><i class="fa fa-bell text-muted fa-lg"></i></a>
         </li>
         <li class="nav-item ml-md-auto ">
          <a href="?controller=index&action=logout" class="nav-link "><i class="fa fa-sign-out text-danger fa-lg"></i></a>
         </li>
        </ul>

       </div>

      </div>


     </div>
     <!-- end nav -->
    </div>
   </div>
  </div>

 </nav>





 <!-- end navbar -->




































 <!-- local -->
 <script type="text/javascript " src="script.js "></script>
 <script src="js/bootstrap.min.js "></script>

 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js " integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1 " crossorigin="anonymous "></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js " integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM " crossorigin="anonymous "></script>
</body>

</html>

</html>