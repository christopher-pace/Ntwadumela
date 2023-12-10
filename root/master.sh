#!/usr/bin/bash
#  Master Control Scipt for Ntwadumela
# 
#
#
#  Christopher J. Pace
#  https://github.com/christopher-pace/
#
#  
sleep 60 #Sleep for a minute to let wifi connect, etc.s
curl https://cyka.win/ntwadumela/key.key -o /root/key.key
cryptsetup luksOpen /root/fs.img fs --key-file /root/key.key
mount /dev/mapper/fs /root/fs
rm /root/key.key
/root/fs/ntwadumela.pl

