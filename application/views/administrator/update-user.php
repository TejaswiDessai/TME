   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/switchery/dist/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/advance-elements/css/bootstrap-datetimepicker.css">
    <!-- Date-range picker css  -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/bootstrap-daterangepicker/daterangepicker.css" />
    <!-- Date-Dropper css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datedropper/datedropper.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/switchery/dist/switchery.min.css" />

    <style>
    .multiselect-container{position:absolute;list-style-type:none;margin:0;padding:0}.multiselect-container .input-group{margin:5px}.multiselect-container>li{padding:0}.multiselect-container>li>a.multiselect-all label{font-weight:700}.multiselect-container>li>label.multiselect-group{margin:0;padding:3px 20px;height:100%;font-weight:700}.multiselect-container>li>a{padding:0}.multiselect-container>li>a>label{margin:0;height:100%;cursor:pointer;font-weight:400;padding:3px 20px 3px 40px}.multiselect-container>li>a>label.radio,.multiselect-container>li>a>label.checkbox{margin:0}.multiselect-container>li>a>label>input[type=checkbox]{margin-bottom:5px}.btn-group>.btn-group:nth-child(2)>.multiselect.btn{border-top-left-radius:4px;border-bottom-left-radius:4px;}.form-inline .multiselect-container label.checkbox,.form-inline .multiselect-container label.radio{padding:3px 20px 3px 40px}.form-inline .multiselect-container li a label.checkbox input[type=checkbox],.form-inline .multiselect-container li a label.radio input[type=radio]{margin-left:-20px;margin-right:0}

    #myModal .modal-body 
    { 
        min-height: 400px;
        
    }
    .select2-container--default .select2-selection--multiple {
    padding:0px 0px 0px 0px;
    }
    .form-control .multiselect-search input[type="text"]{
    height:40px;
    
}
.form-control .multiselect-search input[type="select"]{
    height:40px;width:323;
    
}
.multiselect{
        width:323;
    }
</style>
<script> var base_url = "<?php echo base_url() ?>"; 
    //  Get sub industry
    $(document).ready(function()
    {
        $(function() {
        $('#team')
            .multiselect({
            allSelectedText: 'All',
            maxHeight: 200,
            buttonWidth: '400px',
            enableCaseInsensitiveFiltering :true,

            includeSelectAllOption: true,
            
            })
            .multiselect('selectAll', true)
            .multiselect('updateButtonText');
        });
        $('#user_role').change(function(){
            var user_role = $(this).val();
            // alert(user_role);
            if (user_role != '')
            {
                $('#team').prop('disabled', false);
            }
            // alert(sector_id);
            // AJAX request
            var url = '<?php echo base_url("Administrator/getPrivillage");?>';
            console.log(url+"?user_role="+user_role);
            $.ajax({
                url:'<?php echo base_url("Administrator/getPrivillage");?>',
                method: 'get',
                data: {user_role: user_role},
                dataType: 'json',
                success: function(response){
                    // alert(response);
                //    Remove options 
            $('#team').find('option').remove();

                //    Add options
            $.each(response,function(index,data){
                $('#team').append('<option value="'+data['formid']+'">'+data['formnm']+'</option>');
                });
                $('#team').multiselect("rebuild");
                }
            });
        });

   
    });
    function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
    </script>
            <div class="page-header">
                <div class="page-header-title">
                    <h4>Users</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Users</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Update Users</a>
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
                                <h5>Update User -- <small style="text-decoration: underline;"><?php echo $user['fname']; ?></small></h5>
                                <div class="card-header-right">
                                    <i class="icofont icofont-rounded-down"></i>
                                    <i class="icofont icofont-refresh"></i>
                                    <i class="icofont icofont-close-circled"></i>
                                </div>
                            </div>
                            <div class="card-block">
                             <div class="col-sm-8">
                               <?php echo form_open_multipart('administrator/update_user_data'); ?>
                                     <input type="hidden" name="id" class="form-control" value="<?php echo $user['id']; ?>">
                                     <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Company Type</label>
                                        <div class="col-sm-10">
                                        <select class="form-control form-control-default "  name="ctype" id="ctype" required>
                                                <option value="">Select Division <?php echo $user['cid_type'];?></option>
                                                <option value="TMB" <?php if($user['cid_type'] == 'TMB'){ echo "Selected";} ?>>TMB</option>
                                                <option value="ME" <?php if($user['cid_type'] == 'ME'){ echo "Selected";} ?>>ME</option>
                                                <option value="HP" <?php if($user['cid_type'] == 'HP'){ echo "Selected";} ?>>HP</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Emp Id</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="emp_id" id="emp_id" class="form-control" value="<?php echo $user['emp_id']; ?>" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">First Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Fname" id="Fname"  class="form-control" value="<?php echo $user['fname']; ?>" placeholder="First Name">
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Lname" id="Lname" class="form-control" value="<?php echo $user['lname']; ?>" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text"  name="email" class="form-control" value="<?php //echo $user['email']; ?>" placeholder="Email">
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Manager</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Manager" id="Manager" value="<?php echo $user['mngr']; ?>" class="form-control" placeholder="Manager Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">User Role</label>
                                        <div class="col-sm-10">
                                        <select class="form-control form-control-default "  name="user_role" id="user_role">
                                            <option value="">Select Role</otpion>
                                            <?php foreach ($roles as $role): ?>
                                                <option value="<?php echo $role['rid']; ?>" <?php if($role['rid'] == $user['role']){ echo "Selected";} ?>><?php echo $role['rolenm']; ?></option>
                                            <?php endforeach; ?>
                                            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Team </label>
                                        <div class="col-sm-10">
                                        <select class="js-example-basic multiselect col-sm-12" multiple="multiple" name="team[]" id="team">
                                        <?php //$team =  $user['team']; 
                                        $team = explode(',',$user['team']);?>
                                        <?php foreach ($teams as $teams): ?>
                                            <option value="<?php echo $teams['formid']; ?>"  <?php if( in_array($teams['formid'],$team)) { echo "selected" ; } ?>><?php echo $teams['formnm']; ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                                    
                                    
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
                   

     <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/switchery/dist/switchery.min.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/advance-elements/swithces.js"></script>
       <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/advance-elements/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/advance-elements/bootstrap-datetimepicker.min.js"></script>
    <!-- Date-range picker js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Date-dropper js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/datedropper/datedropper.min.js"></script>

   
    <!-- ck editor -->
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/ckeditor/ckeditor.js"></script>
    <!-- echart js -->
  
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/user-profile.js"></script>