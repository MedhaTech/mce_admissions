  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h4><?= $currentAcademicYear . ' ' . $page_title; ?></h4>
  				</div>
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="#">Home</a></li>
  						<li class="breadcrumb-item active"><?=  $page_title; ?></li>
  					</ol>
  				</div>
  			</div>
  		</div><!-- /.container-fluid -->
  	</section>

  	<!-- Main content -->
  	
      <div class="container-fluid">
<div class="row">
      <div class="col-lg-12 mb-4">
                  
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Fee Structure</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Course</th>
                        <th>Aided</th>
                        <th>UnAided</th>
                    </tr>
                    </thead>
                    <tbody>
                             
                            <?php $i=1;
                            foreach ($feeDetails as $key=>$val) {
                                
                                echo "<tr>";
                                echo "<td>".$i++.".</td>";
                                echo "<td>".$key."</td>";
                                if (array_key_exists('Aided',$val)){
                                    echo "<td>".anchor('admin/editFeeStructure/'.$val['Aided']['id'],number_format($val['Aided']['total_demand']),0)."</td>";
                                }else{
                                    echo "<td> -- </td>";
                                }
                                if (array_key_exists('UnAided',$val)){
                                    echo "<td>".anchor('admin/editFeeStructure/'.$val['UnAided']['id'],number_format($val['UnAided']['total_demand']),0)."</td>";
                                }else{
                                    echo "<td> -- </td>";
                                }
                                echo "</tr>";
                                
                                ?>
                        <!-- <tr>
                            <td>1</td>
                            <td><?php echo $fee->quota; ?></td>
                            <td><a href="<?php echo base_url('admin/viewfeesturcture/'); ?>"><?php echo $fee->total_demand; ?></a></td>
                            <td><a href="<?php echo base_url('admin/viewfeesturcture/'); ?>"><?php echo $fee->total_demand; ?></a></td>
                        </tr> -->
                            <?php } ?>
                        
               
                    
                </table>
            </div>
        </div>
      </div>
       
</div>
</div> </div>
      <!-- End of Main Content -->

  </div>