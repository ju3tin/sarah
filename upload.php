<style>
.sucess{
color:#088A08;
}
.error{
color:red;
}
</style>

<?php
$file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
$upload_exts = end(explode(".", $_FILES["file"]["name"]));
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 2000000)
&& in_array($upload_exts, $file_exts))
{
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
}
else
{
echo "Upload: " . $_FILES["file"]["name"] . "<br>";
echo "Type: " . $_FILES["file"]["type"] . "<br>";
echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
// Enter your path to upload file here
if (file_exists("C:\Users\BVR\igHackathon/" .
$_FILES["file"]["name"]))
{
echo "<div class='error'>"."(".$_FILES["file"]["name"].")".
" already exists. "."</div>";
}
else
{
move_uploaded_file($_FILES["file"]["tmp_name"],
"C:\Users\BVR\igHackathon/" . $_FILES["file"]["name"]);
echo "<div class='sucess'>"."Stored in: " .
"cC:\Users\BVR\igHackathon/" . $_FILES["file"]["name"]."</div>"."https://gateway-a.watsonplatform.net/visual-recognition/api/v3/classify?api_key=5bf6b912f29ae7176d442f97ac1162de93db42ec&url=http://3ea11508.ngrok.io/".$_FILES["file"]["name"];
echo "<script type=\"text/javascript\">   \n";
echo "function Redirect() \n";
echo "{  \n";
echo "window.location=\"https://gateway-a.watsonplatform.net/visual-recognition/api/v3/classify?api_key=5bf6b912f29ae7176d442f97ac1162de93db42ec&url=http://3ea11508.ngrok.io/". $_FILES["file"]["name"]."&version=2016-05-19\"; \n";
echo "} \n";
echo "document.write(\"You will be redirected to a new page in 5 seconds\"); \n";
echo "setTimeout('Redirect()', 5000);   \n";
echo "</script>";


}
}
}
else
{
echo "<div class='error'>Invalid file</div>";
}
?>