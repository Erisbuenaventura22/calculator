<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Scientific Calculator</title>
  <style>
    /* Style for the entire page */
    body {
    font-family: 'Segoe UI', sans-serif;     /* Sets a clean sans-serif font */
    background: #2d2d2d;                     /* Dark gray background */
    color: #fff;                             /* White default text color */
    display: flex;                           /* Use flexbox for layout */
    justify-content: center;                /* Horizontally center the content */
    align-items: center;                    /* Vertically center the content */
    height: 100vh;                           /* Full viewport height */
    }

    /* Style for the calculator container */
    .calculator {
    background: #3c3c3c;                     /* Darker background for calculator */
    padding: 20px;                           /* Inner spacing around content */
    border-radius: 10px;                     /* Rounded corners */
    box-shadow: 0 0 15px rgba(0,0,0,0.5);     /* Subtle shadow for depth */
    width: 350px;                            /* Fixed width for calculator box */
    }

    /* Style for the display input field */
    input[type="text"] {
    width: 90%;                              /* Set input width slightly smaller than container */
    height: 50px;                            /* Fixed height */
    font-size: 24px;                         /* Large font for readability */
    text-align: right;                       /* Text aligned to the right like traditional calculators */
    padding: 10px;                           /* Inner padding */
    margin: 0 auto 10px;                     /* Center the input horizontally and add bottom margin */
    border: none;                            /* No border */
    border-radius: 5px;                      /* Rounded edges */
    background: #1e1e1e;                     /* Dark background for the display */
    color: #0f0;                             /* Green text color like classic calculators */
    display: block;                          /* Required for margin auto to work correctly */
    }

    /* Container for all calculator buttons */
    .buttons {
    display: grid;                           /* Use grid layout for buttons */
    grid-template-columns: repeat(5, 1fr);   /* Create 5 equal-width columns */
    gap: 10px;                               /* Space between buttons */
    }

    /* General button styling */
    button {
    padding: 20px;                           /* Size of buttons */
    font-size: 16px;                         /* Button text size */
    border: none;                            /* Remove default borders */
    border-radius: 5px;                      /* Rounded buttons */
    background: #555;                        /* Dark gray background */
    color: white;                            /* White text */
    cursor: pointer;                         /* Pointer cursor on hover */
    transition: background 0.3s;             /* Smooth background transition on hover */
    }

    /* Button hover effect */
    button:hover {
    background: #777;                        /* Lighten background color on hover */
    }

    /* Special styling for the "=" button */
    .equals {
    background: #0a0;                        /* Green background to stand out */
    }
  </style>
</head>
<body>

<!-- Main calculator container -->
<div class="calculator">

    <!-- Input field for displaying current expression or result -->
    <input type="text" id="display" readonly> <!-- readonly prevents user typing directly -->

    <!-- Button container -->
    <div class="buttons">

      <!-- First row -->
      <button onclick="clearDisplay()">C</button>         <!-- Clear the display -->
      <button onclick="backspace()">⌫</button>            <!-- Remove last character -->
      <button onclick="append('π')">π</button>            <!-- Append π (pi constant) -->
      <button onclick="append('e')">e</button>            <!-- Append e (Euler's number) -->
      <button onclick="append('/')">÷</button>            <!-- Append divide operator -->

      <!-- Second row -->
      <button onclick="append('7')">7</button>
      <button onclick="append('8')">8</button>
      <button onclick="append('9')">9</button>
      <button onclick="append('*')">×</button>            <!-- Append multiply operator -->
      <button onclick="append('**')">^</button>           <!-- Append power operator -->

      <!-- Third row -->
      <button onclick="append('4')">4</button>
      <button onclick="append('5')">5</button>
      <button onclick="append('6')">6</button>
      <button onclick="append('-')">−</button>            <!-- Append subtraction operator -->
      <button onclick="append('Math.sqrt(')">√</button>   <!-- Append square root function -->

      <!-- Fourth row -->
      <button onclick="append('1')">1</button>
      <button onclick="append('2')">2</button>
      <button onclick="append('3')">3</button>
      <button onclick="append('+')">+</button>            <!-- Append addition operator -->
      <button onclick="append('Math.log10(')">log</button> <!-- Append log base 10 function -->

      <!-- Fifth row -->
      <button onclick="append('0')">0</button>
      <button onclick="append('.')">.</button>            <!-- Append decimal point -->
      <button onclick="append('Math.sin(')">sin</button>  <!-- Append sine function -->
      <button onclick="append('Math.cos(')">cos</button>  <!-- Append cosine function -->
      <button onclick="append('Math.tan(')">tan</button>  <!-- Append tangent function -->

      <!-- Sixth row -->
      <button onclick="append('(')">(</button>            <!-- Open parenthesis -->
      <button onclick="append(')')">)</button>            <!-- Close parenthesis -->
      <button onclick="append('Math.log(')">ln</button>   <!-- Append natural log function -->
      <button class="equals" onclick="calculate()">=</button> <!-- Evaluate the expression -->

    </div>
  </div>

  <!-- JavaScript section -->
  <script>
    const display = document.getElementById('display'); // Selects the display input field

    // Function to add characters to the display
    function append(value) {
      if (value === 'π') value = Math.PI; // Convert π to Math.PI
      if (value === 'e') value = Math.E;  // Convert e to Math.E
      display.value += value;             // Append value to current display
    }

    // Function to clear the entire display
    function clearDisplay() {
      display.value = '';                 // Resets the display to empty
    }

    // Function to remove the last character
    function backspace() {
      display.value = display.value.slice(0, -1); // Removes last character from the string
    }

    // Function to evaluate the expression
    function calculate() {
      try {
        display.value = eval(display.value); // Evaluates the math expression using JavaScript
      } catch (e) {
        display.value = 'Error';             // Display error message if evaluation fails
      }
    }
  </script>

</body>
</html>
