<!--
    Copyright (C) "Slavehack: Legacy" 2014

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
-->

<?php
session_start();
include("page_parts.php");
?>

<html>
<head>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:700,400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="shortcut icon" href="img/icon.ico" />
    <script type="text/javascript" src="js/jQuery.js"></script>
    <title>
        Slavehack: Legacy
    </title>

    <!--[if lt IE 7]>
    <style media="screen" type="text/css">
        #container {
            height:100%;
        }
    </style>
    <![endif]-->
</head>

<body>

<?php menu() ?>

<?php content_index()?>

<?php footer() ?>

</body>
</html>

<?php
$timestamp = $_SERVER['REQUEST_TIME'];
date_default_timezone_set('UTC');

$tz = "America/Chicago";

if(isset($_SESSION['tz'])){
    $tz = $_SESSION['tz'];
}

if(isset($_SESSION['user'])){
    ?><script>
        $("#logswitch").html("<a href='logout.php'>Logout</a>");
    </script><?php
} else {
    ?><script>
        $("#logswitch").html("<a href='login.php'>Login</a>");
    </script><?php
}

$dtzone = new DateTimeZone($tz);
$dtime = new DateTime();

$dtime->setTimestamp($timestamp);
$dtime->setTimeZone($dtzone);
$time = $dtime->format('g:i A m/d/y');

?>
<script>
    $("#date").html('<?php echo $time; ?>');
</script>
<?php
?>