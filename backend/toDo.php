<?php

// creo un arrray di oggetti per poi metterlo sul json in formato array oggetti in linguaggio di javascript

$todoList = [
    [
        "text" => "Fare il bucato",
        "completed" => true
    ],
    [
        "text" => "Lavare Piatti",
        "completed" => true
    ],
    [
        "text" => "Lavare pavimento",
        "completed" => false
    ],
    [
        "text" => "Programmare il sito",
        "completed" => false
    ]
];

//creano una variabile con "encode" ovvero prendi $todoList e codificalo in JSON
$todoJson = json_encode($todoList);

//inserisci nel file json la variabile
file_put_contents("todo.json", $todoJson);