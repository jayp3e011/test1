<script src="plugins/chartjs/Chart.bundle.min.js"></script>
<div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title">Report</h3>
	</div>
	<div class="box-body">
	<div id="graph-loading" style="text-align: center;"><img src="dist/img/loading1.gif"><br>Loading......<br><br><br><br></div>
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
		$('#graph-loading').hide();
		this.setupBarGraph();	
		this.setChartFooter();
	}
	populateExamUserResult(){
		let user_taken=0;
		let result = "not taken";
		let userr_i = 0;
		let subjj_n = "";
		let subjj_i = 0;
		let correct = 0;
		let incorrect = 0;
		let total_item = 0;
		let subTaken=0;
		for (let i=0;i<this.data.user.length;i++) {
			user_taken++;
		}
		for(let u=0;u<this.data.exam_user.length;u++){//start 1stloop
			let userObject = {
				"user_id" : 0,
				"subject" : []
			};
			let examres={
				"subj_id" : subjj_i,
				"subj_name" : subjj_n,
				"user_taken" : subTaken,
				"total_students" : this.data.user.length
			};
			for(let i=0;i<this.data.user.length;i++){//start 2ndloop
				for (let s=0;s<this.data.subject.length;s++) {//start 3rdloop
					if (this.data.exam_user[u].subject_id==this.data.subject[s].id) {
						subTaken++;
						if (this.data.user[i].id==this.data.exam_user[u].user_id){
							userObject.user_id=this.data.exam_user[u].user_id;
							subjj_i=this.data.subject[s].id;
							subjj_n=this.data.subject[s].name;
							if (this.data.subject[s].id==this.data.exam_user[u].subject_id) {
								//formula here
								total_item = parseInt(this.data.subject[s].items);
								let data = JSON.parse(this.data.exam_user[u].data);
								if(data.selected == data.answer){
									correct++;
								}
								else{
									incorrect++;
								}				
								let average = (correct/total_item) * 100;
								let passingRate = this.data.subject[s].passingrate;
								if(average>=passingRate){
									result="passed";
								}			
								else{
									result="failed";
								}	
							}
							else{
								subjj_i=this.data.subject[s].id;
								subjj_n=this.data.subject[s].name;
								result = "not taken";
							}	
							examres={
								"subj_id" : this.data.subject[s].id,
								"subj_name" : this.data.subject[s].name,
								"user_taken" : user_taken,
								"total_students" : this.data.user.length
							};	
						}					
						let userSubjectObject = {
							"id" : subjj_i,
							"result" : result
						};
						userObject.subject.push(userSubjectObject);
					}	
					
					
				}//end 3rdloop				
				this.data.exam_uresults.push(examres);
			}//end 2ndloop						
			this.state.exam_user_result.push(userObject);
		}//end 1stloop

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
		let notTakenData = [];
		let passedBgc = [];
		let passedBc = [];
		let failedBgc = [];
		let failedBc = [];
		let notTakenBgc = [];
		let notTakenBc = [];
		for(let s=0;s<this.data.subject.length;s++){
			let subject_id = this.data.subject[s].id;
			let totalPassed = 0;
			let totalFailed = 0;
			let totalNotTaken = 0;
			for(let r=0;r<this.state.exam_user_result.length;r++){
				for(let sid=0;sid<this.state.exam_user_result[r].subject.length;sid++){
					let result_subject_id = this.state.exam_user_result[r].subject[sid].id;
					let result_subject_result = this.state.exam_user_result[r].subject[sid].result;					
					if(subject_id == result_subject_id){
						if(result_subject_result == "passed"){
							totalPassed++;
						}
						else if(result_subject_result == "failed"){
							totalFailed++;
						}
						else if(result_subject_result == "not taken"){
							totalNotTaken++;
						}
						break;
					}					
				}
			}
			notTakenBgc.push('rgba(19, 197, 217, 0.5)');
			notTakenBc.push('rgba(19, 197, 217, 1)');
			failedBc.push('rgba(191, 63, 95, 1)');
			failedBgc.push('rgba(191, 63, 95, 0.5)');
			passedBgc.push('rgba(63, 191, 127, 0.5)');
			passedBc.push('rgba(63, 191, 127, 1)');
			passedData.push(totalPassed);
			failedData.push(totalFailed);
			// notTakenData.push(totalNotTaken);
		}

		this.state.datasets = [
			{
	            label: '# of Passed',
	            data: passedData,
	            backgroundColor: passedBgc,
	            borderColor: passedBc,
	            borderWidth: 1
	        },
	        {
	            label: '# of Failed',
	            data: failedData,
	            backgroundColor: failedBgc,
	            borderColor: failedBc,
	            borderWidth: 1
	        },
	        // {
	        //     label: '# of Not Taken',
	        //     data: notTakenData,
	        //     backgroundColor: notTakenBgc,
	        //     borderColor: notTakenBc,
	        //     borderWidth: 1
	        // },

        ];
        // console.log(this.state.datasets);
	}
	///////////////////////////////////////////////////
	
	setChartFooter(){
		let topicIndex = 1;
		let ctx = ``;
		let cols = 1;
		// console.log(this.data.exam_uresults);
		this.data.subject.map((subject)=>{
			let total_students = this.data.user.length;
			let user_taken = 0;
			this.data.exam_uresults.map((topic)=>{   
				if (topic.subj_id==subject.id) {
			  		user_taken = topic.user_taken;
			    }
			});
			// if(topic.subject_id==this.getSubjectID()){ 
			if(cols>4){
			    cols=1;
			    ctx += `
			  </div>
			  <div class="row">
			    `;
			 }             
			  
			  else{
			  
			  let percentage = this.computePercentage(user_taken,total_students);
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
			      <h5 class="description-header">SUBJECT ${topicIndex} - S${topicIndex} (${user_taken}/${total_students})</h5>
			      <div style="text-align:center">
			        <span class="description-text">${subject.name}</span>
			      </div>
			    </div>
			  </div>
			  `;
			  topicIndex++;
			  cols++;
			}
			// }
		});       
		$('#chart-graph-footer').html(ctx);
		}
		computePercentage(score,items){let result = ((score/items)*100); if(isNaN(result))return 0; else return result; }
	///////////////////////////////////////////////////////
}
let adminreport = new AdminReport();

</script>