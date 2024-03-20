<?php
error_reporting(1);

$name = "John";
$lname = "Doe";

$arr = ["fname" => "Serri"];

echo "Hello $name {$arr["name"]}" ;

$obj = [
    "fname" => "John",
    "lname" => "Doe"
];

echo $obj["fname"];

$array = [
    "games" => [
        "name" => "DOTA2",
        "level" => "99"
    ]
    ];

    echo "<h1>My level in Dota2 is {$array["games"]["level"]} </h1>

    ";

    $people = [
        "John" => [
            "lname" => "Doe",
            "age" => 30,
            "hobbies" => ["hobby1" => "read", "hobby2" => "code"]
        ],
        "Mary" => [
            "lname" => "Doe2",
            "age" => 25,
            "hobbies" => ["hobby1" => "read", "hobby2" => "code"]
        ],
        "Thomas" => [
            "lname" => "Doe3",
            "age" => 22,
            "hobbies" => ["hobby1" => "read", "hobby2" => "code"]
        ]
        ];
      

        // the code below is for debugging and to see the php code on screen
        
        // var_dump($people);
        // exit();
        ?>