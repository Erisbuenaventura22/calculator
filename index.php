<?php
if (isset($_POST['expression'])) {
    $expression = $_POST['expression'];

    // Use eval to evaluate the mathematical expression
    // WARNING: This function can be dangerous, only use with validated input
    try {
        $result = eval("return $expression;");
        echo $result;
    } catch (Exception $e) {
        echo "Error: Invalid Expression";
    }
} else {
    echo "Error: No Expression Provided";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .calculator {
            width: 260px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input {
            width: 100%;
            height: 50px;
            font-size: 24px;
            text-align: right;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        .buttons button {
            padding: 20px;
            font-size: 18px;
            border: 1px solid #ccc;
            background-color: #f4f4f4;
            border-radius: 5px;
            cursor: pointer;
        }
        .buttons button:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <input type="text" id="display" disabled>
        <div class="buttons">
            <button onclick="appendToDisplay('7')">7</button>
            <button onclick="appendToDisplay('8')">8</button>
            <button onclick="appendToDisplay('9')">9</button>
            <button onclick="appendToDisplay('/')">/</button>
            <button onclick="appendToDisplay('4')">4</button>
            <button onclick="appendToDisplay('5')">5</button>
            <button onclick="appendToDisplay('6')">6</button>
            <button onclick="appendToDisplay('*')">*</button>
            <button onclick="appendToDisplay('1')">1</button>
            <button onclick="appendToDisplay('2')">2</button>
            <button onclick="appendToDisplay('3')">3</button>
            <button onclick="appendToDisplay('-')">-</button>
            <button onclick="appendToDisplay('0')">0</button>
            <button onclick="appendToDisplay('.')">.</button>
            <button onclick="calculateResult()">=</button>
            <button onclick="appendToDisplay('+')">+</button>
            <button onclick="clearDisplay()">C</button>
        </div>
    </div>

    <script>
        function appendToDisplay(value) {
            document.getElementById("display").value += value;
        }

        function calculateResult() {
            let displayValue = document.getElementById("display").value;
            // Use PHP to handle the calculation
            fetch("calculator.php", {
                method: "POST",
                body: new URLSearchParams("expression=" + displayValue),
            })
            .then(response => response.text())
            .then(result => {
                document.getElementById("display").value = result;
            });
        }

        function clearDisplay() {
            document.getElementById("display").value = "";
        }
    </script>
</body>
</html>

