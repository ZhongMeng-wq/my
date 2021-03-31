<?php
/**
template name: chat_room
*/
 ?>
<?php get_header(); ?> 
<?php
$servername = "You_mysql-server_IP";
$username = "You_mysql_user";
$password = "You_mysql_passwd";
$dbname = "You_database_name";
// Database information, configure according to database type
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql_add = "CREATE TABLE lts (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
uid VARCHAR(30) NOT NULL,
msg text DEFAULT NULL,
name text DEFAULT NULL,
web VARCHAR(50),
email VARCHAR(50),
reg_date TIMESTAMP
)";

if (mysqli_query($conn, $sql_add)) {
	echo "Data sheet "lts" created successfully";
}
//Create a data table if there is no data table
?>
<?php 
function get_user_role($id){
	$user = new WP_User($id);
	return $user->data;
}
$user_ID = get_current_user_id(); 
$user_head = get_avatar($user_ID,50);
$user_name = get_user_role($user_ID)->user_nicename;
$user_email = get_user_role($user_ID)->user_email;
$Server_name = $_SERVER['SERVER_NAME'];
$Server_port = $_SERVER["SERVER_PORT"];
if($Server_port != '443'){
    $user_web = 'http://' . $Server_name;
    $user_http = 'http';
}
else{
    $user_web = 'https://' . $Server_name;
    $user_http = 'https';
}
//Get the information of the currently logged in user
?>

    <link rel="stylesheet" type="text/css" href="https://www.loline.xyz/dow/dow.css">
						<div class="lts_div">
							<div class="lts_div_title">
								<h3 class="lts_title">Simple chat room——by <a href="https://www.loline.top">loline</a></h3>
							</div>
							<div class="lts_body">
							<!-- Main container -->
								<div id="chat">
									<?php 
										$sql = "SELECT uid, msg,web,email,name FROM lts";
										$result = mysqli_query($conn, $sql);
										if (mysqli_num_rows($result) > 0) {
											while($row = mysqli_fetch_assoc($result)) {
												$d_uid = $row["uid"];
												$d_msg = $row["msg"];
												$d_web = $row["web"];
												$d_email = $row["email"];
												$d_name = $row["name"];
												//Read the message record in the database
												if($d_web != $user_web){
    												echo '
    												<!-- cleft left -->
    												<div class="lts_cmsg lts_left">
    													<div class="header_img_div lts_left">
    														<img alt="'.$d_name.'" src="https://api.sunweihu.com/api/sjtx/api.php" class="avatar avatar-40 photo" height="40" width="40">
    													</div>
    													<div class="lts_cmsg_div lts_left">
    														<div class="name_div lts_left">
    															<span class="name lts_left">'. $d_name .'<em style="font-weight: 400;font-size: 15px;padding:0 5px;">邮箱:'. $d_email .'</em></span>
    														</div>
    														<div class="lts_nr lts_left lts_nr_l">
    															<span class="content">'. $d_msg .'</span>
    														</div>
    														<div style="text-align:left;" class="name_div lts_right">
                                                                <a href="'.$d_web.'"><em><b>from：</b>'.$d_web.'</em></a>
                                                            </div>
    													</div>
    												</div>
    												';
												}else{
												    if($d_uid != $user_ID){
    													echo '
    													<!-- cleft left -->
    													<div class="lts_cmsg lts_left">
    														<div class="header_img_div lts_left">
    															'. get_avatar($d_uid,40) .'
    														</div>
    														<div class="lts_cmsg_div lts_left">
    															<div class="name_div lts_left">
    																<span class="name lts_left">'. get_user_role($d_uid)->user_nicename .'<em style="font-weight: 400;font-size: 15px;padding:0 5px;">邮箱:'. $d_email .'</em></span>
    															</div>
    															<div class="lts_nr lts_left lts_nr_l">
    																<span class="content">'. $d_msg .'</span>
    															</div>
    															<div style="text-align:left;" class="name_div lts_right">
                                                                    <a href="'.$d_web.'"><em><b>from：</b>'.$d_web.'</em></a>
                                                                </div>
    														</div>
    													</div>
    													';
    												}
    												else{
    													echo '
    													<!-- cright right -->
    													<div class="lts_cmsg lts_right">
    														<div class="header_img_div lts_right">
    															'. get_avatar($d_uid,40) .'
    														</div>
    														<div class="lts_cmsg_div lts_right">
    															<div class="name_div lts_right">
    																<span class="name lts_right">'.'<em style="font-weight: 400;font-size: 15px;padding:0 5px;">mail:'. $d_email .'</em>&nbsp;'. get_user_role($d_uid)->user_nicename .'</span>
    															</div>
    															<div class="lts_nr lts_right lts_nr_r">
    																<span class="content">'. $d_msg .'</span>
    															</div>
    															<div style="text-align:right;" class="name_div lts_right">
                                                                    <a href="'.$d_web.'"><em><b>from：</b>'.$d_web.'</em></a>
                                                                </div>
    														</div>
    													</div>
    													';
    												}
												}
												//Judge which message belongs to the user based on the currently logged in UID and database
											}//Determine if it comes from another URL
										} 
										else {
											echo "No chat history";
										}
									?>
								</div>
							</div>
							<div class="panel-body">
								<label for="name">Input box：</label>
								<?php
									if($user_ID == ""){
										echo '
										<div style="width: 100%;height: auto;padding: 10px;text-align: center;">
											<h1><a href="'.$user_web.'/wp-login.php?redirect_to='.$user_http.'%3A%2F%2F'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'">Login on</a></h1>
										</div>
										';
									}
									else{
										echo '
										<form action="" method="post">
										<textarea class="text" name="msg"></textarea>
										<button class="lts_button" type="submit">Submit</button>
										<br />
										<br />
										</form>
										';
										//form
									}
									//Determine whether to log in
								?>
							</div>
						</div>
						<?php
							$new_msg = $_POST["msg"];
							if($new_msg != ""){
								$sql_msg_add = "INSERT INTO lts (uid, msg, email,web,name)
								VALUES ('$user_ID', '$new_msg', '$user_email','$user_web','$user_name')";
								if (mysqli_query($conn, $sql_msg_add)) {
								} else {
									echo '<script>alert("Failed to send");</script>';
								}
							}
							//Send the form to the database
						?>
						<script src="//cdn.staticfile.org/jquery/2.1.4/jquery.min.js"></script>
						<script src="//cdn.staticfile.org/layer/2.3/layer.js"></script>
						<script>
							$(function () {
								setInterval(function () {
									$("#chat").load(location.href + " #chat");
								}, 500);
							})
							//Partial message record refresh
						</script>
					<?php mysqli_close($conn); ?>
<?php get_footer(); ?>