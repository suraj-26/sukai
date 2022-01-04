<form action="goSignIn" method="post">
@csrf
<input type="text" id="name" name="name" placeholder="Enter Name"><br>
<input type="text" id="user_name" name="user_name" placeholder="Enter Username"><br>
<input type="text" id="email" name="email" placeholder="Enter Email"><br>
<input type="password" id="password" name="password" placeholder="Enter Password"><br>
<input type="text" id="contact" name="contact" placeholder="Enter Contact"><br>
<input type="text" id="address" name="address" placeholder="Enter Address"><br>
<input type="text" id="alt_address" name="alt_address" placeholder="Enter Alt Address"><br>
<input type="submit" id="register" value="Register">
</form>