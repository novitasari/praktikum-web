<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>PHPExcel Reader</title>

</head>
<body>
<?php

/** PHPExcel_IOFactory */
require_once '/Classes/PHPExcel.php';


$inputFileName = 'phpexcel.xls';
$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

echo "<table border=\"1\">";
foreach($sheetData as $baris){
    echo "<tr>";
    foreach($baris as $kolom){
        echo "<td>";
        echo $kolom;
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";

?>
<body>
</html>