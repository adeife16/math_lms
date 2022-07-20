function getDashboard(){
	$.ajax({
		type: 'GET',
		url: 'backend/dashboard.php',
		cache: false
	})
	.done(function(res){
		// console.log(res);
		var data = JSON.parse(res);

		if(data.status === "success"){
			var num = data.data;

			showNumbers(num);
			
			// console.log(data);
		}
		// show chart for user activity
		showChart(data.activitycount, data.date);

		// show table for user activity
		showTable(data.activity);
	})
}