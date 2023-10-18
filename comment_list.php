<?php
$query = "SELECT * FROM tbl_comments WHERE ref_id = $id ORDER BY comment_time DESC";

$result = mysqli_query($conn, $query);

echo "<table id='example' class='display table table-bordered table-hover' cellspacing='0'>";

// หัวจ้อตาราง
echo "
<thead>
<tr align='center' class='danger'>

<th width='25%'>ชื่อ</th>
<th width='50%'>ความคิดเห็น</th>
<th width='10%'>ว/ด/ป</th>
</tr>
</thead>";
// <th width='5%'>รหัส</th>
while($row = mysqli_fetch_array($result)){
    echo "<tr>";
    // echo "<td align='center'>" .$row["com_id"].'.'."</td>";
    echo "<td>" .$row["name_com"]."</td>";
    echo "<td>" .$row["comment"]."</td>";
     echo "<td>" .date('d/m/Y H:i:s',strtotime ($row["comment_time"]))."</td>";
    echo "</tr>";
}
echo "</table>";
?>