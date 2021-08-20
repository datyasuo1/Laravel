<?php
$myDB = new mysqli('localhost', 'root', '', 'librarys');
if ($myDB->connect_error)
{
    die('Connect Error (' . $myDB->connect_error . ') '
        . $myDB->connect_error);
}
$sql = "SELECT * FROM books";
$result = $myDB->query($sql);
?>

<table cellspacing="3" cellpadding="20" align="center" border="8">
    <tr>
        <td colspan="8">
            <h1 align="center">THU VIEN FPT-APTECH</h1>
        </td>
    </tr>
    <tr>
        <td align="center">BookId</td>
        <td align="center">AuthorId</td>
        <td align="center">Title</td>
        <td align="center">ISBN</td>
        <td align="center">Pub_Year</td>
        <td align="center">Available</td>
    </tr>

    <?php
    while ($row = $result->fetch_assoc() ) {
        echo "<tr>";
        echo "<td>";
        echo stripslashes($row["bookid"]);
        echo "</td><td align='center'>";
        echo $row["authorid"];
        echo "</td><td>";
        echo $row["title"];
        echo "</td><td>";
        echo $row["ISBN"];
        echo "</td><td>";
        echo $row["pub_year"];
        echo "</td><td>";
        echo $row["available"];
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>