<?php
error_reporting(1);
 
$con=mysql_connect("localhost","root","");
 
mysql_select_db("demo",$con);
 
extract($_POST);
 
$target_dir = "uploads/";
 echo "hello";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
 
if(isset($_POST['upd']))
{
	 echo "hello1";
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 
if($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov" && $imageFileType != "3gp" && $imageFileType != "mpeg")
{
    echo "File Format Not Suppoted";
} 
 
else
{
 
$video_path=$_FILES['fileToUpload']['name'];
 
mysql_query("insert into video(video_name) values('$video_path')");
 
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);
 
echo "uploaded ";
 
}
 
}
else {
$e=	$_POST["upd"];
 echo "hello3".$e;	
}
 
//display all uploaded video
 
if($disp)
 
{
 
$query=mysql_query("select * from video");
 
 while($all_video=mysql_fetch_array($query))
 
 {
?>
 
 <video width="300" height="200" controls>
 <source src="uploads/<?php echo $all_video['video_name']; ?>" type="video/mp4">
 </video> 
 
 <?php } } ?>