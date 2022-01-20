<form action="getEnquiry" method="post">
	@csrf
	<input type="text" name="Name" placeholder="name"><br><br>
	<input type="text" name="mobile" placeholder="mobile"><br><br>
	<input type="email" name="email" placeholder="Email"><br><br>
	<input type="text" name="services" placeholder="services"><br><br>
	<input type="text" name="location" placeholder="location"><br><br>
	<input type="submit" name="Submit">
</form>