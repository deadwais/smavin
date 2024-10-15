<?php
session_start();
session_reset();
if(session_destroy()){
    header("location: login.php");}?>