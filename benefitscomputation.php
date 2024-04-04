<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Problem #2 - Benefits Computation</title>
  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Reddit+Mono:wght@200..900&display=swap" rel="stylesheet">
  <!-- styles -->
  <style>
    body {
      background-image: url('https://i.redd.it/n6fd1y3tbmb51.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;

      display: flex;
      justify-content: space-evenly;
      align-items: center;
      font-family: "Poppins", sans-serif;
      box-sizing: border-box;
      padding: 0;
    }

    .container {
      /* From https://css.glass */
      background: rgba(255, 255, 255, 0.70);
      border-radius: 16px;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(5.8px);
      -webkit-backdrop-filter: blur(5.8px);
      box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
      display: flex;
      width: 500px;
      padding: 0 15px 15px 15px;
      justify-content: start;
      flex-direction: column;
      align-items: center;
    }

    label {
      font-size: medium;
      font-weight: 500;
      margin-top: 10px;
      margin-bottom: 10px;
    }

    form {
      display: flex;
      width: 100%;
      flex-direction: column;
    }

    select,
    input,
    option {
      font-family: inherit;
      padding: 10px;
      border: 1px solid black;
    }

    input[type="submit"] {
      width: 50%;
      margin: 10px auto auto auto;
      border-radius: 5px;
      background-color: green;
      font-size: large;
      color: white;
      border: none;
    }

    .note {
      margin: 0;
      padding: 0;
      font-size: smaller;
    }

    /* result container */
    .result-container {
      border-top-right-radius: 10px;
      border-top-left-radius: 10px;
      background: rgba(255, 255, 255, 0.80);
      border-radius: 16px;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(5.8px);
      -webkit-backdrop-filter: blur(5.8px);
      box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
    }

    .result-container-wrapper {
      width: 100%;
      box-sizing: border-box;
      z-index: 0;
      display: grid;
      grid-template-columns: 220px 200px 200px;
    }

    .result-title {
      text-align: center;
    }

    .grid-div {
      text-align: center;

    }

    .grid-title {
      font-weight: 500;
      font-size: large;
      text-align: center;
    }

    .deduction-text {
      text-align: start;
      padding-left: 10px;
    }

    .benefits-text {
      text-align: start;


      padding: 10px 0 10px 30px;
    }

    .benefits-text-annual {
      text-align: start;

      padding: 10px 0 10px 60px;
    }

    /* adding border */
    .benefits-text,
    .grid-title,
    .benefits-text-annual {
      border-top: 1px solid black;
      border-right: 1px solid black;
      border-bottom: 1px solid black;
    }
  </style>
</head>

<body>
  <!-- Problem 2 - Benefits Computation -->
  <!-- 
    =========================================
    Machine Problem # 2
    Project Name: JHM Co. Employee Benefits Program<
    Project Description: Calculate benefits base on gross pay and age
    Programmer: John Adrian D. Bonto
    Language: Php
    Date Created: April 3, 2024
    Date Modified: April 4, 2024

    Section: 2-CS1
    Members : John Adrian D. Bonto
              Harley Dave Andal
              Mark Peneil Basi
    =========================================
  -->
  <div class="container">
    <h2>JHM Co. Employee Benefits Program</h2>
    <form action="benefitscomputation.php" method="get">

      <label>Gross Yearly Pay: </label>
      <input required type="number" name="grossPay">

      <label>Age: </label>
      <input required type="number" name="age">

      <!-- First benefits - health insurance -->
      <label>Health Insurance: </label>
      <select name="healthInsurance" required>
        <option value="A">Insurance coverage for self only for $1500.00 per year</option>
        <option value="B">Coverage for self and family for $2750.00 per year.</option>
      </select>

      <!-- Second benefits - disability insurance -->
      <label>Disability Insurance: </label>
      <select name="disabilityInsurance" required>
        <option value="A">No coverage at no cost</option>
        <option value="B">Coverage which costs 1.2% of annual gross pay</option>
      </select>

      <!-- Third benefits - life insurance -->
      <label>Life Insurance: </label>
      <select name="lifeInsurance" required>
        <option value="A">No coverage at no cost</option>
        <option value="B">Coverage by specifying the amount of coverage</option>
      </select>

      <label>Life Insurance Coverage Note:</label>
      <p class="note"><i>In increments
          of $10,000, so that an input value of 2 means $20,000. The
          cost per year for each $10,000 of life insurance coverage is
          $25.00 plus $0.95 for each year of the employee's age over 25.</i></p>

      <!-- Life insurance amount -->
      <label>Life Insurance Coverage Amount:</label>
      <input type="number" name="lifeInsuranceAmount">


      <input type="submit" value="Submit">

    </form>
  </div>
</body>

</html>
<?php
// get the value of gross pay and age
$grossPay = isset($_GET['grossPay']) ? $_GET['grossPay'] : '';
$age = isset($_GET['age']) ? $_GET['age'] : '';

// Display formatted gross pay - number format return a string
$grossPayFormatted = number_format(floatval($grossPay), 2);

// get the choices from the option
$healthInsuranceOption = isset($_GET['healthInsurance']) ? $_GET['healthInsurance'] : '';
$disabilityInsuranceOption = isset($_GET['disabilityInsurance']) ? $_GET['disabilityInsurance'] : '';
$lifeInsuranceOption = isset($_GET['lifeInsurance']) ? $_GET['lifeInsurance'] : '';

// get the value of insurance amount entered
$lifeInsuranceAmount = isset($_GET['lifeInsuranceAmount']) ? $_GET['lifeInsuranceAmount'] : '';

// Most of these function uses ternary operator for clean and efficient code

function healthInsurance($healthInsuranceOption)
{
  // if the health insurance option is A return $ 1500 if B return $ 2750 
  return $healthInsuranceOption === "A" ? 1500.00 : 2750.00;
}

function disabilityInsurance($disabilityInsuranceOption, $grossPay)
{
  // convert the gross pay from string into numeric value (float)
  $grossPay = floatval($grossPay);
  // if disability insurance option is A return nothing , if B multiply gross pay by 1.2% for the disability insurance
  return $disabilityInsuranceOption === "A" ? 0 : $grossPay * 0.012;
}

function lifeInsurance($lifeInsuranceOption, $lifeInsuranceAmount, $age)
{
  // if user choose option "A" and then input a life insurance, it will redirect to else block
  if ($lifeInsuranceOption === "B") {
    // Define the base cost per unit of coverage, which is $25.00 
    $baseCostPerUnit = 25.00;
    // Calculate the base cost by multiplying the specified coverage amount by the base cost per unit
    $baseCost = $lifeInsuranceAmount * $baseCostPerUnit;
    // Calculate the additional cost based on the employee's age
    // if age is <= 25 theres no additional cost, otherwise add $0.95 per year
    $ageCost = max(0, ($age - 25) * 0.95);
    // Calculate the total cost by adding the base cost and the additional age cost
    $totalCost = $baseCost + $ageCost;
    // return total cost to get the calculated value
    return $totalCost;
  } else {
    return 0;
  }
}

function calculateTax($grossPay)
{
  // convert the gross pay from string to float
  $grossPay = floatval($grossPay);
  // if the gross pay is less than or equal to $42,000 the tax is only 18%, else it will be 28%
  $taxRate = $grossPay <= 42000 ? 0.18 : 0.28;
  $taxAmount = $grossPay * $taxRate;
  // return the computed values
  return $taxAmount;
}

function calculateRetirement($grossPay)
{
  // convert the gross pay from string to float 
  $grossPay = floatval($grossPay);
  // return the computed retirement plan (5.5%)
  return $grossPay * 0.055;
}

function calculateTotalDeduction($grossPay, $healthInsuranceOption, $disabilityInsuranceOption, $lifeInsuranceOption, $lifeInsuranceAmount, $age)
{
  // get the values of each function and calculate the total deduction
  $healthInsurance = healthInsurance($healthInsuranceOption);
  $disabilityInsurance = disabilityInsurance($disabilityInsuranceOption, $grossPay);
  $lifeInsurance = lifeInsurance($lifeInsuranceOption, $lifeInsuranceAmount, $age);
  $taxes = calculateTax($grossPay);
  $retirement = calculateRetirement($grossPay);
  // adding all the benefits and assign the total to the total deduction variable
  $totalDeductions = $healthInsurance + $disabilityInsurance + $lifeInsurance + $taxes + $retirement;
  // return the computed value
  return $totalDeductions;
}

function calculateNetPay($grossPay, $healthInsuranceOption, $disabilityInsuranceOption, $lifeInsuranceOption, $lifeInsuranceAmount, $age)
{
  // get the values of each function and calculate the total deduction
  $healthInsurance = floatval(healthInsurance($healthInsuranceOption));
  $disabilityInsurance = floatval(disabilityInsurance($disabilityInsuranceOption, $grossPay));
  $lifeInsurance = floatval(lifeInsurance($lifeInsuranceOption, $lifeInsuranceAmount, $age));
  $taxes = floatval(calculateTax($grossPay));
  $retirement = floatval(calculateRetirement($grossPay));

  // adding all the benefits and assign the total to the total deduction variable
  $totalDeductions = $healthInsurance + $disabilityInsurance + $lifeInsurance + $taxes + $retirement;
  // converting gross pay from string to float
  $grossPay = floatval($grossPay);
  // getting the net pay by subtracting the gross pay and the total deduction
  $netPay = $grossPay - $totalDeductions;
  // return the computed value
  return $netPay;
}

// making html to put the computed values above
echo "<div class=\"result-container\">";
echo "<h3 class=\"result-title\">JHM Co. Employee Benefits Program Result</h3>";
echo "<div class=\"result-container-wrapper\">";

// first column - Deduction
echo "<div class=\"grid-div\"> 
  <div class=\"grid-title deduction-text\">Deduction</div>

  <div class=\"benefits-text\">Health Insurance: </div>

  <div class=\"benefits-text\">Disability Insurance: </div>

  <div class=\"benefits-text\">Life Insurance: </div>
  <br> <br>
  <div class=\"benefits-text\">Taxes: </div>
  <div class=\"benefits-text\">Retirement: </div>
  <br> <br>
  <div class=\"benefits-text\">Gross Pay: </div>
  <div class=\"benefits-text\">Total Deduction: </div>
  <br> <br>
  <div class=\"benefits-text\">Net Pay: </div>

  </div>";

// second column - Annual
// using the number_format() function to display 2 decimal 
echo "<div class=\"grid-div\"><div class=\"grid-title\">Annual</div>

  <div class=\"benefits-text-annual\"> $ " . number_format(healthInsurance($healthInsuranceOption), 2) . "</div>
  <div class=\"benefits-text-annual\"> $ " . number_format(floatval(disabilityInsurance($disabilityInsuranceOption, $grossPay)), 2) . "</div>
  <div class=\"benefits-text-annual\"> $ " . number_format(lifeInsurance($lifeInsuranceOption, $lifeInsuranceAmount, $age), 2) . "</div>
  <br><br>
  <div class=\"benefits-text-annual\"> $ " . number_format(calculateTax($grossPay), 2) . "</div>
  <div class=\"benefits-text-annual\"> $ " . number_format(calculateRetirement($grossPay), 2) . "</div>
  <br><br>
  <div class=\"benefits-text-annual\"> $ " . $grossPayFormatted . "</div>
  <div class=\"benefits-text-annual\"> $ " . number_format(calculateTotalDeduction($grossPay, $healthInsuranceOption, $disabilityInsuranceOption, $lifeInsuranceOption, $lifeInsuranceAmount, $age), 2) . "</div>
  <br><br>
  <div class=\"benefits-text-annual\"> $ " . number_format(calculateNetPay($grossPay, $healthInsuranceOption, $disabilityInsuranceOption, $lifeInsuranceOption, $lifeInsuranceAmount, $age, 2), 2) . "</div>

  </div>";

// third column - Monthly
// using the number_format() function to display 2 decimal 
// getting the monthly result by dividing the computed values in function by 12 
echo "<div class=\"grid-div\">
  <div class=\"grid-title\">Monthly</div>

  <div class=\"benefits-text-annual\"> $ " . number_format(healthInsurance($healthInsuranceOption) / 12, 2) . "</div>
  <div class=\"benefits-text-annual\"> $ " . number_format(disabilityInsurance($disabilityInsuranceOption, $grossPay) / 12, 2) . "</div>
  <div class=\"benefits-text-annual\"> $ " . number_format(lifeInsurance($lifeInsuranceOption, $lifeInsuranceAmount, $age) / 12, 2) . "</div>
  <br><br>
  <div class=\"benefits-text-annual\"> $ " . number_format(calculateTax($grossPay) / 12, 2) . "</div>
  <div class=\"benefits-text-annual\"> $ " . number_format(calculateRetirement($grossPay) / 12, 2) . "</div>
  <br><br>
  <div class=\"benefits-text-annual\"> $ " . number_format(floatval($grossPay) / 12, 2) . "</div>
  <div class=\"benefits-text-annual\"> $ " . number_format(calculateTotalDeduction($grossPay, $healthInsuranceOption, $disabilityInsuranceOption, $lifeInsuranceOption, $lifeInsuranceAmount, $age) / 12, 2) . "</div>
  <br><br>
  <div class=\"benefits-text-annual\"> $ " . number_format(calculateNetPay($grossPay, $healthInsuranceOption, $disabilityInsuranceOption, $lifeInsuranceOption, $lifeInsuranceAmount, $age) / 12, 2) . "</div>
  </div>";
echo "</div>";
echo "</div>";
?>
<!-- end of code -->