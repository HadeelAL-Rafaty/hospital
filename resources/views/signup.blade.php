<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
   
   <link rel="stylesheet" href="{{asset ('css/login.css')}}">
    <title>sign up</title>
</head>
<body>
  
    <div class="container">
        <div class="box">
            <h1>Signup</h1>
            <form>
                <label>First name</label>
                <div>
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="EnterFirst name ">
                </div>
                <label>Last name</label>
                <div>
                    <i class="fa-solid fa-lock"></i>
                    <input type="text" placeholder="Enter Last name">
                </div>
                <br>
                 <label>your positon</label>
 <i class="fa-solid fa-lock"></i><br>

      <input type="radio" > doctor
     <input type="radio" > sufferer<br>

                <br>
                 <label>email</label>
                <div>
                    <i class="fa-solid fa-lock"></i>
                    <input type="email" placeholder="Enter email">
                </div>
                <br>
                 <label>password</label>
                <div>
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="Enter password">
                </div>
                <br>

                  <label>phone</label>
                <div>
                    <i class="fa-solid fa-lock"></i>
                    <input type="tel" placeholder="Enter phone">
                </div>
                <br>
                                  <label>gender</label>
                                     <i class="fa-solid fa-lock"></i><br>

      <input type="radio" name="Gender"> Male
     <input type="radio" name="Gender"> Female <br>
     


      
                
                <input type="submit" value="submit">
            </form>
            <a href="{{('loginpage')}}" class="sign-up">Login</a>
        </div>
    </div>
</body>
</html>