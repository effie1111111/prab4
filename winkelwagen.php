<?php
session_start();

if (isset($_GET['leeg'])) {
    $_SESSION['winkelwagen'] = [];
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Winkelwagen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav>
        <div>
            <a href="index.php">Home</a>
            <a href="foto_page.php">Foto's</a>
        </div>
        <a href="winkelwagen.php" class="winkelwagen-link">🛒 Winkelwagen</a>
    </nav>

    <h1>Winkelwagen</h1>

    <?php
    if (empty($_SESSION['winkelwagen'])) {
        echo "<p>Je winkelwagen is leeg.</p>";
    } else {
        $totaal = 0;

        echo "<table border='1'>";
        echo "<tr><th>Product</th><th>Prijs</th></tr>";

        foreach ($_SESSION['winkelwagen'] as $item) {
            echo "<tr>";
            echo "<td>" . $item['naam'] . "</td>";
            echo "<td>€" . number_format($item['prijs'], 2, ',', '.') . "</td>";
            echo "</tr>";

            $totaal += $item['prijs'];
        }

        echo "</table>";
        echo "<p><strong>Totaal: €" . number_format($totaal, 2, ',', '.') . "</strong></p>";
        echo "<a href='winkelwagen.php?leeg=1'>Winkelwagen leegmaken</a>";
    }
    ?>

    <br><br>
    <a href="foto_page.php">Terug naar foto's</a>

</body>
</html>