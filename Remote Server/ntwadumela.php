<?php
$kill = $_GET['kill'];
$view = $_GET['view'];
$host_string = filter_var($_GET['host'], FILTER_SANITIZE_ADD_SLASHES);;
# Get the variables we'll need from the POST request.  We're sanitizing the host value, since we'll be passing that along to the shell later instead of directly opening/closing within this script.
if ($host_string != "") { #
	system("echo \"$host_string\">host_string.txt");
	print("Host is $host_string <BR>");
}
if ($kill == "yes") {
	system("rm -f key.key");
	print("Killed key.key<BR>");
}
if ($view == "yes") { #Load the main "UI".  I use that term loosely.
	print("<HTML><HEAD><TITLE>Ntwadumela - a Raspberry Pi Implant</TITLE><BODY bgcolor=\"black\"><font color=\"white\"><h1><center>Ntwadumela - a Raspberry Pi Implant</h1><p align=\"center\">Learn more about Ntwadumela, \"he who greets with fire\" here: <A HREF=\"https://www.youtube.com/watch?v=IPiyo332Gks\">https://www.youtube.com/watch?v=IPiyo332Gks</a>");
	print("<BR><BR>Host connect string:<BR><BR>");
	$host_status = system("cat host_string.txt");#Lazy way of grabbing the host string instead of opening within PHP.  Haters gonna hate.
	print("<BR><a href=\"ssh://$host_status\">ssh://$host_status</a>");
	print("<BR><BR>");
	if (file_exists("key.key")) {
		print("Key is still in place.  Delete key?<form action=\"?kill=yes\" method=\"post\"><center><input type=\"submit\" value=\"Delete encryption key!\"></center>");

	} else {
		print("Key has been deleted from the server.<BR>");
	}
print("</BODY></HTML>");
}
# This space left intentionally blank.




?>
