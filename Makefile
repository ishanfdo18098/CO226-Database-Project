upload:
	ncftpput -p IshanAdeepaRidma -R -v -u internship-allocation files.000webhost.com public_html/ server/*
upload_old_method_didnt_work_properly:
	ftp -nv files.000webhost.com < ftpCommands.txt
