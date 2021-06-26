<?php
include("security.php");
?>
<html>
  <head>
    <style>
    html, body {
    width: 210mm;
    height: 297mm;
    /* to centre page on screen*/
    margin-left: auto;
    margin-right: auto;
    }
    @media  print {
    html, body {
    width: 210mm;
    height: 297mm;
    }
    }
    @media print {
    #printPageButton {
    display: none;
    }
    }
    table {
    width: 100%;
    }
    .grid th {
    height: 50px;
    }
    .grid{
    border-collapse: collapse;
    text-align: center;
    }
    .grid th, .grid td {
    border: 1px solid black;
    }
    .gradeSystem {
    border: 1px solid black;
    text-align: justify;
    padding-left: 5px;
    }
    .tb_info td{
    text-align: left;
    }
    h2{
    font-size: 1.8em;
    }
    h3{
    font-size: 1.5em;
    }
    .pull-right{
    text-align: right;
    }
    .text-center{
    text-align: center;
    }
    #footer
    {
    width:100%;
    height:50px;
    position:absolute;
    bottom:0;
    left:0;
    }
    .btnDiv {
    width: 100%;
    left: 0;
    bottom: 250px;
    position: absolute;
    }
    </style>
  </head>
  <body>
    <table>
      <tr>
        <!--  <td style="vertical-align:center;text-align:right;"><img src="/assets/images/logo.jpg" /></td> -->
        <td  colspan="4" style="text-align:center;vertical-align:center">
          <?php
          $query = "SELECT * FROM institute ORDER BY institute_id DESC LIMIT 1";
          $query_run = mysqli_query($connection,$query);
          if(mysqli_num_rows($query_run)>0){
          while ($row = mysqli_fetch_assoc($query_run)) {
          echo "<h2>".$row['name']."<h2>";
          }
          }else{
          echo "<h2>NandKuvarBa Mahila Collage<h2>";
          }
          ?>
          <h3>Student Fee Collection Report</h3>
        </td>
      </tr>
    </table>
    <hr>
    <table class="tb_info">
      <?php
      $student_id = $_POST["student"];
      $query = "SELECT * FROM student LEFT JOIN department ON student.department_id = department.id WHERE student.id = '$student_id'";
      $query_run = mysqli_query($connection,$query);
      if(mysqli_num_rows($query_run)>0){
      while ($row = mysqli_fetch_assoc($query_run)) {
      ?>
      <tr>
        <td><strong>Name Of Student:</strong></td>
        <td colspan="4"><?php echo $row['first_name']." ".$row['last_name'];?></td>
        <td><strong>Date of birth:</strong></td>
        <td colspan="4"><?php
          $date=date_create($row['bod']);
          echo date_format($date,"M d, Y");
        ?></td>
        <td><strong>Id No:</strong></td>
        <td colspan="4"><?php echo $row['student_id'];?></td>
      </tr>
      <tr>
        <td><strong>Department:</strong></td>
        <td colspan="4"><?php echo $row['name'];?></td>
        <td><strong>Father's name:</strong></td>
        <td colspan="4"><?php echo $row['father_name'];?></td>
        <td><strong>Mother's name:</strong></td>
        <td colspan="4"><?php echo $row['mother_name'];?></td>
      </tr>
      <?php
      }
      } else{
      echo "<p class='text-center font-weight-bold my-5'>No Record Found.</p>";
      }
      ?>
    </table>
    <hr>
    <!-- Fee List -->
    <div class="row">
      <div class="col-md-12">
        <?php
        $student_id = $_POST["student"];
        $query = "SELECT * FROM fees WHERE student_id = '$student_id'";
        $query_run = mysqli_query($connection,$query);
        $totalPayable = 0;
        $totalPaid = 0;
        $totalDue = 0;
        if(mysqli_num_rows($query_run)>0){
        ?>
        <table id="feeList" class="grid">
          <thead>
            <tr>
              <th>Bill No</th>
              <th>Payable Amount</th>
              <th>Paid Amount</th>
              <th>Due Amount</th>
              <th>Pay Date</th>
            </tr>
          </thead>
          <tbody>
            <?php
            
            while ($row = mysqli_fetch_assoc($query_run)) {
            $totalPayable = $totalPayable + $row['payableAmount'];
            $totalPaid = $totalPaid + $row['paidAmount'];
            $totalDue = $totalDue  + $row['dueAmount'];
            ?>
            <tr>
              <td><?php echo $row['fees_id'];?></td>
              <td><?php echo $row['payableAmount'];?></td>
              <td><?php echo $row['paidAmount'];?></td>
              <td><?php echo $row['dueAmount'];?></td>
              <td><?php
                $date=date_create($row['payDate']);
                echo date_format($date,"M d, Y");
              ?></td>
            </tr>
            <?php
            }
            } else{
            echo "<p class='text-center font-weight-bold my-5'>No Record Found.</p>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <tbody>
            <tr>
              <td></td>
              <td>Total Payable: <strong><i class="blue"><?php echo $totalPayable ?></i></strong></td>
              <td>Total Paid: <strong><i class="blue"><?php echo $totalPaid ?></i></strong></td>
              <td>Total Due: <strong><i class="blue"><?php echo $totalDue ?></i></strong></td>
              <td></td>
              <td>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <br><br><br><br><br>
    <!-- Office --->
    <table style="text-align:left">
      <tr>
        <th >Prepared by</th>
        <th>Checked & Verified by<br>Date:_________</th>
        <th>Principal </th>
      </tr>
      <tr>
        <td >_________________</td>
        <td >_______________________________</td>
        <td >_________________</td>
      </tr>
    </table>
    <div class="text-center btnDiv">
      <button id="printPageButton" onClick="window.print()">Print</button>
    </div>
  </body>
</html>