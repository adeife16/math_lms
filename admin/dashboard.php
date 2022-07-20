<?php
	session_start();
	$title = 'Dashboard';
	require_once 'header.php';
	if(!isset($_SESSION['email']) || $_SESSION['email'] == "")
	{
		header('location: index.php');
	}
?>
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row" id="numbers">

	</div>
	<div class="row justify-content-center">
		<div class="col-xl-6 col-md-6">
			<div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Activity Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas id="activity-chart" width="611" height="320" style="display: block; width: 611px; height: 320px;" class="chartjs-render-monitor">
                        	
                        </canvas>
                    </div>
                </div>
            </div>
		</div>
		<div class="col-xl-6 col-md-6">
			 <div class="card shadow mb-4">
	            <div class="card-header py-3">
	                <h6 class="m-0 font-weight-bold text-primary">Activity Table</h6>
	            </div>
	            <div class="card-body">
	                <div class="table-responsive">
	                	 <table class="table" id="dataTable" width="100%" cellspacing="0">
	                        <thead>
	        	                <tr>
	        	                	<th> S/N</th>
	        	                	<th>Activity</th>
	        	                	<th>Date</th>
	        	                </tr>
	        	            </thead>
	        	            <tbody id="activity-table">
	        	            	
	        	            </tbody>
	        	        </table>
	                </div>
	            </div>
	        </div>
	</div>
<?php 
	require_once 'footer.php';
?>