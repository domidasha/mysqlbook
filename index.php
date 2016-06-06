<?php
//simple sort
$products = array ('Mouse', 'Lama', 'House', 'Bird');
sort ($products);
print_r($products);


$numbers = array('17', '71', '5', '11', 'pup', '2');
//sort($numbers, SORT_STRING);
sort($numbers, SORT_NUMERIC);
print_r($numbers);


//sort by values
$animals = array('cat'=>'Dusya', 'dog' => 'Bas', 'parrot' =>'Kesha');
asort($animals);
print_r($animals);


//sort multiply array
$products = array(array('RED', 'cat', 4),
					array ('BLACK', 'dog', 4),
					array('GOLD', 'fish', 0),
					array('WHITE', 'hen', 2)
);

function compare($x, $y) {
	if($x[0]==$y[0]){
		return 0;
	}
	if ($x[0]>$y[0]) {
		return 1;
	}
	if ($x[0]<$y[0]) {
		return -1;
	}
}

usort($products, 'compare');
print_r($products);


//suffle
$pictures = array('225px-Magritte_TheSonOfMan-214x300.jpg', 'image1.jpg',
		'The_Scream-236x300.jpg');
shuffle($pictures);

for ($i=0;$i<2;$i++) {
	echo  '<img src="';
	echo $pictures[$i];
	echo '" align = "center">';
}

//create array with RANGE()
foreach (range(11, 0, -1) as $num) {
	echo $num." \n";
}

$somearray = range(11, 0, -1);
print_r(array_reverse($somearray));

//working with files just open
/*$DOCUMENT_ROOT  = $_SERVER['DOCUMENT_ROOT'];
@ $fp = fopen('roads.txt', 'rb');

if (!$fp) {
	echo "Please, try later!";
	exit;
}

while (!feof($fp)) {
	$road = fgets($fp, 999);
	echo $road."<br />";
}
fclose($fp);*/

//get arrays from file
$roads = file('roads.txt');
$number_of_roads = count($roads);

if ($number_of_roads==0) {
	echo "No roads now. Please try later.";
}
	
for ($i=0; $i<$number_of_roads; $i++) {
	echo $roads[$i];
}

echo "<br> 1st element: ".current($somearray);
echo "<br> next element: ".next($somearray);

//array walk & sizeof & ARRAY_COUNT_VALUES
$drill = ['bottle', 'bolls'];
function my_print(&$value, $key, $addition) {
	echo $addition." ".$value." ";
}
array_walk($drill, 'my_print', "your");
echo "number of elements: ".sizeof($drill);

print_r(array_count_values($drill));

//array to scalar
$complexArray = array("green"=>'tree', "yellow"=>'sun', "grey"=>'wolf', "pink"=>'flamingo');
extract($complexArray);
print_r($complexArray);
echo $yellow;


$anotherComplexArray = array("stone"=>'grey', "grass"=>'green');
extract($anotherComplexArray, EXTR_PREFIX_ALL, 'this' );
echo " ".$this_grass." is her favourite color";
?>

<html>
<head>

</head>

<body>
	<form>
		<p>Name</p>
		<input name="name" type="text">
		<p>email</p>
		<input name="email" type="email">
		<p>Comment</p>
		<input name="feedback" type="textarea"><br>
		
		<input type="submit" value="send"> 
		
	</form>
</body>

<?php 
if (isset($_POST)) {
	echo $name;
}
else {
	echo 'empty';
}


?>

</html>















