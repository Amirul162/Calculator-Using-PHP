<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: #f4f4f4;
        }
        .calculator {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }
        .calculator h1 {
            text-align: center;
            color: #333;
        }
        .calculator input,
        .calculator select,
        .calculator button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .calculator button {
            background: #4caf50;
            color: #ffffff;
            font-weight: bold;
            cursor: pointer;
            border: none;
        }
        .calculator button:hover {
            background: #45a049;
        }
        .result {
            text-align: center;
            font-size: 20px;
            color: #333;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h1>Calculator</h1>
        <form method="post" action="">
            <input type="number" name="num1" placeholder="Enter first number" required>
            <select name="operation" required>
                <option value="">Select Operation</option>
                <option value="add">Addition (+)</option>
                <option value="subtract">Subtraction (-)</option>
                <option value="multiply">Multiplication (*)</option>
                <option value="divide">Division (/)</option>
            </select>
            <input type="number" name="num2" placeholder="Enter second number" required>
            <button type="submit">Calculate</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operation = $_POST['operation'];
            $result = null;

            if (is_numeric($num1) && is_numeric($num2)) {
                switch ($operation) {
                    case "add":
                        $result = $num1 + $num2;
                        break;
                    case "subtract":
                        $result = $num1 - $num2;
                        break;
                    case "multiply":
                        $result = $num1 * $num2;
                        break;
                    case "divide":
                        if ($num2 != 0) {
                            $result = $num1 / $num2;
                        } else {
                            $result = "Error: Division by zero!";
                        }
                        break;
                    default:
                        $result = "Invalid operation selected!";
                }

                echo "<div class='result'>Result: $result</div>";
            } else {
                echo "<div class='result'>Please enter valid numbers!</div>";
            }
        }
        ?>
    </div>
</body>
</html>
