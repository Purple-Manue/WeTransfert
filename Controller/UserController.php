<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>

    <body>
        <?php
       require('../Model/sqlConnect.php');
       if(isset($_POST['user']) && isset($_POST['password'])){
           $user = $_POST['usr_name'];
           $password = $_POST['usr_pass'];

           $query = "INSERT INTO 'users' (usr_name ,usr_pass) VALUES('$user', '$password')";
           $result = mysqli_query($query);
           if($result){
               $msg = "Registered Sussecfully";
               echo $msg;
           }
           else
               $msg = "Error Registering";
               echo $msg;
       }
   ?>

   <div class="register-form">
       <title>Register</title>
       <form action="" method="post">
           <p>
           <label>Username: </label>
           <input id="usr_name" type="text" name="usr_name" placeholder="user" />
           </p>

           <p>
           <label>Password: </label>
           <input id="usr_pass" type="password" name="password" placeholder="password" />
           </p>

           <a class="btn" href="index.php">Login</a>
           <input class="btn register" type="submit" value="Register" />
       </form>
   </div>
    </body>
</html>
