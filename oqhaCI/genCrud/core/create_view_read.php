<?php 

$string = "
        <table class=\"table\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <tr><td>".label($row["column_name"])."</td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
}
$string .= "\n\t   ";
$string .= "\n\t</table>
       ";



$hasil_view_read = createFile($string, $target."views/" . $c_url . "/" . $v_read_file);

?>