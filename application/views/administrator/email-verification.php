<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/css/lightbox.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
  $(document).ready(function () {
    // Handler for .ready() called.
    $('html, body').animate({
        scrollTop: $('#email_form').offset().top
    }, 'slow');
});
</script>
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
    .dataTables_filter {
    display: none;
    } 
    #email_123{
        height:34px;
    }
    #navbar-logo{
        height: 6.5rem;
    }
    .navbar {
        margin-bottom: 1px;
    }
    .page-header {
    padding-bottom: 1px;
    margin: 1px 0 20px;
    border-bottom: 1px solid #eee;
    }
l    /* #navbar{
        height: 01px;
    } */
    </style>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#example').dataTable( {
  "searching": false
} );
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



            <!-- <div class="page-header">
                <div class="page-header-title">
                    <h4>Email Verification</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">EV</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Email Verification</a>
                        </li>
                    </ul>
                </div>
            </div> -->
           
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
$(document).ready(function() {
$('#email_status').change(function() {
// alert("hi");
// var email_status = $('#email_status').val();
var op =$(this).val();
// alert(op);
if(op =='Accepted' || op =='Confirmed' || op =='Not Available' || op =='Out of Office') {                 
    $('input[name="update_and_send_email"]').prop('disabled',true);
} else {
    $('input[name="update_and_send_email"]').prop('disabled', false);
}   
});
});

$(document).ready(function() {

//update record lock
var rlc = null; //lock 1
var lmid1 = $('#leadid_1').val();
var lmid2 = $('#leadid_2').val();
var lmid3 = $('#leadid_3').val();
var lmid4 = $('#leadid_4').val();
var lmid5 = $('#leadid_5').val();
var lmid6 = $('#leadid_6').val();
var lmid7 = $('#leadid_7').val();
var lmid8 = $('#leadid_8').val();
var lmid9 = $('#leadid_9').val();
var lmid10 = $('#leadid_10').val();
var lmid11 = $('#leadid_11').val();
var lmid12 = $('#leadid_12').val();
var lmid13 = $('#leadid_13').val();
var lmid14 = $('#leadid_14').val();
var lmid15 = $('#leadid_15').val();
// alert("L1 = "+lmid1+"L2 = "+lmid2+"L3 = "+lmid3+"L4 = "+lmid4+"L5 = "+lmid5);
var emp_id = $('#empcode').val();
var leadstatus = $('#leadstatus').val();
// alert(leadstatus);
if(leadstatus == "New")
{
    rlc = 1;
}
else
{
    rlc = null;
}

// if(rlc == 1){
var urlq = '<?php echo base_url("administrator/updaterecordlock");?>';
// alert(urlq);
console.log(urlq+"?lmid1="+lmid1+"&lmid2="+lmid2+"&rlc="+rlc+"&emp_id="+emp_id);
$.ajax({
      url:'<?php echo base_url("administrator/updaterecordlock");?>',
      method: 'get',
      data: {
        lmid1: lmid1,
        lmid2: lmid2,
        lmid3: lmid3,
        lmid4: lmid4,
        lmid5: lmid5,
        lmid6: lmid6,
        lmid7: lmid7,
        lmid8: lmid8,
        lmid9: lmid9,
        lmid10: lmid10,
        lmid11: lmid11,
        lmid12: lmid12,
        lmid13: lmid13,
        lmid14: lmid14,
        lmid15: lmid15,
        rlc:rlc,
        emp_id:emp_id,
        leadstatus:leadstatus
      },
      dataType: 'json',
      success: function(response){

        console.log("check");
                    // var dataResult = JSON.parse(response);
                    if(response.statusCode == "Success") 
                    {         
                      // alert("Success in success");
                      console.log("Record is opened/locked now");     
                      
                    }else if(response.data=="Fail")
                    {
                      alert("fail/check if record is already opened");  
                        
					          }
      }
  });
// }else{
//   alert("record already opened");
//   // top.location.href=base_url+"cdc/selectCampaignforlead";//redirection
// }
});
// $(".passingID").click(function () {
    $(document).on("click", ".passingID", function () {
    var ids = $(this).attr('data-id');
    var row = $(this).attr('data-row');
    var fname = $(this).attr('data-fname');
    var lname = $(this).attr('data-lname');
    var sp = ids.split('@');
    var flname = sp[0];
    var sp_email = flname.split('.') ;
    var lastVal = sp_email.pop(); 
    // alert(flname);
    
    // console.log(sp[0]); // john.doe
    // console.log(sp[1]); // email.com
    var first_of_firstString = flname.substring(0, 1);
    var first_of_secondString = lastVal.substring(0, 1);
    let count = 0
    let position = flname.indexOf('.')

    while (position !== -1) {
    count++
    position = flname.indexOf('.', position + 1)
    }

    if (count>0) {
    var option1 = sp_email[0]+"."+lastVal+"@"+sp[1];
    var option2 = lastVal+"."+sp_email[0]+"@"+sp[1];
    var option3 = sp_email[0]+"@"+sp[1];
    var option4 = lastVal+"@"+sp[1];
    var option5 = first_of_firstString+"@"+sp[1];
    var option6 = first_of_secondString+"@"+sp[1];
    var option7 = first_of_firstString+"."+first_of_secondString+"@"+sp[1];
    var option8 = first_of_firstString+"."+lastVal+"@"+sp[1];
    var option9 = first_of_firstString+lastVal+"@"+sp[1];
    var values = [option1, option2, option3, option4,option5,option6,option7,option8,option9];
    }
    else
    {
        var first_of_firstString1 = fname.substring(0, 1);
        var first_of_secondString1 = lname.substring(0, 1);

        var option1 = fname+"."+lname+"@"+sp[1];
        var option2 = lname+"."+fname+"@"+sp[1];
        var option3 = fname+"@"+sp[1];
        var option4 = lname+"@"+sp[1];
        var option5 = first_of_firstString1+"@"+sp[1];
        var option6 = first_of_secondString1+"@"+sp[1];
        var option7 = first_of_firstString1+"."+first_of_secondString+"@"+sp[1];
        var option8 = first_of_firstString1+"."+lname+"@"+sp[1];
        var option9 = first_of_firstString1+lname+"@"+sp[1];
        var values = [option1, option2, option3, option4,option5,option6,option7,option8,option9];
        // var option1 = ids;
        // var option2 = first_of_firstString+"@"+sp[1];
        // var values = [option1,option2];
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

$(document).ready(function() {
    $('#dom-jqry').DataTable( {
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 15, 50]]
    } );
} );

document.getElementById("randomSelect").addEventListener("click", function() {
    var select = document.getElementById('email_123');
    var items = select.getElementsByTagName('option');
    var index = Math.floor(Math.random() * items.length);
    select.selectedIndex = index;
});

</script>
<style>
#rcorners3 {
  border-radius: 20px 30px;
  background: #73AD21;
  padding: 10px; 
  width: 30px;
  height: 30px; 
  color:white;
} 
</style>
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
                <div class="card" id="email_form">
                    <div class="card-block">
                    <input type="hidden" value="<?php echo $empcode;?>" id="empcode">
                        <form action="<?php echo base_url();?>administrator/emailVerfication" method="post" >
                            <table class="table" style="margin-bottom:10px;">
                            <tr>
                            <td>
                            <?php foreach ($campaigns as $campaign): ?>
                                <label class="col-lable"><b>Campaign Name: <?php echo $campaign['campnm']; ?></b></label>
                                <input type="hidden" value="<?php echo $campaign['cids']; ?>" id="campid">
                            <?php endforeach; ?>
                            <input type="hidden" value="<?php echo $camp_cnid; ?>" id="campaign_id" name="campaign_id">
                            </td>
                            
                            <td>
                                <select style="height:34px;" class="form-control form-control-default "  name="leadstatus" id="leadstatus">
                                    <option value="">Lead Status</option>
                                    <option value="New" <?php if( isset($Stage) && $Stage == "New") { echo "selected" ; } ?>>New</option>
                                    <option value="Open" <?php if( isset($Stage) && $Stage == "Open") { echo "selected" ; } ?> >Open</option>
                                    <option value="Closed" <?php if( isset($Stage) && $Stage == "Closed") { echo "selected" ; } ?>>Closed</option>
                                    <option value="All" <?php if( isset($Stage) && $Stage == "All") { echo "selected" ; } ?>>All</option>
                                </select>
                            </td>
                            <td>
                                <select style="height:34px;" class="form-control form-control-default "  name="leadlimit" id="leadlimit">
                                    <option value="5" <?php if( isset($leadlimit) && $leadlimit == "5") { echo "selected" ; } ?>>5</option>
                                    <option value="10" <?php if( isset($leadlimit) && $leadlimit == "10") { echo "selected" ; } ?>>10</option>
                                    <option value="15" <?php if( isset($leadlimit) && $leadlimit == "15") { echo "selected" ; } ?>>15</option>
                                    <option value="20" <?php if( isset($leadlimit) && $leadlimit == "20") { echo "selected" ; } ?>>20</option>
                                    <option value="25" <?php if( isset($leadlimit) && $leadlimit == "25") { echo "selected" ; } ?>>25</option>
                                    <option value="30" <?php if( isset($leadlimit) && $leadlimit == "30") { echo "selected" ; } ?>>30</option>
                                    <option value="35" <?php if( isset($leadlimit) && $leadlimit == "35") { echo "selected" ; } ?>>35</option>
                                    <option value="40" <?php if( isset($leadlimit) && $leadlimit == "40") { echo "selected" ; } ?>>40</option>
                                    <option value="45" <?php if( isset($leadlimit) && $leadlimit == "45") { echo "selected" ; } ?>>45</option>
                                    <option value="50" <?php if( isset($leadlimit) && $leadlimit == "50") { echo "selected" ; } ?>>50</option>
                                </select>
                            </td>
                            <td>
                                <select style="height:34px;" class="form-control form-control-default "  name="email_sent_time" id="email_sent_time">
                                    <option value="">Select Time</option>
                                    <option value="1" <?php if( isset($email_sent_time) && $email_sent_time == "1") { echo "selected" ; } ?>>1 Hr Old</option>
                                    <option value="2" <?php if( isset($email_sent_time) && $email_sent_time == "2") { echo "selected" ; } ?> >2 Hr Old</option>
                                    <option value="3" <?php if( isset($email_sent_time) && $email_sent_time == "3") { echo "selected" ; } ?>>3 Hr Old</option>
                                    <option value="4" <?php if( isset($email_sent_time) && $email_sent_time == "4") { echo "selected" ; } ?>>More than 3 Hr</option>
                                </select>
                            </td>
                            <td>
                            <input type="text" name="search_email" class="form-control form-control-default " value="<?php if(isset($search_email)){ echo $search_email;}?>" id="search_email" placeholder="Search by Email">
                            <!-- <input type="text" value="<?php //echo $agent_email?>" class="form-control form-control-default " name="from" id="from">
                            <input type="hidden" value="<?php //echo $agent_password?>" class="form-control form-control-default " name="pass" id="pass"> -->
                            </td>
                            <td>
                            <select style="width:200px;height:34px;" class="form-control form-control-default "  name="search_email_status" id="search_email_status">
                                <option value="">Email Status</option>
                                <option value="Test Mail Sent"  <?php if( isset($search_email_status) && $search_email_status == "Test Mail Sent") { echo "selected" ; } ?> >Test Mail Sent</option>
                                <option value="Bounced" <?php if( isset($search_email_status) && $search_email_status == "Bounced") { echo "selected" ; } ?> >Bounced</option>
                                <option value="Address not found" <?php if( isset($search_email_status) && $search_email_status == "Address not found") { echo "selected" ; } ?>>Address not found</option>
                                <option value="Reviewed" <?php if( isset($search_email_status) && $search_email_status == "Reviewed") { echo "selected" ; } ?>>Reviewed</option>
                                <option value="Accepted" <?php if( isset($search_email_status) && $search_email_status == "Accepted") { echo "selected" ; } ?>>Accepted</option>
                                <option value="Confirmed" <?php if( isset($search_email_status) && $search_email_status == "Confirmed") { echo "selected" ; } ?> >Confirmed</option>
                                <option value="Blocked" <?php if( isset($search_email_status) && $search_email_status == "Blocked") { echo "selected" ; } ?> >Blocked</option>
                                <option value="Not Available" <?php if( isset($search_email_status) && $search_email_status == "Not Available") { echo "selected" ; } ?>>Not Available</option>
                                <option value="Out of Office" <?php if( isset($search_email_status) && $search_email_status == "Out of Office") { echo "selected" ; } ?>>Out of Office</option>
                                <option value="Generic email" <?php if( isset($search_email_status) && $search_email_status == "Generic email") { echo "selected" ; } ?>>Generic email</option>
                                <option value="Dead contact" <?php if( isset($search_email_status) && $search_email_status == "Dead contact") { echo "selected" ; } ?>>Dead contact</option>
                                <option value="Incorrect Info" <?php if( isset($search_email_status) && $search_email_status == "Incorrect Info") { echo "selected" ; } ?>>Incorrect Info</option>
                                <option value="Refused" <?php if( isset($search_email_status) && $search_email_status == "Refused") { echo "selected" ; } ?>>Refused</option>

                            </select>
                            </td>
                            <td>
                                <input  class="btn btn-primary" type="submit" name="submit">
                            </td>
                            <td>
                                <a class="btn btn-primary" href="">Refresh</a>
                            </td>
                            </tr>
                            <tr>
                            <!-- <td> -->
                            <!-- <a href="#" id="randomSelect"></a> -->
                            <!-- <input type="checkbox" id="changeFormat"  />&nbsp;Change Email Format
                            </td> -->
                            </tr>
                            </table>
                            </form>
                       
                    </div>
                    <!-- <br> -->
                  
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap table1">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <!-- <th>Date</th> -->
                                        <!-- <th>Image</th> -->
                                        <!-- <th>Campaign Name</th> -->
                                       
                                        <th>Last Email Format</th>
                                        <th <?php if($Stage == "New"){?>style="display:none;"<?php } ?>>Format used</th>
                                        <th>Original Email</th>
                                        <th>Change Format</th>
                                        <th>Status</th>
                                        <th>Send To<br><input type="checkbox" class="emailsend_all  emailclass"  onclick="toggle(this);" <?php if ($Stage != "New") echo 'disabled'; ?>/></th>
                                        <th>Change Status<br><input type="checkbox" class="emailstatus_all emailstatus" onclick="toggle(this);" <?php if ($Stage == "New") echo 'disabled'; ?>/></th>
                                        <th>Sent Timestamp</th>
                                        <th>Email Sent From</th>
                                        <th>Comments</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Domain</th>
                                        <th>State & Country </th>
                                        <th>Company Size</th>
                                        <th>Job title</th>
                                        <th>LinkedIn URL</th>
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
                                       
                                        <!-- <input type="checkbox" name="email" id="email"  value="email"> -->
                                        <input type="text" id="last_email_<?php echo $i;?>" value="<?php if(isset($search_email) && $search_email != null){ echo $search_email; }else if(isset($post) && $Stage == "New"){  echo $post['email']; }else if(isset($post) && $Stage != "New"){  echo $post['evemail']; }else { echo "Email is Empty" ;} ?>">
                                        <?php //echo $post['email']; ?>
                                        
                                        </td>
                                        <td <?php if($Stage == "New"){?>style="display:none;"<?php } ?>>
                                        <p id="rcorners3"> <?php 
                                         $format = $this->db->query("SELECT * FROM public.ev
                                         where 
                                        lmid = '".$post['lmid']."'
                                       
                                        
                                         ");
                                         echo $format->num_rows();
                                          ?></p>
                                        </td>
                                        <td>
                                        <!-- <input type="checkbox" name="email" id="email"  value="email"> -->
                                        <input type="text" id="email_<?php echo $i;?>" value="<?php if(isset($search_email) && $search_email != null){ echo $search_email; }else{ echo $post['email'];}  ?>">
                                        <?php //echo $post['email']; ?>
                                        </td>
                                        <td>
                                            <!-- <input type="button" id="format" value="Change Format"> -->
                                            <!-- <button class="btn btn-primary btn-sm btn-block" style="padding: 6px 0px;" data-toggle="modal" data-target="#sign-in-modal">Change Format</button> -->
                                            <button type="button" class="btn btn-info btn-sm passingID" data-fname="<?php echo $post['fname'];?>" data-lname="<?php echo $post['lname'];?>" data-id="<?php echo $post['email'];?>" data-row="<?php echo $i;?>">Change Format</button>

                                        </td>
                                        <td>
                                            <?php if(isset($post['closer_status']) && $Stage == "New"){echo $post['closer_status'];} else if($Stage != "New") { echo $post['mailstatus']; } else {}?>
                                            <!-- <input type="checkbox" class ="emailclass" value="Close" name="email_close_<?php echo $i;?>" id="email_close_<?php echo $i;?>"><?php //echo $i;?> -->
                                            
                                        </td>
                                        <td>
                                            <!-- <input type="checkbox"> -->
                                            <input type="checkbox" class ="emailclass checkbox_emailclass" value="<?php echo $i;?>" name="email_list_<?php echo $i;?>" id="email_list_<?php echo $i;?>" <?php if ($Stage != "New") echo 'disabled'; ?>><?php //echo $i;?>
                                        </td>
                                        <td>
                                            <input type="checkbox" class ="emailstatus checkbox_emailstatus"  value="<?php echo $i;?>" name="email_list_<?php echo $i;?>" id="email_list_<?php echo $i;?>" <?php if ($Stage == "New") echo 'disabled'; ?>><?php //echo $i;?>
                                        </td>
                                        <td>
                                            <?php 
                                            //$yesterday = $this->db->query("SELECT * FROM ev where (stagtidi = $empid OR stagtidi = $empcode )");
                                            if(isset($post['sent_mail_date'])){ echo $post['sent_mail_date'];}?>
                                        </td>
                                        <td>
                                        <?php if(isset($post['fmail'])){ echo $post['fmail'];} ?>  
                                        </td>
                                        <td>
                                        <?php if(isset($post['fmail'])){ echo $post['evcomment'];} ?>
                                        </td>
                                        <td>
                                        <input type="hidden" name="row_id" id="row_id_<?php echo $post['lmid'];?>" value="<?php echo $post['lmid'];?>">
                                        <input type="hidden" name="leadid" id="leadid_<?php echo  $i;?>" value="<?php echo $post['lmid'];?>">
                                        <?php echo $post['fname']; 
                                        $formated_mail = $post['fname'].".".$post['lname'];
                                        ?>
                                        <input type="hidden" id="formated_mail_<?php echo $i;?>" value="<?php echo $formated_mail; ?>">
                                        </td>
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
                                        <a href="<?php echo $post['plink']; ?>" target="_new">Click here</a>
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
                <div class="form-group row" style="<?php echo $display_send_email_section;?>;">
                    <div class="col-sm-2">
                        <input class="btn btn-primary" type="button"  id="send_email" value="Send Email">
                    </div>
                    <!-- <div class="col-sm-2">
                        <input class="btn btn-primary" type="button" id="update_email" value="Update Email">
                    </div> -->
                    <!-- <div class="col-sm-2">
                        <select style="width:200px;height:34px;" class="form-control form-control-default "  name="email_status" id="email_status">
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
                    </div> -->
                    <!-- <div class="col-sm-2">
                        <textarea id="comment" placeholder="Enter comment"></textarea>
                    </div> -->
                    <!-- <div> -->
                    <!-- <label>Closer Status</label> -->
                        <!-- <select style="height:34px;" class="form-control form-control-default "  name="email_close_status" id="email_close_status">
                            <option value="">Closer Status</option>
                            <option value="New" >New</option>
                            <option value="Open">Open</option>
                            <option value="Closed" >Closed</option>
                            
                        </select>
                    </div> -->
                </div>
                

                <!--  -->

                 <!-- DOM/Jquery table end -->
                 <div class="form-group row" style="border:1px solid; padding-top:10px;width:100% ;<?php echo $display_update_email_section;?>;">
                    
                   
                    <div class="col-sm-2">
                        <select style="width:150px;height:34px;" class="form-control form-control-default "  name="email_status" id="email_status">
                        <option value="">Change Status</option>
                        <option value="Test Mail Sent" >Test Mail Sent</option>
                        <option value="Bounced" >Bounced</option>
                        <option value="Address not found">Address not found</option>
                        <option value="Reviewed" >Reviewed</option>
                        <option value="Accepted" >Accepted</option>
                        <option value="Confirmed" >Confirmed</option>
                        <option value="Blocked" >Blocked</option>
                        <option value="Not Available" >Not Available</option>
                        <option value="Out of Office" >Out of Office</option>
                        <option value="Generic email" >Generic email</option>
                        <option value="Dead contact" >Dead contact</option>
                        <option value="Incorrect Info" >Incorrect Info</option>
                        <option value="Refused" >Refused</option>
                        </select>
                    </div>
                    <!-- <div class="col-sm-1">
                    </div> -->
                    <div class="col-sm-2">
                        <textarea id="comment" placeholder="Enter comment"></textarea>
                    </div>
                    <!-- <div class="col-sm-1">
                    </div> -->
                    <div class="col-sm-2">
                        <input class="btn btn-primary" type="button" name="update_and_send_email" id="update_email" value="Update Status & Send Email">
                    </div>
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-2">
                    <!-- <label>Closer Status</label> -->
                        <select style="height:34px;" class="form-control form-control-default "  name="email_close_status" id="email_close_status">
                            <option value="">Email Closer Status</option>
                            <option value="New" >New</option>
                            <option value="Open">Open</option>
                            <option value="Closed" >Closed</option>
                            
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input class="btn btn-primary" type="button" id="update_email_only" value="Update Status">
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
        <div class="container">
            <!-- <h2>Dynamic Tabs</h2> -->
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                <li><a data-toggle="tab" href="#menu1">Compose</a></li>
                <li><a data-toggle="tab" href="#menu2">Template</a></li>
                <!-- <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                <li><a data-toggle="tab" href="#menu3">Menu 3</a></li> -->
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                <h5>From : (Agent) Email Details</h5>
                <input type="text" id="from" name="from" class="form-control" value="<?php if(isset($From)){ echo $From;}?>"><br>
                <input type="password" id="pass" name="pass" class="form-control" value="<?php if(isset($Pass)){ echo $Pass;}?>">    <br>
                <input type="checkbox" onclick="myFunction()">&nbsp;Show Password

                </div>
                <div id="menu1" class="tab-pane fade">
                <h5>Compose Email</h5>
                <div class="form-group">
                        <input type="text" value="Test Mail" id="sub" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                    <textarea rows="6" style="width: 100%;" name="editor1" id="editor1" placeholder="Email Body"></textarea>
                    
                </div>
                </div>
                <div id="menu2" class="tab-pane fade">
                <h5>Template</h5>
                <select style="height:34px;" class="form-control form-control-default "  name="email_template" id="email_template">
                            <option value="">Select Template</option>
                            <option value="TestEmail" >Sample Test Mail</option>
                            
                            
                        </select>
                </div>
                <!-- <div id="menu3" class="tab-pane fade">
                <h3>Menu 3</h3>
                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div> -->
            </div>
            </div>
                                        <!-- <form>
                                        <br><input type="text" id="email" name="email" class="form-control" placeholder="Email"><br>
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">    <br>
                                            <div class="form-group">
                                                <input type="text" id="sub" class="form-control" placeholder="Subject">
                                            </div>
                                            <div class="form-group">
                                            <textarea rows="6" style="width: 100%;" name="mail_body" id="mail_body" placeholder="Email Body"></textarea>
                                           
                                        </div>
                                        </form> -->
                                    </div>
        </div>
        <div class="modal-footer">
            <?php if($Stage == "New"){?>
        <button type="button" id="send_email1"  class="btn btn-primary" >Send</button>
        <?php }else{?>
        <button type="button" id="update_email1"  class="btn btn-primary" >Send</button>
        <?php } ?>
          <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <script>
function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
  



            <script>
            $(".emailstatus_all").on('change', function () {
                // alert("test");
                $(this).closest('table').find('.checkbox_emailstatus').prop('checked', this.checked ); 
                $("#update_email").attr("disabled", false);
            }); 
            $(".emailsend_all").on('change', function () {
                // alert("test");
                $(this).closest('table').find('.checkbox_emailclass').prop('checked', this.checked ); 
                $("#send_email").attr("disabled", false);
            }); 
            
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
        $('#email_143').on('click', function() {
            var email_123 = $('#email_123').val();
            var id = $('#idkl').val();
            // alert("test"+id);
            $("#email_"+id).val(email_123);
            $('#myModal').modal('hide');
        // alert("test"+email_123);
    });
    // $(document).ready(function() {

        $("#send_email").on('click', function() 
        {
            $('#myModalemail').modal('show');
        });
        $("#update_email").on('click', function() 
        {
            $('#myModalemail').modal('show');
        });

        $("#send_email1").on('click', function() 
        {
            // alert("test");
            var someObj = {};
            someObj.fruitsGranted = [];
            
            someObj.leads = [];
            $("input:checkbox").each(function() {
                if ($(this).is(":checked")) {
                    var checked = ($(this).val());
                    if(checked != "on")
                    {
                        var email = $("#email_"+checked).val();
                        someObj.fruitsGranted.push(email);
                        var leadid = $('#leadid_'+checked).val();
                        someObj.leads.push(leadid);
                    }
                    
                } else {
                    // someObj.fruitsDenied.push(checked);
                }
            });
            var change_status_of = someObj.fruitsGranted;
            var leadid = someObj.leads;
            // alert(change_status_of);
            // return;
            var email_status = $('#email_status').val();
            var campid = $('#campid').val();
            var camp_cnid = $('#campaign_id').val();
            // var leadid = $('#leadid_'+leadid_obj).val();
            // alert(leadid);
            var from = $('#from').val();
            // alert(from);
            if(from == null || from == '')
            {
                alert("Please add your email address");
                return;
            }

           
            // var changeFormat = document.getElementById("changeFormat");
            // var changeFormat = $('#changeFormat').val();
            // if (changeFormat.checked == true){
            //      var changeFormatcond = 1;
            // } else {
            //     var changeFormatcond = 0;
            // }
            // alert(flname);
            // return;
            var pass = $('#pass').val();
            if(pass == null || pass == '')
            {
                alert("Please add your email password");
                return;
            }
            // alert(pass);
            var sub = $('#sub').val();
            // var body = $('#editor1').val();
            var body = CKEDITOR.instances.editor1.getData();
            var email_template = $('#email_template').val();
            if(body != null && body != '')
            {
                var sub = $('#sub').val();
                var body = CKEDITOR.instances.editor1.getData();
            }
            else if(email_template != null && email_template != '')
            {
                var sub = "Test Mail";
                var body = "Test Mail";
            }
            else
            {
                var sub = "Test Mail";
                var body = "Test Mail";
            }
            // alert(body);
            // var body = document.getElementById('mail_body').innerHTML;
            // alert("from= "+from+"sub= "+sub+"body= "+body+"email= "+change_status_of+"leadid= "+leadid);
            // alert("change_status_of="+change_status_of+"email_status="+email_status+"campid="+campid+"leadid="+leadid+"from="+from+"sub="+sub+"body="+body+"pass="+pass);
            // return;
            // $("#loader").show();
            jQuery(document).ajaxStart(function () {
            //show ajax indicator
            ajaxindicatorstart('Sending email.. please wait..');
            });
            var url = "<?php echo base_url("administrator/send_email_status");?>";
            console.log(url+"?change_status_of="+change_status_of+"&email_status="+email_status+"&campid="+campid+"&leadid="+leadid+"&from="+from+"&sub="+sub+"&body="+body+"&pass="+pass);
            $.ajax({
                url :'<?php echo base_url("administrator/send_email_status");?>',
                type: 'GET', 
                dataType: 'json',
                // jsonpCallback: 'onJSONPLoad',  
                contentType:'application/json; charset=utf-8',
                data: {
					change_status_of:change_status_of,
                    email_status:email_status,
					campid:campid,
                    camp_cnid:camp_cnid,
                    leadid:leadid,
                    from:from,
                    pass:pass,
                    sub:sub,
                    body:body,
                    // changeFormatcond:changeFormatcond
                    
				},
                cache: false,
                success: function(response){
                    var text = response.statusCode;
                    console.log("check"+text);
                    $('#myModalemail').modal('hide');
                    // $("#loader").hide();
                    if(response.statusCode == "Success") 
                    {                  
                        $("#from").html(response.from);
                        $("#pass").html(response.pass);
                        // alert(response.from+""+response.pass);      
                        $("#send_email").html(response.message);
                        jQuery(document).ajaxStop(function () {
                        //show ajax indicator
                        ajaxindicatorstop();
                        });
                        alert("Mail sent successfully!");
                        top.location.href=base_url+"administrator/emailVerfication?campaign_id="+response.campaign_id;//redirection
                    }
                    else if(response.statusCode=="Fail")
                    {
                        // alert("test");
                        $("#send_email").html(response.message);
                        jQuery(document).ajaxStop(function () {
                        //show ajax indicator
                        ajaxindicatorstop();
                        });
                        
					}
                    else if(response.statusCode == "Exceed")
                    {
                        alert("Email format exceeded");
                        jQuery(document).ajaxStop(function () {
                        //show ajax indicator
                        ajaxindicatorstop();
                        });
                    }
                    else if(response.statusCode == "Email Exist")
                    {
                        alert("Email is already sent on this email Id");
                        jQuery(document).ajaxStop(function () {
                        //show ajax indicator
                        ajaxindicatorstop();
                        });
                    }
                    else if(response.statusCode == "Email Fail")
                    {
                        alert(response.error);
                        jQuery(document).ajaxStop(function () {
                        //show ajax indicator
                        ajaxindicatorstop();
                        });
                    }
                },
                error:function(xhr, status, error){
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    alert('Error - ' + errorMessage);
                    jQuery(document).ajaxStop(function () {
                        //show ajax indicator
                        ajaxindicatorstop();
                        });
                },
            });
        });


        $("#update_email1").on('click', function()
        {
            // alert("test");
            var someObj = {};
            someObj.fruitsGranted = [];
            someObj.lastEmail = [];
            someObj.formated_mail = [];
            someObj.leads = [];
            $("input:checkbox").each(function() {
                if ($(this).is(":checked")) {
                    var checked = ($(this).val());
                    if(checked != "on")
                    {
                        var email = $("#email_"+checked).val();
                        var last_email = $("#last_email_"+checked).val();
                        someObj.fruitsGranted.push(email);
                        someObj.lastEmail.push(last_email);
                        var formated_mail = $('#formated_mail_'+checked).val();
                        someObj.formated_mail.push(formated_mail);
                        var leadid = $('#leadid_'+checked).val();
                        someObj.leads.push(leadid);
                    }
                } else {
                    // someObj.fruitsDenied.push(checked);
                }
            });
            var change_status_of = someObj.lastEmail;
            var leadid = someObj.leads;
            var original_email = someObj.fruitsGranted;
            var formated_mail = someObj.formated_mail;
            // alert("change status: "+change_status_of+"original email"+original_email);
            // alert(formated_mail);
            // return;
            var email_status = $('#email_status').val();
            var comment = $('#comment').val();
            if(comment == null || comment == '')
            {
                if(email_status == "Out of Office")
                {
                    alert("Please add comment");
                    return;
                }
                else
                {
                    var comment = '';
                }
                
            }
            
            
            var campid = $('#campid').val();
            var camp_cnid = $('#campaign_id').val();
            // var leadid = $('#leadid_'+leadid_obj).val();
            // alert(leadid);
            var from = $('#from').val();
            // alert(from);
            if(from == null || from == '')
            {
                alert("Please add your email address");
                return;
            }
            // var changeFormat = document.getElementById("changeFormat");
            // var changeFormat = $('#changeFormat').val();
            // if (changeFormat.checked == true){
            //      var changeFormatcond = 1;
            // } else {
            //     var changeFormatcond = 0;
            // }
            // alert(flname);
            // return;
            var pass = $('#pass').val();
            if(pass == null || pass == '')
            {
                alert("Please add your email password");
                return;
            }
            // alert(pass);
           
            var email_close_status = $('#email_close_status').val();
            if(email_close_status == null || email_close_status == '')
            {
                var email_close_status = 'Open';
            }
            
            var sub = $('#sub').val();
            // var body = $('#editor1').val();
            var body = CKEDITOR.instances.editor1.getData();
            var email_template = $('#email_template').val();
            if(body != null && body != '')
            {
                var sub = $('#sub').val();
                var body = CKEDITOR.instances.editor1.getData();
            }
            else if(email_template != null && email_template != '')
            {
                var sub = "Test Mail";
                var body = "Test Mail";
            }
            else
            {
                var sub = "Test Mail";
                var body = "Test Mail";
            }
            // alert(body);
            // var body = document.getElementById('mail_body').innerHTML;
            // alert("from= "+from+"sub= "+sub+"body= "+body+"email= "+change_status_of+"leadid= "+leadid);
            // alert("change_status_of="+change_status_of+"email_status="+email_status+"campid="+campid+"leadid="+leadid+"from="+from+"sub="+sub+"body="+body+"pass="+pass);
            // return;
            // $("#loader").show();
            jQuery(document).ajaxStart(function () {
            //show ajax indicator
            ajaxindicatorstart('Sending email.. please wait..');
            });
            var url = "<?php echo base_url("administrator/update_email_status_and_send");?>";
            console.log(url+"?change_status_of="+change_status_of+"&email_status="+email_status+"&campid="+campid+"&leadid="+leadid+"&from="+from+"&sub="+sub+"&body="+body+"&pass="+pass);
            $.ajax({
                url :'<?php echo base_url("administrator/update_email_status_and_send");?>',
                type: 'GET', 
                dataType: 'json',
                // jsonpCallback: 'onJSONPLoad',  
                contentType:'application/json; charset=utf-8',
                data: {
					change_status_of:change_status_of,
                    email_status:email_status,
					campid:campid,
                    camp_cnid:camp_cnid,
                    leadid:leadid,
                    from:from,
                    pass:pass,
                    sub:sub,
                    body:body,
                    // changeFormatcond:changeFormatcond,
                    email_close_status:email_close_status,
                    comment:comment,
                    original_email:original_email,
                    formated_mail:formated_mail

                    
				},
                cache: false,
                success: function(response){
                    var text = response.statusCode;
                    console.log("check"+text);
                    $('#myModalemail').modal('hide');
                    // $("#loader").hide();
                    if(response.statusCode == "Success") 
                    {                  
                        $("#from").html(response.from);
                        $("#pass").html(response.pass);
                        // alert(response.from+""+response.pass);      
                        $("#send_email").html(response.message);
                        jQuery(document).ajaxStop(function () {
                        //show ajax indicator
                        ajaxindicatorstop();
                        });
                        alert("Mail sent successfully!");
                        top.location.href=base_url+"administrator/emailVerfication?campaign_id="+response.campaign_id;//redirection
                    }
                    else if(response.statusCode=="Fail")
                    {
                        // alert("test");
                        $("#send_email").html(response.message);
                        jQuery(document).ajaxStop(function () {
                        //show ajax indicator
                        ajaxindicatorstop();
                        });
                        
					}
                    else if(response.statusCode == "Exceed")
                    {
                        alert("LMID exceeded");
                        jQuery(document).ajaxStop(function () {
                        //show ajax indicator
                        ajaxindicatorstop();
                        });
                    }
                    else if(response.statusCode == "Email Exist")
                    {
                        alert("Email is already sent on this email Id");
                        jQuery(document).ajaxStop(function () {
                        //show ajax indicator
                        ajaxindicatorstop();
                        });
                    }
                    else if(response.statusCode == "Email Fail")
                    {
                        alert(response.error);
                        jQuery(document).ajaxStop(function () {
                        //show ajax indicator
                        ajaxindicatorstop();
                        });
                    }
                },
                error:function(xhr, status, error){
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    alert('Error - ' + errorMessage);
                    jQuery(document).ajaxStop(function () {
                        //show ajax indicator
                        ajaxindicatorstop();
                        });
                },
            });
        });

        // Update only
        $("#update_email_only").on('click', function() 
        {
            var someObj = {};
            someObj.fruitsGranted = [];
            someObj.lastEmail = [];
            someObj.leads = [];
            $("input:checkbox").each(function() {
                if ($(this).is(":checked")) {
                    var checked = ($(this).val());
                    if(checked != "on")
                    {
                        var email = $("#email_"+checked).val();
                        var last_email = $("#last_email_"+checked).val();
                        someObj.fruitsGranted.push(email);
                        someObj.lastEmail.push(last_email);
                    
                        var leadid = $('#leadid_'+checked).val();
                        someObj.leads.push(leadid);
                    }
                } else {
                    // someObj.fruitsDenied.push(checked);
                }
            });
            var change_status_of = someObj.lastEmail;
            var leadid = someObj.leads;
            var original_email = someObj.fruitsGranted;
            // alert("change status: "+change_status_of+"original email"+original_email);
            // var change_status_of = someObj.fruitsGranted;
            // var leadid = someObj.leads;
            var email_status = $('#email_status').val();
            var email_close_status = $('#email_close_status').val();
            if(email_close_status == null || email_close_status == '')
            {
                alert("Please select closer status first!");
                $("#email_close_status").focus();
                return;
            }
            var campid = $('#campid').val();
            var camp_cnid = $('#campaign_id').val();
            var comment = $('#comment').val();
            // alert("change_status_of"+change_status_of+"email_status= "+email_status+"leadid= "+leadid);
            
            var url = "<?php echo base_url("administrator/update_email_status");?>";
            console.log(url+"?change_status_of="+change_status_of+"&email_status="+email_status+"&campid="+campid+"&leadid="+leadid);
            $.ajax({
                url :'<?php echo base_url("administrator/update_email_status");?>',
                type: 'GET', 
                dataType: 'json', 
                contentType:'application/json; charset=utf-8',             
                data: {
					change_status_of:change_status_of,
                    email_status:email_status,
					campid:campid,
                    camp_cnid:camp_cnid,
                    leadid:leadid,
                    comment:comment,
                    email_close_status:email_close_status,
                    original_email:original_email
				},
                cache: false,
                success: function(response){
                    var text = response.statusCode;
                    console.log("check"+text);
                    // alert(text);
                    
                    if(response.statusCode == "Success") 
                    {                        
                        $("#update_email").html(response.message);
                        alert("Status updated successfully!");
                        
                        top.location.href=base_url+"administrator/emailVerfication?campaign_id="+response.campaign_id;//redirection
                    }
                    else if(response.statusCode=="Fail")
                    {
                        // alert("test");
                        $("#update_email").html(response.message);
                        
					}
                },
                error:function(xhr, status, error){
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    alert(' ' + errorMessage);
                },
            });
        });
    });


function ajaxindicatorstart(text)
{
if(jQuery('body').find('#resultLoading').attr('id') != 'resultLoading'){
jQuery('body').append('<div id="resultLoading" style="display:none"><div><img src="<?php echo base_url(); ?>assets/images/sefer.gif"><div>'+text+'</div></div><div class="bg"></div></div>');
}
jQuery('#resultLoading').css({
'width':'100%',
'height':'100%',
'position':'fixed',
'z-index':'10000000',
'top':'0',
'left':'0',
'right':'0',
'bottom':'0',
'margin':'auto'
});

jQuery('#resultLoading .bg').css({
'background':'#000000',
'opacity':'0.7',
'width':'100%',
'height':'100%',
'position':'absolute',
'top':'0'
});

jQuery('#resultLoading>div:first').css({
'width': '250px',
'height':'75px',
'text-align': 'center',
'position': 'fixed',
'top':'0',
'left':'0',
'right':'0',
'bottom':'0',
'margin':'auto',
'font-size':'16px',
'z-index':'10',
'color':'#ffffff'

});

jQuery('#resultLoading .bg').height('100%');
jQuery('#resultLoading').fadeIn(300);
jQuery('body').css('cursor', 'wait');
}
function ajaxindicatorstop()
{
jQuery('#resultLoading .bg').height('100%');
jQuery('#resultLoading').fadeOut(300);
jQuery('body').css('cursor', 'default');
}
// jQuery(document).ajaxStart(function () {
// //show ajax indicator
// ajaxindicatorstart('Sending email.. please wait..');
// }).ajaxStop(function () {
// //hide ajax indicator
// ajaxindicatorstop();
// });
</script>