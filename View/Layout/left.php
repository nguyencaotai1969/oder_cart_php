<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?controller=admin&action=index">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3"> Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="?controller=admin&action=index">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Doanh Thu</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">



  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseUtilitiessssd" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Quản Lý Tin Nhắn</span>
    </a>
    <div id="collapseUtilitiessssd" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Các chức năng :</h6>
        <a class="collapse-item" href="?controller=admin&action=Message">Tin Nhắn Của Bạn !</a>
      </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseUtilitiesss" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Quản Lý Đơn Hàng</span>
    </a>
    <div id="collapseUtilitiesss" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Các chức năng :</h6>
        <a class="collapse-item" href="?controller=admin&action=List_DonMua_choxacnhan">View Đơn đang chờ xử lý</a>
        <a class="collapse-item" href="?controller=admin&action=List_DonMua_DangGiao">View Đơn đang giao</a>
        <a class="collapse-item" href="?controller=admin&action=List_DonMua_DaMua">View Đơn đã mua</a>
        <a class="collapse-item" href="?controller=admin&action=List_DonMua_dahuy">View Đơn đã hủy</a>

      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Quản Lý Sản Phẩm</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="?controller=admin&action=add_product">Thêm Product</a>
        <a class="collapse-item" href="?controller=admin&action=product_host">Sản Phẩm Host</a>
        <a class="collapse-item" href="?controller=admin&action=product_new">Sản Phẩm Mới</a>
        <a class="collapse-item" href="?controller=admin&action=product_sale">Sản Phẩm Sale</a>
        <a class="collapse-item" href="?controller=admin&action=product_suggestion">Sản Phẩm Gợi ý</a>
        <a class="collapse-item" href="?controller=admin&action=Product_oder">Sản Phẩm oder</a>


      </div>
    </div>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Quản Lý User</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Utilities:</h6>

        <a class="collapse-item" href="?controller=admin&action=user">View tất cả user</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseUtilitiess" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Quản Lý Slider</span>
    </a>
    <div id="collapseUtilitiess" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Utilities:</h6>
        <a class="collapse-item" href="?controller=admin&action=slider">View slider</a>
        <!-- <a class="collapse-item" href="utilities-border.html">Borders</a>
    <a class="collapse-item" href="utilities-animation.html">Animations</a>
    <a class="collapse-item" href="utilities-other.html">Other</a> -->
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Addons
  </div>


  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>