<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
   
    <link rel="stylesheet" href="{{asset ('css/login.css') }}">
    <title>sign up</title>
</head>
<body>
  
    <div class="container">
        <div class="box">
            <h1>Signup</h1>
            <form>
                <label>Email</label>
                <div>
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="Enter Username">
                </div>
                <label>Password</label>
                <div>
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="Enter Password">
                </div>
                
                <a href="#" class="forgot">Forgot Password?</a>
                <input type="submit" value="submit">
            </form>
            <a href="{{ ('loginpage') }}" class="sign-up">Login</a>
        </div>
    </div>
</body>
</html>