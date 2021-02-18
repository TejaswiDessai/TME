<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/css/lightbox.css">
    
    <style>
    body
    {
        counter-reset: Serial;  
    }
    .table1
    {
        border-collapse: separate;
        height: 10px; overflow-y: auto; overflow-x: hidden;
    }

    .table1 tr td:first-child:before
    {
        content: "" counter(Serial);
        counter-increment: Serial;      /* Increment the Serial counter */
    
    }
    .note-toolbar{
        display: none;
    }
    .note-popover{
        display: none;
    }

    </style>
    <script type="text/javascript">
    $(document).ready(function(){
        
        $("#send_email").attr("disabled", true);
        $("#update_email").attr("disabled", true);

            $(".delete").click(function(e){ alert('as');
                $this  = $(this);
                e.preventDefault();
                var url = $(this).attr("href");
                $.get(url, function(r){
                    if(r.success){
                        $this.closest("tr").remove();
                    }
                })
            });
        });
    $(document).ready(function(){
        $(".enable").click(function(e){
            $this  = $(this);
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function(r){
                if(r){
                    $this.closest("td").html("<button class='label label-inverse-warning desable'>Deactive</button>");
                }
            })
        });
    });
    $(document).ready(function(){
        $(".desable").click(function(e){ 
            $this  = $(this);
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function(r){
                if(r){
                    $this.closest("td").html("<button class='label label-inverse-primary enable'>Active</button>");
                }
            })
        });
    });
    </script>



            <div class="page-header">
                <div class="page-header-title">
                    <h4>List Users</h4>
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
                        <li class="breadcrumb-item"><a href="#!">List Users</a>
                        </li>
                    </ul>
                </div>
            </div>
           
            <!-- Page-header end -->
            <!-- Page-body start -->
            <div class="page-body">
                <!-- DOM/Jquery table start -->
               <!-- Sign in modal start -->
    <!-- <div class="modal fade" id="sign-in-modal" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sign In Now</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-b-0">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="icofont icofont-user-alt-4"></i></span>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="icofont icofont-lock"></i></span>
                                    <input type="text" class="form-control" placeholder="Password">
                                </div>
                            </div>
                        </div>
                       
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Select</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Sign in modal end -->
<script>
// $(".passingID").click(function () {
    $(document).on("click", ".passingID", function () {
    var ids = $(this).attr('data-id');
    var row = $(this).attr('data-row');
    // alert(row);
    var sp = ids.split('@');
    var flname = sp[0];
    var sp_email = flname.split('.') ;
    var lastVal = sp_email.pop(); 
    // console.log(sp[0]); // john.doe
    // console.log(sp[1]); // email.com
    if (flname.match('.')) {
    // alert("found");
    var option1 = sp_email[0]+"."+lastVal+"@"+sp[1];
    var option2 = lastVal+"."+sp_email[0]+"@"+sp[1];
    var option3 = sp_email[0]+"@"+sp[1];
    var option4 = lastVal+"@"+sp[1];
    var values = [option1, option2, option3, option4];
    }
    else
    {
        var values = [ids];
    }
    

    var select = $('<select>').prop('id', 'email_123')
                    .prop('name', 'email').prop('class', 'form-control');

    $(values).each(function() {
      select.append($("<option>")
        .prop('value', this)
        .text(this.charAt(0).toUpperCase() + this.slice(1)));
    });

    var label = $("<label>").prop('for', 'pets')
                   .text("Select mail: ");
    var br = $("<br>");
    $("#idkl").val(row);
    $('#containercheck').empty();
    $('#containercheck').append(label).append(select).append(br);
    // $("#idkl").val( sp[0] );
    $('#myModal').modal('show');
});


</script>

    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
            <div id="containercheck">
            </div>
           
          <!-- <form method="post" action="tambahkaryawan.php"> -->
            <input type="hidden" class="form-control" name="idkl" id="idkl">
          <!-- </form> -->
        </div>
        <div class="modal-footer">
        <button type="button" id="email_143"  class="btn btn-primary" >Select</button>
          <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
                <div class="card">
                    <div class="card-block">
                        <form action="<?php echo base_url();?>administrator/user_report" method="post" >
                            <table class="table" style="margin-bottom:10px;">
                            <tr>
                            <td>
                            <?php foreach ($campaigns as $campaign): ?>
                                <label class="col-lable"><b>Campaign Name: <?php echo $campaign['campnm']; ?></b></label>
                                <input type="hidden" value="<?php echo $campaign['cids']; ?>" id="campnm">
                            <?php endforeach; ?>
                            </td>
                            <td>
                                <select class="form-control form-control-default "  name="agent" id="agent">
                                        <option value="<?php echo $this->session->userdata('emp_id'); ?>"><?php echo $this->session->userdata('username'); ?></option>
                                </select>
                            </td>
                            <!-- <td>
                                <select class="form-control form-control-default "  name="stage" id="stage">
                                    <option value="">Numbers</option>
                                    <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3" >3</option>
                                    <option value="4" >4</option>
                                    <option value="5" >5</option>
                                    <option value="6" >6</option>
                                    <option value="7" >7</option>
                                    <option value="8" >8</option>
                                    <option value="9" >9</option>
                                    <option value="10" >10</option>
                                    <option value="11" >11</option>
                                    <option value="12" >12</option>
                                    <option value="13" >13</option>
                                    <option value="14" >14</option>
                                    <option value="15" >15</option>
                                </select>
                            </td> -->
                            <td>
                                <select class="form-control form-control-default "  name="stage" id="stage">
                                    <option value="">Status</option>
                                    <option value="Open" >Open</option>
                                    <option value="Closed" >Closed</option>
                                    <option value="Accepted" >All</option>
                                </select>
                            </td>
                           
                            <td>
                                <input  class="btn btn-primary" type="submit" name="submit">
                            </td>
                            <!-- <td>
                                <a class="btn btn-primary" href="">Refresh</a>
                            </td> -->
                            </tr>
                            <tr>
                            <td>
                            <input type="text" class="form-control form-control-default " name="from" id="from" placeholder="Enter send from Email..">
                            </td>
                            <td>
                            <input type="text" class="form-control form-control-default " name="sub" id="sub" placeholder="Email Subject">
                            </td>
                            <td>
                            <textarea name="body" id="body" placeholder="Email Body"></textarea>
                            </td>
                            </tr>
                            </table>
                            </form>
                       
                    </div>
                    <br>
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap table1">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <!-- <th>Date</th> -->
                                        <!-- <th>Image</th> -->
                                        <!-- <th>Campaign Name</th> -->
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Domain</th>
                                        <th>State & Country </th>
                                        <th>Company Size</th>
                                        <th>Job title</th>
                                        <th>LinkedIn URL</th>
                                        <th>Email</th>
                                        <th>Change Format</th>
                                        <th>Status</th>
                                        <th>Send To</th>
                                        <th>Change Status</th>
                                        <th>Sent Timestamp</th>
                                        <th>Email Sent From</th>
                                        <th>Comments</th>
                                    </tr>
                                </thead>
                                <tbody >
                                
                                <?php //foreach($email_list as $post) : 
                                $i = 0;
                                   foreach ($leadmaster as $post): 
                                       
                                        $i++;
                                    ?>
                                 <tr>
                                        <td></td>
                                        <!-- <td><?php //echo date("M d,Y", strtotime($post['last_login'])); ?></td> -->
                                        <!-- <td> -->
                                        <?php
                                        //echo $post['campnm'];
                                        // echo $campnam = $this->Administrator_Model->get_camp_name($post['emp_id']);
                                        ?>
                                        <!-- </td> -->
                                        <td>
                                        <input type="hidden" name="row_id" id="row_id_<?php echo $post['lmid'];?>" value="<?php echo $post['lmid'];?>">
                                        <input type="hidden" name="leadid" id="leadid_<?php echo  $i;?>" value="<?php echo $post['lmid'];?>">
                                        <?php echo $post['fname']; ?></td>
                                        <td><?php echo $post['lname']; ?></td>
                                        <td><?php 
                                        echo $post['domain'];
                                        // $query = $this->db->query("SELECT * FROM leadmaster where stagtidi = '".$post['emp_id']."'");
                                        // echo $query->num_rows();

                                        ?></td>
                                         <td><?php echo $post['city']." / ".$post['state']; ?></td>
                                        <td>
                                        <?php echo $post['empsize']; ?>
                                        </td>
                                        <td>
                                        <?php echo $post['jtitle']; ?>
                                        </td>
                                        <td>
                                        <a href="<?php echo $post['plink']; ?>">Click here</a>
                                        </td>
                                        <td>
                                        <!-- <input type="checkbox" name="email" id="email"  value="email"> -->
                                        <input type="text" id="email_<?php echo $i;?>" value="<?php if(isset($post)){  echo $post['email']; }else { echo "Email is Empty" ;} ?>">
                                        <?php //echo $post['email']; ?>
                                        </td>
                                        <td>
                                            <!-- <input type="button" id="format" value="Change Format"> -->
                                            <!-- <button class="btn btn-primary btn-sm btn-block" style="padding: 6px 0px;" data-toggle="modal" data-target="#sign-in-modal">Change Format</button> -->
                                            <button type="button" class="btn btn-info btn-sm passingID" data-id="<?php echo $post['email'];?>" data-row="<?php echo $i;?>">Change Format</button>

                                        </td>
                                        <td>
                                            <?php //echo $post['mailstatus'];;?>
                                        </td>
                                        <td>
                                            <!-- <input type="checkbox"> -->
                                            <input type="checkbox" class ="emailclass" value="<?php echo $i;?>" name="email_list_<?php echo $i;?>" id="email_list_<?php echo $i;?>"><?php //echo $i;?>
                                        </td>
                                        <td>
                                            <input type="checkbox" class ="emailstatus"  value="<?php echo $post['lmid'];?>" name="email_status_<?php echo $i;?>" id="email_status_<?php echo $i;?>"><?php //echo $i;?>
                                        </td>
                                        <td>
                                            
                                        </td>
                                        <td>
                                            
                                        </td>
                                        <td>
                                           
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); ?>
                                </div>  -->

                                 </tbody>
                            </table>
                           
                        </div>
                    </div>
                </div>
                <!-- DOM/Jquery table end -->
                <div class="form-group row">
                <div class="col-sm-2">
                    <input class="btn btn-primary" type="button"  id="send_email" value="Send Email">
                    </div>
                    <div class="col-sm-2">
                    <input class="btn btn-primary" type="button" id="update_email" value="Update Email">
                    </div>
                    <div class="col-sm-2">
                    <select style="width:200px" class="form-control form-control-default "  name="email_status" id="email_status">
                        <option value="">Change Status</option>
                        <option value="Test Mail Sent" >Test Mail Sent</option>
                        <option value="Bounced" >Bounced</option>
                        <option value="Reviewed" >Reviewed</option>
                        <option value="Accepted" >Accepted</option>
                        <option value="Not Available" >Not Available</option>
                        <option value="Out of Office" >Out of Office</option>
                        <option value="Generic email" >Generic email</option>
                        <option value="Dead contact" >Dead contact</option>
                        <option value="Incorrect Info" >Incorrect Info</option>
                        <option value="Refused" >Refused</option>
                    </select>
                    </div>
                </div>
            </div>


   <!-- Modal -->
   <div class="modal fade" id="myModalemail" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
        <div class="mail-body-content">
                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Subject">
                                            </div>
                                            <div class="summernote email-summernote">Hello Summernote</div>
                                        </form>
                                    </div>
        </div>
        <div class="modal-footer">
        <button type="button" id=""  class="btn btn-primary" >Send</button>
          <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



            <script>
// $("input:checkbox").change(function() {
$(".emailclass").click(function() {
    
  var notChecked = [], checked = [];
            // $(":checkbox").map(function() {
            $(".emailclass").map(function() {
            
                this.checked ? checked.push(this.id) : notChecked.push(this.id);
            });
            // alert();
          if(checked == ""){ // if unchecked any field
            $("#send_email").attr("disabled", true);
          }else{
            $("#send_email").attr("disabled", false);
          }
          
});
$(".emailstatus").click(function() {
    
    var notChecked = [], checked = [];
              // $(":checkbox").map(function() {
              $(".emailstatus").map(function() {
              
                  this.checked ? checked.push(this.id) : notChecked.push(this.id);
              });
              // alert();
            if(checked == ""){ // if unchecked any field
              $("#update_email").attr("disabled", true);
            }else{
              $("#update_email").attr("disabled", false);
            }
            
  });




        //      $( document ).ready(function() {
        //     $("#format").on('click', function() 
        //         {
        //         alert("Test");
        //     var email = $('#email').val();
        //         $combinations = array();
        //         $words = sizeof($email);
        //         $combos = 1;
        //         for($i = $words; $i > 0; $i--) {
        //             $combos *= $i;
        //         }
        //         while(sizeof($combinations) < $combos) {
        //             shuffle($arr);
        //             $combo = implode(" ", $arr);
        //             if(!in_array($combo, $combinations)) {
        //                 $combinations[] = $combo;
        //             }
        //         }
        //         return $combinations;
        //     }
        // });
        
    //     $( document ).ready(function() {
    //         $('#email_143').change(function(){
        
    //         alert("test");
    //     });
    // });
// });
    $(function() {
    //     $('#email_143').on('click', function() {
    //         var email_123 = $('#email_123').val();
    //         var id = $('#idkl').val();
    //         // alert("test"+id);
    //         $("#email_"+id).val(email_123);
    //         $('#myModal').modal('hide');
    //     // alert("test"+email_123);
    // });
    // $(document).ready(function() {

        $("#send_email").on('click', function() 
        {
            $('#myModalemail').modal('show');
        });

        $("#send_email1").on('click', function() 
        {
            alert("test");
            var someObj = {};
            someObj.fruitsGranted = [];
            
            someObj.leads = [];
            $("input:checkbox").each(function() {
                if ($(this).is(":checked")) {
                    var checked = ($(this).val());
                    var email = $("#email_"+checked).val();
                    someObj.fruitsGranted.push(email);
                   
                    var leadid = $('#leadid_'+checked).val();
                    someObj.leads.push(leadid);
                } else {
                    // someObj.fruitsDenied.push(checked);
                }
            });
            var change_status_of = someObj.fruitsGranted;
            var leadid = someObj.leads;
         //    alert(leadid);
            var email_status = $('#email_status').val();
            var campid = $('#campnm').val();
            // var leadid = $('#leadid_'+leadid_obj).val();
            // alert(leadid);
            var from = $('#from').val();
            var sub = $('#sub').val();
            var body = $('#body').val();
            // alert("from"+from+"sub= "+sub+"body= "+body);
            
            var url = "<?php echo base_url("administrator/send_email_status");?>";
            console.log(url+"?change_status_of="+change_status_of+"&email_status="+email_status+"&campid="+campid+"&leadid="+leadid+"&from="+from+"&sub="+sub+"&body="+body);
            $.ajax({
                url :'<?php echo base_url("administrator/send_email_status");?>',
                type: 'GET', 
                dataType: 'json',              
                data: {
					change_status_of:leadid,
                    email_status:email_status,
					campid:campid,
                    leadid:leadid,
                    from:from,
                    sub:sub,
                    body:body
                    
				},
                cache: false,
                success: function(response){
                    var text = response.statusCode;
                    console.log("check"+text);
                    alert(text);
                    
                    if(response.statusCode == "Success") 
                    {                        
                        $("#send_email").html(response.message);
                        top.location.href=base_url+"administrator/selectCampaignForEmailVerification";//redirection
                    }
                    else if(response.statusCode=="Fail")
                    {
                        alert("test");
                        $("#send_email").html(response.message);
                        
					}
                }
            });
        });

        $("#update_email").on('click', function() 
        {
            var someObj = {};
            someObj.fruitsGranted = [];
            someObj.leads = [];
            $("input:checkbox").each(function() {
                if ($(this).is(":checked")) {
                    var checked = ($(this).val());
                    var leadid = $('#row_id_'+checked).val();
                    alert(leadid);
                    // var email = $("#email_status_"+checked).val();
                    // alert(email);
                    someObj.fruitsGranted.push(checked);
                    
                    someObj.leads.push(leadid);

                } else {
                    
                }
            });
            var change_status_of = someObj.fruitsGranted;
            var email_status = $('#email_status').val();
            var campid = $('#campnm').val();
            var leadid = someObj.leads;
            var from = $('#from').val();
            var sub = $('#sub').val();
            var body = $('#body').val();
            // alert("from"+from+"sub= "+sub+"body= "+body);
            
            var url = "<?php echo base_url("administrator/update_email_status");?>";
            console.log(url+"?change_status_of="+change_status_of+"&email_status="+email_status+"&campid="+campid+"&leadid="+leadid+"&from="+from+"&sub="+sub+"&body="+body);
            $.ajax({
                url :'<?php echo base_url("administrator/update_email_status");?>',
                type: 'GET', 
                dataType: 'json',              
                data: {
					change_status_of:change_status_of,
                    email_status:email_status,
					campid:campid,
                    leadid:leadid,
				},
                cache: false,
                success: function(response){
                    var text = response.statusCode;
                    console.log("check"+text);
                    alert(text);
                    
                    if(response.statusCode == "Success") 
                    {                        
                        $("#update_email").html(response.message);
                        top.location.href=base_url+"administrator/selectCampaignForEmailVerification";//redirection
                    }
                    else if(response.statusCode=="Fail")
                    {
                        alert("test");
                        $("#update_email").html(response.message);
                        
					}
                }
            });
        });
    });
</script>