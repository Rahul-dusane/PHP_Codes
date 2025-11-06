<?php
    $jsonFile = "Data.json";
    $jsonData = file_get_contents($jsonFile);

    //convert json data to php array
    $data = json_decode($jsonData,true);

    foreach($data['users'] as $user){
        echo "<div style='margin-bottom:20px;'>";
        echo "Name:".$user["name"]."<br>";
        echo "Age:".$user["age"]."<br>";
        echo "Skills:".implode(", ",$user["skills"])."<br>";
        echo "</div>";
    }

    $newUser = [
        "id" => 4,
        "name" => "Alice Brown",
        "age" => 25,
        "skills" => ["React","Node.js","MongoDB"]
    ];

    $data["users"][] = $newUser;

    $newData = json_encode($data,JSON_PRETTY_PRINT);

    file_put_contents($jsonFile,$newData);

    echo "New User Added Sucessfully.";
?>