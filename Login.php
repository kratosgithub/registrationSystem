<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="EN">
    <head>
        <meta http-equiv="Content-Type" content="text/html"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="UTF-8">
           <!-- liens avec les fichiers css --> 
            <link href="assets/css/bootstrap.css" type="text/css" rel="stylesheet"/>
            <link href="assets/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
            <link href="assets/css/Login.css" type="text/css" rel="stylesheet"/>
             <!--[if lt IE 9]>
              <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
             <![endif]-->
        <title>Home Page</title>
    </head>
    <body>
        <?php
        // put your code here
         
        //Variable to store message error
         $error ='';
		
        //Connection à la base de données
        try {
          $con = new PDO("mysql:host=localhost;dbname=zeusdb","root","");
           if(isset($_POST['Signin'])){
               // Declaration des variables
               $username = htmlspecialchars(trim($_POST['username']));
               $password = htmlspecialchars(trim($_POST['password']));
               
               //Creation de la requete
               $select = $con->prepare("SELECT * FROM users WHERE username='$username' and password='$password'");
               $select->setFetchMode(PDO::FETCH_ASSOC);
               $select->execute();
               $data = $select->fetch();
               
               //si validation reussie
               if($data['username'] != $username and $data['password'] != $password){
                   $error = "Username or Password invalid";
               }
               elseif ($data['username'] == $username and $data['password'] == $password){
                   $_SESSION['username'] = $data['usernam'];
                   // redirection vers la page d'acceuil
                   header("location:Acceuil.php");
               }
             }
        } catch (PDOException $ex) {
            echo "Error" .$ex->getMessage();
        }
        ?>
        <div class="group-box">
            <form class="col-lg-6 col-lg-7 col-lg-8" action="Login.php" method="POST" name="Formlogin">
            <div class="form-group">
                <fieldset>
                    <div class="panel panel-primary">
                         <div class="panel-heading">
                            <h3 class="panel-title">Login Form</h3>
                         </div>
                         <div class="panel-body">
                           <label class="control-label" for="username"><b>Username</b></label> <br/>
                           <input class="form-control" name="username" placeholder="Type your username" type="text" required/> <br/>
                           <label class="control-label" for="password"><b>Password</b></label> <br/>
                           <input class="form-control" name="password" placeholder="Type your password" type="password" required/> <br/>
                           <span class="label label-danger"><?php echo $error; ?></span>
                           
                           <button class="btn btn-success btn-lg" type="submit" name="Signin">Sign in</button> 
                         </div> 
                    
                        <div class="space-6"></div>
                    
                       <div class="panel-footer">
                          <div id="user-signup-link">
                              <a href="Register.php" class="user-signup-link">New user</a>
                          </div>
                          <div id="forgot-password-link">
                              <p>I forgot <a href="Forgot.php" class="forgot-password-link">My password</a></p> 
                           </div>
                       </div>
                    </div>
                </fieldset>
            </div><!--form-group--> 
        </form><!--formulaire-->
        </div><!--group-box-->
    </body>
</html>
