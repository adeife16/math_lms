$(document).ready(function(){
	getDashboard();
})

// display number of students, courses, topics and instructors
function showNumbers(data){
	$("#numbers").html("");
	$("#numbers").html(`
		<div class="col-xl-3 col-md-6 mb-4">
	        <div class="card border-left-primary shadow h-100 py-2">
	            <div class="card-body">
	                <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                        	NUMBER OF STUDENTS
	                        </div>
	                        <div class="h5 mb-0 font-weight-bold text-gray-800">`+data.student+`</div>
	                    </div>
	                    <div class="col-auto">
	                        <i class="fas fa-user fa-2x text-gray-300"></i>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
		<div class="col-xl-3 col-md-6 mb-4">
	        <div class="card border-left-success shadow h-100 py-2">
	            <div class="card-body">
	                <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
	                            	NUMBER OF COURSES
	                            </div>
	                        <div class="h5 mb-0 font-weight-bold text-gray-800">`+data.course+`</div>
	                    </div>
	                    <div class="col-auto">
	                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
		<div class="col-xl-3 col-md-6 mb-4">
	        <div class="card border-left-info shadow h-100 py-2">
	            <div class="card-body">
	                <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
	                            	NUMBER OF TOPICS
	                            </div>
	                        <div class="h5 mb-0 font-weight-bold text-gray-800">`+data.topic+`</div>
	                    </div>
	                    <div class="col-auto">
	                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>

		<div class="col-xl-3 col-md-6 mb-4">
	        <div class="card border-left-warning shadow h-100 py-2">
	            <div class="card-body">
	                <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
	                            	NUMBER OF Instructors
	                            </div>
	                        <div class="h5 mb-0 font-weight-bold text-gray-800">`+data.instructor+`</div>
	                    </div>
	                    <div class="col-auto">
	                        <i class="fas fa-user fa-2x text-gray-300"></i>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>

	`);
}

// show chart
function showChart(dat1, dat2){

	var maxTick = 0;
	for(let i = 0; i<dat1.length; i++){
		if(dat1[i] > maxTick){
			maxTick = dat1[i];
		}
	}

	var ctx = document.getElementById("activity-chart");
	var myBarChart = new Chart(ctx, {
	  type: 'bar',
	  data: {
	    labels: dat2,
	    datasets: [{
	      label: "Activity",
	      backgroundColor: "#4e73df",
	      hoverBackgroundColor: "#2e59d9",
	      borderColor: "#4e73df",
	      data: dat1,
	    }],
	  },
	  options: {
	    maintainAspectRatio: false,
	    layout: {
	      padding: {
	        left: 10,
	        right: 25,
	        top: 25,
	        bottom: 0
	      }
	    },
	    scales: {
	      xAxes: [{
	        time: {
	          unit: 'day'
	        },
	        gridLines: {
	          display: true,
	          drawBorder: false
	        },
	        ticks: {
	          maxTicksLimit: 8
	        },
	        maxBarThickness: 25,
	      }],
	      yAxes: [{
	        ticks: {
	          min: 0,
	          max: maxTick,
	          maxTicksLimit: 10,
	          padding: 10,
	        },
	        gridLines: {
	          color: "rgb(234, 236, 244)",
	          zeroLineColor: "rgb(234, 236, 244)",
	          drawBorder: false,
	          borderDash: [2],
	          zeroLineBorderDash: [2]
	        }
	      }],
	    },
	    legend: {
	      display: false
	    },
	    tooltips: {
	      titleMarginBottom: 10,
	      titleFontColor: '#6e707e',
	      titleFontSize: 14,
	      backgroundColor: "rgb(255,255,255)",
	      bodyFontColor: "#858796",
	      borderColor: '#dddfeb',
	      borderWidth: 1,
	      xPadding: 15,
	      yPadding: 15,
	      displayColors: true,
	      caretPadding: 10,
	      callbacks: {
	        label: function(tooltipItem, chart) {
	          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
	        }
	      }
	    },
	  }
	});

}

// show table
function showTable(data){
	console.log(data)
	$("#activity-table").html("");
	for(let i = 0; i < data.length; i++){
		$("#activity-table").append(`
			<tr>
				<td>`+i+`</td>
				<td>`+data[i].user_id+` `+data[i].activity+`</td>
				<td>`+data[i].date_created+`</td>
		`);
	}
}