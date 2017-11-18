<?php include"inc/header.php";?>
<body> 

 <div class="container">
 
 <h2 class="text-info">Wish <?php
 $appname ="";
  if(empty($appname))
  {
 	echo ucwords("charles a sedenu");
  }
 else
   {
 	echo $appname;
   }
 ?> Hbday
 </h2>
 
 <form method="post" action="">

	<?php
	$page = $_GET["birthday-wish-page"];
	if($page =="" || $page=="1")
	{

$page1=0;
	}

	else{
$page1= $page*5-5;
	}

	$res = mysqli_query($conn,"SELECT * FROM bday ORDER BY id DESC LIMIT $page1,5"); ?> 

 <?php
 $name = mysqli_real_escape_string($conn,$_POST["user"]);
 $text = mysqli_real_escape_string($conn,$_POST["text"]);
 if(isset($_POST["wish"]))
 {
 
   if($name!="" &&  $text!="")
 	{
 		
 	$sql="INSERT INTO bday(user,text) VALUES ('$name','$text')";
 		$retval = mysqli_query($conn,$sql);
 		echo" <div class='alert alert-info'>thanks for wishing me a happy birthday <i class='fa fa-check'></i></div>";
 	}
 	else{
 		echo "<div class='alert alert-danger'>Please make sure that all the text box are Entered <i class='fa fa-times'></i></div>";
 	}
 
 }
 
 ?>
 
 <div class="form-group"> 
  <label class="label-control"> Name</label> 
   <input type="text" name="user" class="form-control" placeholder="Your Name">    
        </div>
      
 <div class="form-group">     
  <label class="label-control"> Message</label> 
   <textarea class="form-control" name="text" placeholder="Text"> 
   </textarea>
 </div> 
 
  <button name="wish" class="btn btn-block btn-info">Wish</button> 
  </form>
  <br>

<?php foreach ($res as $post):?> 

	
    <?php echo $post["user"] ." says <strong class='text-info'> &rarr;</strong> " . $post["text"] ." <br> <strong class='text-primary'>@ " . $post["created"] . " <i class='fa fa-check'></i></strong><hr>";?>
   
<?php endforeach;?>

<?php
//this is for counting numbers in page

	$res1 = mysqli_query($conn,"SELECT * FROM bday");
	$cou = mysqli_num_rows($res1);
	$a = $cou/5;
	$a = ceil($a);
echo"<br><br><br>";
for ($b=1; $b<=$a; $b++) { ?> 
<a href="index.php?birthday-wish-page=<?php echo $b;?>" class="btn btn-info"><?php echo $b." ";?> </a>

	<?php
	}


?>
<div class="pull-right" style="margin-top:23px;margin-bottom:23px;">
<a href="http://github.com/charlesaloaye" target="_blank" style="color:#000000;"><i class="fa-2x fa fa-github-square"></i></a>
 <a href="http://fb.com/sedenu.charles" target="_blank"><i class="fa-2x fa fa-facebook-square"></i></a>

<a href="http://twitter.com/sedenucharles" style="color:lightblue;" target="_blank"><i class="fa-2x fa fa-twitter-square"></i></a> 
</div>
<?php include"inc/footer.php";?>