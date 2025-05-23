<?php
$funFacts = [
    "Rambutan"     => "Named from the Malay word for “hair” (rambut)!",
    "Dragon Fruit" => "A cactus fruit that glows neon pink.",
    "Starfruit"    => "Cut cross-wise, it forms perfect stars ⭐.",
    "Mangosteen"   => "Nicknamed the Queen of Fruits.",
    "Santol"       => "Also called “cotton fruit” for its fluffy pulp.",
    "Lanzones"     => "Sweet-sour pearls grown in clusters.",
    "Durian"       => "Famously smelly but delicious to fans!",
    "Chico"        => "Tastes like brown sugar and pear combined.",
    "Atis"         => "Also known as Sugar Apple—custardy inside.",
    "Guyabano"     => "Soursop—used in drinks and ice-cream.",
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fruit Selector</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: url('https://images.unsplash.com/photo-1582281298054-8781b8b1849f') no-repeat center center fixed;
            background-size: cover;
            color: pink;
            text-shadow: 1px 1px 2px #000;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .center-wrap {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        form, .result {
            max-width: 600px;
            width: 100%;
            margin: 0 auto;
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 15px;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            display: block;
            margin: 0.5rem 0;
            font-size: 1.1rem;
            width: 100%;
            text-align: center;
        }
        input[type="submit"] {
            background-color: #ffb347;
            color: #222;
            font-weight: bold;
            padding: 0.7rem 2rem;
            border: none;
            border-radius: 25px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }
        input[type="submit"]:hover {
            background-color: #ff9900;
            transform: scale(1.05);
        }
        .result p {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }
        .back {
            display: inline-block;
            margin-top: 1rem;
            color: #fff;
            text-decoration: underline;
        }
        .summary {
            margin-top: 1rem;
            font-weight: bold;
            color: #ffe066;
        }
    </style>
</head>
<body>
<div class="center-wrap">
    <h2>🍍Fruit Selector 🍓</h2>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['fruits'])): ?>
        <div class="result">
            <?php
            $selected = $_POST['fruits'];
            foreach ($selected as $fruit) {
                echo "<p><strong>$fruit:</strong> {$funFacts[$fruit]}</p>";
            }
            $timestamp = date("Y-m-d H:i:s");
            $line = "$timestamp - Selected Fruits: " . implode(", ", $selected) . PHP_EOL;
            file_put_contents("selected_fruits.txt", $line, FILE_APPEND);
            if (in_array("Durian", $selected)) {
                echo "<p class='summary'>😲 Brave choice! Durian is very strong-smelling!</p>";
            } else {
                echo "<p class='summary'>No smelly fruits selected! 😄</p>";
            }
            echo "<p class='summary'>You selected <strong>" . count($selected) . "</strong> fruit" . (count($selected) > 1 ? "s" : "") . ".</p>";
            ?>
            <a href="index.php" class="back">← Back to selection</a>
        </div>
    <?php else: ?>
        <form action="index.php" method="POST">
            <label><input type="checkbox" name="fruits[]" value="Rambutan"> Rambutan</label>
            <label><input type="checkbox" name="fruits[]" value="Dragon Fruit"> Dragon Fruit</label>
            <label><input type="checkbox" name="fruits[]" value="Starfruit"> Starfruit</label>
            <label><input type="checkbox" name="fruits[]" value="Mangosteen"> Mangosteen</label>
            <label><input type="checkbox" name="fruits[]" value="Santol"> Santol</label>
            <label><input type="checkbox" name="fruits[]" value="Lanzones"> Lanzones</label>
            <label><input type="checkbox" name="fruits[]" value="Durian"> Durian</label>
            <label><input type="checkbox" name="fruits[]" value="Chico"> Chico</label>
            <label><input type="checkbox" name="fruits[]" value="Atis"> Atis</label>
            <label><input type="checkbox" name="fruits[]" value="Guyabano"> Guyabano</label><br><br>
            <input type="submit" value="🍇 Submit Fruits">
        </form>
    <?php endif; ?>
</div>
</body>
</html>