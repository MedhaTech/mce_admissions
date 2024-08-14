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
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 1px;
            text-align: center; /* Center-align text horizontally */
            vertical-align: middle; /* Center-align text vertically */
            width: 10%;
        }

     

        .photo {
            width: 52px; /* Adjust as needed */
            height: 52px; /* Adjust as needed */
            /* object-fit: cover; Ensure images cover the area */
        }
        .left-align {
            text-align: left; /* Left-align text */
            font-size: 9px;
        }
    </style>
</head>

<body>
    <div class="container">
<?php 


$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $admissions1->id)->row();
?>


        <table>
            <tbody>
                <tr>
                    <td rowspan="4">
                        <img src="<?php echo base_url();?>assets/img/1.png" alt="Photo" class="photo">
                    </td>
                    <td colspan="4"  class="left-align"><strong>Malnad College of Engineering</strong></td>
                    <td rowspan="12"></td>
                    <td colspan="3"><strong>PERSONAL INFORMATION</strong></td>
                </tr>
                <tr>
                    <td colspan="4"  class="left-align">Hassan-573201 Karnataka India</td>
                    <td colspan="3"><strong>STUDENT</strong></td>
                </tr>
                <tr>
                    <td colspan="4"  class="left-align">Ph: 08172-245093 Fax: 08172-245683</td>
                    <td colspan="3"  class="left-align">Address: HARSHITHA H A D/O ANNEGOWDA H N HALEKOTE HOBLI HOLENARASIPURA TALUK HASSAN DIST</td>
                </tr>
                <tr>
                    <td colspan="4"  class="left-align">Web: www.mcehassan.ac.in E-mail: principal@mcehassan.ac.in</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td colspan="3"  class="left-align">Phone: 0 Mobile: 9113805171 Date of Birth: 31-01-200</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td colspan="2" rowspan="3">
                        <img src="path/to/photo2.jpg" alt="Photo" class="photo">
                    </td>
                    <td colspan="3"  class="left-align">Blood Group: AB +ve Email Id: harshuaneegowda@gmail.com</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="3"><strong>HARSHITHA H A</strong></td>
                    
                    <td colspan="2"></td>
                    <td colspan="3"><strong>This Card is the property of</strong></td>
                </tr>
                <tr>
                    <td colspan="3"><strong>Computer Science</strong></td>
                   
                    <td colspan="2"></td>
                    <td colspan="3"  class="left-align">Malnad College of Engineering Hassan-573201 Karnataka India</td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    
                    <td colspan="3"  class="left-align">Card Validity: Jan 2025 www.mcehassan.ac.in If found, please return to above address</td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                   
                    <td colspan="3"></td>
                </tr>
            </tbody>
        </table>


        <?php   ?>
    </div>
</body>

</html>
