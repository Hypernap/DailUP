<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="profileform.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">E-mail</span>
            <input type="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Age</span>
            <input type="number" placeholder="Enter your age" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="tel" placeholder="Enter your number" pattern="[0-9]{10}" required>
          </div>
          
          <div class="input-box">
            <span class="details">Profession</span>
            <input type="text" placeholder="write your profession" required>
          </div>
          
        </div>
        <div class="input-box">
            <span class="details">Bio</span>
            <textarea id="details" name="details" rows="3" cols="20" placeholder="Enter About Your Self"></textarea>   
        </div>
        <div class="input-box">
            <span class="details">About Your Profession</span>
            <textarea id="details" name="details" rows="3" cols="20" placeholder="Enter about your profession"></textarea>   
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <input type="radio" name="gender" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
