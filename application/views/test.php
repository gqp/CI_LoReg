<?php if($this->session->userdata('logged_in') != 1){redirect('login/restricted');}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Test Area</title>
</head>
<body>

<div id="container">
    <h1>Test</h1>
    <br />
    <a href='<?php echo site_url('login/logout'); ?>'>Logout</a>

    <br />

</div>

</body>
</html>