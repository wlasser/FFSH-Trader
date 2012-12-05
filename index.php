<?php
include 'class.php';
$content = new ContentMgr();
?>
<html>
<head>
<title>
</title>
</head>
<body>
<?php
$content->get_page($_GET['page']);
?>
</body>
</html>