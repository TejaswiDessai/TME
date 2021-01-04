
            <div class="page-header">
                <div class="page-header-title">
                    <h4>Update Profile</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Update Profile</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Update Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page header end -->
            <!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Basic Form Inputs card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Update User</h5>
                                <div class="card-header-right">
                                    <i class="icofont icofont-rounded-down"></i>
                                    <i class="icofont icofont-refresh"></i>
                                    <i class="icofont icofont-close-circled"></i>
                                </div>
                            </div>
                            <div class="card-block">
                             <div class="col-sm-8">
                               <?php echo form_open_multipart('administrator/update_admin_profile_data'); ?>
                                     <input type="hidden" name="id" class="form-control" value="<?php echo $this->session->userdata('user_id'); ?>">
                                   
                                     <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">First Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly="" name="fname" class="form-control" value="<?php echo $user['fname']; ?>" placeholder="User Name" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly=""  name="lname" class="form-control" value="<?php echo $user['lname']; ?>" placeholder="Last Name" required="">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">User Type</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="usertype" value="<?php echo $user['usertype']; ?>" class="form-control" placeholder="User Type" required="">
                                        </div>
                                    </div>
<!--                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <input type="text"  name="address" value="<?php // echo $user['address']; ?>" class="form-control" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Zipcode</label>
                                        <div class="col-sm-10">
                                            <input type="text"  name="zipcode" value="<?php // echo $user['zipcode']; ?>" class="form-control" placeholder="Zipcode">
                                        </div>
                                    </div>-->
                                   
<!--                                     <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">User Image</label>
                                        <div class="col-sm-6">
                                           <img src="<?php // echo base_url().'assets/images/users/'.$user['image']; ?>" width="70px">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Update Image</label>
                                        <div class="col-sm-6">
                                            <input type="file" name="userfile" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Date of Birth</label>
                                        <div class="col-sm-6">
                                        <input type="text" id="dropper-default" value="<?php // echo $user['dob']; ?>" name="dob" class="form-control" placeholder="Select Your Birth Date">
                                        </div>-->
                                    </div>
                                  
                                            <input type="hidden" value="<?php echo $user['status']; ?>" name="status" class="js-single" />
                                        
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                    <textarea id="description" style="visibility: hidden;"></textarea>
                                </form>
                               </div>
                                   
                                </div>
                            </div>
                        </div>
                        <!-- Basic Form Inputs card end -->
      