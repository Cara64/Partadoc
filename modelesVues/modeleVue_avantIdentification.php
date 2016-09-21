<?php
$donneesVue=$_SESSION['donneesVue'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>
<title><?php echo $donneesVue['titre']?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo $donneesVue['style']?>" />
</head>

<body>

<div id="zone_haute">
<?php include $donneesVue['zone_haute']; ?>
</div>

<div id="zone_centrale">
<?php include $donneesVue['zone_centrale']; ?>
</div>

</body>
</html>
