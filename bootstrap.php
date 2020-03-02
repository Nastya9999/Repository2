<?php
require_once "/../../../../Connection.php";
require_once "../models/PostData.php";
$config=require_once "config.php";
$newPost=new PostData(Connection::make($config));