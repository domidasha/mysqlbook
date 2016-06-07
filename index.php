<?php

class textToSmallException extends Exception {
	function ___toString() {
		return 'fileOpenException '.$this->getCode()
		.':'.$this->getMessage()."<br>"."in".$this->getFile().', line:'.$this->getLine().
		'<br>';
	}
}

require_once 'functions.php';
//simple sort
$ani = array ('Mouse', 'Lama', 'House', 'Bird');
sort ($ani);
print_r($ani);


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


$fNum = 0.005;
$sNum = 0.045;

printf("Summa: %.2f (with delivery: %.2f)",
		$fNum, $sNum);
$smallText = "this is a fairytail about  alice";
echo ucwords($smallText);

$newText = "yourlittlebee@xxx.ua";
$newText1 = addslashes($newText);
echo stripcslashes($newText1);

$email_array = explode('@', $newText);
echo '<br>'.$email_array[1];
$bigLetters = 'YOU WILL NEVER WALK ALONE';
echo strtolower($bigLetters);

$newAni = implode(" : ", $ani);
echo "\n".$newAni;

echo substr($bigLetters, -16);

$anotherBigLetters = "So Create";
echo strcmp( $anotherBigLetters, $bigLetters);
echo "\n ssthe number of symbols in 'SO CREATE' = ".strlen( $anotherBigLetters);

if (strstr($anotherBigLetters, 'create')) {
	echo "create is there";
} else {
	echo "create is not there";
}

echo "<hr>";
$alice = 'It\'s no use going back to yesterday, because I was a different person then';
echo strpos($alice, 'i', 3);

$result = strpos($alice, "I");
if ($result === false) {
	echo "no I";
}
else {
	echo "\n\"I\" is there";
}

echo $alice.'<br>';
$yesterday = "yesterday";
$back = "back";
$tom = str_replace($yesterday,'tomorrow', $alice);
echo str_replace('back','forward', $tom);


$regular = "5aa";
if (eregi('^[a-z]', $regular)) {
	echo "vse ok";
} else {
	echo "ne ok";
}

?>

<html>
<head>

</head>

<body>
	<form action="index.php" method="post">
		<p>Name</p>
		<input name="name" type="text">
		<p>email</p>
		<input name="email" type="email">
		<p>Comment</p>
		<textarea name="feedback" type="textarea">
		</textarea>
		<br>
		
		<input type="submit" value="send"> 
		
	</form>
</body>

<?php 


	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$feedback = $_POST['feedback'];
		
		
		try {
			if ($name=="") {
				throw new textToSmallException();
			}
		}
		catch (textToSmallException $e){
			echo "mirmur";
		}
		
		//$name = trim($name);
				
		$todoadress = 'daria.stukal@gmail.com';
		$subject = 'обратная связь';
		$mailcontent = "one \tHello";
// 		$mailcontent = 'Name: '.$name."\n".
// 						"Email: ".$email."\n".
// 						"Comments: \n".$feedback."\n";
		$fromaddress = "From: webserver@example.com";
		
		if(eregi('dasha|alice|varvara', $email)) {
			echo "hello, girls!";
		}
		if (eregi('vova|denis|pinokio', $email)) {
			echo "hello, boys!";
		}
		else {
			echo "hello aliens!";
		}
		
		mail($todoadress, $subject, $mailcontent, $fromaddress);
		
		nl2br($mailcontent);
		print_r($mailcontent);
	}
	else {
		echo 'empty';
	}
	

?>

</html>















