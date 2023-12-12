<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="?action=dashboard">Pages</a></li>
            </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">

            </div>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a class="btn btn-outline-primary btn-sm mb-0 me-3" href="../index.php?act=home">Trang sản phẩm</a>
                </li>  
                <li class="nav-item dropdown mx-3">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small pe-2">Le Van Thanh</span>
                        <img class="img-profile rounded-circle" src="<?= '../assets/img/accounts/' . $_SESSION['user']['avatar']?>" height="30px" width="30px">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li>
                            <a class="dropdown-item" href="../index.php?act=profile">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400 me-2"></i>
                                Trang cá nhân
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-decoration-line-through" href="../index.php?act=profile">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400 me-2"></i>
                                Cài đặt
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-decoration-line-through" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400 me-2"></i>
                                Nhật ký đăng nhập
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="?action=logout" data-toggle="modal" data-target="#logoutModal" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất không?')">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400 me-2"></i>
                                Đăng xuất
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item d-xl-none px-5 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell cursor-pointer"></i>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                       
                    </ul>
                </li>
            </ul>
        </div>
    </div>  
</nav>