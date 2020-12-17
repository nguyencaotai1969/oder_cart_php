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
<style>
  @media (min-width: 992px) {
    .search-sec {
      position: relative;
      top: -114px;
      background: rgba(26, 70, 104, 0.51);
    }
  }

  @media (max-width: 992px) {
    .search-sec {
      background: #1A4668;
    }
  }


  a {
    color: #007bff;
    transition: 0.5s;
  }

  a:hover,
  a:active,
  a:focus {
    color: #0b6bd3;
    outline: none;
    text-decoration: none;
  }

  p {
    padding: 0;
    margin: 0 0 30px 0;
  }

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-family: "Montserrat", sans-serif;
    font-weight: 400;
    margin: 0 0 20px 0;
    padding: 0;
  }


  .section-header h3 {
    font-size: 36px;
    color: #283d50;
    text-align: center;
    font-weight: 500;
    position: relative;
  }

  .section-header p {
    text-align: center;
    margin: auto;
    font-size: 15px;
    padding-bottom: 60px;
    color: #556877;
    width: 50%;
  }


  .chatsys-bg {
    background: #ecf5ff;
  }

  #chatsys .box {
    padding: 30px;
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    margin: 0 5px 20px 5px;
    background: #fff;
    box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1);
    transition: all 0.3s ease-in-out;
    padding: 5px;
  }



  #chatsys .icon {
    border: 2px solid black;
    position: absolute;
    left: 10px;
    top: 7%;
  }

  #services .icon i {
    font-size: 64px;
    line-height: 1;
    transition: 0.5s;
  }

  #chatsys .title {
    margin-left: 40px;
    font-weight: 700;
    margin-bottom: 15px;
    font-size: 18px;
  }

  #chatsys .title a {
    color: #111;
  }

  #chatsys .box:hover .title a {
    color: #007bff;
  }

  #chatsys .description {
    font-size: 14px;
    margin-left: 40px;
    line-height: 24px;
    margin-bottom: 0;
  }

  .income {
    float: left;
    padding: 10px;
    width: auto;
    height: 20px auto;
    background-color: pink;
    border-left: 5px solid deeppink;

  }

  .sent {
    float: right;
    padding: 10px;
    width: auto;
    height: 20px auto;
    background-color: aqua;
    border-right: 5px solid dodgerblue;
  }
</style>

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
        <div>
          <section id="chatsys" class="chatsys-bg">
            <div class="container">

              <div class="row">
                <div class="col-md-12 col-lg-12 wow " data-wow-duration="1.4s" style="padding:0px;">
                  <a href="?controller=admin&action=Message" class=" btn-primary col-md-12 text-center" style="margin: auto;float: right;padding:1px">BACK</a>
                  <br>
                  <br>
                  <div class="col-md-12 col-lg-12 wow " data-wow-duration="1.4s" style="padding:0px;">
                    <div class="box">
                      <div class="profimg">

                        <img src="<?php echo $id_user[0]['img'] ?>" style="width: 50px; height: 50px;"><a href="accdet.html" style="margin-left: 5%; color: black; font-size: 18px;font-weight: bold;"><?php echo $id_user[0]['full_name'] ?></a>
                        <!-- Use a profile image here -->
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 col-lg-12 wow " data-wow-duration="1.4s" style="padding:0px;">
                    <div class="box sedsa" style="height: auto;overflow-y: scroll;max-height: 300px;">

                    </div>
                    <div class="sdsad">
                    </div>
                    <div class="col-md-12 col-lg-12 wow bounceInUp" data-wow-duration="1.4s" style="padding:0px;">
                      <div class="fom">
                        <input type="text" id="data_message" class="col-lg-11 col-md-11 col-sm-11" style="height: auto;width: 90%;padding: 5px;" placeholder="Write your message here!">
                        <button id="btn_data" class="btn btn-primary col-lg-1  col-md-1 col-sm-1" style="margin: auto;float: right;padding:5px"><i class="fa fa-send"></i>Send</button>
                        <!-- In send button i am using <i class="fa fa-send"></i> but its not working here but it will work on your server or system-->


                      </div>
                    </div>


                  </div>

                </div>
              </div>
            </div>
          </section>


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
<script>
  setInterval(function() {
    $.ajax({
      url: "?controller=admin&action=Api_read_message&id=<?php echo $_GET['id'] ?>",
      method: "GET",
      success: function(data) {

        var str = '';

        if (data.error == "Lỗi Chưa Có Tin Nhắn") {
          console.log("chua co tin nhan");

        } else {
          for (let i = 0; i < data.length; i++) {
            const element = data[i];
            // console.log(element);
            if (element.from_id_user == <?php echo $_SESSION["username"]['gid'] ?>) {
              str += '<li style="list-style-type: none;">' +
                '<div class = "sent text-right" >' + element.message + ' <BR> <small> ' + element.timestamp + ' </small></div>' +
                '</li><br><br><br>';
            } else {
              str += '<li style="list-style-type: none;">' +
                '<div class = "income float-left" > ' + element.message + ' <BR> <small>' + element.timestamp + '</small></div>' +
                '</li><br><br><br>';

            }
            $('.sedsa').empty();
            $('.sedsa').append(str);
          }
        }

      }
    });
  }, 1000);
  $("#btn_data").click(function() {
    var dat_send = document.getElementById("data_message").value;
    if (dat_send != "") {
      $('.sdsad').empty();
      $.ajax({
        url: "?controller=admin&action=Send_message",
        method: "POST",
        data: {
          id: <?php echo $_GET['id'] ?>,
          message: dat_send
        },
        success: function(data) {

          document.getElementById("data_message").value="";

        }
      });
    } else {
      var strsd = "";
      strsd += ' <div class="alert alert-danger alert-dismissible fade show" role="alert">' +
        '<strong>Bạn Chưa Nhập Gì :v</strong> <button type = "button"' +
        'class = "close"' +
        'data - dismiss = "alert"' +
        'aria - label = "Close" >' +
        '<span aria - hidden = "true"> & times; </span>' +
        '</button> </div>';
      $('.sdsad').empty();
      $('.sdsad').append(strsd);
    }
  });
</script>

</html>