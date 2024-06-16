<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Rezerwacja</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $adres = $_POST['adres'];
    $karta_kredytowa = $_POST['karta_kredytowa'];
    $email = $_POST['email'];
    $data_przyjazdu = $_POST['data_przyjazdu'];
    $godzina_przyjazdu = $_POST['godzina_przyjazdu'];
    $ilosc_osob = $_POST['ilosc_osob'];
    $dostawka = isset($_POST['dostawka']) ? 'Tak' : 'Nie';
    $udogodnienia = isset($_POST['udogodnienia']) ? implode(", ", $_POST['udogodnienia']) : 'Brak';

    echo "<h1>Podsumowanie</h1>";
    echo "<h2>Dane rezerwującego</h2>";
    echo "Imię: $imie<br>";
    echo "Nazwisko: $nazwisko<br>";
    echo "Adres: $adres<br>";
    echo "Dane karty kredytowej: $karta_kredytowa<br>";
    echo "E-mail: $email<br>";
    echo "Data przyjazdu: $data_przyjazdu<br>";
    echo "Godzina przyjazdu: $godzina_przyjazdu<br>";
    echo "Ilość osób: $ilosc_osob<br>";
    echo "Dostawka dla dziecka: $dostawka<br>";
    echo "Udogodnienia: $udogodnienia<br>";

    if ($ilosc_osob > 1) {
        echo "<h2>Dane dodatkowych osób</h2>";
        for ($i = 1; $i < $ilosc_osob; $i++) {
            $imie_osoba = $_POST["imie_osoba_$i"];
            $nazwisko_osoba = $_POST["nazwisko_osoba_$i"];
            echo "<h3>Osoba " . ($i + 1) . "</h3>";
            echo "Imię: $imie_osoba<br>";
            echo "Nazwisko: $nazwisko_osoba<br>";
        }
    }
} else {
    ?>
    <h1>Rezerwacja Hotelu</h1>
    <form method="post" action="">
        <h2>Dane osoby rezerwującej</h2>
        <label for="imie">Imię:</label>
        <input type="text" id="imie" name="imie" required><br><br>

        <label for="nazwisko">Nazwisko:</label>
        <input type="text" id="nazwisko" name="nazwisko" required><br><br>

        <label for="adres">Adres:</label>
        <input type="text" id="adres" name="adres" required><br><br>

        <label for="karta_kredytowa">Dane karty kredytowej:</label>
        <input type="text" id="karta_kredytowa" name="karta_kredytowa" required><br><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="data_przyjazdu">Data przyjazdu:</label>
        <input type="date" id="data_przyjazdu" name="data_przyjazdu" required><br><br>

        <label for="godzina_przyjazdu">Godzina przyjazdu:</label>
        <input type="time" id="godzina_przyjazdu" name="godzina_przyjazdu" required><br><br>

        <label for="ilosc_osob">Ilość osób:</label>
        <select id="ilosc_osob" name="ilosc_osob" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select><br><br>

        <label for="dostawka">Czy potrzeba dostawienia łóżka dla dziecka?</label>
        <input type="checkbox" id="dostawka" name="dostawka"><br><br>

        <label>Wybierz udogodnienia:</label><br>
        <input type="checkbox" id="klimatyzacja" name="udogodnienia[]" value="klimatyzacja">
        <label for="klimatyzacja">Klimatyzacja</label><br>
        <input type="checkbox" id="popielniczka" name="udogodnienia[]" value="popielniczka">
        <label for="popielniczka">Popielniczka dla palacza</label><br><br>
        <input type="checkbox" id="wino" name="udogodnienia[]" value="wino">
        <label for="popielniczka">Wino</label><br><br>
        <input type="checkbox" id="poduszki" name="udogodnienia[]" value="poduszki">
        <label for="popielniczka">Dodatkowe poduszki</label><br><br>

        <h2>Dane dodatkowych osób</h2>
        <div id="dodatkowe_osoby"></div>

        <input type="submit" value="Zarezerwuj">
    </form>

    <script>

        document.getElementById('ilosc_osob').addEventListener('change', function() {
            var iloscOsob = parseInt(this.value);
            var dodatkoweOsobyDiv = document.getElementById('dodatkowe_osoby');
            dodatkoweOsobyDiv.innerHTML = '';

            for (var i = 1; i < iloscOsob; i++) {
                var osobaDiv = document.createElement('div');
                osobaDiv.innerHTML = `
                        <h3>Osoba ${i + 1}</h3>
                        <label for="imie_osoba_${i}">Imię:</label>
                        <input type="text" id="imie_osoba_${i}" name="imie_osoba_${i}" required><br><br>
                        <label for="nazwisko_osoba_${i}">Nazwisko:</label>
                        <input type="text" id="nazwisko_osoba_${i}" name="nazwisko_osoba_${i}" required><br><br>
                    `;
                dodatkoweOsobyDiv.appendChild(osobaDiv);
            }
        });
    </script>
    <?php
}
?>
</body>
</html>
