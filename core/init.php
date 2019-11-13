<?php

include 'database.php';
include 'routine.php';
include 'user.php';
include 'notes.php';
include 'questions.php';
include 'chat.php';

global $pdo;


$User = new User($pdo);
$Routine = new Routine($pdo);
$notes = new Notes($pdo);
$question = new Questions($pdo);
$chat = new Chat($pdo);



?>