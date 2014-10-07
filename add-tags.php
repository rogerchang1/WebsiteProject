<?PHP

//$imageid = $_GET["imageid"];


$string = $_POST["tags"];

echo $string;

$array = preg_split('/[\ \n\,]+/',$string);
print_r($array);
 foreach($array as $row){
    echo $row."\r\n";
}
?>