<div id="custom-login-form">
    <form action="<?php echo wp_login_url(); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" name="log" id="username">

        <label for="password">Password:</label>
        <input type="password" name="pwd" id="password">
        <!-- Add a hidden field to store the current URL -->
        <input type="hidden" name="redirect_to" value="">
        <input type="submit" value="Login">
        <input type="hidden" name="redirect_to" value="<?php echo home_url(); ?>">
    </form>
</div>
