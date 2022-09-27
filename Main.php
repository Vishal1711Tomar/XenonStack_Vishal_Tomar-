
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header login_modal_header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        		<h2 class="modal-title" id="myModalLabel">ADMIN LOGIN</h2>
      		</div>
      		<div class="modal-body login-modal">
      			
      			<div class="clearfix"></div>
      			<div id='social-icons-conatainer'>
	        		
	        			
                        <form method="POST">
		              		<input type="text" name="name" placeholder="Enter your name" value="" class="form-control login-field">
		              		<br />
    		    		    <input type="password" name="pwd" placeholder="password" value="" class="form-control login-field">
		              		<br />
		            	<input type="submit" name="sub" value="LOGIN"/>  <br />
                    </form>
            	   
      		      		
      		</div>
    	</div>
  	</div>
</div>
<?php
@session_start();
if(isset($_POST['sub']))
{
    include('db.php');
  $link=@mysqli_connect(HOST,USER,PASSWORD,DATABASE)or Die("<font color='red'>Server not connected!!!</font>");

 
 $name=$_POST['name'];
 $pwd=$_POST['pwd'];
 if($name!=''&&$pwd!='')
 {
   $query=mysqli_query($link,"select * from login where username='".$name."' and password='".$pwd."'") or die(mysql_error());
   $res=@mysqli_fetch_row($query);
   if($res)
   {
    $_SESSION['name']=$name;
    $name=$_SESSION['name'];
    header('location:vis.html');
    }
 else
   {
    echo"<font color='black' ><h3 align='center'>You  have entered wrong username or password !!!!!!</h3></font>";
   }
 }
 else
 {
  echo"<font color='blue'><h3 align='center'>Enter both username and password!!!!!!</h3></font>";
 }
}
?>



