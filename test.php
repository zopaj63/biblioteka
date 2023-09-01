<?php

    require "autoload.php";

    $config=new Config("config.ini");
    $db=Database::getInstance($config);
    $conn=$db->getConnection();

    
    if ($conn)
    {
        echo "Uspješno spajanje na bazu!"."<br>"."<br>";
    }
    else
    {
        echo "Spajanje na bazu nije uspjelo";
    }

    $query = "SELECT * FROM knjige INNER JOIN autori ON knjige.id_autori=autori.id_autori";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
        echo "ID knjige: " . $row['id_knjige'] ."<br>"
        . "Naslov knjige: " . $row['naslov'] ."<br>"
        . "Ime autora: " . $row['ime']."<br>"
        . "Prezime autora: " . $row['prezime']."<br>"
        . "ID autora: " . $row['id_autori']."<br>"
        . "Godina izdanja: " . $row['godina_izdanja']."<br>"
        ."<br>"."<br>";
    }

    $query = "SELECT * FROM autori ORDER BY id_autori";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    echo "SVI AUTORI:"."<br>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
        echo "Ime autora: " . $row['ime']."<br>"
        . "Prezime autora: " . $row['prezime']."<br>"
        . "ID autora: " . $row['id_autori']."<br>"
        ."<br>";
    }



?>