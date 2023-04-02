<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/css/login.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Sign In</div>
    <div class="content">
      <form action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" name="password" placeholder="Enter your password" required>
          </div>
        </div>
		<div class="signup">
		<span class="details">Don't have an account?</span>
		<a href="sign-up">Sign Up</a>
		</div>
        <div class="button submit">
          <input type="submit" value="Sign in" name="submit">
        </div>
      </form>
	  <!-- <img src="./assets/images/people-traveling.jpg" alt="Illustration"> -->
    </div>
  </div>

</body>
</html>
