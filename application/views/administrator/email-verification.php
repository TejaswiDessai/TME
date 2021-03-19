<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/css/lightbox.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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



            <div class="page-header">
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
$(document).ready(function() {

//update record lock
var rlc = 1; //lock 1
var lmid1 = $('#leadid_1').val();
var lmid2 = $('#leadid_2').val();
var lmid3 = $('#leadid_3').val();
var lmid4 = $('#leadid_4').val();
var lmid5 = $('#leadid_5').val();
// alert("L1 = "+lmid1+"L2 = "+lmid2+"L3 = "+lmid3+"L4 = "+lmid4+"L5 = "+lmid5);
var emp_id = $('#empcode').val();


if(rlc == 1){
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
        rlc:rlc,
        emp_id:emp_id
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
}else{
  alert("record already opened");
  // top.location.href=base_url+"cdc/selectCampaignforlead";//redirection
}
});
// $(".passingID").click(function () {
    $(document).on("click", ".passingID", function () {
    var ids = $(this).attr('data-id');
    var row = $(this).attr('data-row');
    
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
        var option1 = ids;
        var option2 = first_of_firstString+"@"+sp[1];
        var values = [option1,option2];
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
                    <input type="hidden" value="<?php echo $empcode;?>" id="empcode">
                        <form action="<?php echo base_url();?>administrator/emailVerfication" method="post" >
                            <table class="table" style="margin-bottom:10px;">
                            <tr>
                            <td>
                            <?php foreach ($campaigns as $campaign): ?>
                                <label class="col-lable"><b>Campaign Name: <?php echo $campaign['campnm']; ?></b></label>
                                <input type="hidden" value="<?php echo $campaign['cids']; ?>" id="campnm">
                            <?php endforeach; ?>
                            <input type="hidden" value="<?php echo $Campid; ?>" id="campaign_id" name="campaign_id">
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
                            <!-- <input type="text" value="<?php echo $agent_email?>" class="form-control form-control-default " name="from" id="from">
                            <input type="hidden" value="<?php echo $agent_password?>" class="form-control form-control-default " name="pass" id="pass"> -->
                            </td>
                            <td>
                            <select style="width:200px;height:34px;" class="form-control form-control-default "  name="search_email_status" id="search_email_status">
                                <option value="">Email Status</option>
                                <option value="Test Mail Sent"  <?php if( isset($search_email_status) && $search_email_status == "Test Mail Sent") { echo "selected" ; } ?> >Test Mail Sent</option>
                                <option value="Bounced" <?php if( isset($search_email_status) && $search_email_status == "Bounced") { echo "selected" ; } ?> >Bounced</option>
                                <option value="Reviewed" <?php if( isset($search_email_status) && $search_email_status == "Reviewed") { echo "selected" ; } ?>>Reviewed</option>
                                <option value="Accepted" <?php if( isset($search_email_status) && $search_email_status == "Accepted") { echo "selected" ; } ?>>Accepted</option>
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
                            <!-- <td>
                                <a class="btn btn-primary" href="">Refresh</a>
                            </td> -->
                            </tr>
                            <tr>
                            <a href="#" id="randomSelect">Select random</a>
                            </tr>
                            </table>
                            </form>
                       
                    </div>
                    <br>
                    <!-- Image loader -->
                    <div id='loader' style='display: none;'>
                    <img src='<?php echo base_url(); ?>assets/images/download.png' width='32px' height='32px'>
                    </div>
                    <!-- Image loader -->
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
                                        <th>Send To<br><input type="checkbox" class="emailsend_all" onclick="toggle(this);" /></th>
                                        <th>Change Status<br><input type="checkbox" class="emailstatus_all" onclick="toggle(this);" /></th>
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
                                        <input type="text" id="email_<?php echo $i;?>" value="<?php if(isset($search_email) && $search_email != null){ echo $search_email; }else if(isset($post)){  echo $post['email']; }else { echo "Email is Empty" ;} ?>">
                                        <?php //echo $post['email']; ?>
                                        </td>
                                        <td>
                                            <!-- <input type="button" id="format" value="Change Format"> -->
                                            <!-- <button class="btn btn-primary btn-sm btn-block" style="padding: 6px 0px;" data-toggle="modal" data-target="#sign-in-modal">Change Format</button> -->
                                            <button type="button" class="btn btn-info btn-sm passingID" data-id="<?php echo $post['email'];?>" data-row="<?php echo $i;?>">Change Format</button>

                                        </td>
                                        <td>
                                            <?php if(isset($post['closer_status'])){echo $post['closer_status'];} else { }?>
                                            <!-- <input type="checkbox" class ="emailclass" value="Close" name="email_close_<?php echo $i;?>" id="email_close_<?php echo $i;?>"><?php //echo $i;?> -->
                                            
                                        </td>
                                        <td>
                                            <!-- <input type="checkbox"> -->
                                            <input type="checkbox" class ="emailclass checkbox_emailclass" value="<?php echo $i;?>" name="email_list_<?php echo $i;?>" id="email_list_<?php echo $i;?>"><?php //echo $i;?>
                                        </td>
                                        <td>
                                            <input type="checkbox" class ="emailstatus checkbox_emailstatus"  value="<?php echo $post['lmid'];?>" name="email_status_<?php echo $i;?>" id="email_status_<?php echo $i;?>"><?php //echo $i;?>
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
                    </div>
                    <div class="col-sm-2">
                        <textarea id="comment" placeholder="Enter comment"></textarea>
                    </div>
                    <div>
                    <!-- <label>Closer Status</label> -->
                        <select style="height:34px;" class="form-control form-control-default "  name="email_close_status" id="email_close_status">
                            <option value="">Closer Status</option>
                            <option value="New" >New</option>
                            <option value="Open">Open</option>
                            <option value="Closed" >Closed</option>
                            
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
        <div class="container">
            <!-- <h2>Dynamic Tabs</h2> -->
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                <li><a data-toggle="tab" href="#menu1">Compose</a></li>
                <!-- <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                <li><a data-toggle="tab" href="#menu3">Menu 3</a></li> -->
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                <h5>From : (Agent) Email Details</h5>
                <input type="text" id="from" name="from" class="form-control" value="<?php if(isset($From)){ echo $From;}?>"><br>
                <input type="password" id="pass" name="pass" class="form-control" value="<?php if(isset($Pass)){ echo $Pass;}?>">    <br>
                </div>
                <div id="menu1" class="tab-pane fade">
                <h5>Compose Email</h5>
                <div class="form-group">
                        <input type="text" id="sub" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                    <textarea rows="6" style="width: 100%;" name="editor1" id="editor1" placeholder="Email Body"></textarea>
                    
                </div>
                </div>
                <!-- <div id="menu2" class="tab-pane fade">
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                </div>
                <div id="menu3" class="tab-pane fade">
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
        <button type="button" id="send_email1"  class="btn btn-primary" >Send</button>
          <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



            <script>
            $(".emailstatus_all").on('change', function () {
                // alert("test");
                $(this).closest('table').find('.checkbox_emailstatus').prop('checked', this.checked ); 
            }); 
            $(".emailsend_all").on('change', function () {
                // alert("test");
                $(this).closest('table').find('.checkbox_emailclass').prop('checked', this.checked ); 
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

        $("#send_email1").on('click', function() 
        {
            // alert("test");
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
            // alert(change_status_of);
            var email_status = $('#email_status').val();
            var campid = $('#campnm').val();
            // var leadid = $('#leadid_'+leadid_obj).val();
            // alert(leadid);
            var from = $('#from').val();
            // alert(from);
            if(from == null || from == '')
            {
                alert("Please add your email address");
                return;
            }
            
            var pass = $('#pass').val();
            if(pass == null || pass == '')
            {
                alert("Please add your email password");
                return;
            }
            var sub = $('#sub').val();
            // var body = $('#editor1').val();
            var body = CKEDITOR.instances.editor1.getData();
            // alert(body);
            // var body = document.getElementById('mail_body').innerHTML;
            // alert("from= "+from+"sub= "+sub+"body= "+body+"email= "+change_status_of+"leadid= "+leadid);
            // return;
            $("#loader").show();
            var url = "<?php echo base_url("administrator/send_email_status");?>";
            console.log(url+"?change_status_of="+change_status_of+"&email_status="+email_status+"&campid="+campid+"&leadid="+leadid+"&from="+from+"&sub="+sub+"&body="+body);
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
                    leadid:leadid,
                    from:from,
                    pass:pass,
                    sub:sub,
                    body:body
                    
				},
                cache: false,
                success: function(response){
                    var text = response.statusCode;
                    console.log("check"+text);
                    $('#myModalemail').modal('hide');
                    $("#loader").hide();
                    if(response.statusCode == "Success") 
                    {                  
                        $("#from").html(response.from);
                        $("#pass").html(response.pass);
                        // alert(response.from+""+response.pass);      
                        $("#send_email").html(response.message);
                        // top.location.href=base_url+"administrator/selectCampaignForEmailVerification";//redirection
                    }
                    else if(response.statusCode=="Fail")
                    {
                        // alert("test");
                        $("#send_email").html(response.message);
                        
					}
                    else if(response.statusCode == "Exceed")
                    {
                        alert("LMID exceeded");
                    }
                },
                error:function(xhr, status, error){
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    alert('Error - ' + errorMessage);
                },
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
                    // alert(leadid);
                    // var close_status = $("#email_close_"+checked).val();
                    // alert(close_status);
                    someObj.fruitsGranted.push(checked);
                    
                    someObj.leads.push(leadid);

                } else {
                    
                }
            });
            var change_status_of = someObj.fruitsGranted;
            var email_status = $('#email_status').val();
            var email_close_status = $('#email_close_status').val();
            var campid = $('#campnm').val();
            var leadid = someObj.leads;
            var from = $('#from').val();
            var sub = $('#sub').val();
            var body = $('#mail_body').val();
            var comment = $('#comment').val();
            // alert("from"+from+"sub= "+sub+"body= "+body);
            
            var url = "<?php echo base_url("administrator/update_email_status");?>";
            console.log(url+"?change_status_of="+change_status_of+"&email_status="+email_status+"&campid="+campid+"&leadid="+leadid+"&from="+from+"&sub="+sub+"&body="+body);
            $.ajax({
                url :'<?php echo base_url("administrator/update_email_status");?>',
                type: 'GET', 
                dataType: 'json', 
                contentType:'application/json; charset=utf-8',             
                data: {
					change_status_of:change_status_of,
                    email_status:email_status,
					campid:campid,
                    leadid:leadid,
                    comment:comment,
                    email_close_status:email_close_status
				},
                cache: false,
                success: function(response){
                    var text = response.statusCode;
                    console.log("check"+text);
                    // alert(text);
                    
                    if(response.statusCode == "Success") 
                    {                        
                        $("#update_email").html(response.message);
                        top.location.href=base_url+"administrator/selectCampaignForEmailVerification";//redirection
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
</script>