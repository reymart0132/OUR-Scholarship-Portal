<?php

if($_FILES['file']['error'] ==0) {
    if($_FILES['file']['size'] > 2097152) { //10 MB (size is also in bytes)
        $reds =1;
    } else {
        // File within size restrictions
        if(get_mime($_FILES['file']['tmp_name']) ==="application/pdf"){
          //file extension;
          $course2 = findCourseABV($course);
          $file = $_FILES['file']['name'];
          $ext = pathinfo($file, PATHINFO_EXTENSION);

          $filename = "UGA".$course2.$Lastname.$Firstname.$studentnumber.".".$ext;
          $location = "../../requirements/universitygrants/".$filename;


          if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
            echo "<p>File Uploaded Successfuly</p>";
          }else{
            $reds =1;
          }
        }else{
          // incorrect file type
          $reds =1;
        }
    }
}

function get_mime($file) {
    if (function_exists("finfo_file")) {
      $finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
      $mime = finfo_file($finfo, $file);
      finfo_close($finfo);
      return $mime;
    } else if (function_exists("mime_content_type")) {
      return mime_content_type($file);
    } else if (!stristr(ini_get("disable_functions"), "shell_exec")) {
      // http://stackoverflow.com/a/134930/1593459
      $file = escapeshellarg($file);
      $mime = shell_exec("file -bi " . $file);
      return $mime;
    } else {
      return false;
    }
  }

?>
