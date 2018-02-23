<?php
require_once('../connection.php');
include('mpdf.php');

    
    $course = $_POST['f_course'];
    $section = $_POST['f_section'];

    if($_POST['f_course']=="")
    {
        $course = "%";
    }

    if($_POST['f_section']=="")
    {
        $section = "%";
    }
    echo $course." ".$section;
    ;


$html .= "
<html>
<head>
<style>
body {font-family: sans-serif;
    font-size: 10pt;
}
td.list { vertical-align: top; 
    border-left: 0.6mm solid #000000;
    border-right: 0.6mm solid #000000;
	align: center;
}
table.list thead td { background-color: #EEEEEE;
    text-align: center;
    border: 0.6mm solid #000000;
}
tr.lastrow {
    background-color: #FFFFFF;
    border: 0mm none #000000;
    border-bottom: 0.6mm solid #000000;
    border-left: 0.6mm solid #000000;
	border-right: 0.6mm solid #000000;
}

</style>
</head>
<body>

<!--mpdf
<htmlpagefooter name='myfooter'>
<div style='border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; '>
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>

<sethtmlpageheader name='myheader' value='on' show-this-page='1' />
<sethtmlpagefooter name='myfooter' value='on' />
mpdf-->
<div>
<table  width='100%' style='border-bottom: 0.6mm solid #000000;'>
    <thead>
        <tr>
            <td style='text-align:right; '> <img src='../img/ab_logo.png' width='80px'>      </td>
            <td style='text-align:center; '> 

                <h2>Philippine State College of Aeronautics</h2> 
                <h2>Institute of Computer Studies</h2>
            </td>
            <td style='text-align:left; '> <img src='../img/ics_desktop.png' width='70px'>   </td>
        </tr>
    </thead>
</table>
</div>
<div style='text-align:center;'><h3>Master List</h3></div><br>
<table class='items list' width='100%' style='font-size: 9pt; border-collapse: collapse;' cellpadding='8'>
                    <thead>
                        <tr>
                            <td class='list'>Student ID</td>
                            <td class='list'>Name</td>
                            <td class='list'>Course</td>
                            <td class='list'>Email Adress</td>
                            <td class='list'>Rendered Hours</td>
                            <td class='list'>Status</td>
                           
                        </tr>
                    </thead>
                    <tbody>
";
    if(isset($_POST)){
        $sql = "SELECT user_id, concat(firstname, ' ',IFNULL(middlename,' '),' ',lastname,' ',IFNULL(suffix,' ')) 
                as name, student_id, course, email from ojt_users where is_admin = 0 and course like '".$course."' and section like '".$section."' ";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc())
            {
                $sql1 = "SELECT sum(hours_rendered) as hour FROM ojt_hours_rendered WHERE stud_id = '".$row['student_id']."'";
                $result1 = $conn->query($sql1);
                echo $row['student_id'];

                $sql2 = "SELECT a.id, a.total_hours FROM ojt_total_hours a  INNER JOIN ojt_users b ON a.course = b.course WHERE b.student_id ='".$row['student_id']."' ";
                        $result2 = $conn->query($sql2);
                        $total = $result2->fetch_assoc()['total_hours'];

                while($row1 = $result1->fetch_assoc())
                {
                                  
                    if($row1['hour'] == 0)
                    {
                        $status = "Not Yet Started";
                    }
                    else
                    {
                        if($row1['hour'] == $total)
                        {
                            $status = "Completed";
                        }
                        else
                        {
                            $status = "Ongoing";
                        }
                    }
                    $data .="
                    <tbody>
                        <tr class='lastrow'>
                            <td class='list'>".$row['student_id']."</td>
                            <td class='list'>".$row['name']."</td>
                            <td class='list'>".$row['course']."</td>
                            <td class='list'>".$row['email']."</td>
                            <td class='list'>".$row1['hour']."</td>
                            <td class='list'>".$status."</td>
                        </tr>
                   
                    </tbody>";
                    
                }
            }
        } else {
            $data .= "No record found";
        }
    }

$close .= '                        
                    </tbody>
</table>
</body>
</html>';

$mpdf=new mPDF("en-GB-x","A4-L","","",10,10,10,10,6,3);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($data);
$mpdf->WriteHTML($close);
$mpdf->SetDisplayMode('fullpage');

$mpdf->Output();

?>