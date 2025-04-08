<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scientific Calculator</title>
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
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 320px;
        }

        #display {
            width: 90%;
            height: 40px;
            text-align: right;
            font-size: 1.5em;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-left: auto;
            margin-right: auto;
        }

        button {
            width: 50px;
            height: 50px;
            font-size: 1.2em;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
            border: 1px solid #ddd;
            background-color: #f4f4f4;
            transition: background-color 0.2s;
        }

        button:hover {
            background-color: #e0e0e0;
        }

        .row {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <input type="text" id="display" disabled/>
        <div class="buttons">
            <!-- Row 1 -->
            <div class="row">
                <button onclick="clearDisplay()">C</button>
                <button onclick="appendToDisplay('7')">7</button>
                <button onclick="appendToDisplay('8')">8</button>
                <button onclick="appendToDisplay('9')">9</button>
                <button onclick="appendToDisplay('/')">/</button>
            </div>
            <!-- Row 2 -->
            <div class="row">
                <button onclick="appendToDisplay('4')">4</button>
                <button onclick="appendToDisplay('5')">5</button>
                <button onclick="appendToDisplay('6')">6</button>
                <button onclick="appendToDisplay('*')">*</button>
                <button onclick="appendToDisplay('sqrt(')">√</button>
            </div>
            <!-- Row 3 -->
            <div class="row">
                <button onclick="appendToDisplay('1')">1</button>
                <button onclick="appendToDisplay('2')">2</button>
                <button onclick="appendToDisplay('3')">3</button>
                <button onclick="appendToDisplay('-')">-</button>
                <button onclick="appendToDisplay('(')">(</button>
            </div>
            <!-- Row 4 -->
            <div class="row">
                <button onclick="appendToDisplay('0')">0</button>
                <button onclick="appendToDisplay('.')">.</button>
                <button onclick="calculateResult()">=</button>
                <button onclick="appendToDisplay('+')">+</button>
                <button onclick="appendToDisplay(')')">)</button>
            </div>
            <!-- Row 5 (Scientific) -->
            <div class="row">
                <button onclick="appendToDisplay('sin(')">sin</button>
                <button onclick="appendToDisplay('cos(')">cos</button>
                <button onclick="appendToDisplay('tan(')">tan</button>
                <button onclick="appendToDisplay('Math.PI')">π</button>
                <button onclick="appendToDisplay('Math.E')">e</button>
            </div>
            <!-- Row 6 (Scientific) -->
            <div class="row">
                <button onclick="appendToDisplay('Math.pow(')">x^y</button>
                <button onclick="appendToDisplay('Math.log10(')">log</button>
                <button onclick="appendToDisplay('Math.log(')">ln</button>
                <button onclick="appendToDisplay('Math.exp(')">exp</button>
            </div>
        </div>
    </div>

    <script>
        let display = document.getElementById("display");

        function appendToDisplay(value) {
            display.value += value;
        }

        function clearDisplay() {
            display.value = '';
        }

        function calculateResult() {
            try {
                // Evaluate the expression and replace "Math.pow" etc., with their actual math functions.
                display.value = eval(display.value);
            } catch (e) {
                display.value = 'Error';
            }
        }
    </script>
</body>
</html>
