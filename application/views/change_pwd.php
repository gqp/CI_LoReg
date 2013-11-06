<?php if($this->session->userdata('logged_in') != 1){redirect('login/restricted');}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Change Password</title>


</head>
<body>

<div id="container">
    <h1>Change Password</h1>

    <?php echo form_open('member_profile/updatePassword'); ?>
    <?php echo "<p>" . validation_errors() . "</p>"; ?>
    <p>New Password: <?php echo form_password('password'); ?></p>
    <p>Confirm Password: <?php echo form_password('confirm_password'); ?></p>
    <?php echo form_hidden('username', $username); ?>
    <p><?php echo form_submit('submit', 'Submit'); ?></p>
    <?php echo form_close(); ?>
    <br />
    <a href='<?php echo site_url('member_profile'); ?>'>Back to Profile</a> | <a href='<?php echo site_url('login/logout'); ?>'>Logout</a>

</div>

</body>
</html>