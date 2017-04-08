<style>  
  html, body{
    height:100%;
  }
  .btn-circle.btn-lg {
  width: 100px;
  height: 100px;
  padding: 5px 8px;
  font-size: 12px;
  line-height: 1.33;
  border-radius: 50px;
}
/*.feedback{position: fixed;}*/
    
.feedback textarea{height: 180px; }
.feedback .reported p, .feedback .failed p  { height: 190px}


.feedback.left{left:5px; bottom:15px}
.feedback.right{right:5px; bottom:15px}

.feedback .dropdown-menu{width: 290px;height: 350px;bottom: 50px;}
.feedback.left .dropdown-menu{ left: 0px}
.feedback.right .dropdown-menu{ right: 0px}
.feedback .hideme{ display: none}
</style>
<div class="content-wrapper">
  <!-- <div class="col-md-12" style="margin-top: 10px; height: 100%; display:inline-block; overflow: auto;"> -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">              
        <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
        <li><a href="#takeexam" data-toggle="tab">Take Exam</a></li>
        <li><a href="#takequiz" data-toggle="tab">Take Quiz</a></li>
        <!-- <li><a href="#showStatus" data-toggle="tab">Exam Status</a></li> -->
        <!-- <li><a href="#sendFeedback" data-toggle="tab">Send Feedback</a></li> -->
        <li class="pull-right"><a href="#">Welcome Student (<?php echo ucwords($_SESSION['fullname']) ?>)!</a></li>

        <!-- <li><a href="#settings" data-toggle="tab">Settings</a></li>               -->
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="home">        
          <div class="row">
            <div class="col-md-7">
              <h3>
                News 
                <!-- <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul> -->
              </h3>
              <div class="news"></div>
            </div>
            <div class="col-md-5">
              <h3>
                Exams
                <!-- <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul> -->
              </h3>
              <div class="box">
                <div class="box-body exams"></div>
                <div class="pull-right exams-total"></div>
                  <hr/>
                  <div style="margin-left:50px;margin-right:50px">
                    <h3>Result</h3>
                    <table class="table table-striped">
                      <tr>
                        <td style="color:#ddd;width:180px;">General Average</td>
                        <td id="general-average">0.00</td>
                      </tr>
                      <tr>
                        <td style="color:#ddd;width:180px;">Remarks</td>
                        <td id="general-remarks">FAILED</td>
                      </tr>
                    </table>
                  </div>
                <div class="box-footer clearfix pull-right">Conditional is set as static for testing</div>
            </div>
            <!-- /.box -->
            <br>
            <div class="btn-group dropup feedback">
              <button class="btn btn-success dropdown-togglebtn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-send fa-1x" title="Send Feedback"></i> Send Feedback
              </button>
            <ul class="dropdown-menu dropdown-menu-left dropdown-menu-form">
              <li>
                <div class="report">
                  <h2 class="text-center">Send Feedback</h2>
                  <form data-toggle="validator" role="form" id="addFeddback-form">
                    <!-- <div class="col-sm-12"> -->
                      <div class="form-group has-feedback">
                        <textarea class="form-control" placeholder="content" id="createfeedbackcontent" data-maxlength="255" data-error="not less than 255 characters" required></textarea>
                        <div class="help-block with-errors"></div>
                      </div>
                     <!-- </div> -->
                     <!-- <div class="col-sm-12 clearfix"> -->
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                      </div>
                     <!-- </div> -->
                 </form>
                </div>
              </li>
            </ul>
            </div>
            </div>       
          </div>
        </div>
        <!-- start exam tab  -->
        <div class="tab-pane" id="takeexam">
          <?php require_once("exam-student.php"); ?>
        </div>
        <!-- end exam tab -->
        <!-- start quiz tab -->
        <div class="tab-pane" id="takequiz">
          <?php require_once("quiz-student.php"); ?>
        </div>
        <!-- end quiz tab -->
         <!-- exam status start -->
        <!-- <div class="tab-pane" id="showStatus"> -->
          <?php //require_once("report/report.php"); ?>
        <!-- </div> -->
        <!-- exam status end -->
         <!-- send feedback start -->
        <!-- <div class="tab-pane" id="sendFeedback"> -->
          <?php //require_once("feedbackform.php"); ?>
        <!-- </div> -->
        <!-- send feedback end -->
      </div>
    </div>
  <!-- </div> -->
</div>
<script>
  class StudentExamSummary{
    constructor(){
      this.state={
        "score":0,
        "score_result":"Not Taken",
        "totalSubjectTaken":0,
        "user_exam_data":{},
        "notTaken":"none",
        "exam_subject_id":0,
        "exam_result":[]
      }
      this.data = {
        "subject":[],
        "exam_user" : []
      }
      this.loadData(()=>{
        // console.log(this.data.subject);
        // console.log(this.data.exam_user);
        this.main();
      });
    }
    loadData(callback){
      $.ajax({url: "app/models/subject.php"})
      .done(function(res){
        let data = JSON.parse(res);
        studentExamSummary.data.subject = data;
        $.ajax({method:"post", url: "app/models/exam-user.php", data:{action:"getUserExam", user_id:studentExamSummary.getUserID() } })
        .done(function(res){
          let data = JSON.parse(res);
          // console.log(data);
          studentExamSummary.data.exam_user = data;
          if (studentExamSummary.data.exam_user.length!=0) {
            studentExamSummary.state.user_exam_data = JSON.parse(data[0].data);
          }
          callback();
        });
      });
    }
    main(){
      // console.log(studentExamSummary.data.exam_user);
      this.renderExamSummary();
    }
    renderExamSummary(){
      let data = [];
      this.data.subject.map((subject)=>{
        if (studentExamSummary.data.exam_user.length!=0) {
          let result = this.getUserExamResultPerSubject(subject);
          let score = this.getuserExamScorePerSubject(subject);
          data.push({
            "subject_id":subject.id,
            "subject":subject.name,
            "result":result,
            "score":score          
          });
        }
        else{
           data.push({
            "subject":subject.name,
            "result":{
              "progressbar":"primary",
              "width":"0",
            },
            "score":{
              "badge":"light-blue",
              "data":"Not Taken"
            }
          });
          // studentExamSummary.state.notTakenAny
          
        }
      });
      let html = `
        <table class="table table-bordered">
          <tr>
            <th style="width: 10px">#</th>
            <th>Subject</th>
            <th>Result</th>
            <th style="width: 40px">Score</th>
            <th style="width: 20px">Average</th>
          </tr>`;
      for(let i=0;i<data.length;i++){
        html+=`
          <tr>
            <td>${i+1}.</td>
            <td>${data[i].subject}</td>
            <td>
              <div class="progress progress-xs">
                <div class="progress-bar progress-bar-${data[i].result.progressbar}" style="width: ${data[i].result.width}%"></div>
              </div>
            </td>
            <td>${data[i].score.result}</td>
            <td><span class="badge bg-${data[i].score.badge}">${data[i].score.data}%</span></td>
          </tr>        
      `;
      }
      html+=`</table>`;
      $('.exams').html(html);
      $('.exams-total').html(`Total Exam Taken: ${this.getTotalSubjectTaken()}`);

      let sumOfRatings = 0;
      for(let i=0;i<data.length;i++){
        sumOfRatings += data[i].score.data;
      }
      let genAverage = parseFloat(sumOfRatings)/parseFloat(data.length);
      genAverage = parseFloat(genAverage).toFixed(2);
      $('#general-average').html(genAverage);


      // console.log(data);
      let remarks = `FAILED`;
      if(this.isAbove65(data) && genAverage>=75){
        remarks = `PASSED`;
      }
      else if(genAverage>=75 && this.isMajorityAbove65(data)){
        remarks = `CONDITIONAL`;
      }
      else if(genAverage<75){
        remarks = `FAILED`;
      }

      remarks = `CONDITIONAL`;
      if(remarks=="CONDITIONAL"){
        remarks+=`
          <br/>
          <a href="student-retake.php"class="btn btn-xs btn-warning btn-fill btn-block" target="_blank">Retake Now</a>          
        `;
        localStorage.setItem('retakeexamdata',JSON.stringify(data));
      }
      $('#general-remarks').html(remarks);
    }

    isAbove65(data){
      let result = true;
      for(let i=0;i<data.length;i++){
        if(data[i].score.data<65){
          result=false;
          break;
        }
      }
      return result;
    }

    isMajorityAbove65(data){
      let result = false;
      let margin = data.length/2;
      let count = 0;
      for(let i=0;i<data.length;i++){
        if(data[i].score.data>=65){
          count++;
        }
      }
      if(count>=margin)result=true;
      return result;
    }

    getTotalSubjectTaken(){
      let total = 0;
      this.data.subject.map((subject)=>{
        if(findSubjectID(subject.id)){
          total++;
        }

        function findSubjectID(id){
          let flag = false;
          for(let i=0;i<studentExamSummary.data.exam_user.length;i++){
            let ued = studentExamSummary.data.exam_user[i];            
            if(ued.subject_id==id){
              flag=true;
              break;              
            }
          }
          return flag;
        }
      });
      return total;
    }

    getUserExamResultPerSubject(subject){
      let result = {};
      let score = 0;
      let hasTaken=false;
      if (this.state.user_exam_data.length!=0) {
        this.data.exam_user.map((deu)=>{
          if(deu.subject_id==subject.id){
            JSON.parse(deu.data).map((ued)=>{
                if (ued.selected===ued.answer) {score++; hasTaken=true;}
              // console.log(ued.selected+'____'+ued.answer);
            });            
          }
        });
        // this.state.user_exam_data.map((ued)=>{
        //   if(ued.subject_id==subject.id){
        //     if (ued.selected==ued.answer) {score++; hasTaken=true;}
            
        //   }
        // });      
          // console.log(score);
        if (hasTaken){
          let average = (score/parseInt(subject.items))*100;
          this.state.score = average;
          this.state.score_result = score+'/'+subject.items;
          if(average<subject.passingrate){
            result = {
                "progressbar":"danger",
                "width":Math.round(average),
              };        
          }
          else{
            result ={
              "progressbar":"success",
              "width":Math.round(average),
            };
          }
        }
       else{
          // console.log(subject);
          this.state.score_result = 'Not Taken';
          this.state.score = -1;
          result = {
            "progressbar":"primary",
            "width":"100", 
          };      
        }
        return result;
      }
    }
    getuserExamScorePerSubject(subject){
      let score = {};
      if(this.state.user_exam_data.length!=0 && this.state.score!= -1){
        if(this.state.score<subject.passingrate){
          score = {
              "badge":"red",
              "data":Math.round(this.state.score),
              "result":this.state.score_result
            };
        }
        else{
          score = {
              "badge":"green",
              "data":Math.round(this.state.score),
              "result":this.state.score_result
            };
        }
      }
      else{
        score = {
              "badge":"light-blue",
              "data":"--",
              "result":this.state.score_result
            };
        
      }
      return score;
    }

    getUserID(){
      return getUID();
    }
  }
  let studentExamSummary = new StudentExamSummary();

  $(function(){
    var NEWS_DATA=[];
    var USER_DATA=[];
    var SUBJECT_DATA=[];
    var TOPIC_DATA=[];
    var EXAM_DATA=[];
    var SCORE_LOG=[];
    var QUESTION_DATA=[];
    var PASSING_RATE=[];
    var INCOMPLETE = false;
    $('input[type=radio]').iCheck({
      checkboxClass: 'icheckbox_square-green',
      radioClass: 'iradio_square-green',
      increaseArea: '20%' // optional
    });

    //Home Tab Controllers
    function shortText(text){if(text.length<10)return text; var shortText = jQuery.trim(text).substring(0, 50).split(" ").slice(0, -1).join(" ") + "..."; return shortText; }
    
    var news=[];
    var user=[];
    $.ajax({
      method: "POST",
      url: "app/models/user.php"
    }).done(function(userdata){
      user = JSON.parse(userdata);
      $.ajax({
        method: "POST",
        url: "app/models/news.php",
      }).done(function(newsdata){
        news = JSON.parse(newsdata);
        render_StudentNews(news,user);  
      })
    });
    
    function render_StudentNews(newsdata,usersdata){
  
      let html = '';  
      var i = 0;
      var j = 0;
      for(i in newsdata){
        for(j in usersdata){
          // console.log(newsdata[i]);
          // console.log(usersdata[j]);
          if (newsdata[i].user_id===usersdata[j].firstname+' '+usersdata[j].lastname) {
            var dt = moment(newsdata[i].date,"YYYY-MM-DD h:mm:ss");
            // var dt = newsdata[i].createdat;
            html += '<div class="post" style="border:1px solid #ddd;padding:5px;">';
               html +=  '<div class="user-block">';
                 html +=  '<img class="img-circle img-bordered-sm" src="dist/img/avatar.png" alt="user image">';
                 html +=  '<span class="username">';
                   html +=  '<a href="#">'+usersdata[j].firstname+' '+usersdata[j].lastname+'</a>';
                   html +=  '<!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->';
                 html +=  '</span>';
                 html +=  '<span class="description">Shared publicly - '+dt.format("MMMM Do YYYY h:mm A")+'('+dt.fromNow()+')</span>';
               html +=  '</div>';
               html +=  '<p>'+newsdata[i].content;
                html += '</p>'
               html +=  '<ul class="list-inline">';
                 // html +=  '<li><a href="#" class="link-black text-sm"><i class="fa fa-commenting-o margin-r-5"></i> General Announcement</a></li>';
                 // html +=  '<li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-eye margin-r-5"></i> Seen (5)</a></li>';
             html +=  '</ul>';
             html +=  '</div>';
          }
        }
      }
      $('.news').html(html);
    }
     function getScore(selected_answer,correct_answer)
    {
      // console.log('getScore');
      var score = 0;
      if (selected_answer===correct_answer) {
        score++;
      }
      return score;
    }
    function saveScoreLog(subject_id,avg){
      // console.log('saveScoreLog');
      data = {
        "subject_id":subject_id,
        "average":avg
      }
      SCORE_LOG.push(data);
    }
    function getPassingRates(subject_id,passingate){
      // console.log('getPassingRates');
      data = {
        "subject_id":subject_id,
        "passingate":passingate
      }
      SCORE_LOG.push(data);
    }
    function getAvg(score,items,rate)
    {
      // console.log('getAvg');
      // Total Score = summation [( raw score per subject / total score per subject)*(percent weight of subject)] 
      var percentage = 0;
      percentage = score/items;
      // console.log('percentage1__'+percentage);
      percentage = percentage*rate;
      // console.log('rate__'+rate);
      // console.log('score__'+score);
      // console.log('items__'+items);
      // console.log('percentage__'+percentage);
      return percentage;
    }
    function getGenAvg(avg){
      var a=0;
      var len = avg.length;
      var genAvg;
      var sum=0;
      for(a in avg){
        sum = sum + avg[a];
      }
      genAvg = sum/len;
      return genAvg;
    }
    function getResults(genAvg,avg,passingRates){
      // Note: PASSED
      //       if genAvg>=75% && subjAvg>=65(passingrate)% :. passed
      //       CONDITIONAL
      //       if genAvg==75% && subjAvg=75%(passingate) >= noOfSubj/2 :. conditional
      //       FAILED
      //       if genAvg<75% :.failed
      //       http://pinoyaccountant.blogspot.com/2011/07/passing-exam-and-conditional-status.html
      var r=0;
      var a=0;
      var failedSubj=0;
      var aLen = avg.length;
      var pLen = passingRate.length;
      for(a in avg){
        for(r in passingRate){
          if(avg[a].avg<passingRate[r].passingrate){
            failedSubj++;
          }
          if (avg[a].subject_id==passingRate[r].subject_id) {
            if(genAvg >= 75 && avg[a].avg>=passingRate[r].passingrate){
              return "Passed";
            }
            if(genAvg >= 75 && avg[a].avg<passingRate[r].passingrate && failedSubj < Math.round(failedSubj/2)){
              return "Failed";
            }
            if(genAvg >= 75 && avg[a].avg<passingRate[r].passingrate && failedSubj >= Math.round(failedSubj/2)){
              return "Conditional";
            }  
          }
          
        }
      }
    }
    //Quiz and Exam Controllers
    function render_StudentSubjects(){      
      $.ajax({
        url:"app/models/subject.php",
        method: "post",
        data: {
          action:"topics"
        }
      }).done(function(data){
        quiz.data.STUDENT_SUBJECTS_AND_TOPICS = JSON.parse(data);
        // exam.data.STUDENT_SUBJECTS_AND_TOPICS = JSON.parse(data);
        // loadChooseSubject();
        loadChooseSubjectQuiz();
        // function loadChooseSubject(){
        //   let html = ``;
        //   exam.data.STUDENT_SUBJECTS_AND_TOPICS.map((obj)=>{
        //     html += `<option value="${obj.id}">${obj.name}</option>`;          
        //   });
        //   $('.chooseSubject').html(html);
        // }
        function loadChooseSubjectQuiz(){
          let html = ``;
          quiz.data.STUDENT_SUBJECTS_AND_TOPICS.map((obj)=>{
            html += `<option>${obj.name}</option>`;          
          });
          $('.chooseSubjectQuiz').html(html);  
          if(quiz.data.STUDENT_SUBJECTS_AND_TOPICS.length>0){        
            loadChooseTopicQuiz(quiz.data.STUDENT_SUBJECTS_AND_TOPICS[0].name);            
          }
        }
        function loadChooseTopicQuiz(subject){          
          let html = ``;
          let index=0;
          for(let obj of quiz.data.STUDENT_SUBJECTS_AND_TOPICS){
            // console.log(`${obj.name}===${subject}`);
            if(obj.name==subject){
              quiz.data.STUDENT_SUBJECTS_AND_TOPICS[index][0].map((topic)=>{
                html += `<option value="${topic.id}">${topic.name}</option>`
              });
              break;
            }
            index++;
          }          
          $('.chooseSubjectQuiz').val(quiz.data.STUDENT_SUBJECTS_AND_TOPICS[index].name);
          $('.chooseTopicQuiz').html(html);
          $('.subject-totalitems').html(quiz.data.STUDENT_SUBJECTS_AND_TOPICS[index].items);
          $('.subject-passingrate').html(quiz.data.STUDENT_SUBJECTS_AND_TOPICS[index].passingrate);
          $('.subject-timeduration').html(quiz.data.STUDENT_SUBJECTS_AND_TOPICS[index].timeduration);
          $('.subject-attempts').html(quiz.data.STUDENT_SUBJECTS_AND_TOPICS[index].attempts);
          // $('.subject-chosen').html(shortText($('.chooseSubjectQuiz').val()));
          quiz.data.STUDENT_SUBJECT_INDEX = index;
          quiz.data.STUDENT_SUBJECT_ID_CHOSEN = quiz.data.STUDENT_SUBJECTS_AND_TOPICS[index].id;
          quiz.data.STUDENT_TOPIC_ID_CHOSEN = $('.chooseTopicQuiz').val();
        }
        
        function getTopicID(topic,index){let id = -1; quiz.data.STUDENT_SUBJECTS_AND_TOPICS[index][0].map((obj)=>{if(obj.name === topic){id = obj.id; } }); return id; }
        
        $('.chooseSubjectQuiz').change(function(){
          ChooseTopicQuiz($('.chooseSubjectQuiz').val());      
        });
        // $('.chooseSubject').change(function(){
        //   let index=0;
        //   for(let obj of exam.data.STUDENT_SUBJECTS_AND_TOPICS){
        //     if(obj.id==$('.chooseSubject').val()){
        //       break;
        //     }
        //     index++;
        //   }          
        //   $('.subject-totalitems1').html(exam.data.STUDENT_SUBJECTS_AND_TOPICS[index].items);
        //   $('.subject-passingrate1').html(exam.data.STUDENT_SUBJECTS_AND_TOPICS[index].passingrate);
        //   $('.subject-timeduration1').html(exam.data.STUDENT_SUBJECTS_AND_TOPICS[index].timeduration);
        //   $('.subject-attempts1').html(exam.data.STUDENT_SUBJECTS_AND_TOPICS[index].attempts);
        //   $('.subject-chosen1').html(shortText($('.chooseSubject').val()));
        //   exam.data.STUDENT_SUBJECT_INDEX = index;
        //   exam.data.STUDENT_SUBJECT_ID_CHOSEN = $('.chooseSubject').val();
        // });
        $('.chooseTopicQuiz').change(function(){
          quiz.data.STUDENT_TOPIC_ID_CHOSEN = $('.chooseTopicQuiz').val();
        });
        $('.startquiz').click(function(){
          loadQuizSheet(quiz.data.STUDENT_TOPIC_ID_CHOSEN);
        });
      });
    }
    render_StudentSubjects();
    
  });
</script>
