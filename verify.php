<?php
session_start();
if(isset($_POST["usersAnswer"])){
	if($_POST["usersAnswer"]==$_SESSION["captchaText"]){
		echo 1;
	}else{
		echo 0;
	}
}
?>