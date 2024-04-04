<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Problem #1 - Banking Application</title>
  <!-- google font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&amp;display=swap">
  <!-- styles -->
  <style>
    body {  
      background-image: url(https://4kwallpapers.com/images/wallpapers/night-city-city-6016x3384-9753.jpg);
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      display: flex;
      justify-content: space-around;
      font-family: "Montserrat", Arial, Helvetica, sans-serif;
      margin-top: 100px;
      min-height: 80vh;
      padding: 0;
    }

    .container {
      /* From https://css.glass */
      background: rgba(255, 255, 255, 0.70);
      border-radius: 16px;
      box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
      backdrop-filter: blur(4.8px);
      -webkit-backdrop-filter: blur(4.8px);
      display: flex;
      height: fit-content;
      padding: 0 15px 15px 15px;
      flex-direction: column;
      align-items: center;
    }

    form {
      display: grid;
      padding: 15px;
      grid-template-columns: 1fr 200px;
      grid-gap: 10px;
      align-items: center;
    }

    h2 {
      display: block;
      margin-bottom: 0;
    }

    input {
      border: 1px solid black;
    }

    input,
    label {
      border-radius: 3px;
      padding: 8px;
      margin-top: 10px;
      width: 100%;
    }

    .submit-btn-container {
      grid-column: span 2;
      text-align: center;
    }

    .submit-btn {
      border: none;
      padding: 10px 0;
      width: 200px;
      border-radius: 5px;
      cursor: pointer;
      font-size: inherit;
      color: white;
      background: #1ab01f;
    }

    .submit-btn:hover {
      background-color: #18c91e;
      transition: background-color .30s ease;
    }

    /* result section */
    .result-container h3 {
      text-align: center;
      margin: 0 0 5px 0;
    }

    .result-container {
      background: rgba(255, 255, 255, 0.80);
      border-radius: 16px;
      box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
      backdrop-filter: blur(4.8px);
      -webkit-backdrop-filter: blur(4.8px);
      padding-top: 10px;
      box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      border-radius: 10px;
      letter-spacing: 1px;
      height: fit-content;
      border: 1px solid black;
    }

    .result-container-wrapper {
      min-width: 400px;
      border-radius: 10px;
      display: grid;
      margin: 0;
      grid-template-columns: repeat(3, 1fr);
      box-sizing: border-box;
    }

    .result {
      border: 1px solid black;
      text-wrap: nowrap;
      padding: 10px;
      text-align: center;
      min-width: 100px;
    }

    .result-container-wrapper span {
      border: 1px solid black;
      text-align: center;
      font-size: large;
      padding: 5px;
      font-weight: 500;
    }
  </style>
</head>

<body>
  <!-- 
    ======================
    Machine Problem # 1
    Project Name - Banking Application
    Project Description - Calculate the Initial balance and interest annually
    Programmer - John Adrian D. Bonto
    Language - PHP
    Date Created - April 3,2024
    Date Modified - April 3,2024
    ======================
    Members : John Adrian D. Bonto
              Harley Dave Andal
              Mark Peneil Basi   
    ======================           
  -->
  <div class="container">
    <h2>Problem #1 - Banking Application</h2>
    <form action="savings.php" method="get">

      <!-- Initial balance -->
      <label>Initial Balance: </label>
      <input required type="number" name="initialBalance">

      <!-- Interest rate -->
      <label>Interest Rate: </label>
      <input required type="text" name="interest">

      <!-- Year deposited -->
      <label>Year Deposited: </label>
      <input required type="number" name="deposited">

      <!-- Year to be withdrawn -->
      <label>Year to be withdrawn: </label>
      <input required type="number" name="withdrawn">

      <div class="submit-btn-container">
        <input class="submit-btn" type="submit" value="Calculate">
      </div>
    </form>
  </div>

</body>

</html>

<?php
// create html elements tag
echo '<div class="result-container">';
echo '<h3>Banking Application - Result</h3>';
echo '<div class="result-container-wrapper">';
echo '<span>Year</span>';
echo '<span>Interest</span>';
echo '<span>Balance</span>';

// check if the form are filled out
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['initialBalance']) && isset($_GET['interest']) && isset($_GET['deposited']) && isset($_GET['withdrawn'])) {

  // initialize the variable and use GET method to get the value in the "name" attribute in the input element
  $initialBalance = $_GET['initialBalance'];
  $interestRate = $_GET['interest'];
  $yearDeposited = $_GET['deposited'];
  $yearWithdraw = $_GET['withdrawn'];

  // set initial balance to balance variable
  $balance = $initialBalance;


  // loop from initial year to final year
  for ($year = $yearDeposited; $year <= $yearWithdraw; $year++) {
    // if the year is the current year, theres 0 interest and the balance remain the same, because the interest is annually (every year)
    if ($year === $yearDeposited) {
      $interest = 0;
      $balance = $initialBalance;
    }
    // calculate the interest and balance if year is not equal to year deposited
    else {
      $interest = $balance * $interestRate;
      $balance += $interest;
    }

    // put the loop result in a html tag to display and format
    echo "<div class=\"result\">$year</div>";
    echo "<div class=\"result\">Php: " . number_format($interest) . "</div>";
    echo "<div class=\"result\">Php: " . number_format($balance) . "</div>";
  }

  // closing tag of html line 179 and 181
  echo '</div>';
  echo '</div>';
  // if the user did fill out, the codes above will not run
} else  return;
?>