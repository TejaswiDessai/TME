
            <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
	
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body">

                            <div class="text-center">
                                <img src="<?php echo base_url(); ?>assets/images/ME-Logo-new-new-logo-white-1536x400-1.png" alt="logo.png" style="width:160px">
                            </div>
                              	<div class="col-md-10">
                                    <p class="text-left txt-primary" style="color: black;"><?php echo validation_errors(); ?></p>
                                   
                                </div>
                            <div class="auth-box">
                                <!-- <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Login To Open Form</h3>
                                    </div>
                                </div> -->
                                <hr/>
                                  <?php //echo form_open('/send-email-php/email_otp.php'); ?>
                                <!-- <div class="input-group"> -->
                                <div class="col-md-12">
                                <div class="col-sm-12">
                                <input type="hidden" name="campaign_id" value="<?php echo $camp_id;?>" class="form-control" required="">
                                    <input type="hidden" name="emp_id" value="<?php echo $empcode;?>" class="form-control" required="">
                                    <span class="md-line"></span>
                                    <p style="color:black;"><b>Are you sure to generate a one time password<br><br> that would last only for 1 hour?</b></p>
                                </div>
                                
                                
                                    </div>
                                <!-- </div> -->
                               
                                <div class="row m-t-25 text-left">
                                    <div class="col-sm-7 col-xs-12">
                                        <div class="checkbox-fade fade-in-primary">
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-5 col-xs-12 forgot-phone text-right">
                                        <a href="<?php echo base_url(); ?>administrator/index" class="text-right f-w-600 text-inverse"> Login?</a>
                                    </div> -->
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                    <a href="http://mehp-dbs/send-email-php/email_otp.php?cid=<?php echo $camp_id?>&empcode=<?php echo $empcode?>"><button class="btn btn-primary">Yes</button> </a>
                                    <a href="http://mehp-dbs/administrator/otp_verification?cid=<?php echo $camp_id?>&c=no"><button class="btn btn-primary">No</button></a>
                                        <!-- <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Submit</button> -->
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-7">
                                        <p class="text-inverse text-left m-b-0">Thank you!</p>
                                        <p class="text-inverse text-left"><b>Hello Prospect</b></p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="<?php echo base_url(); ?>admintemplate/assets/images/auth/index.png" alt="small-logo.png" style="width:128px">
                                    </div>
                                </div>
                            <!-- </form> -->
                            </div>
                       
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        
        <!-- end of container-fluid -->
    </section>    
    
   