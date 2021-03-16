
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
                                        <h3 class="text-left txt-primary">Update password</h3>
                                    </div>
                                </div>
                                <hr/>
                                <?php echo form_open_multipart('administrator/change_password_action'); ?>
                                <!-- <div class="input-group"> -->
                                <div class="col-md-12">
                                <div class="col-sm-12">
                                    <input type="text" name="emp_id" class="form-control" placeholder="Employee Id" required="">
                                    <span class="md-line"></span>
                                </div>
                                <!-- <br>
                                <div class="col-sm-12">
                                <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Old Password">
                                    <span style='color:#FF0000' id="lname_msg"></span>
                                </div> -->
                                <br>
                                <div class="col-sm-12">
                                <input type="password" autocomplete="off" name="new_password" id="new_password" class="form-control" placeholder="New Password">
                                </div>
                                <br>
                                <div class="col-sm-12">
                                
                                <input type="password" id="confirm_new_password" onkeyup="checkPass(); return false;" name="confirm_new_password" class="form-control" placeholder="Confirm New Password">
                                </div>
                                    </div>
                                <!-- </div> -->
                               
                                <div class="row m-t-25 text-left">
                                    <div class="col-sm-7 col-xs-12">
                                        <div class="checkbox-fade fade-in-primary">
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-xs-12 forgot-phone text-right">
                                        <a href="<?php echo base_url(); ?>administrator/index" class="text-right f-w-600 text-inverse"> Login?</a>
                                    </div>
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
    
    <script type="text/javascript">
function checkPass()
{ 
    //Store the password field objects into variables ...
    var new_password = document.getElementById('new_password');
    var pass2 = document.getElementById('confirm_new_password');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "rgb(46,204,113)";
    var badColor = "rgb(231,76,60)";
    if(new_password.value == confirm_new_password.value){
        confirm_new_password.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        confirm_new_password.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
} 
 
</script>  