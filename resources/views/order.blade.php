<form action="placeOrder" method="post">
@csrf
<!-- <input type="text" id="package" name="package" placeholder="Enter package"><br> -->
<select name="package" id="package">
	<option value="1480">Nursing Service</option>
	<option value="1479">Elder Service</option>
	<option value="1">Lab Test</option>
</select><br>
<input type="text" id="user_id" name="user_id" placeholder="Enter user_id"><br>
<input type="date" id="start_dt" name="start_dt" placeholder="Enter start_dt"><br>
<input type="date" id="end_date" name="end_date" placeholder="Enter end_date"><br>
<input type="time" id="schedule_time_from" name="schedule_time_from" placeholder="Enter schedule_time_from"><br>
<input type="time" id="schedule_time_to" name="schedule_time_to" placeholder="Enter schedule_time_to"><br>
<input type="text" name="location" id="location" placeholder="Enter Location"><br>
<input type="submit" id="register" value="Register">
</form>