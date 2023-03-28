<!-- Electricity Bill -->
<h1>Electricity bill</h1>
<form action="#" method="get">
    <label>Enter units:</label>
    <input type="number" name="units"><br>
    <input type="submit" value="Calculate bill">
</form>
<?php
$units = $_GET['units'];
$bill = 0;
if ($units <= 0 && isset($units)) {
    echo "Enter valid units";
} else if ($units <= 50) {
    $bill = $units * 3.50;
} elseif ($units > 50 && $units <= 150) {
    $bill = 50 * 3.50 + ($units - 50) * 4;
} elseif ($units > 150 && $units <= 250) {
    $bill = 50 * 3.50 + 100 * 4 + ($units - 150) * 5.20;
} else {
    $bill = 50 * 3.50 + 100 * 4 + 100 * 5.20 + ($units - 250) * 6.50;
}
if ($units > 0) {
    echo "<br>" . "Your bill is Rs. " . $bill;
}
?>
<!-- Simple Calculator -->
<h1>Simple calculator</h1>
<form action="#" method="GET">
    <label>Number 1:</label>
    <input type="number" name="num1"><br>
    <label>Number 2:</label>
    <input type="number" name="num2"><br>
    <input type="submit" name="operator" value="+">
    <input type="submit" name="operator" value="-">
    <input type="submit" name="operator" value="*">
    <input type="submit" name="operator" value="/"><br>
</form>
<?php
$num1 = $_GET['num1'];
$num2 = $_GET['num2'];
$operator = $_GET['operator'];
$result = 0;
if (is_numeric($num1) && is_numeric($num2)) {
    switch ($operator) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = abs($num1 - $num2);
            break;
        case '*':
            $result = $num1 * $num2;
            break;
        case "/":
            $result = $num1 / $num2;
            break;
    }
} else if (isset($num1) || isset($num2)) {
    echo "Enter values in both the fields <br>";
}
?>
<input type='number' name='result' value='<?php echo $result; ?>'><br>
<!-- Area and Perimeter -->
<h1>Area and Perimeter</h1>
<form action="#" method="get">
    <label for="length">Length of Rectangle:</label>
    <input type="number" name="length"><br>
    <label for="breadth">Breadth of Rectangle:</label>
    <input type="number" name="breadth"><br>
    <input type="submit" value="Calculate Area & Perimeter" name="submit">
</form>
<?php
$length = $_GET['length'];
$breadth = $_GET['breadth'];
if ($length > 0 && $breadth > 0) {
    $area = $length * $breadth;
    $perimeter = 2 * $length + 2 * $breadth;
    echo "Area is " . $area . "Sq. mtr." . "<br>" . "Perimeter is " . $perimeter . "Sq. mtr.";
} else if (($length <= 0 || $breadth <= 0) && (isset($length) || isset($breadth))) {
    echo "Enter valid length and breadth";
}
?>
<!-- Conversion -->
<h1>Conversion</h1>
<form action="#" method="get">
    <input type="number" name="hours"><br>
    <label>Hours to Mins</label>
    <input type="radio" name="parameter" value="minutes" checked><br>
    <label>Hours to Seconds</label>
    <input type="radio" name="parameter" value="seconds"><br>
    <input type="submit" value="Convert">
</form>
<div>
    <?php
    $hours = $_GET['hours'];
    if (is_numeric($hours) && $hours > 0) {
        $parameter = $_GET['parameter'];
        $conversion = 0;
        $conversion = $parameter == 'minutes' ? $hours * 60 : $hours * 60 * 60;
        if ($parameter == 'minutes') {
            echo $hours . " hours = " . $conversion . " minutes";
        } else if ($parameter == "seconds") {
            echo $hours . " hours = " . $conversion . " seconds";
        }
    } else if ($hours <= 0 && isset($hours)) {
        echo "Enter hour greater than 0!";
    }
    ?>
</div>
<!-- Image upload -->
<h1>Image upload</h1>
<form enctype="multipart/form-data" action="#" method="POST">
    Send this file: <input name="userfile" type="file" /><br>
    <input type="submit" value="Submit" />
</form>
<?php
$uploaddir = './pictures/';
$uploadfile = $uploaddir . basename($_FILES["userfile"]["name"]);
$imageFileType = strtolower(pathinfo($uploadfile, PATHINFO_EXTENSION));
if ($_FILES["userfile"]["size"] > 200000) {
    echo "Sorry, your file is too large.";
} else if ($imageFileType != "png" && !isset($imageFileType)) {
    echo "Sorry, only PNG files are allowed.";
} else if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $uploadfile)) {
    echo "The file has been uploaded.";
} else {
    echo "Upload a file";
}
?>