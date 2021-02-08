<?php

// if (isset($_SESSION["username"])) {
//     // only if user is logged in perform this check
//     if ((time() - $_SESSION['timeout']) > 600) { // after 10 mints session will be log out
//         redirect('administrator/logout');
//       exit;
//     } else {
//       $_SESSION['timeout'] = time();
//     }
//   }


 if ($this->session -> userdata('email') == "" && $this->session -> userdata('login') != true && $this->session -> userdata('role_id') != 1) {
      redirect('administrator/index');
    }

$emp_id = $this->session -> userdata('emp_id');
$usertype = $this->Administrator_Model->get_emp_usertype($emp_id);
 ?>

     <!-- Menu aside start -->
    <div class="main-menu">
        <div class="main-menu-header">
           <ul class="nav-left-new">
                        <li>
                            <a id="collapse-menu" href="#">
                                <i class="ti-home"></i>
                            </a>
                        </li>
                        <li>
                            <a class="main-search morphsearch-search" href="#">
                                <i class="ti-user   "></i>
                            </a>
                        </li>
                        <li>
                            <a class="main-search morphsearch-search" href="#">
                                <i class="ti-settings"></i>
                            </a>
                        </li>
                        <li>
                            <a class="main-search morphsearch-search" href="#">
                                <i class="ti-email"></i>
                            </a>
                        </li>
                   
                    </ul>
        </div>
        <div class="main-menu-content" style="height:700px">
            <ul class="main-navigation">
             <li class="nav-item has-class">
                    <a href="<?php echo base_url(); ?>administrator/dashboard">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php if($usertype == 0 || $usertype == 1 || $usertype ==2 || $usertype ==6){?>
                 <li class="nav-item">
                        <a href="#!">
                        <i class="icofont icofont-cop-badge"></i>
                            <span>Campaigns</span>
                        </a>
                        <ul class="tree-1">
                            <li><a href="<?php echo base_url(); ?>campaigns/addcampaignForm">Add Campaign</a></li>
                             <li><a href="<?php echo base_url(); ?>campaigns/campaign">Campaign List</a></li>
                        </ul>
                    </li>
                <?php } ?>
                    <li class="nav-item">
                        <!-- <a href="<?php echo base_url(); ?>cdc/addlead""> -->
                        <a href="<?php echo base_url(); ?>cdc/selectCampaign">
                        <i class="icofont icofont-sand-clock"></i>
                            <span>Data Lead and CDC</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- <a href="<?php echo base_url(); ?>cdc/addlead""> -->
                        <a href="<?php echo base_url(); ?>cdc/selectCampaignforlead">
                        <i class="icofont icofont-architecture-alt"></i>
                            <span>Add Lead</span>
                        </a>
                    </li>
                    <li class="nav-item">
                      
                        <a href="<?php echo base_url(); ?>cdc/selectCampaignforDataVerification">
                        <i class="icofont icofont-check-circled"></i>
                            <span>Data verification</span>
                        </a>
                    </li>
                    <?php if($usertype == 0 || $usertype == 1 || $usertype ==2 || $usertype ==6){?>
                    <li class="nav-item">
                        <a href="#!">
                            <i class="ti-layout"></i>
                            <span>Users</span>
                        </a>
                        <ul class="tree-1">
                            <li><a href="<?php echo base_url(); ?>administrator/users/add-user">Add User</a></li>
                            <li><a href="<?php echo base_url(); ?>administrator/users/users">Users</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#!">
                            <i class="ti-layout-grid2-thumb"></i>
                            <span data-i18n="nav.basic-components.main">Reports</span>
                        </a>
                        <ul class="tree-1">
                            <li><a href="<?php echo base_url(); ?>administrator/user_report" data-i18n="nav.basic-components.alert">User Status</a></li>
                            <!-- <li><a href="<?php //echo base_url(); ?>administrator/team/list" data-i18n="nav.basic-components.breadcrumbs">Campaign Status</a></li> -->
                            <!-- <li><a href="<?php echo base_url(); ?>administrator/email_verification" data-i18n="nav.basic-components.alert">Email Verification</a></li> -->
                        </ul>
                    </li>
                <?php } ?>
                  
                   
                  
                   
                    <!--<li class="nav-item">
                        <a href="#!">
                            <i class="ti-direction-alt"></i>
                            <span data-i18n="nav.basic-components.main">Testimonials</span>
                        </a>
                        <ul class="tree-1" style="display: none;">
                            <li><a href="<?php echo base_url(); ?>administrator/testimonials/add" data-i18n="nav.basic-components.alert">Add Testimonial</a></li>
                            <li><a href="<?php echo base_url(); ?>administrator/testimonials/list" data-i18n="nav.basic-components.breadcrumbs">List Testimonials</a></li>
                        </ul>
                    </li>-->
            </ul>
        </div>
    </div>
    <!-- Menu aside end -->
     <!-- Main-body start -->
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-header start -->

    <?php if($this->session->flashdata('success')): ?>
      <?php echo '<div class="alert alert-success icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Success! &nbsp;&nbsp;</strong>'.$this->session->flashdata('success').'</p></div>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('danger')): ?>
      <?php echo '<div class="alert alert-danger icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Error! &nbsp;&nbsp;</strong>'.$this->session->flashdata('danger').'</p></div>'; ?>
    <?php endif; ?>

     <?php if(validation_errors() != null): ?>
      <?php echo '<div class="alert alert-warning icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Alert! &nbsp;&nbsp;</strong><br>'.validation_errors().'</p></div>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('match_old_password')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('match_old_password').'</p>'; ?>
    <?php endif; ?>
   
    <script>
    var base_url = "<?php echo base_url() ?>";
   
        var timeSinceLastMove = 0;

        $(document).mousemove(function() {

            timeSinceLastMove = 0;
        });

        $(document).keyup(function() {

            timeSinceLastMove = 0;
        });

        checkTime();

        function checkTime() {

            timeSinceLastMove++;

            if (timeSinceLastMove > 10 * 60 ) {
                alert("Session is Out");
                window.location = base_url+"administrator/logout";
            }

            setTimeout(checkTime, 1000);
        }
</script>

     



