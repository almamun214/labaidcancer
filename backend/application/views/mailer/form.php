<html>
<head>
<title>Email Form</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1>Sending email</h1>
<form method="post" enctype="multipart/form-data" action="<?php echo base_url('appointment/send'); ?>">
<input type="email" id="to" name="to" placeholder="Email" value="mr.nahid1992@gmail.com">
<input type="submit" value="Send" />
</form>
</body>
</html>