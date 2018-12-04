<html>
<head>
<link rel="stylesheet" type="text/css" href="common.css">
</head>

<body>
<?php
require("common.php");

$id = $_GET["id"];
$sql = "SELECT * FROM {$id} ORDER BY num DESC;";
$result = $mysqli->query($sql);
$result_array = array();
while ($row = $result->fetch_assoc()) {
    array_push($result_array, $row);
}
$result->close();

// 属ごとの表示
echo "<table>";
echo "<tr>";
echo "<th>genus name</th>";
echo "<th>number</th>";
echo "</tr>";
$sql = "SELECT * FROM genus;";
$result = $mysqli->query($sql);
$genus_array = array();
while ($row = $result->fetch_assoc()) {
    $genus = $row["genus"];
    $genus_array[$genus] = 0;
}
$genus_names = array_keys($genus_array);

for ($i = 0; $i < count($result_array); $i++) {
    $row = $result_array[$i];
    $gakumei = $row["gakumei"];
    $pos = strpos($gakumei, " ");
    $genus = substr($gakumei, 0, $pos);
    if (in_array($genus, $genus_names)) {
        $genus_array[$genus] += 1;
    }
}
arsort($genus_array);
$genus_names = array_keys($genus_array);

for ($i = 0; $i < count($genus_names); $i++) {
    $genus_name = $genus_names[$i];
    $num = $genus_array[$genus_name];
    if ($num == 0) break;
    echo "<tr>";
    echo "<td>{$genus_name}</td>";
    echo "<td>{$num}</td>";
    echo "</tr>";
}
echo "</table><br>";

// 種ごとの表示
echo "<table>";
echo "<tr>";
echo "<th>bacteria name</th>";
echo "<th>number</th>";
echo "</tr>";
for ($i = 0; $i < count($result_array); $i++) {
    $row = $result_array[$i];
    $gakumei = $row["gakumei"];
    $num = $row["num"];
    echo "<tr>";
    echo "<td>{$gakumei}</td>";
    echo "<td>{$num}</td>";
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>
