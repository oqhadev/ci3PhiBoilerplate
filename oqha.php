<?php 

echo "  ___  __  ____     __    __   _  _   __  ____  __    __   __   
/ __)(  )( __ |   /  |  /  | / )( | / _|(_  _)/  |  /  | (  )  
( (__  )(  (__ (  (  O )(  O )) __ (/    | )( (  O )(  O )/ (_/|
|___)(__)(____/   |__/  |__|)|_)(_/|_/|_/(__) |__/  |__/ |____/\r\n\r\n";


switch ($argv[1]) {

	case 'seed':
error_reporting(0);

    require_once 'oqhaCI/faker/faker.php';


    break;
    case 'create:module':

	echo "Create Modul $argv[2]\r\n"; 

	$paths=explode("/",$argv[2]);
	$tempPath='application/modules';
	$lastPath='';
	foreach ($paths as $p) {
		$tempPath.="/$p";
		$lastPath=$p;
		createFolder($tempPath);
	}
	createFolder($tempPath."/controllers");
	createFolder($tempPath."/models");
	createFolder($tempPath."/views");
	createFilee($tempPath."/controllers/".ucfirst($lastPath).".php","foo");
	break;


	case 'create:crudDT':
// error_reporting(0);
	echo "Create Crud Datatables $argv[4]\r\n"; 

	$paths=explode("/",$argv[4]);
	$tempPath='application/modules';
	$lastPath='';
	foreach ($paths as $p) {
		$tempPath.="/$p";
		$lastPath=$p;
		createFolder($tempPath);
	}
	createFolder($tempPath."/controllers");
	createFolder($tempPath."/models");
	createFolder($tempPath."/views");
	# createFilee($tempPath."/controllers/".ucfirst($lastPath).".php","foo");

chdir("oqhaCI/genCrud/"); 
		require_once 'oqhaCI/genCrud/core/harviacode.php';
	require_once 'oqhaCI/genCrud/core/helper.php';
    $table_name = safe($argv[2]);
    $jenis_tabel = safe("datatables");
    $export_excel = safe(@$argv[5]);
    $export_word = safe(@$argv[6]);
    $export_pdf = safe(@$argv[7]);

    $controller = $argv[3];
    $model = $argv[3]."_model";
    $targetPath = "../../application/modules/$argv[4]/";

	// require_once 'core/process.php';

    if ($table_name <> '')
    {
        // set data
        $table_name = $table_name;
        $c = $controller <> '' ? ucfirst($controller) : ucfirst($table_name);
        $m = $model <> '' ? ucfirst($model) : ucfirst($table_name) . '_model';
        $v_list = $table_name . "_list";
        $v_read = $table_name . "_read";
        $v_form = $table_name . "_form";
        $v_doc = $table_name . "_doc";
        $v_pdf = $table_name . "_pdf";

        // url
        $c_url = strtolower($c);

        // filename
        $c_file = $c . '.php';
        $m_file = $m . '.php';
        $v_list_file = $v_list . '.php';
        $v_read_file = $v_read . '.php';
        $v_form_file = $v_form . '.php';
        $v_doc_file = $v_doc . '.php';
        $v_pdf_file = $v_pdf . '.php';

        // read setting
        // $get_setting = readJSON('core/settingjson.cfg');
        $target = $targetPath;

        if (!file_exists($target . "views/" . $c_url))
        {
            mkdir($target . "views/" . $c_url, 0777, true);
        }

        $pk = $hc->primary_field($table_name);
        $non_pk = $hc->not_primary_field($table_name);
        $all = $hc->all_field($table_name);

        // generate
        include 'core/create_config_pagination.php';
        include 'core/create_controller.php';
        include 'core/create_model.php';
        if ($jenis_tabel == 'reguler_table') {
            include 'core/create_view_list.php';
        } else {
            include 'core/create_view_list_datatables.php';
            include 'core/create_libraries_datatables.php';
        }
        include 'core/create_view_form.php';
        include 'core/create_view_read.php';

        $export_excel == 1 ? include 'core/create_exportexcel_helper.php' : '';
        $export_word == 1 ? include 'core/create_view_list_doc.php' : '';
        $export_pdf == 1 ? include 'core/create_pdf_library.php' : '';
        $export_pdf == 1 ? include 'core/create_view_list_pdf.php' : '';

        $hasil[] = $hasil_controller;
        $hasil[] = $hasil_model;
        $hasil[] = $hasil_view_list;
        $hasil[] = $hasil_view_form;
        $hasil[] = $hasil_view_pdf;
        $hasil[] = $hasil_config_pagination;
        $hasil[] = $hasil_exportexcel;
        $hasil[] = $hasil_pdf;
    } else
    {
        $hasil[] = 'No table selected.';
    }


	break;

	
	default:
	echo "Nani !!!!!!!!!!?????";
	break;
}

function createFolder($path)
{
	
	if (!file_exists($path)) {
		echo "Create Folder $path\r\n";
		mkdir($path);
	}
}
function createFilee($path,$text)
{
	if (!file_exists($path)) {
		echo "Create File $path\r\n";
		$my_file = $path;
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
	}
}