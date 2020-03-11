<?php
//
// Config

// checkvist.com list public share share url
$checkVistListURL = (string) "https://checkvist.com/p/VUUoHsiGafNpY5GWmRF1z7";

// Tell any cache to reevaluate the in $everyXMin
$everyXMin = (int) 60 * 5; // 300 minutes = 5 h

//
//
// Do not change code below
//
//

// Set cache header
header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', time() + (60 * $everyXMins)));

// Get checkvist.com list data
$listData = file_get_contents($checkVistListURL . ".md");

// Extract list title
$title = "";
$firstLine = rtrim(strtok($listData, "\n"));
if (preg_match('# (.*) #', $firstLine, $match) == 1) {
  $title = $match[1];
}

?>
<html>
<title><?php echo $title; ?></title>

<link href="css/reset.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

</html>

<body>
  <?php
  include("php/parsedown.php");
  $pd = new Parsedown();
  echo $pd->text(str_replace('"', '\'', $listData));
  ?>
</body>

</html>