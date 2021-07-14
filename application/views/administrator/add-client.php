<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/switchery/dist/switchery.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/advance-elements/css/bootstrap-datetimepicker.css"> -->
    <!-- Date-range picker css  -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/bootstrap-daterangepicker/daterangepicker.css" /> -->
    <!-- Date-Dropper css -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datedropper/datedropper.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/switchery/dist/switchery.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    <style>
    /* .multiselect-container{position:absolute;list-style-type:none;margin:0;padding:0}.multiselect-container .input-group{margin:5px}.multiselect-container>li{padding:0}.multiselect-container>li>a.multiselect-all label{font-weight:700}.multiselect-container>li>label.multiselect-group{margin:0;padding:3px 20px;height:100%;font-weight:700}.multiselect-container>li>a{padding:0}.multiselect-container>li>a>label{margin:0;height:100%;cursor:pointer;font-weight:400;padding:3px 20px 3px 40px}.multiselect-container>li>a>label.radio,.multiselect-container>li>a>label.checkbox{margin:0}.multiselect-container>li>a>label>input[type=checkbox]{margin-bottom:5px}.btn-group>.btn-group:nth-child(2)>.multiselect.btn{border-top-left-radius:4px;border-bottom-left-radius:4px;}.form-inline .multiselect-container label.checkbox,.form-inline .multiselect-container label.radio{padding:3px 20px 3px 40px}.form-inline .multiselect-container li a label.checkbox input[type=checkbox],.form-inline .multiselect-container li a label.radio input[type=radio]{margin-left:-20px;margin-right:0}

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
    } */
</style>
<!-- <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"rel="Stylesheet"type="text/css"/> -->
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
                            <!-- <div class="card-header">
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
                            </div> -->
                            <div class="card-block">
                             <div class="col-sm-8">
                                 <div class="validation_errors_alert">

                                </div>
                            </div>
                             <div class="col-sm-8">
                               <?php //echo form_open_multipart('administrator/add_user'); ?>
                                    <!-- <form id="addUser" method="post"> -->
                                   
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Client Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="clcode" id="clcode" class="form-control" placeholder="Client Code" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Client ID</label>
                                        <div class="col-sm-10">
                                            <input type="number" id="clid" name="clid" class="form-control" placeholder="Client Id" autocomplete="off" required>
                                        </div>
                                    </div>                        
                                   
                                 
                                   
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button type="submit" name="submit" id="butsave" class="btn btn-primary">Add Client</button>
                                        </div>
                                    </div>
                                    <!-- <textarea id="description" style="visibility: hidden;"></textarea> -->
                                    
                                   
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

      

                            
                            $('#butsave').on('click', function() {
                                var clcode = $('#clcode').val();
                             
                                if(clcode == '')
                                {
                                    alert("Please enter Client Code");
                                    return;
                                }
                             
                                var clid = $('#clid').val();
                                if(clid == '')
                                {
                                    alert("Please enter client ID");
                                    return;
                                }
                               
                                if(clcode!=""){
                                    // $("#butsave").attr("disabled", "disabled");
                                    $.ajax({
                                        url: "<?php echo base_url("Administrator/save_client");?>",
                                        type: "GET",
                                        data: {
                                           
                                            clcode: clcode,
                                            clid:clid
                                           
                                            
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
                                               
                                                $('#butsave').html('Client added successfully !'); 
                                                top.location.href=base_url+"campaigns/addclient";						
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

