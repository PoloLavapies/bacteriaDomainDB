<?php
$mysqli = new mysqli('localhost', 'root', '', 'bacteria_domain');

$name = $_POST["name"];
$sql = "SELECT * FROM domain WHERE name LIKE '%" . $name. "%'";
$result = $mysqli->query($sql);
$output = "";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>name</th>";
echo "<th>link</th>";
echo "</tr>";
while ($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $name = $row["name"];
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$name}</td>";
    echo "<td><a href='bacteria.php?{$id}'>link</a></td>";
    echo "</tr>";
}
// 結果セットを閉じる
$result->close();
