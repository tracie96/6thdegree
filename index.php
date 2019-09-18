<?php 
$message ='';
$error = '';
if (isset($_POST['submit'])){
	if (empty($_POST['r-form-first-name'])){
		$error ="<label class='text-danger'>Enter First Name</label>";
	}
	else if(empty($_POST["r-form-email"])){
		$error ="<label class='text-danger'>Enter Email</label>";
	}
	else if(empty($_POST["r-form-last-name"])){
		$error ="<label class='text-danger'>Enter Password</label>";
	}
	else{
		if(file_exists('employee_data.json')){
			$current_data = file_get_contents('employee_data.json');
			$array_data = json_decode($current_data,true);
			$extra = array(
				'name' => $_POST['r-form-first-name'],
				'email' => $_POST['r-form-email'],
				'password' => $_POST['r-form-last-name']
			);
			$array_data[]= $extra;
			$final_data = json_encode($array_data);
			if(file_put_contents('employee_data.json', $final_data)){
				$message ="<label style='color: #fff;font-family:'Roboto' '>Signed Up Successfully</label>";
			}
		}
		else{
			$error ='JSON File not found';
		}
	}
}
?>

<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TEAM 6TH DEGREE PROJECT</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	<div class="container">
                	
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1>TEAM 6TH DEGREE</h1>
                        <div class="description">
                        	<p>
                        	</p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 show-forms">
                    	<span class="show-register-form active">Register</span> 
                    	<span class="show-forms-divider">/</span> 
                    	<span class="show-login-form">Login</span>
                    </div>
                </div>
				
				
                <div class="row register-form">
                    <div class="col-sm-4 col-sm-offset-1">
						<form role="form" method="post" action="#" class="r-form">
						<?php 
						if(isset($error)){
							echo $error;
						}
						?>	
						<div class="form-group">
	                    		<label class="sr-only" for="r-form-first-name">First name</label>
	                        	<input type="text" name="r-form-first-name" placeholder="First name..." class="r-form-first-name form-control">
							</div>
							<div class="form-group">
	                        	<label class="sr-only" for="r-form-email">Email</label>
	                        	<input type="email" name="r-form-email" placeholder="Email..." class="r-form-email form-control" style="height: 45px">
	                        </div>
	               
	                        <div class="form-group">
	                        	<label class="sr-only" for="r-form-last-name">Password</label>
	                        	<input type="password" name="r-form-last-name" placeholder="Password..." class="r-form-last-name form-control">
	                        </div>
	               
				            <button type="submit" class="btn" name="submit">Sign me Up!</button><br>
						<?php 
						if (isset($message)){
							echo $message;
						}
						?>
						</form>
                    </div>
             
				</div>
				
				

                <div class="row login-form">
                    <div class="col-sm-4 col-sm-offset-1">
						<form role="form" action="" method="post" class="l-form">
	                    	<div class="form-group">
	                    		<label class="sr-only" for="l-form-username">Username</label>
	                        	<input type="text" name="l-form-username" placeholder="Username..." class="l-form-username form-control" id="l-form-username">
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="l-form-password">Password</label>
	                        	<input type="password" name="l-form-password" placeholder="Password..." class="l-form-password form-control" id="l-form-password">
	                        </div>
				            <button type="submit" class="btn">Sign in!</button>
				    	</form>
				    	
                    </div>
                   
                </div>
                    
        	</div>
        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p>We are the best.</p>
        			</div>
        			
        		</div>
        	</div>
        </footer>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
