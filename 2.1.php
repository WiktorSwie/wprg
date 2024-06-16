<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>stronka</title>
</head>
<body>
    <form method="post" action="">
        <label for="liczba1">Liczba 1:</label>
        <input type="number" id="liczba1" name="liczba1" required><br><br>

        <label for="liczba2">Liczba 2:</label>
        <input type="number" id="liczba2" name="liczba2" required><br><br>

        <label for="dzialanie">Działanie:</label>
        <select id="dzialanie" name="dzialanie" required>
            <option value="dodawanie">Dodawanie</option>
            <option value="odejmowanie">Odejmowanie</option>
            <option value="mnozenie">Mnożenie</option>
            <option value="dzielenie">Dzielenie</option>
        </select><br><br>

        <input type="submit" value="Oblicz">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $liczba1 = $_POST['liczba1'];
        $liczba2 = $_POST['liczba2'];
        $dzialanie = $_POST['dzialanie'];

        switch ($dzialanie) {
            case "dodawanie":
                $wynik = $liczba1 + $liczba2;
                break;
            case "odejmowanie":
                $wynik = $liczba1 - $liczba2;
                break;
            case "mnozenie":
                $wynik = $liczba1 * $liczba2;
                break;
            case "dzielenie":
                if ($liczba2 != 0) {
                    $wynik = $liczba1 / $liczba2;
                } else {
                    $wynik = "Nie dziel przez 0";
                }
                break;
            default:
                $wynik = "Błąd";
                break;
        }
        echo "<h2>Wynik: $wynik</h2>";
    }
    ?>
</body>
</html>
