


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
<div class="container">
      <div class="row">
          <h1><?php echo $message; ?></h1>
          <h2>Login</h1>
          <div class="col-sm-4 mt-4">
              <form action="processor.php" method="post">
                  <div class="form-group">
                  <label for="">Email</label>
                      <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                  </div>
                  <div class="form-group">
                      <label for="">Password</label>
                      <input type="text" class="form-control" name="password" placeholder="password" required>
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btn btn-primary form-control mt-2"  name="login" value="Login">
                  </div>
                  <div class="form-group">
                       <a style="text-decoration:none;" class="btn btn-secondary mt-3 form-control" href="register.php">CREATE ACCOUNT</a> 
                </div>
              </form>
          </div>
      </div>
  </div>  
</body>
</html>