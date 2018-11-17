<?php
  // The file
  $filename = 'https://images.unsplash.com/photo-1533613220915-609f661a6fe1?ixlib=rb-0.3.5&s=3fda90f4984163cc30e13bdae325b382&auto=format&fit=crop&w=1400&q=80';
  $percent = 0.5; // percentage of resize

  // Content type
  header('Content-type: image/jpeg');

  // width = 500; height = 500

  // Get new dimensions
  list($width, $height) = getimagesize($filename);
  $new_width = $width * $percent;
  $new_height = $height * $percent;

  // Resample
  $image_p = imagecreatetruecolor($new_width, $new_height);
  $image = imagecreatefromjpeg($filename);
  imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

  // Output
   imagejpeg($image_p, null, 100);


  // This Method Is used to generate the download link

  // $filename = 'index.php/'; // of course find the exact filename....        
  // header('Pragma: public');
  // header('Expires: 0');
  // header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
  // header('Cache-Control: private', false); // required for certain browsers 
  // header('Content-Type: application/pdf');

  // header('Content-Disposition: attachment; filename="'. basename($filename) . '";');
  // header('Content-Transfer-Encoding: binary');
  // header('Content-Length: ' . filesize($filename));

  // readfile($filename);

  // exit;
?>