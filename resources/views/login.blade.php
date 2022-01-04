<form action="goLogin" method="POST">
    @csrf
    <input type="text" name="username" id="username">
    <input type="password" name="password" id="password">
    <input type="submit" id="submit" name="submit" value="Login">
</form>