<?php 

$string = "<div class=\"content-wrapper\">
    <section class=\"content-header\">
      <h1>
        ".ucfirst($table_name)."
        <small><?php echo \$button ?>  ".ucfirst($table_name)."</small>
    </h1>
    <ol class=\"breadcrumb\">
        <li><a href=\"<?php echo base_url('admin/home') ?>\"><i class=\"fa fa-dashboard\"></i> Beranda</a></li>
        <li><a href=\"<?php echo base_url('admin/".$controller."') ?>\">".ucfirst($table_name)."</a></li>
        <li class=\"active\"><?php echo \$button ?> </li>
    </ol>
</section>
    <section class=\"content\">
        <div class=\"box box-primary \">
            <div class=\"box-header with-border\">
                <h3 class=\"box-title\"><?php echo \$button ?> Data ".  ucfirst($table_name)."</h3>
            </div>
            <form action=\"<?php echo \$action; ?>\" method=\"post\">
            
<table class='table table-bordered>'        
";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
    $string .= "\n\t    
        \r\n<tr>\r\n<td width='200'>".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></td>\r\n<td <?php echo (form_error('".$row["column_name"]."')) ? 'class=\"has-error\"' : \"\" ?> > <textarea class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea></td></tr>";
    }elseif($row["data_type"]=='email'){
        $string .= "\n\t    \r\n<tr>\r\n<td width='200'>".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></td>\r\n<td <?php echo (form_error('".$row["column_name"]."')) ? 'class=\"has-error\"' : \"\" ?>><input type=\"email\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" /></td></tr>";    
    }
    elseif($row["data_type"]=='date'){
        $string .= "\n\t    \r\n<tr>\r\n<td width='200'>".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></td>\r\n<td <?php echo (form_error('".$row["column_name"]."')) ? 'class=\"has-error\"' : \"\" ?>><input type=\"date\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" /></td></tr>";    
        } 
    else
    {
    $string .= "\n\t    \r\n<tr>\r\n<td width='200'>".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></td>\r\n<td <?php echo (form_error('".$row["column_name"]."')) ? 'class=\"has-error\"' : \"\" ?>><input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" /></td></tr>";
    }
}
$string .= "\n\t    \r\n<tr>\r\n<td></td>\r\n<td><input type=\"hidden\" name=\"".$pk."\" value=\"<?php echo $".$pk."; ?>\" /> ";
$string .= "\n\t    <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fa fa-floppy-o\"></i> <?php echo \$button ?></button> ";
$string .= "\n\t    <a href=\"<?php echo site_url('$argv[4]/$c_url') ?>\" class=\"btn btn-default\"><i class=\"fa fa-sign-out\"></i> Kembali</a></td></tr>";
$string .= "\n\t</table></form>        </div>
</section>
</div>";

$hasil_view_form = createFile($string, $target."views/" . $c_url . "/" . $v_form_file);

?>