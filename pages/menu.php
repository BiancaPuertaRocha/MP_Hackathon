<?php

session_start();
if ($_SESSION['funcioanrio']==0){
    include 'menuFunci.php';
}else {
      include 'menuHospe.php';
}