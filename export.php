<?php  
//export.php  
include 'config.php';
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM student_data order by 1 desc";
 $result = mysqli_query($con, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>id</th>  
                         <th>รหัสสมาชิก</th>  
                         <th>ชื่อ-สกุล</th>  
                         <th>พนักงาน</th>
                         <th>เพศ</th>  
                         <th>วันเดือนปีเกิด</th>
                         <th>Email:</th>  
                         <th>เบอร์โทร</th> 
                         <th>ที่อยู่</th> 
                         <th>วันที่เริ่มเข้าทำงาน:</th>

                    </tr>
  ';
  $i = 0;
  while($row = mysqli_fetch_array($result))
  {
    $sl = ++$i;
   $output .= '
    <tr>  
                         <td > '.$sl.' </td>
                         <td>'.$row["u_card"].'</td>  
                         <td>'.$row["u_f_name"]  .$row["u_l_name"].'</td>   
                         <td>'.$row["u_aadhar"].'</td>  
                         <td>'.$row["u_gender"].'</td> 
                         <td>'.$row["u_birthday"].'</td>  
                         <td>'.$row["u_email"].'</td>  
                         <td>'.$row["u_phone"].'</td> 
                         <td>'.$row["u_village"] .$row["u_police"] .$row["u_dist"] .$row["u_state"] .$row["u_pincode"].'</td>   
                        <td>'.$row["uploaded"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=admin&member_Data.xls');
  echo $output;
 }
}
?>