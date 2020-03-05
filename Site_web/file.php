
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre de ma page</title>
    </head>
    <body>
    
<?php

$ftp_server = "178.32.42.143";
$ftp_user_name = "ocpstagi";
$ftp_user_pass = "obLOC#5)l459dS";
$ftp_port = "21";
$destination_file = "/public_html/";
$source_file = $_FILES['cv']['tmp_name'];


// set up basic connection
$conn_id = ftp_connect($ftp_server,$ftp_port);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 
// ftp passive cmd
ftp_pasv($conn_id, true);

// check connection
if ((!$conn_id) || (!$login_result)) { 
    echo "FTP connection has failed!";
    echo "Attempted to connect to $ftp_server for user $ftp_user_name"; 
    exit; 
} else {
    echo "Connected to $ftp_server, for user $ftp_user_name";
}

// upload the file
ftp_chdir($conn_id,$destination_file);
$upload = ftp_put($conn_id,"/public_html/fichier.txt",$source_file,FTP_ASCII); 

// check upload status
if (!$upload) { 
echo "FTP upload has failed!";
} else {
echo "Uploaded $source_file to $ftp_server as $destination_file";
}

// close the FTP stream 
ftp_close($conn_id);

?>
    </body>
</html>