<script>
var timeleft = 60;
var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
  }
  document.getElementById("progressBar").value = 60 - timeleft;
  timeleft -= 1;
  if(timeleft == 0)
  {
    location.href = 'http://mehp-dbs/cdc/selectCampaign';
  }
}, 1000);
</script>

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
                                        <h3 class="text-left txt-primary">Enter OTP</h3>
                                    </div>
                                </div>
                                <hr/>
                                  <?php echo form_open('/administrator/otp_verification_complete'); ?>
                                <!-- <div class="input-group"> -->
                                <div class="col-md-12">
                                <div class="col-sm-12">
                                    <input type="hidden" name="campaign_id" value="<?php echo $campaign_id;?>">
                                    <input type="hidden" name="main_otp" value="<?php echo $main_otp;?>">
                                    <input type="text" name="otp" class="form-control" placeholder="Enter OTP here" required="">
                                    <progress value="0" max="60" id="progressBar"></progress>
                                    <span class="md-line"></span>
                                </div>
                                <br>
                                
                               
                                    </div>
                                <!-- </div> -->
                               
                                <div class="row m-t-25 text-left">
                                    <div class="col-sm-7 col-xs-12">
                                        <div class="checkbox-fade fade-in-primary">
                                        </div>
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
                                        <p class="text-inverse text-left"><b>Hello Prospect</b></p>
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
    
   