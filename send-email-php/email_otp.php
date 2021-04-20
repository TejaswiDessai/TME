<?php
session_start();
// echo "test";
$campaign_id = $_POST['campaign_id'];
$emp_id = $_POST['emp_id'];
$email = $_POST['email'];
$user_type = $_POST['user_type'];
$otp = random_int(100000, 999999);
$string = "main_otp=$otp";
$ciphering = "BF-CBC";
// Use OpenSSl encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
  
// Use random_bytes() function which gives
// randomly 16 digit values
$encryption_iv = random_bytes($iv_length);
  
// Alternatively, we can use any 16 digit
// characters or numeric for iv
$encryption_key = openssl_digest(php_uname(), 'MD5', TRUE);
// Encryption of string process starts
$encryption = openssl_encrypt($string, $ciphering,
        $encryption_key, $options, $encryption_iv);

if(isset($_POST["emp_id"], $_POST["user_type"],$_POST['email'])) 
    {     
        $connect = pg_connect("host=localhost dbname=Forerunner user=postgres password=password@123");
        
        $result1 = pg_query($connect,"SELECT * FROM users WHERE (emp_id = '".$emp_id."' OR empcode = '".$emp_id."') AND  role = '".$user_type."'");
        
        if(pg_num_rows($result1) == 0 )
        {
            echo "<script>alert('The Employee Id or User Type are incorrect!');location.href = 'http://mehp-dbs/administrator/forget-password';</script>";
            
        }
        else
        {

            $_SESSION["logged_in"] = true; 
            $_SESSION["emp_id"] = $emp_id; 
            $_SESSION['main_otp'] = $otp;
            $base_url='http://mehp-dbs/administrator/';
            // Generate new unique key
            $key = uniqid(time().'-key',TRUE);
            // display all error except deprecated and notice  
            error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
            require_once "phpmailer/class.phpmailer.php";

            $message = '<html><body>';
            $message .= '';
            $message .= '<table rules="all" width="600px" style="border-color: #666;" cellpadding="10">';
            $message .= '<tr style="background: #eee;"><td><h2>
            your One Time Password = '.$otp.'</h2>
            </td></tr>';
            // add body 
            // $message .= "<tr style='background: #eee;'><td>Click <a href='http://localhost/TME/administrator/change-password'>here</a> link to change password.</td></tr>";

            $message .= "</table>";

            // add footer
            $message .= '<table rules="all" width="600px">';
            // $message .= '<tr><td><br><br><hr>This mail is send via <a href="https://www.hello-prospect.com/" target="_blank">https://www.hello-prospect.com/</a> and is used for change password purpose only. <b>Please do not reply to this mail.</b></td></tr>';

            $message .= "</table>";
            $message .= "</body></html>";
                    
            // creating the phpmailer object
            $mail = new PHPMailer(true);

            // telling the class to use SMTP
            $mail->IsSMTP();

            // enables SMTP debug information (for testing) set 0 turn off debugging mode, 1 to show debug result
            $mail->SMTPDebug = 0;

            // enable SMTP authentication
            $mail->SMTPAuth = false;

            // sets the prefix to the server
            $mail->SMTPSecure = 'STARTTLS';

            // sets GMAIL as the SMTP server
            $mail->Host = 'dc1.mehp.com';

            // set the SMTP port for the GMAIL server
            $mail->Port = 587;

            // your gmail address
            $mail->Username = 'amol.waghmare@mehp.com';

            // your password must be enclosed in single quotes
            $mail->Password = '@mmy7387853214';

            // add a subject line
            $mail->Subject = ' Change Password link ';

            // Sender email address and name
            $mail->SetFrom('amol.waghmare@mehp.com', 'Amol');

            // reciever address, person you want to send
            $mail->AddAddress($email);

            // if your send to multiple person add this line again
            //$mail->AddAddress('tosend@domain.com');

            // if you want to send a carbon copy
            //$mail->AddCC('tosend@domain.com');


            // if you want to send a blind carbon copy
            //$mail->AddBCC('tosend@domain.com');

            // add message body
            $mail->MsgHTML($message);


            // add attachment if any
            $mail->AddAttachment('time.png');
            // $mail->SMTPSecure = 'tls';
            // $mail->Host = 'smtp.gmail.com';
            try {
                
                // send mail
                $mail->Send();
                $msg = "Mail sent successfully";
                echo "<script>alert('Please check your email to get OTP!');location.href = 'http://mehp-dbs/administrator/otp_verification?cid=$campaign_id&c=$encryption';</script>";
                
            } catch (phpmailerException $e) {
                $msg = $e->getMessage();
            } catch (Exception $e) {
                $msg = $e->getMessage();
            }
        }
        
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="#" type="image/x-icon" />
        <title></title>
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>

    <body>

        <div id="container">
            <div id="body">
                <header>
                    <!-- <div class="mainTitle" >Send email from localhost/online server using php</div> -->
                </header>
                <article>
                    <div class="height30"></div>
                    <div style="text-align:center;" class="title">
                        <div class="title"><a href="<?php echo $base_url;?>" title="Back to homepage" >Back to home page </a></div>
                        <div class="height20"></div>
                        <div class="title" style="color: #009900"><?php echo $msg; ?></div>
                        
                        <div style="height: 40px; clear: both;"></div>
                    
                    </div>
                    <div style="height: 10px; clear: both;"></div>
                    </div>
                </article>
               
            </div></div>
    </body>
</html>