<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Register</title>
</head>
<body>
<div class="container">
      <div class="row">
          <div class="col-sm-4 mt-4">
          <form action="processor.php" method="post">
              <h1>Create Account Here</h1>
                  <div class="form-group">
                  <label for="">Enter Your Email</label>
                      <input type="email" class="form-control" name="email" placeholder="Enter your email">
                  </div>
                  <div class="form-group">
                      <label for="">Username</label>
                      <input type="text" class="form-control" name="username" placeholder="Username" required="username" required="required">
                  </div>
                  <div class="form-group">
                      <label for="">password</label>
                      <input type="password" class="form-control" minimum-length="8" name="password" placeholder="Password" required="password" required="required">
                  </div>
                  <div class="form-group">
                      <label for="">Confirm Password</label>
                      <input type="password" class="form-control" minimum-length="8" name="confirmpassword" placeholder="Confirm Password" required>
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btn btn-primary form-control mt-2 mb-2"  name="register" value="Register">
                  </div>
                  <div class="form-group">
                 <p>have an account?<span><a href="login.php">Login</a></span>  </p>
                </div>
              </form>
          </div>
      </div>
  </div>  
</body>
</html>