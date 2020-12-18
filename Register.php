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
            
            <link href="assets/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
            <link href="assets/css/bootstrap.css" type="text/css" rel="stylesheet"/>
            <link href="assets/css/register.css" type="text/css" rel="stylesheet"/>
            
        <title>Register Page</title>
    </head>
    <body>
        <?php
        // put your code here
               // variable contenant le message d'erreur           
               $validate ='';
               
               // Tester le formulaire
               if(isset($_POST['Registered'])){
                   // Declaration des variables
                   $fullname = htmlspecialchars(trim($_POST['fullname']));
                   $username = htmlspecialchars(trim($_POST['username']));
                   $email = htmlspecialchars(trim($_POST['email']));
                   $password = htmlspecialchars(trim($_POST['password']));
                   $repeatpassword = htmlspecialchars(trim($_POST['repeatpassword']));
                   
                   if($fullname and $username and $email and $password and $repeatpassword){
                       // cas de validation des champs 
                       if($password == $repeatpassword){
                           // Connexion a la base de donnees
                           try {
                               $con = new PDO("mysql:host=localhost;dbname=zeusdb","root","");
                               //Decalaration des variables
                               $fullname = htmlspecialchars(trim($_POST['fullname']));
                               $username = htmlspecialchars(trim($_POST['username']));
                               $email = htmlspecialchars(trim($_POST['email']));
                               $password = htmlspecialchars(trim($_POST['password']));
                               $repeatpassword = htmlspecialchars(trim($_POST['repeatpassword']));
                               
                               //Creation de la requete
                               $insert = $con->prepare("INSERT INTO users(fullname,username,email,password) values(:fullname,:username,:email,:password)");
                               $insert->bindParam(':fullname', $fullname);
                               $insert->bindParam(':username', $username);
                               $insert->bindParam(':email', $email);
                               $insert->bindParam(':password', $password);
                               $insert->execute();
                               
                               // redirection vers la page de sortie
                               header("location:Logout.php");
                               
                           } catch (PDOException $ex) {
                               echo "Error" .$ex->getMessage();
                           }               
                        } else {
                            $validate = "Password and Repeat Password incorrect";    
                        }
                   }
               }
              
        ?>
        <!--Creation du formulaire d'inscription-->
        <div>
            <div class="center">
                <h1>
                    <span class="red">Stark</span>
                    <span class="black">Technogics</span>
                </h1> <br/>
                <h4>&copy; Company Name</h4>
            </div>
            
            <div class="space-6"></div>
            
            <div class="group-box">
                <form class="col-lg-7" action="" method="POST" name="Formregister">
                    <div class="form-group">
                        <fieldset>
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        New User Registration
                                    </h4>
                                </div>
                                
                                <div class="panel-body">
                                    <p>Enter your details to begin</p>
                                    <div class="space-6"></div>
                                    
                                    <label class="control-label" for="fullname"><b>full name</b></label>
                                    <input class="form-control" name="fullname" placeholder="Type your full name" type="text" required/>
                                    <label class="control-label" for="username"><b>Username</b></label> <br/>
                                    <input class="form-control" name="username" placeholder="Type your username" type="text" required/>
                                    <label class="control-label" for="email"><b>Email</b></label> <br/>
                                    <input class="form-control" name="email" placeholder="Example@.com" type="email" required/>
                                    <label class="control-label" for="password"><b>Password</b></label>
                                    <input class="form-control" name="password" placeholder="Type your password" type="password" required/>
                                    <label class="control-label" for="repeatpassword"><b>Confirm Password</b></label>
                                    <input class="form-control" name="repeatpassword" placeholder="Type your repeat password" type="password" required/>
                                       <br/>
                                       
                                    <button class="btn btn-primary btn-lg" type="reset" name="reset">Reset</button>
                                    <button class="btn btn-info btn-lg" type="submit" name="Registered">Registered</button> <br/> <br/>
                                       <!--Message d'erreur-->
                                       <span class="label label-danger"><?php echo $validate;?></span>
                                    
                                    <div class="panel-footer">
                                        <a href="Login.php">Back to Login</a>
                                    </div>
                                </div><!--panel body-->
                            </div><!--panel-info-->
                        </fieldset>
                    </div><!--form-group-->
                </form>
            </div><!--group-box-->
        </div>
    </body>
</html>    
 