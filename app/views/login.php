<h2>
    login
</h2>
<?php echo getFlash('login'); ?>

<form action="?inc=login" method="POST">
    <input type="text" name="name" value="Paulo H">
    <input type="text" name="email" value="paulo.henrique724.ph@gmail.com">
    <input type="text" name="password" value="123">
    <button type="submit">Login</button>
</form>