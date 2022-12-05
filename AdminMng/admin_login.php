<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- fontawesome CDN link -->
    <script src="https://kit.fontawesome.com/d9de7fd168.js" crossorigin="anonymous"></script>
    <!-- BOOTSRAP CDN LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- css link -->
    <link rel="stylesheet" href="styles.css">
    <style>
        body{
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
    <h2 class="text-center mb-5">Admin Login
    </h2>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-xl-5">
            <img src="../img/Curso de unity.jpg" alt="Admin Registration"
            class="img-fluid">
        </div>
        <div class="col-lg-6 col-xl-5">
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" 
                    placeholder="Enter your name" required="required"
                    class="form-control">
                </div>
                
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" 
                    placeholder="Enter your password" required="required"
                    class="form-control">
                </div>
                
                <div> 
                    <input type="submit" class="bg-info py-2 px-3 border-0"
                name="admin_login" value="Login">
                <p class="small fw-bold mt-2 pt-1">Dont't you have an account? <a href="admin_registration.php"
                class="link-danger">Register</a></p>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>