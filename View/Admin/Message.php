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

     <div class="messaging">
      <div class="inbox_msg">
       <div class="inbox_people">
        
        <div class="inbox_chat">
         <div class="chat_list active_chat">
          <div class="chat_people">
           <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
           <div class="chat_ib">
            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
            <p>Test, which is a new approach to have all solutions
             astrology under one roof.</p>
           </div>
          </div>
         </div>
         <div class="chat_list">
          <div class="chat_people">
           <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
           <div class="chat_ib">
            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
            <p>Test, which is a new approach to have all solutions
             astrology under one roof.</p>
           </div>
          </div>
         </div>
         <div class="chat_list">
          <div class="chat_people">
           <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
           <div class="chat_ib">
            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
            <p>Test, which is a new approach to have all solutions
             astrology under one roof.</p>
           </div>
          </div>
         </div>
         <div class="chat_list">
          <div class="chat_people">
           <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
           <div class="chat_ib">
            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
            <p>Test, which is a new approach to have all solutions
             astrology under one roof.</p>
           </div>
          </div>
         </div>
         <div class="chat_list">
          <div class="chat_people">
           <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
           <div class="chat_ib">
            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
            <p>Test, which is a new approach to have all solutions
             astrology under one roof.</p>
           </div>
          </div>
         </div>
         <div class="chat_list">
          <div class="chat_people">
           <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
           <div class="chat_ib">
            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
            <p>Test, which is a new approach to have all solutions
             astrology under one roof.</p>
           </div>
          </div>
         </div>
         <div class="chat_list">
          <div class="chat_people">
           <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
           <div class="chat_ib">
            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
            <p>Test, which is a new approach to have all solutions
             astrology under one roof.</p>
           </div>
          </div>
         </div>
        </div>
       </div>
       <div class="mesgs">
        <div class="msg_history">
         <div class="incoming_msg">
          <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
          <div class="received_msg">
           <div class="received_withd_msg">
            <p>Test which is a new approach to have all
             solutions</p>
            <span class="time_date"> 11:01 AM | June 9</span>
           </div>
          </div>
         </div>
         <div class="outgoing_msg">
          <div class="sent_msg">
           <p>Test which is a new approach to have all
            solutions</p>
           <span class="time_date"> 11:01 AM | June 9</span>
          </div>
         </div>
         <div class="incoming_msg">
          <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
          <div class="received_msg">
           <div class="received_withd_msg">
            <p>Test, which is a new approach to have</p>
            <span class="time_date"> 11:01 AM | Yesterday</span>
           </div>
          </div>
         </div>
         <div class="outgoing_msg">
          <div class="sent_msg">
           <p>Apollo University, Delhi, India Test</p>
           <span class="time_date"> 11:01 AM | Today</span>
          </div>
         </div>
         <div class="incoming_msg">
          <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
          <div class="received_msg">
           <div class="received_withd_msg">
            <p>We work directly with our designers and suppliers,
             and sell direct to you, which means quality, exclusive
             products, at a price anyone can afford.</p>
            <span class="time_date"> 11:01 AM | Today</span>
           </div>
          </div>
         </div>
        </div>
        <div class="type_msg">
         <div class="input_msg_write">
          <input type="text" class="write_msg" placeholder="Type a message" />
          <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
         </div>
        </div>
       </div>
      </div>


      <p class="text-center top_spac"> Design by <a target="_blank" href="#">Sunil Rajput</a></p>

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