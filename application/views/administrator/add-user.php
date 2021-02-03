   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/switchery/dist/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/advance-elements/css/bootstrap-datetimepicker.css">
    <!-- Date-range picker css  -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/bootstrap-daterangepicker/daterangepicker.css" />
    <!-- Date-Dropper css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datedropper/datedropper.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/switchery/dist/switchery.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"
rel="Stylesheet"type="text/css"/>
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
            .multiselect('selectAll', false)
            .multiselect('updateButtonText');
        });
        $('#user_role').change(function(){
            var user_role = $(this).val();
            alert(user_role);
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
                        <li class="breadcrumb-item"><a href="#!">Add Users</a>
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
                                <h5>Add User</h5>
                                <div class="card-header-right">
                                    <i class="icofont icofont-rounded-down"></i>
                                    <i class="icofont icofont-refresh"></i>
                                    <i class="icofont icofont-close-circled"></i>
                                </div>
                            </div>
                            <div class="card-block">
                             <div class="col-sm-8">
                                 <div class="validation_errors_alert">

                                </div>
                            </div>
                             <div class="col-sm-8">
                               <?php //echo form_open_multipart('administrator/add_user'); ?>
                                    <!-- <form id="addUser" method="post"> -->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Company Type</label>
                                        <div class="col-sm-10">
                                            <!-- <input type="text" id="user_type" name="user_type" class="form-control" placeholder="User Type"> -->
                                            <select class="form-control form-control-default "  name="ctype" id="ctype" required>
                                                <option value="">Select C Type</option>
                                                <option value="TME">TME</option>
                                                <option value="ME">ME</option>
                                                <option value="HP">HP</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Emp Id</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="emp_id" id="emp_id" class="form-control" placeholder="Emp Id" onkeypress="return isNumber(event)">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">First Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Fname" id="Fname" class="form-control" placeholder="First Name">
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Last-Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="Lname" name="Lname" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text"  id="email" name="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Manager</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="Manager" name="Manager" class="form-control" placeholder="Manager" autocomplete="off">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="address" name="address" class="form-control" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Zipcode</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="zipcode" name="zipcode" class="form-control" placeholder="Zipcode">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="float:center;">
                                    <label class="col-sm-2 col-form-label">Gender</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                    
                                         <label>
                                            <input value="Female" id="gender" name="gender" checked="" type="radio"><i class="helper"></i> Female
                                        </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                        <label>
                                            <input value="Male" id="gender" name="gender" type="radio"><i class="helper"></i> Male
                                        </label>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">User Image</label>
                                        <div class="col-sm-6">
                                            <input type="file" id="userfile" name="userfile" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Date of Birth</label>
                                        <div class="col-sm-6">
                                        <input type="text" id="dropper-default" name="dob" class="form-control" placeholder="Select Your Birth Date">
                                        </div>
                                    </div> -->
                                    <!-- <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Want to make Enable?</label>
                                        <div class="col-sm-3">
                                            <input type="checkbox" value="TRUE" id="status" name="status" class="js-single" checked />
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">User Role</label>
                                        <div class="col-sm-10">
                                            <!-- <input type="text" id="user_type" name="user_type" class="form-control" placeholder="User Type"> -->
                                            <select class="form-control form-control-default "  name="user_role[]" id="user_role">
                                            <option value="">Select Role</otpion>
                                            <?php foreach ($roles as $role): ?>
                                                <option value="<?php echo $role['rid']; ?>"><?php echo $role['rolenm']; ?></option>
                                            <?php endforeach; ?>
                                            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Team</label>
                                        <div class="col-sm-10">
                                            <!-- <input type="text" id="user_type" name="user_type" class="form-control" placeholder="User Type"> -->
                                            <!-- <select class="form-control form-control-default "  name="team" id="team"> -->
                                            <select class="js-example-basic multiselect col-sm-12 form-control-sm" multiple="multiple" name="team[]" id="team">
                                           
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="Password" id="Password" name="Password" class="form-control" placeholder="Password" autocomlete="off">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button type="submit" name="submit" id="butsave" class="btn btn-primary">Add</button>
                                        </div>
                                    </div>
                                    <textarea id="description" style="visibility: hidden;"></textarea>
                                    
                                <!-- </form> -->
                               </div>
                                   
                                </div>
                            </div>
                        </div>
                        <!-- Basic Form Inputs card end -->
                        <script>
                        $(document).ready(function() {
                            $('#butsave').on('click', function() {
                                var emp_id = $('#emp_id').val();
                                var Fname = $('#Fname').val();
                                var Lname = $('#Lname').val();
                                var Manager = $('#Manager').val();
                                var status = $('#status').val();
                                var user_role = $('#user_role').val();
                                var team = $('#team').val();
                                var Password = $('#Password').val();
                                // alert(Password);
                                var cid_type = $('#ctype').val();
                                // var dob = $('#dropper-default').val();
                                // var status = $('#status').val();
                                // var address = $('#address').val();

                                if(emp_id!="" && Fname!=""){
                                    // $("#butsave").attr("disabled", "disabled");
                                    $.ajax({
                                        url: "<?php echo base_url("Administrator/savedata");?>",
                                        type: "GET",
                                        data: {
                                            type: 1,
                                            cid_type:cid_type,
                                            emp_id: emp_id,
                                            Fname: Fname,
                                            Lname: Lname,
                                            Manager: Manager,
                                            status: status,
                                            user_role: user_role,
                                            team:team,
                                            Password: Password,
                                            // userfile: userfile,
                                            // dob: dob,
                                            // status: status
                                        },
                                        cache: false,
                                        success: function(dataResult){
                                            // alert(dataResult.statusCode);
                                            console.log(dataResult)
                                            var dataResult = JSON.parse(dataResult);
                                            if(dataResult.statusCode==200){
                                                // alert("success");
                                                $("#butsave").removeAttr("disabled");
                                                // $('#fupForm').find('input:text').val('');
                                                // $("#success").show();
                                                $("#Manager").html("");
                                                $("#Password").html("");
                                                $('#butsave').html('User added successfully !'); 
                                                top.location.href=base_url+"administrator/users/add-user";						
                                            }
                                            else if(dataResult.statusCode==201){
                                            alert("Error occured !");
                                            }
                                            
                                        }
                                    });
                                }
                                else{
                                    alert('Please fill all the field !');
                                }
                            });
                        });
                        </script>

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