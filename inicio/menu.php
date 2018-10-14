<?php

session_start();
if ($_SESSION['funcionario']!=0){
    include 'menuFunci.php';
}else {
      include 'menuHospe.php';
}