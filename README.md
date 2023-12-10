# Ntwadumela
Ntwadumela - A Raspberry Pi Implant

Ntwadumela is a custom Raspberry Pi implant that creates a reverse ssh proxy utilizing Ngrok.  You can then drop an implant inside of a network, and communicate with the implant via SSH in another location.  In addition, this implant encrypts its payload file system with a key that is burned when the implant is powered off.  This prevents an “attacker” from gaining access to the implant’s encrypted file system that can contain your payloads, logs, and any other activity that you want protected on the implant.

This project has several downloads: an encrypted file system image, Ntwadumela BASH/Perl scripts, and a PHP application that you will need to upload to a public-facing web server.  If this project builds enough interest, I may also upload complete Raspberry Pi images.

To get started, you will first need a web server to host Ntwadumela’s encryption key and PHP control script.  This script will output your implant’s current host connection string, as well as allow you to remotely delete the encryption key if Ntwadumela is somehow incapable of automatically deleting it after use (or if you choose to disable that functionality).  To access the web “UI”, visit https://yourdomain.com/ntwadumela.php?view=yes.  ![screenshot](https://github.com/christopher-pace/Ntwadumela/assets/22531478/62f38a3e-f5e5-4d79-baff-094ce5699e0a)
