<div class="row take-quiz-tab"></div>
<script>
	//Quiz Controllers
    function loadQuizSheet(topic_id)
    {
      // console.log('topicid_____'+topic_id);
      $.ajax({
          method: "POST",
          url: "app/models/exam.php",
          // data:{'subject_id':subject_id}
          data:{'topic_id':topic_id,'action':'getquiz'}
      }).done(function(questions){
          // console.log(questions);
          // $('#subjectdesc').html(getSubjectDesc(subjectid));
          quest = JSON.parse(questions);
          quiz.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ = quest;
          quiz.data.CURRENT_QUIZ_ITEMS = quest.length;
          // console.log(quest);
          if(quest.length>0){
            quiz.showQuiz(quiz.data.CURRENT_QUIZ_PAGE);
            // let html = ``;
            // for(let i=0;i<quest.length;i++){
            //   html+=`<li><a href="#" id="btnQuiz${quest[i].id}" onclick="quiz.showQuiz(${i})">${quiz.formatItem(i+1)}</a></li>`;
            // }
            // $('#quiz-nav').html(html);
          }
          else{
            quiz.showQuiz(-1);
          }
          // $('.chooseSubject1').attr('disabled','disabled');
          $('.subject-chosen').html(quiz.shortText($('.chooseSubjectQuiz').val()));
          // $('.startquiz').attr('disabled','disabled');
          $('.chooseagain').attr('disabled','disabled');
          $('.quiz-sheet').show();
          // $('.chooseSubject').removeAttr('disabled');
      });
    }
    // $("#quiz_radio_a").on("ifChanged", function(){
    //   util.saveQuizAnswer();
    // });
    // $("#quiz_radio_b").on("ifChanged", function(){
    //   util.saveQuizAnswer();
    // });
    // $("#quiz_radio_c").on("ifChanged", function(){
    //   util.saveQuizAnswer();
    // });
    // $("#quiz_radio_d").on("ifChanged", function(){
    //   util.saveQuizAnswer();
    // });
	class Quiz{
		constructor(){
			this.data = {
	          STUDENT_SUBJECTS_AND_TOPICS:[],
	          STUDENT_SUBJECT_INDEX:[],
	          STUDENT_SUBJECT_ID_CHOSEN:[],
	          STUDENT_TOPIC_ID_CHOSEN:[],
	          STUDENT_SUBJECTS_AND_TOPICS_QUIZ:[],
	          STUDENT_QUIZ_LOG:[],
	          STUDENT_SUBJECTS_AND_TOPICS_QUIZ_SELECTED_INDEX:-1,
	          CURRENT_QUIZ_ID: 0,
	          CURRENT_QUIZ_ITEMS: 0,
	          CURRENT_QUIZ_PAGE: 0,
	          CURRENT_QUIZ_SCORE: 0
	        };
	        this.mainLayout();
	    }
	    main(){
	    	this.mainLayout();
	    }
	    shortText(text){if(text.length<10)return text; var shortText = jQuery.trim(text).substring(0, 50).split(" ").slice(0, -1).join(" ") + "..."; return shortText; }
	    mainLayout(){
	    	let html =`
			<div class="row">
	          <div class="col-md-4">
	            <div class="box box-default">
	              <div class="box-header with-border">
	                <h3 class="box-title">Quiz Information</h3>
	                  <div class="box-tools pull-right">
	                    <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
	                  </div>
	              </div>
	              <div class="box-body">
	                <div class="row">
	                  <div class="col-md-12">
	                    <div class="form-group">
	                      <label>Choose Subject</label>
	                      <select class="form-control select2 chooseSubjectQuiz" style="width: 100%;">
	                        <option selected="selected">Loading Subjects...</option>
	                      </select>
	                    </div>
	                    <div class="form-group">
	                      <label>Choose Topic</label>
	                      <select class="form-control select2 chooseTopicQuiz" style="width: 100%;">Loading Topics...</select>
	                    </div>
	                  </div>
	                </div>
	                <div class="text-red">Note: <span class="text-gray">Please avoid refreshing this page once you started the quiz.</span></div>
	              </div>
	              <div class="box-footer">
	                <div class="btn-group pull-right">
	                  <button type="submit" class="btn bg-maroon btn-flat margin startquiz">Start Quiz</button>               
	                  <!-- <button type="submit" class="btn bg-purple btn-flat margin chooseagain">Choose Again</button> -->
	                </div>
	              </div>
	            </div>      
	          </div>
	          <div class="col-md-8">
	            <div class="box quiz-sheet">
	              <div class="box-header with-border">
	                <h3 class="box-title subject-chosen">Subject Chosen</h3>
	                <h5 class="box-title pull-right" id="quizScore">
	                  Items you answered: 0
	                </h5>
	                </div>
	                <div class="box-body">
	                  <!-- <button type="submit" class="btn bg-green btn-flat startquiz">Press this button once you are ready!</button>  -->
	                  
	                  <div class="row">
	                    <center>
	                      <ul class="pagination pagination-sm no-margin" id="quiz-nav">
	                      </ul>
	                    </center>  
	                  </div>
	                  <table class="table" id="quiz-table">
	                    <tr>
	                      <th>Question: <span id="quiz-question-sequence">001</span></th>
	                    </tr>
	                    <tr>
	                      <td style="padding-left:30px" width="100%">
	                        <div id="quiz-question">
	                          The mailbox rule generally makes acceptance of an offer effective at the time the acceptance is dispatched. The mailbox rule does not apply if
	                        </div>
	                        <div>&nbsp;</div>
	                        <table>
	                          <tr>
	                            <td valign="top" width="5%">
	                               <label id="quiz_handle_a">
	                                <div id="quiz_select1_a" style="position: absolute;margin-left: 6.5px;margin-top:1px;">A</div>
	                                <div id="quiz_select2_a" class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
	                                  <input id="quiz_radio_a" type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 0;">
	                                  <ins id="quiz_select_a" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
	                                </div>
	                              </label> 
	                            </td>
	                            <td style="padding-left:5px" id="quiz-choice_A">Both the offeror and offeree are merchants.asdfasdfasdfasdf adsfa dfa sdfa sdf asdf asdf asdf asdf asdf asdf adsf asdf asdf adsf asdf asdf asdf asdf asdf asdf asdfasd f</td>
	                          </tr>
	                          <tr>
	                            <td valign="top" width="5%">
	                              <label id="quiz_handle_b">
	                                <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">B</div>
	                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
	                                  <input id="quiz_radio_b" type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 100;">
	                                  <ins id="quiz_select_b" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
	                                </div>
	                              </label>   
	                            </td>
	                            <td style="padding-left:5px" id="quiz-choice_B">The offer proposes a sale of real estate.</td>
	                          </tr>
	                          <tr>
	                            <td valign="top" width="5%">
	                              <label id="quiz_handle_c">
	                                <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">C</div>
	                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
	                                  <input id="quiz_radio_c" type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 0;">
	                                  <ins id="quiz_select_c" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
	                                </div>
	                              </label> 
	                            </td>
	                            <td style="padding-left:5px" id="quiz-choice_C">The offer provides that an acceptance shall not be effective until actually received.</td>
	                          </tr>
	                          <tr>
	                            <td valign="top" width="5%">
	                              <label id="quiz_handle_d">
	                                <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">D</div>
	                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
	                                  <input id="quiz_radio_d" type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 0;">
	                                  <ins id="quiz_select_d" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
	                                </div>
	                              </label>   
	                            </td>
	                            <td style="padding-left:5px" id="quiz-choice_D">The duration of the offer is not in excess of 3 months.</td>
	                          </tr>
	                        </table>
	                      </td>
	                    </tr>
	                    <tr>
	                      <td colspan="2">
	                        <span id="chosen_intromsg">Please choose a letter now</span>&nbsp;
	                        <div id="quizNxtBtnHere" class="pull-right"><button class="btn btn-success btn-lg" id="btnNxt" onclick="quiz.showNextQuiz(quiz.data.CURRENT_QUIZ_PAGE)"><span>Next</span></button></div>
	                        <span id="chosen_letter"></span>.&nbsp;&nbsp;
	                        <span id="chosen_details"></span>                        
	                      </td>
	                    </tr>
	                  </table>
	                </div>
	            </div>
	          </div>
	        </div>
	        <div class="row">
	          <div class="col-sm-12">
	            <div class="box box-danger">
	              <div class="box-header with-border">
	                <h3 class="box-title">General Instructions</h3>
	                  <div class="box-tools pull-right">
	                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                  </div>
	              </div>
	              <div class="box-body">
	                <div class="row">
	                  <div class="col-lg-3 col-xs-6">         
	                    <div class="small-box bg-aqua">
	                      <div class="inner">
	                        <h3 class="subject-totalitems">100</h3>
	                        <p>Total items</p>
	                      </div>
	                      <div class="icon">
	                        <i class="ion ion-help"></i>
	                      </div>
	                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	                    </div>
	                  </div>
	                  <div class="col-lg-3 col-xs-6">
	                    <div class="small-box bg-green">
	                      <div class="inner">
	                        <h3 class="subject-passingrate">75<sup style="font-size: 20px">%</sup></h3>
	                        <p>Passing Rate</p>
	                      </div>
	                      <div class="icon">
	                        <i class="ion ion-ribbon-b"></i>
	                      </div>
	                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	                    </div>
	                  </div>
	                  <div class="col-lg-3 col-xs-6">
	                    <div class="small-box bg-yellow">
	                      <div class="inner">
	                        <h3 class="subject-timeduration">60</h3>
	                        <p>Time duration in minutes</p>
	                      </div>
	                      <div class="icon">
	                        <i class="ion ion-clock"></i>
	                      </div>
	                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	                    </div>
	                  </div>
	                  <div class="col-lg-3 col-xs-6">
	                    <div class="small-box bg-red">
	                      <div class="inner">
	                        <h3 class="subject-attempts">1</h3>
	                        <p>Number of attempts</p>
	                      </div>
	                      <div class="icon">
	                        <i class="ion ion-compose"></i>
	                      </div>
	                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>   
	          </div>
	        </div>`;
	        $('#takequiz').html(html);
	        $('.quiz-sheet').hide();
	    }
        formatItem(val){if(val<10)return '00'+val; else if(val<100)return '0'+val; else return val; }	
		showQuizScore(correct_answer,selected_answer)
		{
			if (correct_answer===selected_answer) {
				this.data.CURRENT_QUIZ_SCORE++;
			}
			$('#quizScore').html('Score : '+this.data.CURRENT_QUIZ_SCORE+'/'+this.data.CURRENT_QUIZ_ITEMS);
		}
		showQuizResult()
		{
			this.data.CURRENT_QUIZ_PAGE--;
			this.saveQuizAnswer();
			// alert('SCORE: '+this.data.CURRENT_QUIZ_SCORE+'/'+this.data.CURRENT_QUIZ_ITEMS+'__'+this.data.STUDENT_QUIZ_LOG[0].quizID);
			var title = "QUIZ SCORE: "+this.data.CURRENT_QUIZ_SCORE+"/"+this.data.CURRENT_QUIZ_ITEMS+".";
			var txt = '';
			var log = 0;
			var logs = this.data.STUDENT_QUIZ_LOG;
			var p = 1;
			var i = 1;
			txt+='<dl>';
			for(log in logs)
			{
				// txt+='<p class="text-muted">Quiz No: </p>';
				txt+='<p class="text-muted">Quiz No. '+this.formatItem(i++)+'</p>';
				// txt+='<p class="text-light-blue">Question: </p>';
				// txt+='<p class="text-light-blue">Question: '+logs[log].question+'</p>';
				// txt+='<p class="text-aqua">Your Answer: </p>';
				txt+='<p class="text-aqua">Your Answer: '+logs[log].selected_answer+'. '+logs[log].selected_answer_details+'</p>';
				// txt+='<p class="text-green">Correct Answer: </p>';
				txt+='<p class="text-green">Correct Answer'+logs[log].correct_answer+'. '+logs[log].correct_answer_details+'</p>';
			}
			txt+='</dl>';
			swal({
				title: title,
				text: txt,
				html: true
			});
			$('#btnSubmit').attr('disabled','disable');
			$('.quiz-sheet').hide();
		}
		showNextQuiz(q)
		{
			// console.log('it__'+this.data.CURRENT_QUIZ_ITEMS);
			// console.log('snq__'+q);
			if (this.data.CURRENT_QUIZ_PAGE<=this.data.CURRENT_QUIZ_ITEMS) {
				this.saveQuizAnswer();
				this.showQuiz(q);
			}        
			if(this.data.CURRENT_QUIZ_PAGE==this.data.CURRENT_QUIZ_ITEMS)
			{
				let html = `<button class="btn btn-success btn-lg" id="btnSubmit" onclick="quiz.showQuizResult()"><span>Submit</span>`;
				$('#quizNxtBtnHere').html(html);
			}

		}
		showQuiz(q){

			// console.log('pg__'+this.data.CURRENT_QUIZ_PAGE);

			this.data.CURRENT_QUIZ_PAGE++; 

			if (q>=0) {
				// console.log(this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[q].id);
				$('#quiz-table').show();
				$('#quiz-question-sequence').html(this.formatItem(q+1));
				$('#quiz-question').html(this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[q].question);
				$('#quiz-choice_A').html(this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[q].choice_a);
				$('#quiz-choice_B').html(this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[q].choice_b);
				$('#quiz-choice_C').html(this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[q].choice_c);
				$('#quiz-choice_D').html(this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[q].choice_d); 
			}
			else{
				$('#quiz-table').hide();
				$('#quiz-nav').html("NO QUESTION ASSIGNED!");
			}
		}
		saveQuizAnswer()
		{
			// console.log('sqa__'+this.data.CURRENT_QUIZ_PAGE);
			var cA = $('#quiz_radio_a').iCheck('update')[0].checked;
			var cB = $('#quiz_radio_b').iCheck('update')[0].checked;
			var cC = $('#quiz_radio_c').iCheck('update')[0].checked;
			var cD = $('#quiz_radio_d').iCheck('update')[0].checked;
			if(cA){
				this.saveQuizLog({
					"quizID":this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].id,
					"question":$('#quiz-question').html(),
					"selected_answer":"A",
					"selected_answer_details":$('#quiz-choice_A').html(),
					"correct_answer":this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer,
					"correct_answer_details":$('#quiz-choice_'+this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer).html()
				});
				this.showQuizScore(this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer,'A');
			}
			else if(cB){
				this.saveQuizLog({
					"quizID":this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].id,
					"question":$('#quiz-question').html(),
					"selected_answer":"B",
					"selected_answer_details":$('#quiz-choice_B').html(),
					"correct_answer":this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer,
					"correct_answer_details":$('#quiz-choice_'+this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer).html()
				});
				this.showQuizScore(this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer,'B');
			}
			else if(cC){
				this.saveQuizLog({
					"quizID":this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].id,
					"question":$('#quiz-question').html(),
					"selected_answer":"C",
					"selected_answer_details":$('#quiz-choice_C').html(),
					"correct_answer":this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer,
					"correct_answer_details":$('#quiz-choice_'+this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer).html()
				});
				this.showQuizScore(this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer,'C');
			}
			else if(cD){
				this.saveQuizLog({
					"quizID":this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].id,
					"question":$('#quiz-question').html(),
					"selected_answer":"D",
					"selected_answer_details":$('#quiz-choice_D').html(),
					"correct_answer":this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer,
					"correct_answer_details":$('#quiz-choice_'+this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer).html()
				});
				this.showQuizScore(this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer,'D');
			}
			// console.log(cA);
			// console.log(cB);
			// console.log(cC);
			// console.log(cD);   
		}
		resetQuizCheckbox(){$('#quiz_radio_a').prop('disabled',false);$('#quiz_radio_a').iCheck('uncheck'); $('#quiz_radio_b').prop('disabled',false);$('#quiz_radio_b').iCheck('uncheck'); $('#quiz_radio_c').prop('disabled',false);$('#quiz_radio_c').iCheck('uncheck'); $('#quiz_radio_d').prop('disabled',false);$('#quiz_radio_d').iCheck('uncheck'); $('#chosen_intromsg').html("Please choose a letter now"); $('#chosen_letter').html(""); $('#chosen_details').html(""); }
		getSelectedQuiz(){return this.data.CURRENT_QUIZ_ID; }
		//NOTE: UPDATE THIS CODE. USER ID MUST BE ASSIGNED USING A SESSION VARIABLE
		getUserID(){ return 2;}
		saveQuizLog(quizlog){
			this.data.STUDENT_QUIZ_LOG.push(quizlog);
			this.resetQuizCheckbox();
		}	// console.log(this.data.STUDENT_QUIZ_LOG);
	}
	let quiz = new Quiz();
</script>