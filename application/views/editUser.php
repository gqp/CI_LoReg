<?php if($this->session->userdata('logged_in') != 1){redirect('login/restricted');}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit User's Information</title>


</head>
<body>

<div id="container">
    <h1>Edit <?php echo $firstname . " " . $lastname . "'s"; ?> Information</h1>
    <?php if($this->session->flashdata('success') != ""){echo "<p>" . $this->session->flashdata('success') . "</p>";} ?>
    <?php echo form_open('admin/updateUser'); ?>
    <?php //echo form_hidden('user',$username) ?>
    <label>Username: </label><?php echo form_input('username', $username, 'disabled') ?><br />
    <label>Email: </label><?php echo form_input('email', $email, 'disabled') ?><br />
    <label>Firstname: </label><?php echo form_input('firstname', $firstname) ?><br />
    <label>Lastname: </label><?php echo form_input('lastname', $lastname) ?><br />
    <?php echo form_submit('submi', 'Submit'); ?><br /><br />
    <?php echo form_close(); ?>
    <a href='<?php echo site_url('admin/users'); ?>'>Back to Users</a> |  <a href='<?php echo site_url('member_profile/change_password'); ?>'>Change Password</a> | <a href='<?php echo site_url('member_profile/edit'); ?>'>Edit Profile</a> | <a href='<?php echo site_url('login/logout'); ?>'>Logout</a>
    
</div>

</body>
</html>