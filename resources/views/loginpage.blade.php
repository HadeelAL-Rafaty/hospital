<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
   
    <link rel="stylesheet" href="{{asset ('css/login.css') }}">
    <title>Login</title>
</head>
<body>

    <div class="container">
        <div class="box">
            <h1>Login</h1>
            <form>
                <label>Username</label>
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
                <input type="submit" value="Login">
            </form>
            <a href="{{ ('signup') }}" class="sign-up">Sign Up</a>
        </div>
    </div>
</body>
</html>