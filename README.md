# Ntwadumela
Ntwadumela - A Raspberry Pi Implant

Ntwadumela is a custom Raspberry Pi implant that creates a reverse ssh proxy utilizing [Ngrok](https://github.com/inconshreveable/ngrok).  You can then drop an implant inside of a network, and communicate with the implant via SSH in another location.  In addition, this implant encrypts its payload file system with a key that is burned when the implant is powered off.  This prevents an “attacker” from gaining access to the implant’s encrypted file system that can contain your payloads, logs, and any other activity that you want protected on the implant.

This project has several downloads: an encrypted file system image, Ntwadumela BASH/Perl scripts, and a PHP application that you will need to upload to a public-facing web server.  If this project builds enough interest, I may also upload complete Raspberry Pi images.

To get started, you will first need a web server to host Ntwadumela’s encryption key and PHP control script.  This script will output your implant’s current host connection string, as well as allow you to remotely delete the encryption key if Ntwadumela is somehow incapable of automatically deleting it after use (or if you choose to disable that functionality).  To access the web “UI”, visit https://yourdomain.com/ntwadumela.php?view=yes.  ![screenshot](https://github.com/christopher-pace/Ntwadumela/assets/22531478/62f38a3e-f5e5-4d79-baff-094ce5699e0a)

Next, you will need a working Raspberry Pi with Perl installed (which it is by default).  Mount the Raspberry Pi file system, and copy the etc/rc.local file to /etc/rc.local on the Raspberry Pi.  Next, copy the files in root to /root (including the empty folder ‘fs’, which will be used as a mount point).  Finally, unmount your Raspberry Pi file system.

You may want to replace the file system image with your own LUKS encrypted file system image, since literally anyone can download the “private” key from GitHub.  For those reasons, the ntwadumela.pl file has been copied to the main GitHub project folder.  You will also need to place Ngrok on the filesystem image, which can be downloaded from  [https://github.com/inconshreveable/ngrok](https://github.com/inconshreveable/ngrok).

An excellent tutorial for how to create your own encrypted volume and key is located here: [https://www.cyberciti.biz/hardware/cryptsetup-add-enable-luks-disk-encryption-keyfile-linux/](https://www.cyberciti.biz/hardware/cryptsetup-add-enable-luks-disk-encryption-keyfile-linux/).
