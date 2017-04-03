<script src="plugins/chartjs/Chart.bundle.min.js"></script>
<div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title">Report</h3>
	</div>
	<div class="box-body">
	<div class="text-center">
		<h5>This bar graph shows data statistics for total students and per subject information</h5>
	</div>
	<canvas id="myChart" width="400" height="200"></canvas>

	</div>				
	<!-- /.box-body -->
	<div class="box-footer">
      <div class="row" id="chart-graph-footer"></div>
    </div>
</div>
<script>
$('body').addClass('sidebar-collapse sidebar-mini');
class AdminReport{
	constructor(){
		this.state = {
			"labels" : [],
			"datasets" : [],
			"exam_user_result" : [],
			"topicObject_data" : []
		};
		/*
			sample exam_user_result data
			,	
				{
					"user_id" : 2,
					"subject" : [
						{
							"id" : 1,
							"result" : "passed"
						},
						{
							"id" : 2,
							"result" : "passed"
						},
						{
							"id" : 3,
							"result" : "passed"
						},
						{
							"id" : 4,
							"result" : "passed"
						},
						{
							"id" : 5,
							"result" : "passed"
						},
						{
							"id" : 6,
							"result" : "passed"
						},
					]
				},
				{
					"user_id" : 3,
					"subject" : [
						{
							"id" : 1,
							"result" : "passed"
						},
						{
							"id" : 2,
							"result" : "passed"
						},
						{
							"id" : 3,
							"result" : "passed"
						},
						{
							"id" : 4,
							"result" : "passed"
						},
						{
							"id" : 5,
							"result" : "passed"
						},
						{
							"id" : 6,
							"result" : "passed"
						},
					]
				},
				{
					"user_id" : 4,
					"subject" : [
						{
							"id" : 1,
							"result" : "failed"
						},
						{
							"id" : 2,
							"result" : "failed"
						},
						{
							"id" : 3,
							"result" : "failed"
						},
						{
							"id" : 4,
							"result" : "failed"
						},
						{
							"id" : 5,
							"result" : "failed"
						},
						{
							"id" : 6,
							"result" : "failed"
						},
					]
				}
		*/

		this.data = {
			"subject" : [],
			"user": [],
			"exam_user" : [],
			"exam_questions" : [],
			"exam_uresults" : []
		};
		this.loadData(()=>{
			// console.log(this.data.subject);
			// console.log(this.data.user);
			// console.log(this.data.exam_user);
			this.main();
		});
	}
	loadData(callback){
		$.ajax({url: "app/models/subject.php"})
		.done(function(res){ 
			let data = JSON.parse(res);
			adminreport.data.subject = data;
			$.ajax({url: "app/models/user.php", method: "post", data:{action: "filterstudents"} })
			.done(function(res){
				let data = JSON.parse(res);
				adminreport.data.user = data;
				$.ajax({url: "app/models/exam-user.php"})
				.done(function(res){
					let data = JSON.parse(res);
					adminreport.data.exam_user = data;
					 $.ajax({url: "app/models/exam-questions.php"})
	                 .done(function(res){
	                    let data = JSON.parse(res);
	                    adminreport.data.exam_questions = data;             
	                    callback();
	                });
				});
			});
		});
	}
	main(){
		this.populateExamUserResult();
		this.setupBarGraph();	
		this.setChartFooter();
	}
	populateExamUserResult(){
		let user_taken=0;
		for(let u=0;u<this.data.exam_user.length;u++){
			let userObject = {
				"user_id" : this.data.exam_user[u].user_id,
				"subject" : []
			};
			for(let s=0;s<this.data.subject.length;s++){
				for (let i=0;i<this.data.user.length;i++) {
					if (this.data.user[i].id==this.data.exam_user[u].user_id && this.data.exam_user[u].subject_id==this.data.subject[s].id) {
						user_taken++;
					}
				}				
				let result = "failed";
				//formula here
				let total_item = parseInt(this.data.subject[s].items);
				let correct = 0;
				let incorrect = 0;
				let data = JSON.parse(this.data.exam_user[u].data);
				for(let d=0;d<data.length;d++){
					if(data.subject_id==this.data.subject[s].id){

						if(data.selected == data.answer){
							correct++;
						}
						else{
							incorrect++;
						}
					}
				}				
				let average = (correct/total_item) * 100;
				let examres={
					"subj_id" : this.data.subject[s].id,
					"subj_name" : this.data.subject[s].name,
					"user_taken" : user_taken,
					"total_students" : this.data.user.length
				};
				let passingRate = this.data.subject[s].passingrate;
				if(average>=passingRate)result="passed";				
				let userSubjectObject = {
					"id" : this.data.subject[s].id,
					"result" : result
				};
				userObject.subject.push(userSubjectObject);
				this.data.exam_uresults.push(examres);
			}
			this.state.exam_user_result.push(userObject);
		}

	}

	setupBarGraph(){
		this.setupStateSubjectLabels();
		this.setupStateSubjectDatasets();

		//Actual Graph
		let ctx = $("#myChart")[0];
		let myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: this.state.labels,
		        datasets: this.state.datasets
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    }
		});
	}

	setupStateSubjectLabels(){
		for(let s=1;s<=this.data.subject.length;s++){
			this.state.labels.push(`S${s}`);
		}
	}

	setupStateSubjectDatasets(){
		let passedData = [];
		let failedData = [];
		for(let s=0;s<this.data.subject.length;s++){
			let subject_id = this.data.subject[s].id;
			let totalPassed = 0;
			let totalFailed = 0;
			for(let r=0;r<this.state.exam_user_result.length;r++){
				for(let sid=0;sid<this.state.exam_user_result[r].subject.length;sid++){
					let result_subject_id = this.state.exam_user_result[r].subject[sid].id;
					let result_subject_result = this.state.exam_user_result[r].subject[sid].result;					
					if(subject_id == result_subject_id){
						if(result_subject_result == "passed")totalPassed++;
						else if(result_subject_result == "failed")totalFailed++;
						break;
					}					
				}
			}
			passedData.push(totalPassed);
			failedData.push(totalFailed);
		}

		this.state.datasets = [
			{
	            label: '# of Passed',
	            data: passedData,
	            backgroundColor: [
	                'rgba(63, 191, 127, 0.5)',
	                'rgba(63, 191, 127, 0.5)',
	                'rgba(63, 191, 127, 0.5)',
	                'rgba(63, 191, 127, 0.5)',
	                'rgba(63, 191, 127, 0.5)',
	                'rgba(63, 191, 127, 0.5)',
	                'rgba(63, 191, 127, 0.5)'
	            ],
	            borderColor: [
	                'rgba(63, 191, 127, 1)',
	                'rgba(63, 191, 127, 1)',
	                'rgba(63, 191, 127, 1)',
	                'rgba(63, 191, 127, 1)',
	                'rgba(63, 191, 127, 1)',
	                'rgba(63, 191, 127, 1)',
	                'rgba(63, 191, 127, 1)'
	            ],
	            borderWidth: 1
	        },
	        {
	            label: '# of Failed',
	            data: failedData,
	            backgroundColor: [
	                'rgba(191, 63, 95, 0.5)',
	                'rgba(191, 63, 95, 0.5)',
	                'rgba(191, 63, 95, 0.5)',
	                'rgba(191, 63, 95, 0.5)',
	                'rgba(191, 63, 95, 0.5)',
	                'rgba(191, 63, 95, 0.5)',
	                'rgba(191, 63, 95, 0.5)'
	            ],
	            borderColor: [
	                'rgba(191, 63, 95, 1)',
	                'rgba(191, 63, 95, 1)',
	                'rgba(191, 63, 95, 1)',
	                'rgba(191, 63, 95, 1)',
	                'rgba(191, 63, 95, 1)',
	                'rgba(191, 63, 95, 1)',
	                'rgba(191, 63, 95, 1)'
	            ],
	            borderWidth: 1
	        },

        ];
	}
	///////////////////////////////////////////////////
	
	setChartFooter(){
		let topicIndex = 1;
		let ctx = ``;
		let cols = 1;
		console.log(this.data.exam_uresults);
		this.data.exam_uresults.map((topic)=>{          
		// if(topic.subject_id==this.getSubjectID()){              
		  if(cols>4){
		    cols=1;
		    ctx += `
		  </div>
		  <div class="row">
		    `;
		  }
		  let percentage = this.computePercentage(topic.user_taken,topic.total_students);
		  let caret = ``;
		  if(percentage>50){
		    caret = `<span class="description-percentage text-green"><i class="fa fa-caret-up"></i>`;
		  }
		  else if(percentage<50 && percentage>0){
		    caret = `<span class="description-percentage text-red"><i class="fa fa-caret-down"></i>`;
		  }
		  else if(percentage==0){
		    caret = `<span class="description-percentage text-orange"><i class="fa fa-caret-left"></i>`;
		  }
		  ctx+=`
		  <div class="col-sm-3" style="height:180px">
		    <div class="description-block border-right">
		      ${caret} ${percentage}%</span>
		      <h5 class="description-header">SUBJECT ${topicIndex} - S${topicIndex} (${topic.user_taken}/${topic.total_students})</h5>
		      <div style="text-align:center">
		        <span class="description-text">${topic.subj_name}</span>
		      </div>
		    </div>
		  </div>
		  `;
		  topicIndex++;
		  cols++;
		// }
		});        
		$('#chart-graph-footer').html(ctx);
		}
		computePercentage(score,items){let result = ((score/items)*100); if(isNaN(result))return 0; else return result; }
	///////////////////////////////////////////////////////
}
let adminreport = new AdminReport();

</script>