<?
include('../factorial.php');
include('../factorial.php');

if(isset($_GET['n'])):
	$n = 0 + $_GET['n'];
    if("$n"==$_GET['n'] && $n >= 0):
    	include('vvod.php');
    else:
    	include('error.php');
    endif;
else:
	include('vyvod.php');
endif;
?>