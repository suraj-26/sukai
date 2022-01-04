<form action="placeOrder" method="post">
@csrf
<input type="text" id="package" name="package" placeholder="Enter package"><br>
<input type="text" id="user_id" name="user_id" placeholder="Enter user_id"><br>
<input type="text" id="start_dt" name="start_dt" placeholder="Enter start_dt"><br>
<input type="text" id="end_date" name="end_date" placeholder="Enter end_date"><br>
<input type="text" id="schedule_time_from" name="schedule_time_from" placeholder="Enter schedule_time_from"><br>
<input type="text" id="schedule_time_to" name="schedule_time_to" placeholder="Enter schedule_time_to"><br>
<input type="submit" id="register" value="Register">
</form>