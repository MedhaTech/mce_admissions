<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Converted Table Layout</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: white;
        }

        .container {
           
            margin: 0 auto;
        }

        table {
            margin: 20px 0;
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            width:12%;
            padding: 1px;
            text-align: center; /* Center-align text horizontally */
            vertical-align: middle; /* Center-align text vertically */
            
        }

     strong{
        font-size: 10px;
     }

        .photo {
            width: 52px; /* Adjust as needed */
            height: 52px; /* Adjust as needed */
            /* object-fit: cover; Ensure images cover the area */
        }
        .left-align {
            text-align: left; /* Left-align text */
            font-size: 10px;
        }
        .page-break {
            page-break-before: always; /* Forces a page break before this element */
            margin: 20px 0; /* Optional spacing around the page break */
        }
    </style>
</head>

<body>
   
    <?php 
$i=1;
foreach ($admissions as $admissions1) {
$admissionDetails = $this->admin_model->getDetails('admissions', $admissions1->id)->row();
$barcode = generate_barcode_with_text($admissionDetails->adm_no);
// $barcode = generate_barcode_with_text($admissionDetails->usn);
?>  
 <div class="container">
        <table>
       
            <tbody>
           
                <tr>
                    <td rowspan="5">
                        <img src="<?php echo base_url();?>assets/img/1.png" alt="Photo" class="photo">
                    </td>
                    <td colspan="3"  class="left-align"><strong>Malnad College of Engineering</strong></td>
                    <!-- <td rowspan="12"></td> -->
                    <td colspan="3"><strong>PERSONAL INFORMATION</strong></td>
                </tr>
                <tr>
                    <td colspan="3"  class="left-align">Hassan-573201 Karnataka India</td>
                    <td colspan="3"><strong>STUDENT</strong></td>
                </tr>
                <tr>
                    <td colspan="3"  class="left-align">Ph: 08172-245093 Fax: 08172-245683</td>
                    <td colspan="3"  class="left-align">Address: <?= $admissionDetails->present_address;?></td>
                </tr>
                <tr>
                    <td colspan="3"  class="left-align">Web: www.mcehassan.ac.in ,E-mail: principal@mcehassan.ac.in</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="3"  class="left-align"> </td>
                    <td colspan="3"  class="left-align"></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2" rowspan="3">
                        <img src="<?php echo base_url();?>assets/img/user1-128x128.jpg" alt="Photo" class="photo1">
                    </td>
                    <td colspan="3"  class="left-align"></td>
                </tr>
                <tr>
                    <td colspan="2"><strong><?= $admissionDetails->student_name;?></strong><br>
                    <strong><?= $this->admin_model->get_dept_by_id($admissionDetails->dept_id)["department_name"];?></strong></td>
                    <td class="left-align">Phone: <?= $admissionDetails->phone;?>   <br><br>Blood Group: <?= $admissionDetails->blood_group;?> </td>
                    <td class="left-align">Mobile: <?= $admissionDetails->mobile;?> <br><br>Email Id: <?= $admissionDetails->email;?></td>
                    <td class="left-align">Date of Birth: <?= $admissionDetails->date_of_birth;?></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="3"><strong>This Card is the property of</strong></td>
                </tr>
                <tr>
                <td ></td>
                    <td colspan="3" class="left-align">  <img src="data:image/png;base64,<?php echo $barcode; ?>" alt="Barcode"   class="photo1"/></td>
                    
                    
                    <td colspan="3" class="left-align">Malnad College of Engineering Hassan-573201 Karnataka India</td>
                </tr>
                <tr>
                
                    <td colspan="4" class="left-align"></td>
                   
                   
                    <td colspan="3"  class="left-align">Card Validity: Jan 2025 www.mcehassan.ac.in If found, please return to above address</td>
                </tr>

               
            </tbody>
        </table>
        </div>

<?php if($i%2==0){ echo "<div class='page-break'></div>";} $i++; }?>

   
</body>

</html>
