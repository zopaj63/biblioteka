<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka</title>
</head>
<body>
    <h1>Biblioteka</h1>

    <h3>Forma za unos knjige:</h3>
    <fieldset style="width:40%; padding: 10px;">
        <form action="" method="POST">
            <label>Naslov knjige</label><br>
            <input type="text" name="naslov" id="naslov" require/>
            <br><br>
            <label>Odaberite autora:</label><br>
            <select name="id_autori" id="id_autori" require>
                <option value="1">Robin Nixon</option>
                <option value="2">Matt Stauffer</option>
                <option value="3">Matt Zandstra</option>
                <option value="4">Donald Knuth</option>
                <option value="5">Lynn Beighley</option>
                <option value="6">Alan Forbes</option>
                <option value="7">Luke Welling</option>
            </select>
            <br><br>
            <label>Godina izdanja</label><br>
            <input type="number" name="godina" id="godina" value="2023" min="1750" max="2050" require/>
            <br><br>
            <input type="submit" name="dodaj" value="Dodaj knjigu"/>
        </form>
    </fieldset>
    <hr>


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

    // dodaj knjigu
    if (isset($_POST['dodaj']))
    {
        $naslov = $_POST['naslov'];
        $id_autori = $_POST['id_autori'];
        $godina_izdanja = $_POST['godina'];
    
        $stmt=$conn->prepare("INSERT INTO knjige (naslov, id_autori, godina) VALUES (:naslov, :id_autori, :godina)");
        $stmt->bindParam(":naslov", $naslov);
        $stmt->bindParam(":id_autori", $id_autori);
        $stmt->bindParam(":godina", $godina);

        if($stmt->execute())
        {
            echo "Knjiga je uspješno dodana";
        }
        else
        {
            echo "Došlo je do greške";
        }
    }


    // prikaz knjiga s autorima
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

    // obriši knjigu

?>

</body>
</html>