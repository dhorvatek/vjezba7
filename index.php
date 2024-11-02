<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Grade calculator</h2>
    <form method="post">
        <label for="grade1">Ocjena I. kolokvija:</label>
        <input type="number" id="grade1" name="grades[]" placeholder="Grade1" min="1" max="5" required>
        
        <label for="grade2">Ocjena II. kolokvija:</label>
        <input type="number" id="grade2" name="grades[]" placeholder="Grade2" min="1" max="5" required>
        
        <br><br>
        <button type="submit" name="calculate">Calculate</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // colleceted from form
        $grades = $_POST['grades'];

        // overall Validation
        $isValid = true;
        foreach ($grades as $ocjena) {
            if ($ocjena < 1 || $ocjena > 5) {
                $isValid = false;
                break;
            }
        }

        if ($isValid) {
            // avg
            $average = ($grades[0] + $grades[1]) / 2;
            // Round func
            $finalGrade = round($average);

            // validation for '1'
            if ($grades[0] < 2 || $grades[1] < 2) {
                $finalGrade = "1"; 
            }

            
            echo "<h3>Prosjek: " . round($average, 2) . "</h3>";
            echo "<h3>Konačna ocjena: " . $finalGrade . "</h3>";
        } else {
            echo "<h3>grades must be between 1 and 5.</h3>";
        }
    }
    ?>
</body>
</html>
