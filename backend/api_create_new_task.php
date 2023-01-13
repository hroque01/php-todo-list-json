<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

header('Content-Type: application/json');

//prendiamo il 'text' dell'array di toDo.php
$text = $_GET['text'];

//prendi i contenuti di todo.json
$jsonTodoList = file_get_contents("todo.json");

//prendo l'array dentro sopra e ci metto la variabile appena creata
$todoList = json_decode($jsonTodoList);

//inserisco nell'array
$todoList[] = [
    "text" => $text,
    "completed" => false
];

// implimentiamo il nuovo array nel todolist di todo.json
$jsonTodoList = json_encode($todoList);
file_put_contents("todo.json", $jsonTodoList);