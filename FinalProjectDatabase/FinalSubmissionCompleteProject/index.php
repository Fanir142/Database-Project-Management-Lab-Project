<html>
    
<head>

    <title>Go Pedal</title>
    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet" type= "text/css"> 
    
</head>
    
    <body>
        <header>
            
            
            
            <div class="main-menu">
                <ul>
                <li class="active"><a href ="">HOME</a></li>
                </ul>
            </div>
            
            <!--      
           <div class="login-box">
                <div class="textbox">
                    
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder="Username" name="" value="">
                
                </div>
                
                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Password" name="" value="">
                    
                </div> 
                
                <form  action="user_login.php" method="POST">  
                <input type="submit" name="" value="Log In">
                </form> 

              
           
                    
                  -->  
                    <form  action="user_login.php" method="POST">

                    <input type="text"  name="l_email" placeholder="Username">
                    <input type="password" name="l_password" placeholder="Password">
                       
                    <input type="submit" name="login-submit" value="Log In">
                    </form> 

                
               
                 
               
                <form  action="signupform.php" method="POST">  
                <input type ="submit" name="signup-submit" value="Sign Up"> 
                </form>   
                
                                   
            </div>
            
            
        </header>
    </body>
    
    
</html>