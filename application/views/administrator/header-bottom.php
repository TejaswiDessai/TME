
<!--
This page involved menus, code for session timing for 10 mints
Assigning menus according to user's role
-->
<?php
 if ($this->session -> userdata('email') == "" && $this->session -> userdata('login') != true   && $this->session -> userdata('role_id') != 1) {
      redirect('administrator/index');
    }

$emp_id = $this->session -> userdata('emp_id');
$usertype = $this->Administrator_Model->get_emp_usertype($emp_id);
$userteam1 = $this->Administrator_Model->get_emp_team($emp_id);
$userteam = explode(',',$userteam1);

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
                <?php if((in_array('1',$userteam)) || (in_array('2',$userteam))){?>
                 <li class="nav-item">
                        <a href="#!">
                        <i class="icofont icofont-cop-badge"></i>
                            <span>Campaigns</span>
                        </a>
                        <ul class="tree-1">
                            <li><a href="<?php echo base_url(); ?>campaigns/addcampaignForm">Add Campaign</a></li>
                             <li><a href="<?php echo base_url(); ?>campaigns/campaign">Campaign List</a></li>
                             <!-- <li><a href="<?php echo base_url(); ?>administrator/selectCampaignforReuse">Reuse Data</a></li> -->
                             <li><a href="<?php echo base_url(); ?>administrator/selectCampaignforReuseNew">Reuse Data</a></li>
                        </ul>
                    </li>
                <?php } ?>
                
                    <?php if( (in_array('3',$userteam))){?>
                    <li class="nav-item">
                     
                        <a href="<?php echo base_url(); ?>cdc/selectCampaign">
                        <i class="icofont icofont-sand-clock"></i>
                            <span>Data Lead and CDC</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if( (in_array('6',$userteam))){?>
                        <li class="nav-item">
                      
                        <!-- <a href="<?php echo base_url(); ?>cdc/selectCampaignforlead"> -->
                        <a href="#!">
                        <i class="icofont icofont-architecture-alt"></i>
                            <span>Add Lead</span>
                        </a>
                        <ul class="tree-1">
                           <li><a href="<?php echo base_url(); ?>cdc/selectCampaignforlead">
                               
                                Add Lead
                                </a>
                            </li>
                        </ul>
                        
                    </li>
                    <?php } ?>
                    <?php if( (in_array('7',$userteam))){?>
                        <li class="nav-item">
                      
                            <!-- <a href="<?php echo base_url(); ?>cdc/selectCampaignforDataVerification"> -->
                            <a href="#!">
                            <i class="icofont icofont-check-circled"></i>
                                <span>Data verification</span>
                            </a>
                            <ul class="tree-1">
                                <li>
                                    <a href="<?php echo base_url(); ?>cdc/selectCampaignforDataVerification">
                                     Data verification
                                     </a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if((in_array('8',$userteam))){?>
                        <li class="nav-item">
                        <a href="#!">
                        <i class="icofont icofont-email"></i>
                            <span data-i18n="nav.basic-components.main">Email Verification</span>
                        </a>
                        <ul class="tree-1">
                            <li>
                                <a href="<?php echo base_url(); ?>administrator/selectCampaignForEmailVerification" data-i18n="nav.basic-components.alert">Email Verification</a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if((in_array('9',$userteam))){?>
                        <li class="nav-item">
                        <a href="#!">
                        <i class="icofont icofont-ui-call"></i>
                            <span data-i18n="nav.basic-components.main">CDC</span>
                        </a>
                        <ul class="tree-1">
                          
                            <li><a href="<?php echo base_url(); ?>cdc/selectCampaignForCDC" data-i18n="nav.basic-components.alert">CDC</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if((in_array('10',$userteam))){?>
                        <li class="nav-item">
                            <a href="#!">
                            <i class="icofont icofont-chart-line-alt"></i>
                                <span data-i18n="nav.basic-components.main">Quality Assurance</span>
                            </a>
                                <ul class="tree-1">
                                    <li>
                                        <a href="<?php echo base_url(); ?>cdc/selectCampaignForQA" data-i18n="nav.basic-components.alert">Quality Assurance</a>
                                    </li>
                                </ul>
                        </li>
                    <?php } ?>
                    <?php if((in_array('11',$userteam))){?>
                        <li class="nav-item">
                        <a href="#!">
                        <i class="icofont icofont-paper"></i>
                            <span data-i18n="nav.basic-components.main">Lead Generation</span>
                        </a>
                        <ul class="tree-1">
                           
                            <li>
                                <a href="<?php echo base_url(); ?>cdc/selectCampaignForleadGeneration" data-i18n="nav.basic-components.alert">Lead Generation</a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>

                   
                   
                    <?php if($usertype == 0 || $usertype == 1 || $usertype ==2 || $usertype ==6){?>
                   
                    <li class="nav-item">
                      
                      <a href="#!">
                      <i class="icofont icofont-fast-delivery"></i>
                          <span>Delivery</span>
                      </a>
                      <ul class="tree-1">
                      <li><a href="<?php echo base_url(); ?>administrator/delivery">Delivery</a></li>
                      </ul>
                    </li>
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
                            <li><a href="<?php echo base_url(); ?>administrator/user_report" data-i18n="nav.basic-components.alert">User Report</a></li>
                            <li><a href="<?php echo base_url(); ?>administrator/selectCampaignforCampaignReport" data-i18n="nav.basic-components.breadcrumbs">Campaign Report</a></li>
                            <li><a href="<?php echo base_url(); ?>cdc/timelog_report" data-i18n="nav.basic-components.breadcrumbs">Timelog Report</a></li>
                            <li><a href="<?php echo base_url(); ?>cdc/user_accpeted_report" data-i18n="nav.basic-components.breadcrumbs">Lead Accepted Report</a></li>
                            <!-- <li><a href="<?php //echo base_url(); ?>administrator/user_report_ev" data-i18n="nav.basic-components.alert">EV Report</a></li> -->
                            <li><a href="<?php echo base_url(); ?>administrator/selectCampaignforEvReport" data-i18n="nav.basic-components.alert">EV Report</a></li>
                         
                        </ul>
                    </li>
                   
                <?php } ?>
                  
                 
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
        $(document).click(function() {

        timeSinceLastMove = 0;
        });
        $(document).keyup(function() {

            timeSinceLastMove = 0;
        });

        checkTime();

        function checkTime() {
        // console.log(timeSinceLastMove);
            timeSinceLastMove++;

            if (timeSinceLastMove > 10 * 60 ) {  //10 mints
            // if (timeSinceLastMove == 599 ) {  //10 mints
                alert("Session is Out");
                
                window.location = base_url+"administrator/logout";
            }
          
            setTimeout(checkTime, 1000); // check evry 1 second
        }
</script> 

     



