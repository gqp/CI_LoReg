<?php if($this->session->userdata('logged_in') != 1){redirect('login/restricted');}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Details</title>


</head>
<body>

<div id="container">
    <h1><?php echo $firstname . " " . $lastname . "'s"; ?> Details</h1>
    <p>Username: <strong><?php echo $username; ?></strong></p>
    <p>Full Name: <strong><?php echo $firstname . ' ' . $lastname; ?></strong></p>
    <p>Email:<strong><?php echo $email; ?></strong></p>
    <p>Role: <strong><?php if($role == 100){echo "Admin";}else{ echo "Member";} ?></strong></p>
    <p>Active <strong><?php if($active == 1){ echo "Active";}else{ echo "Not Active";} ?></strong></p>

    <a href='<?php echo site_url('admin/users'); ?>'>Back to Users</a> |  <a href='<?php echo site_url('admin'); ?>'>Admin Area</a> | <a href='<?php echo site_url('login/logout'); ?>'>Logout</a>
</div>

</body>
</html>