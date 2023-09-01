<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka</title>
</head>
<body>
    <h1>Biblioteka</h1>

    <h3>Forma za unos autora:</h3>
    <fieldset style="width:40%; padding: 10px;">
        <form action="saveAutor.php" method="POST">
            <label>Ime autora</label><br>
            <input type="text" name="ime" id="ime"/>
            <br><br>
            <label>Prezime autora</label><br>
            <input type="text" name="prezime" id="prezime"/>
            <br><br>
            <input type="submit" value="Dodaj autora"/>
        </form>
    </fieldset>

    <p>---</p>

    <h3>Forma za unos knjige:</h3>
    <fieldset style="width:40%; padding: 10px;">
        <form action="saveKnjiga.php" method="POST">
            <label>Naslov knjige</label><br>
            <input type="text" name="naslov" id="naslov"/>
            <br><br>
            <label>Odaberite autora:</label><br>
            <select name="id_autori" id="id_autori">
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
            <input type="number" name="godina" id="godina" value="2023" min="1750" max="2050" />
            <br><br>
            <input type="submit" value="Dodaj knjigu"/>
        </form>
    </fieldset>


</body>
</html>