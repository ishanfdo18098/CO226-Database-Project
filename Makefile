upload:
	ftp -nv files.000webhost.com < ftpCommands.txt
uploadncftp:
	ncftpput -p IshanAdeepaRidma -R -v -u internship-allocation files.000webhost.com public_html/ server/*
