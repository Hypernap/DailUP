<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="dailup";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$user_prof=array();
$users_dict = array();
$sql = "SELECT * from catogories";
// mysqli_query($conn, $sql);
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $ppl=array();
    $a=$row['id'];
    $sql2 = "SELECT * from worker_info where field_id=$a";
    $result2 = $conn->query($sql2);
    while($row2 = $result2->fetch_assoc()){
        array_push($ppl,array($row["id"],$row2["user_name"]));
        $user_prof[$row2["id"]]=array($row2["user_name"],$row2["age"],$row2["phone"],$row2["email"],$row2["about"],$row2["additional_info"],$row2["rating"],$row2["profile_pic"]);
    }
    $users_dict[$row["field"]]=$ppl;
  }
$users_dict2 = json_encode($users_dict);
$user_prof2 = json_encode($user_prof);
// Pass the JSON string to JavaScript
echo "<script>var prof_name = $users_dict2;var all_info=$user_prof2</script>";

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Home</title>
</head>
<body>
    <div class="main_container">
        <div class="side_nav_bar">
            <p class="side_nav_links" onclick="create()" >HOME</p>
        </div>
        <div class="side_container">
            <div class="upper_nav">
                <button id="upper_nav_btn_login" class="upper_nav_btns">LOGIN</button>
                <button id="upper_nav_btn_singup" class="upper_nav_btns">SIGN UP</button>
                <input type="search" class="search_bar" size="19" placeholder=" SEARCH" >
            </div>
            <div class="side_main_container">
                <div class="HEADING"><h2>CATOGORIES</h2></div>
                    <div class="main_card_details scrollbar" id="style-1">
                        <div class="card_container" id="main_card_info" >
                            <!-- <div class="main_cards_cata" id="cards">
                            </div> -->
                        </div>
                    </div>
               </div>
             </div>
       
         </div>

         <script src="apis.js"></script>

</body>

</html>