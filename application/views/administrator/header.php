
<?php 



?>

<body class="horizontal-static">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div></div>
        </div>
    </div>

    <nav class="navbar header-navbar" style="border:1px solid black;">
        <div class="navbar-wrapper">
            <div class="navbar-logo" id="navbar-logo">
                <a class="mobile-menu" id="mobile-collapse" href="#!">
                    <i class="ti-menu"></i>
                </a>
                
                <a href="<?php echo base_url(); ?>administrator/dashboard">
                 
                         <img class="img-fluid" width="200" src="<?php echo base_url(); ?>assets/images/4wmkfa.gif" alt="Theme-Logo" />
                   
                </a>
                <a class="mobile-options">
                    <i class="ti-more"></i>
                </a>
            </div>
            <div class="navbar-container container-fluid">
                <div>
                    <ul class="nav-right">
                        <li>
                            <a id="collapse-menu" href="#">
                                <i class="ti-menu"></i>
                            </a>
                        </li>
                      
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="ti-fullscreen"></i>
                            </a>
                        </li>
                       
                    </ul>
                    <ul class="nav-right">
                      
                        <li class="user-profile header-notification">
                            <a href="#!">
                           
                                <span><?php echo $this->session->userdata('username'); ?></span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">
                                <?php
                                $phone = $this->session->userdata('phone');
                                if(!isset($phone) && $phone == null)
                                {
                                ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>administrator/update-profile">
                                        <i class="ti-user"></i> Profile
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo base_url(); ?>administrator/change-password">
                                        <i class="ti-lock"></i> Change Password
                                    </a>
                                </li>
                               <?php } ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>administrator/logout">
                                        <i class="ti-layout-sidebar-left"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                  
                </div>
            </div>
        </div>
    </nav>
    <!-- Menu header end -->
<style type="text/css">
    .nav-left-new {
    display: flex;
    float: left;
}
.nav-left-new > li {
    padding: 0 45px 0 0;
}
.nav-left-new a {
    color: #ffffff;
}
.nav-left-new a:hover {
    color: rgb(26,188,156);
}
</style>