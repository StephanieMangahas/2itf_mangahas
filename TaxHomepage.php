<!DOCTYPE html>
<html>
  <head>
    <title>Tax Calculator - ICS2609</title>
    <link rel="stylesheet" type="text/css" href="calculator_css.css">
  </head>
  <body>
    <h1>Tax Calculator</h1>
    <form method="post">
      <label for="salary">Salary:</label>
      <input type="number" id="salary" name="salary" required><br><br>
      <label for="type">Type of Salary:</label>
      <select id="type" name="type" required>
        <option value="">Select Type</option>
        <option value="monthly">Monthly</option>
        <option value="bi-monthly">Bi-Monthly</option>
      </select>
      <br>
      <br>
      <button type="submit" name="calculate">Calculate</button>
    </form>
    
    <?php
    if(isset($_POST['calculate'])){
        $salary = $_POST['salary'];
        $type = $_POST['type'];

        $annualSalary = 0;
        if ($type === "monthly") {
          $annualSalary = $salary * 12;
        } else if ($type === "bi-monthly") {
          $annualSalary = $salary * 24;
        }

        $tax = 0;
        if ($annualSalary < 250000) {
          $tax = 0;
        } else if ($annualSalary > 250000 && $annualSalary < 400000) {
          $tax = ($annualSalary - 250000) * 0.20;
        } else if ($annualSalary > 400000 && $annualSalary < 800000) {
          $tax = 30000 + ($annualSalary - 400000) * 0.25;
        } else if ($annualSalary > 800000 && $annualSalary < 2000000) {
          $tax = 130000 + ($annualSalary - 800000) * 0.30;
        } else if ($annualSalary >= 2000000 && $annualSalary < 8000000) {
          $tax = 490000 + ($annualSalary - 2000000) * 0.32;
        } else if ($annualSalary >= 8000000) {
          $tax = 2410000 + ($annualSalary - 8000000) * 0.35;
        }

        $monthlyTax = $tax / 12;
        $annualTax = $monthlyTax * 12;
        echo "<div id='result'>";
        echo "<h2>Results</h2>";
        echo "<p>Estimated Annual Salary: PHP " . number_format($annualSalary, 2) . "</p>";
        echo "<p>Monthly Tax: PHP " . number_format($monthlyTax, 2) . "</p>";
        echo "<p>Annual Tax: PHP " . number_format($annualTax, 2) . "</p>";
        echo "</div>";
    }
    ?>
    
  </body>
</html>
