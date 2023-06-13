<!DOCTYPE html>
<html>
<head>
    <title>Show Results</title>
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
<h1>Show Results</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Source Currency</th>
        <th>Target Currency</th>
        <th>Amount</th>
        <th>Result</th>
    </tr>
    <?php foreach ($results as $result) : ?>
        <tr>
            <td><?php echo htmlspecialchars($result['id']); ?></td>
            <td><?php echo htmlspecialchars($result['source_currency']); ?></td>
            <td><?php echo htmlspecialchars($result['target_currency']); ?></td>
            <td><?php echo htmlspecialchars($result['amount']); ?></td>
            <td><?php echo htmlspecialchars($result['result']); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
