<!DOCTYPE html>
<html>
<head>
    <title>Currency Calculator</title>
    <style>
        .navbar {
            overflow: hidden;
            background-color: #333;
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("form").on("submit", function(event){
                event.preventDefault();

                $.ajax({
                    url: '../public/index.php?action=handleConversion',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data){
                        $('#result').text(data);
                    },
                    error: function(){
                        alert('There was an error calculating the result');
                    }
                });
            });
        });
    </script>
</head>
<body>
<div class="navbar">
    <a href="../public/index.php?action=calculator">Currency Calculator</a>
    <a href="../public/index.php?action=showResults">Show Results</a>
    <a href="../public/index.php">Currency List</a>
</div>
<h1>Currency Calculator</h1>
<form>
    <label for="amount">Amount:</label>
    <input type="number" id="amount" name="amount" step="0.01" required>

    <label for="source_currency">From:</label>
    <select id="source_currency" name="source_currency" required>
        <option value="">Choose...</option>
        <?php foreach ($allCurrencies as $currency) { ?>
            <option value="<?php echo $currency['code']; ?>"><?php echo $currency['code']; ?></option>
        <?php } ?>
    </select>

    <label for="target_currency">To:</label>
    <select id="target_currency" name="target_currency" required>
        <option value="">Choose...</option>
        <?php foreach ($allCurrencies as $currency) { ?>
            <option value="<?php echo $currency['code']; ?>"><?php echo $currency['code']; ?></option>
        <?php } ?>
    </select>

    <button type="submit">Calculate</button>
</form>
<p id="result"></p>
</body>
</html>
