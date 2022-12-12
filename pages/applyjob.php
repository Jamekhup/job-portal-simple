<?php

    require_once('../company/db.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $comemail = $_POST['comemail'];

    $cv = $_FILES['cv'];

if ($name == '' || $cv == "" || $email == '' || $phone == "" || $comemail == "") {
    echo "<p class='bg-danger text-light'>All fileds are required</p>";
} else {

    $to = $comemail;
    $from = $email;
    $subject = "Apply For Job Position";
    $message = "Hello HR Team, My name is " . $name . ". And I would like to 
                apply for this position. Please check my CV in the attached file.
                Thank you.";
    $headers = "From: $from";


    $allowedExtensions = array("pdf", "doc", "docx");

    $files = array();
    foreach ($_FILES as $name => $file) {
        $file_name = $file['name'];
        $temp_name = $file['tmp_name'];
        $file_type = $file['type'];
        $path_parts = pathinfo($file_name);
        $ext = $path_parts['extension'];
        if (!in_array($ext, $allowedExtensions)) {
            echo "<p class='alert alert-danger'>Only PDF,DOC,DOCS Files are allowed.</p>";
        }
        array_push($files, $file);
    }

    // boundary 
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

    // headers for attachment 
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

    // multipart boundary 
    $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
    $message .= "--{$mime_boundary}\n";

    // preparing attachments
    for ($x = 0; $x < count($files); $x++) {
        $file = fopen($files[$x]['tmp_name'], "rb");
        $data = fread($file, filesize($files[$x]['tmp_name']));
        fclose($file);
        $data = chunk_split(base64_encode($data));
        $name = $files[$x]['name'];
        $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$name\"\n" .
            "Content-Disposition: attachment;\n" . " filename=\"$name\"\n" .
            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        $message .= "--{$mime_boundary}\n";
    }
    // send

    $ok = mail($to, $subject, $message, $headers);
    if ($ok) {
        echo "<p class='bg-success' style='padding:5px;'>Thank you for your applied. Good Luck!</p>";
    } else {
        echo "<p class='alert alert-danger'>mail could not be sent!</p>";
    }
}

?>