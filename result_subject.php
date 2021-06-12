<?php
include("security.php");
?>
<html>
    <head>
        <style>
        table {
        width: 100%;
        border-collapse: collapse;
        }
        .grid th {
        height: 50px;
        }
        .grid th,td {
        border: 1px solid black;
        }
        .rotate {
        /* FF3.5+ */
        -moz-transform: rotate(-90.0deg);
        /* Opera 10.5 */
        -o-transform: rotate(-90.0deg);
        /* Saf3.1+, Chrome */
        -webkit-transform: rotate(-90.0deg);
        /* IE6,IE7 */
        filter: progid: DXImageTransform.Microsoft.BasicImage(rotation=0.083);
        /* IE8 */
        -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)";
        /* Standard */
        transform: rotate(-90.0deg);
        font-size: small;
        }
        </style>
    </head>
    <body>
        <center>
        <table>
            <thead>
                <tr>
                    <?php
                    $query = "SELECT * FROM institute ORDER BY institute_id DESC LIMIT 1";
                    $query_run = mysqli_query($connection,$query);
                    if(mysqli_num_rows($query_run)>0){
                    while ($row = mysqli_fetch_assoc($query_run)) {
                    echo "<th colspan ='5'>".$row['name']."</th>";
                    }
                    }else{
                    echo "<h2>NandKuvarBa Mahila Collage<h2>";
                    }
                    ?>
                    
                </tr>
                <tr>
                    <th colspan="5">
                        <?php
                        $department_id = $_POST["department"];
                        $query = "SELECT * FROM department WHERE id = '$department_id'";
                        $query_run = mysqli_query($connection,$query);
                        if(mysqli_num_rows($query_run)>0){
                        while ($row = mysqli_fetch_assoc($query_run)) {
                        echo $row['name'];
                        }
                        }
                    ?></th>
                </tr>
                <tr>
                    <th colspan="5"><?php
                        $semester = $_POST["semester"];
                    echo $semester ?> Semester</th>
                </tr>
                <tr>
                    <th colspan="5">Result Sheet of Final Exam March/2021</th>
                </tr>
                <tr>
                    <th colspan="5">
                        Subject:
                        <?php
                        $subject_id = $_POST["subject"];
                        $query = "SELECT * FROM subject WHERE subject_id = '$subject_id'";
                        $query_run = mysqli_query($connection,$query);
                        if(mysqli_num_rows($query_run)>0){
                        while ($row = mysqli_fetch_assoc($query_run)) {
                        echo $row['subject_name'];
                        }
                        }?>
                    </th>
                </tr>
            </thead>
        </table>
        </center>
        <table class="grid">
            <tr>
                <th colspan="2" rowspan="2">Id No</th>
                <th colspan="2" rowspan="2">Name</th>
                <th style="text-align: center" colspan="4"> <?php
                    $exam = $_POST["exam"];
                echo $exam?>(100)</th>
                <th rowspan="2">Grade</th>
            </tr>
            <tr>
                <td style="text-align:center">Written</td>
                <td style="text-align:center">Presentation</td>
                <td style="text-align:center">Lab/Practical</td>
                <td style="text-align:center">Total</td>
            </tr>
          
                <?php
                $query = "SELECT * FROM exam AS e INNER JOIN student AS s ON e.student_id = s.id WHERE e.department_id = '$department_id' AND e.semester = '$semester' AND e.exam ='$exam' AND e.subject_id = '$subject_id'";
                $query_run = mysqli_query($connection,$query);
                if(mysqli_num_rows($query_run)>0){
                while ($row = mysqli_fetch_assoc($query_run)) {
                 $written = $row['written'];
                 $presentation = $row['presentation'];
                 $practical = $row['practical'];
                 $total = $written + $presentation + $practical;
                 $grade = "F";
                 if($total>=90 AND $total<=100){
                   $grade = "A+";
                 }else if($total>=80 AND $total<=89){
                   $grade = "A";
                 }else if($total>=70 AND $total<=79){
                   $grade = "B+";
                 }else if($total>=60 AND $total<=69){
                   $grade = "B";
                 }else if($total>=55 AND $total<=59){
                   $grade = "C+";
                 }else if($total>=45 AND $total<=54){
                   $grade = "C";
                 }else if($total>=40 AND $total<=44){
                   $grade = "D";
                 } 
                 ?>
                <tr>
                <td colspan="2" style="text-align:center"><?php echo $row['student_id'] ?></td>
                <td colspan="2" style="text-align:center" ><?php echo $row['first_name']." ".$row['last_name']?></td>
                <td style="text-align:center"><?php echo $written ?></td>
                <td style="text-align:center"><?php echo $presentation ?></td>
                <td style="text-align:center"><?php echo $practical ?></td>
                <td style="text-align:center"><?php echo $total ?></td>
                <td style="text-align:center"><?php echo $grade ?></td>
                 </tr>
                <?php
                 }
                }?>
           
            
        </table>
    </body>
</html>