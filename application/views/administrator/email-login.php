
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
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Login To Open Form</h3>
                                    </div>
                                </div>
                                <hr/>
                                  <?php echo form_open('/send-email-php/email_otp.php'); ?>
                                <!-- <div class="input-group"> -->
                                <div class="col-md-12">
                                <div class="col-sm-12">
                                <input type="hidden" name="campaign_id" value="<?php echo $camp_id;?>" class="form-control" required="">
                                    <input type="text" name="emp_id" class="form-control" placeholder="Employee Id" required="">
                                    <span class="md-line"></span>
                                </div>
                                <br>
                                <div class="col-sm-12">
                                    <input type="text"  name="email" id="email"  placeholder="Email"   class="form-control form-control-sm cdqadisable" required="">
                                    <span style='color:#FF0000' id="lname_msg"></span>
                                </div>
                                <br>
                                <div class="col-sm-12">
                                <select class="form-control form-control-default "  name="user_type" id="user_type" required="">
                                    <option value="1">Admin</option>
                                    <option value="2">Core Team</option>
                                    <option value="3">Manager</option>
                                    <option value="4">Team Lead</option>
                                    <option value="5" selected>Team Member</option>
                                    <option value="6">Developers</option>
                                </select>
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
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Submit</button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-7">
                                        <p class="text-inverse text-left m-b-0">Thank you!</p>
                                        <p class="text-inverse text-left"><b>Your Development Team</b></p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="<?php echo base_url(); ?>admintemplate/assets/images/auth/index.png" alt="small-logo.png" style="width:128px">
                                    </div>
                                </div>
                            </form>
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
    
   