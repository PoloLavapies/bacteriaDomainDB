<?php
require("common.php");

$name = $_POST["name"];
$sql = "SELECT * FROM bacteria WHERE gakumei LIKE '%" . $name. "%';";
$result = $mysqli->query($sql);
echo "<tr>";
echo "<th>name</th>";
echo "<th>link</th>";
echo "</tr>";
while ($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $gakumei = $row["gakumei"];
    echo "<tr>";
    echo "<td>{$gakumei}</td>";
    echo "<td><a href='bacteriaDetail.php?id={$id}'>link</a></td>";
    echo "</tr>";
}
// 結果セットを閉じる
$result->close();
