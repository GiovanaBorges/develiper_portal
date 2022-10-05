<HTML>
<HEAD>
  <TITLE>Tokenization Server Demo</TITLE>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="css/main.css">
</HEAD>
<BODY>
<BR>
<BR>
<header id="header">
       <img id="Tlogo" src="logo.svg"><BR>
    </header>
<BR><BR>
<main>
<?php

include "config.php";

$link = mysql_connect("localhost", "apache", "apachsrv")
  or die ("Could not connect to database.");
 mysql_select_db("vtsdemo")
  or die ("Could not select database.");

  $query = "delete from customer where id='$id'";
  $result = mysql_query ($query)
  or die ("Query failed.  Result: $result");


print "<BR><center><font size=5><B>Customer has been deleted.<BR><BR><BR><BR><BR><BR><BR>
<a class=\"button-xsmall pure-button\" href=\"demo.php?user=$user&passwd=$passwd\">Home</a>
<meta http-equiv='refresh' content='1;url=demo.php?user=$user&passwd=$passwd' />";

?>
</main>
</html>

