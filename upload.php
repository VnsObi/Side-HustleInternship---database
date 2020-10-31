<html>
<head>
	<title>VIDEO FILE UPLOADER</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<font align = 'center'><h1>Video File Uploader</h1></font>
<?php
if(isset($_FILES['file'])) 
{ 
// File extension to be Uploaded
$extension = array("3gp", "mp4", "avi");

$ext = explode('.', basename($_FILES['file']['name']));

$file_extension = end($ext);

//generate the Name for the image: 
$vid_name = "video_".rand(100000,900000).".".$file_extension;

$target_path = $vid_name;

//Filesize should not exceed 5mb
$maxsize = 5 * 1024 * 1024;


if (($_FILES["file"]["size"] > $maxsize ))
{
	//filesize error message
	echo "Error: File size exceeds 5mb";
}
else 
{
if(in_array($file_extension, $extension))
{
if (move_uploaded_file($_FILES['file']['tmp_name'], "videos/".$vid_name))
{
	echo 'Video successfully uploaded (<a href="videos/'.$vid_name.'" class="href">'.$vid_name.'</a>)'; 
}
else {
	echo '<div class="infored">Error: '.$_FILES['file']['error'].'</div>';
}

}

else 
{
	//file extension error
	echo "Error: '.$file_extension.' file extension not allowed";
}
}
}
?>


<form action="" method="POST" enctype="multipart/form-data" align = 'center'> 

<h3>
Supported video file extensions to be uploaded:
<ul align = 'center'>
<li>.avi</li>
<li>.3gp</li>
<li>.mp4</li>
</ul>
 
File size must not exceed 5mb
</h3>

<input type="file" name="file" />
<button type="submit" name="submit" style="background: #ffffff;" >Upload</button>
</form>

</body>
</html>