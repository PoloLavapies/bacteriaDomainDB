<html>
<head>
<link rel="stylesheet" type="text/css" href="common.css">
</head>

<body>
<?php
require("common.php");

$bacteriaID = $_GET["id"];
$sql = "SELECT * FROM bacteria{$bacteriaID} ORDER BY num DESC;";
$result = $mysqli->query($sql);
echo "<table>";
echo "<tr>";
echo "<th>domain ID</th>";
echo "<th>domain name</th>";
echo "<th>number</th>";
echo "</tr>";
while ($row = $result->fetch_assoc()) {
    $ID = $row["domain"];
    echo "<tr>";
    echo "<td>{$ID}</td>";
    $sql = "SELECT name FROM domain WHERE id = '{$ID}';";
    $name = $mysqli->query($sql);
    $name = $name->fetch_assoc();
    $name = $name["name"];
    echo "<td>{$name}</td>";
    $num = $row["num"];
    echo "<td>{$num}</td>";
    echo "</tr>";
}
// 結果セットを閉じる
echo "</table>";
$result->close();
?>
</body>
</html>