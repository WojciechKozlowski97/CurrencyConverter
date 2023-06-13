<!DOCTYPE html>
<html>
<head>
    <title>Currency List</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
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
</head>
<body>
<div class="navbar">
    <a href="../public/index.php?action=calculator">Currency Calculator</a>
    <a href="../public/index.php?action=showResults">Show Results</a>
    <a href="../public/index.php">Currency List</a>
</div>
<h1>Currency List</h1>
<table>
    <tr>
        <th>Currency</th>
        <th>Code</th>
        <th>Mid</th>
    </tr>
    <?php foreach ($currencies as $currency) : ?>
        <tr>
            <td><?php echo htmlspecialchars($currency['currency']); ?></td>
            <td><?php echo htmlspecialchars($currency['code']); ?></td>
            <td><?php echo htmlspecialchars($currency['mid']); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
