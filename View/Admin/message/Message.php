<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>SB Admin 2 - Dashboard</title>

   <!-- Custom fonts for this template-->
   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

   <!-- Custom styles for this template-->
   <link href="css/sb-admin-2.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/index.css">
</head>

<body id="page-top">

   <!-- Page Wrapper -->
   <div id="wrapper">

      <!-- Sidebar -->
      <?php
      require(self::VIEW_FOLDER_NAME . '/Layout/' . str_replace('.', '/', 'left') . '.php');
      ?>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

         <!-- Main Content -->
         <div id="content">

            <!-- Topbar -->
            <?php
            require(self::VIEW_FOLDER_NAME . '/Layout/' . str_replace('.', '/', 'header') . '.php');
            ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
               <?php

               foreach ($list_user as  $value) {
                  echo '<div class="chat_list active_chat" id="newForm" style="cursor: pointer;" value="' . $value['id'] . '" >
                  <a href="?controller=admin&action=Send_message&id=' . $value['id'] . '">
                  <div class="chat_people">
           <div class="chat_img"> <img class="rounded-circle" width="50px" height="50px" src="' . $value['img'] . '" alt="sunil"> </div>
           <div class="chat_ib">
            <h5>' . $value['full_name'] . ' <span class="chat_date">Dec 25</span></h5>
            <p>' . $value['Phone'] . '</p>
           </div>
          </div>
            </a>
         </div>';
               }

               ?>
      
            </div>



         </div>
      </div>

   </div>

   </div>
   <!-- /.container-fluid -->

   </div>
   <!-- End of Main Content -->

   <!-- Footer -->
   <?php
   require(self::VIEW_FOLDER_NAME . '/Layout/' . str_replace('.', '/', 'footer') . '.php');
   ?>
   <!-- End of Footer -->

   </div>
   <!-- End of Content Wrapper -->

   </div>
   <!-- End of Page Wrapper -->

   <!-- Scroll to Top Button-->
   <?php
   require(self::VIEW_FOLDER_NAME . '/Layout/' . str_replace('.', '/', 'lib') . '.php');
   ?>
</body>


</html>