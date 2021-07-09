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
      

        function isNumber(evt) 
        {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    });
    </script>
            <div class="page-header">
                <!-- <div class="page-header-title">
                    <h4>Candidate</h4>
                </div> -->
                <!-- <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Candidate</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Add Candidate</a>
                        </li>
                    </ul>
                </div> -->
            </div>
            <!-- Page header end -->
            <!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Basic Form Inputs card start -->
                        <div class="card" style="padding:70px;">
                            <div class="card-header">
                                <h5>Candidate Information  
                                <select style="margin-top: -29px;margin-left: 250px;" name="testtime" id="testtime"  
                                class="form-control">
                                 <option value="20">Test Time - 20 Mints</option>
                                 <option value="30">Test Time - 30 Mints</option>
                                
                                 </select></h5><br><br><br>
                               
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
                                        <label class="col-sm-2 col-form-label">Full Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Fname" id="Fname" class="form-control" placeholder="Full Name" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone no" autocomplete="off" required>
                                        </div>
                                    </div>                        
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="email" name="email" class="form-control" placeholder="Email" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="address" name="address" class="form-control" placeholder="Address" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Education</label>
                                        <div class="col-sm-10">
                                        <select name="education" id="education"  class="form-control form-control-sm" required>
                                                <option value="">Select</option>
                                                <option value="12th">12th</option>
                                                <option value="Graduation">Graduation</option>
                                                <option value="Post Graduation">Post Graduation</option>

                                        </select>
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
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button type="submit" name="submit" id="butsave" class="btn btn-primary">Add Candidate</button>
                                        </div>
                                    </div>
                                    <!-- <textarea id="description" style="visibility: hidden;"></textarea> -->
                                    
                                    Test URL: <input type="text" style="width:50%;" id="myInput" value="http://mehp-dbs/administrator/test_login"> <button onclick="myFunction()">Copy text</button>
                                    <p style="color:red;"><b><i>Note: Please, note down or remember "Phone Number" & "Email" which is required to Candidate while they login for test!</b></i></p>
                                <!-- </form> -->
                               </div>
                                   
                                </div>
                            </div>
                        </div>
                        <!-- Basic Form Inputs card end -->
                        <!-- <script type="text/javascript">
                        alert();
                        window.onbeforeunload = function() { return "Your work will be lost."; };
    </script> -->
                        <script>
                                $(document).ready(function() { //below code is to disable back button

                                    window.history.pushState(null, "", window.location.href);        

                                    window.onpopstate = function() {

                                        window.history.pushState(null, "", window.location.href);

                                    };

                                });

                          
                        $(document).ready(function() {

        $(document).ready(function() {

            window.history.pushState(null, "", window.location.href);        

            window.onpopstate = function() {

                window.history.pushState(null, "", window.location.href);

            };

        });


                            
                            $('#butsave').on('click', function() {
                                var Fname = $('#Fname').val();
                                var testtime = $('#testtime').val();
                                if(Fname == '')
                                {
                                    alert("Please enter full name");
                                    return;
                                }
                                var email = $('#email').val();
                                if(email == '')
                                {
                                    alert("Please enter email");
                                    return;
                                }
                                var phone = $('#phone').val();
                                if(phone == '')
                                {
                                    alert("Please enter phone");
                                    return;
                                }
                                var address = $('#address').val();
                                var education = $('#education').val();
                                if(education == '')
                                {
                                    alert("Please enter education");
                                    return;
                                }
                                var gender = $('#gender').val();
                                if(Fname!=""){
                                    // $("#butsave").attr("disabled", "disabled");
                                    $.ajax({
                                        url: "<?php echo base_url("Administrator/save_candidate");?>",
                                        type: "GET",
                                        data: {
                                            testtime: testtime,
                                            Fname: Fname,
                                            email: email,
                                            phone: phone,
                                            address: address,
                                            education: education,
                                            gender:gender
                                            
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
                                                $('#butsave').html('Candidate added successfully !'); 
                                                top.location.href=base_url+"administrator/add_candidate";						
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


<script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
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