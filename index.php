
<!DOCTYPE HTML>
<html>  
<body>

<?php
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
       if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
echo "<br>";
?>
</body>
</html>


<?php
echo "------------------------------------------------------------------------------------------------------------";
echo "------------------------------------------------------------------------------------------------------------<br><br>";
echo "Output Text with Echo <br>";
echo "Hello World !!! <br><br>";

echo "Output Text with Variable Declaration <br>";
$var= "We are happy <br><br>";
echo $var;

echo "Output Text with Function <br>"; 
function msg(){
 $var1= "We are SSB <br><br>";
echo "Message: ".$var1;   
}
msg();

echo "Output Text with global variable inside function <br>"; 
function msg1(){
global $var;
echo "Message: ".$var;   
}
msg1();


$x = 5;
$y = 10.5;
echo "Output data with variable <br>"; 
echo "x: " .$x;
echo "<br>";
echo "y: " .$y;
echo "<br> <br>";

echo "Output data with Array <br>"; 
$cars = array("Volvo","BMW","Toyota");
var_dump($cars);

class Car {
  function Car() {
    $this->model = "VW";
  }
}
// create an object
$herbie = new Car();

echo "<br> <br> Output data with Function <br>"; 
// show object properties
echo "Car Model: ".$herbie->model;
echo "<br> <br>";

define("cars", [
  "Alfa Romeo",
  "BMW",
  "Toyota"
]);
echo "Output specific data with Array index<br>"; 
echo "First Car in the Array: " .cars[0];
echo "<br> <br>";


$t = date("H");
echo "Output text with If  Else condition <br>"; 
if ($t < "10") {
  echo "Have a good morning!";
} elseif ($t < "20") {
  echo "Have a good day!";
} else {
  echo "Have a good night!";
}
echo "<br> <br>";

echo "Output text with function: <br>"; 
function familyName($fname, $year) {
  echo "$fname . Born in $year <br>";
}

familyName("Saif","1975");
familyName("Taznim","1978");
familyName("Zubayer","1983");
?>
