<?php 
    session_start();
    if(!empty($_SESSION['email']))
    {
        header('location:dashboard.php');

    }


    include 'configdata/config.php';
    if (isset($_POST['sign_in']))
    {
        if(!empty($_POST['email']))
        {
            if(!empty($_POST['password']))
            {



                $email= test_input($_POST['email']);
                $password= test_input($_POST['password']);
                $sql_req = "SELECT * FROM `comptes` where email='$email' and password='$password'";
                $sql_obj = mysqli_query($config, $sql_req);
                $sql_assoc = mysqli_fetch_array($sql_obj);
                    if($email == $sql_assoc['email'])
                    {
                           if($password == $sql_assoc['password'])
                           {
               
                                $_SESSION['email'] = $email;
                                $_SESSION['password'] = $password;
                                $_SESSION['name'] = $sql_assoc['name'];

                                if(isset($_POST['remember']))
                                {
                                    setcookie('email' ,$email ,time()+3600*24);
                                    setcookie('password' ,$password ,time()+3600*24);
                                }
              
                                    header('location:dashboard.php');
                            }

                    }


            }
        }

    }


        function get_cookie($var)
        {
            if(isset($_COOKIE[$var]))
            {
                echo $_COOKIE[$var];
            }
        }


        function test_input($data) 
        {
            $result = trim($data);//delet spaces 
            $result = stripslashes($data);//delete backslash
            $result = htmlspecialchars($data);// read html code ... convert html to string
            return $result;
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-LEARNING-APPLICATION/index</title>
    <link rel="stylesheet" href="./bootstrap5/css/bootstrap.css">
    <script src="./bootstrap5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section class="contanr d-flex justify-content-center align-items-center ">
        <div class="col-lg-5 col-sm-8 col-md-6 ">
            <div class="bg-light p-4 shadow" style=" border-radius: 20px;">
                <div class=" d-flex flex-column">
                    <div class="ms-4">
                        <h1 class="ps-2 border-start">E-class</h1>
                    </div>
                    <div class="text-center">
                        <h3 class="text-uppercase">Sign In</h3>
                        <p class="text-muted">Enter your credentials to access your account</p>
                    </div>
                    <form action="index.php" method="POST">
                    <div class=" d-flex flex-column text-muted ">
                        <label for="email" class="col-form-label">E-mail</label>
                        <input  type="email" id="email" placeholder="Enter your email" name="email" value="<?php get_cookie('email'); ?>"
                            class="w-100 rounded-3 border  p-2 bg-transparent form-control">
                    </div>
                    <div class=" d-flex flex-column text-muted mt-3 text">
                        <label for="">Password</label>
                        <input type="password" placeholder="Enter your password" name="password" value="<?php get_cookie('password'); ?>"
                            class="w-100 rounded-3 border p-2 bg-transparent form-control">
                    </div>
                    <div>
                            <input type="checkbox" name="remember" id="check" >
                             <label for="check" >Remember Me</label>
                        </div>
                    <div class="mt-3">
                        <input type="submit" name="sign_in" value="Sign in"  class="btn btn-info w-100 rounded-3 border-1 text-white text-uppercase">
                    </div>
                    
                    <div class="text-center mt-3">
                        <p class="text-muted fs-6">Forgot your password?<a href="#" class="text-info">Reset Password</a>
                        </p>
                    </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

