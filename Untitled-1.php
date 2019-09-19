<?php
 if($_POST['submit'] && $_POST['submit'] == 'register') {
   // Response to the user
   $response = array(
     'status'  => true,
     'msg'     => ''
   );
   // Get post field params
   $name = htmlentities(strip_tags(trim($_POST['name'])));
   $email = htmlentities(strip_tags(trim($_POST['email'])));
   $username = htmlentities(strip_tags(trim($_POST['username'])));
   $password = htmlentities(strip_tags(trim($_POST['password'])));
   $md5Password = md5($password);
   // get the
   $data = file_get_contents("users.json");
   $data_array = json_decode($data);
   //data in our POST
   $input = array(
     'name'     => $name,
     'email'    => $email,
     'username' => $username,
     'password' => $md5Password,
   );
   //append the POST data
   $data_array[] = $input;
   //return to json and put contents to our file
   $data_array = json_encode($data_array, JSON_PRETTY_PRINT);
   file_put_contents("users.json", $data_array);
   $response['msg'] = "Registration successful.";
   // successful
   echo json_encode($response);
 }
 if($_POST['submit'] && $_POST['submit'] == 'login') {
   // Response to the user
   $response = array(
     'status'  => 0,
     'msg'     => ''
   );
   $status = false;
   // Get post field params
   $username = htmlentities(strip_tags(trim($_POST['username'])));
   $password = htmlentities(strip_tags(trim($_POST['password'])));
   // Get the contents of the JSON file
   $fileContents = json_decode(file_get_contents("users.json"));
   foreach ($fileContents as $key => $value) {
     if($username == $value->username) {
       $md5Password = md5($password);
       if($md5Password == $value->password) {
         session_start();
         $_SESSION['username'] = $username;
         $_SESSION['loggedIn'] = true;
         $status = true;
         $response['msg'] = "Welcome Back ". ucfirst($username);
         break;
       } else {
         $status = false;
         $response['msg'] = "Incorrect Password";
       }
     } else {
       $status = false;
       $response['msg'] = "Username doesn't match";
     }
   }
   if($status) {
     $response['status'] = 0;
   } else {
     $response['status'] = -1;
   }
   echo json_encode($response);
 }
