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
            
            <!--liens avec les fichiers css-->
            <link href="assets/css/bootstrap.css" type="text/css" rel="stylesheet"/>
            <link href="assets/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
            <link href="assets/css/Forgot.css" type="text/css" rel="stylesheet"/>
        <title>Home Registation</title>
    </head>
    <body>
        <?php
        // put your code here
        
        ?>
        
        <!--container body-->
        <div>
            <div class="center">
                <h1>
                    <span class="yellow">Stark</span>
                    <span class="black">Technogics</span>
                </h1> <br/>
                <h4>&copy; Company Name</h4>
            </div>
            
            <div class="space-6"></div>
            
            <div class="group-box">
                <form class="col-lg-6" action="" method="POST" name="Formregister">
                    <div class="form-group">
                        <fieldset>
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        Retrieve password
                                    </h4>
                                </div>
                                
                                <div class="panel-body">
                                    <p>Enter your email</p>
                                    <div class="space-4"></div>
                                    
                                    <label class="control-label" for="email"><b>Email</b></label>
                                    <input class="form-control" name="email" placeholder="Example@.com" type="email" required/> <br/>
                                    <button class="btn btn-warning btn-lg" type="submit" name="Send">Send</button>
                                </div>
                                
                                <div class="panel-footer">
                                    <a class="user-signup-link" href="Login.php">Back to Login</a>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
