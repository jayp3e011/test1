<style>  
  html, body{
    height:100%;
  }
</style>
<div class="col-md-12" style="margin-top: 10px;">
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">              
      <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
      <li><a href="#takeexam" data-toggle="tab">Take Exam</a></li>
      <li><a href="#takequiz" data-toggle="tab">Take Quiz</a></li>
      
      <li class="pull-right"><a href="#">Welcome Student (<?php echo ucwords($_SESSION['fullname']) ?>)!</a></li>

      <!-- <li><a href="#settings" data-toggle="tab">Settings</a></li>               -->
    </ul>
    <div class="tab-content">
      <div class="active tab-pane" id="home">        
        <div class="row">
          <div class="col-md-7">
            <h3>
              News 
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </h3>
            <div class="news"></div>
          </div>
          <div class="col-md-5">
            <h3>
              Exams
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </h3>
            <div class="box">
              <div class="box-body exams"></div>
              <div class="box-footer clearfix pull-right exams-total"></div>
          </div>
          <!-- /.box -->
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
    </div>
  </div>
</div>
<script>
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
    $.ajax({
        method: "POST",
        url: "app/models/exam.php"
    }).done(function(examdata){
      EXAM_DATA = JSON.parse(examdata);
      $.ajax({
        method: "POST",
        url: "app/models/subject.php",
      }).done(function(subjectdata){
        SUBJECT_DATA = JSON.parse(subjectdata);
        $.ajax({
          method: "POST",
          url: "app/models/question.php",
        }).done(function(questiondata){
            QUESTION_DATA = JSON.parse(questiondata);
            render_StudentExams(SUBJECT_DATA,EXAM_DATA,QUESTION_DATA);  
        })
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
            html += '<div class="post" style="border:1px solid #ddd;padding:5px;">';
               html +=  '<div class="user-block">';
                 html +=  '<img class="img-circle img-bordered-sm" src="dist/img/avatar.png" alt="user image">';
                 html +=  '<span class="username">';
                   html +=  '<a href="#">'+usersdata[j].firstname+' '+usersdata[j].lastname+'</a>';
                   html +=  '<!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->';
                 html +=  '</span>';
                 html +=  '<span class="description">Shared publicly - 7:30 PM today</span>';
               html +=  '</div>';
               html +=  '<p>'+newsdata[i].content;
                html += '</p>'
               html +=  '<ul class="list-inline">';
                 html +=  '<li><a href="#" class="link-black text-sm"><i class="fa fa-commenting-o margin-r-5"></i> General Announcement</a></li>';
                 html +=  '<li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-eye margin-r-5"></i> Seen (5)</a></li>';
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
      console.log('percentage1__'+percentage);
      percentage = percentage*rate;
      console.log('rate__'+rate);
      console.log('score__'+score);
      console.log('items__'+items);
      console.log('percentage__'+percentage);
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
    function render_StudentExams(subjectdata,examdata,questiondata){
      // console.log('rSE');
      // console.log(examdata);
      // console.log(subjectdata);
      // console.log(questiondata);
      // exam: id,user_id,subject_id,question_id,answer
      var s = 0;
      var e = 0;
      var q = 0;
      var score = 0;
      var status= '';
      var data = [];
      var examTaken = 0;
      var examLength = examdata.length;
      var subjectLength = subjectdata.length;
      for(s in subjectdata){
        getPassingRates(subjectdata[s].id,subjectdata[s].passingate);
        for(e in examdata){
          if (examdata[e].user_id==quiz.getUserID()) {
            // console.log('found ID');
            if (examdata[e].subject_id == subjectdata[s].id ) {
              examTaken++;
              for(q in questiondata){
                if (examdata[e].subject_id==questiondata[q].subject_id && examdata[e].question_id==questiondata[q].id) {
                  score += getScore(examdata[e].answer,questiondata[q].answer);
                }
                  
              }
              // console.log(subjectdata[s].passingrate);
              var avg = getAvg(score,subjectLength,subjectdata[s].passingrate);
              // console.log(score);
              saveScoreLog(examdata[e].subject_id,avg);
              var arr ={
                "subject":subjectdata[s].name,
                "result":{
                  "progressbar":"info",
                  "width":Math.round(avg)
                },
                "score":{
                  "badge":"maroon",
                  "data":avg+'%'
                }
              };
              // data.push(arr);
            }
            else{
              INCOMPLETE = true;
              var arr ={
                "subject":subjectdata[s].name,
                "result":{
                  "progressbar":"danger",
                  "width":"100"
                },
                "score":{
                  "badge":"red",
                  "data":"Not taken"
                }
              };
              // data.push(arr);
            }
          }
          else{
            // console.log('id not found');
            INCOMPLETE = true;
            var arr ={
                "subject":subjectdata[s].name,
                "result":{
                  "progressbar":"danger",
                  "width":"100"
                },
                "score":{
                  "badge":"red",
                  "data":"Not taken"
                }
              }
          };
        }
          data.push(arr); 
      } 
    

      // let data = [
      //   {
      //     "subject":"Finance",
      //     "result":{
      //       "progressbar":"danger",
      //       "width":"55",
      //     },
      //     "score":{
      //       "badge":"red",
      //       "data":"55"
      //     }
      //   },
      //   {
      //     "subject":"Law and Order",
      //     "result":{
      //       "progressbar":"yellow",
      //       "width":"70",
      //     },
      //     "score":{
      //       "badge":"yellow",
      //       "data":"70"
      //     }
      //   },
      //   {
      //     "subject":"History",
      //     "result":{
      //       "progressbar":"primary",
      //       "width":"30",
      //     },
      //     "score":{
      //       "badge":"light-blue",
      //       "data":"30"
      //     }
      //   },
      //   {
      //     "subject":"Criminal and Investigation",
      //     "result":{
      //       "progressbar":"success",
      //       "width":"100",
      //     },
      //     "score":{
      //       "badge":"green",
      //       "data":"100"
      //     }
      //   },
      //    {
      //     "subject":"Criminal and Investigation 1",
      //     "result":{
      //       "progressbar":"maroon",
      //       "width":"68",
      //     },
      //     "score":{
      //       "badge":"maroon",
      //       "data":"68"
      //     }
      //   }
      // ];
      let html = `
        <table class="table table-bordered">
          <tr>
            <th style="width: 10px">#</th>
            <th>Subject</th>
            <th>Result</th>
            <th style="width: 40px">Score</th>
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
            <td><span class="badge bg-${data[i].score.badge}">${data[i].score.data}</span></td>
          </tr>        
        `;
      }
      html+=`</table>`;
      $('.exams').html(html);
      $('.exams-total').html(`Total Exam Taken: ${examTaken}`);
    }
    //Take Exam Controllers
    function render_StudentSubjects(){      
      $.ajax({
        url:"app/models/subject.php",
        method: "post",
        data: {
          action:"topics"
        }
      }).done(function(data){
        // console.log(data);
        quiz.data.STUDENT_SUBJECTS_AND_TOPICS = JSON.parse(data);
        exam.data.STUDENT_SUBJECTS_AND_TOPICS = JSON.parse(data);
        // console.log(util.data.STUDENT_SUBJECTS_AND_TOPICS[0][0][0]);
        loadChooseSubject();
        loadChooseSubjectQuiz();
        function loadChooseSubject(){
          /*
            bootstrap css select guide
            <option selected="selected">Alabama</option>
            <option>Alaska</option>
            <option disabled="disabled">California (disabled)</option>
          */
          let html = ``;
          exam.data.STUDENT_SUBJECTS_AND_TOPICS.map((obj)=>{
            html += `<option value="${obj.id}">${obj.name}</option>`;          
          });
          $('.chooseSubject').html(html);
        }
        function loadChooseSubjectQuiz(){
          /*
            bootstrap css select guide
            <option selected="selected">Alabama</option>
            <option>Alaska</option>
            <option disabled="disabled">California (disabled)</option>
          */
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
                html += `<option value="${topic.id}">${topic.name}</option>`;
                
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
          // console.log($('.chooseSubject').val());
        });
        $('.chooseSubject').change(function(){
          let index=0;
          for(let obj of exam.data.STUDENT_SUBJECTS_AND_TOPICS){
            // console.log(`${obj.name}===${subject}`);
            if(obj.id==$('.chooseSubject').val()){
              break;
            }
            index++;
          }          
          $('.subject-totalitems1').html(exam.data.STUDENT_SUBJECTS_AND_TOPICS[index].items);
          $('.subject-passingrate1').html(exam.data.STUDENT_SUBJECTS_AND_TOPICS[index].passingrate);
          $('.subject-timeduration1').html(exam.data.STUDENT_SUBJECTS_AND_TOPICS[index].timeduration);
          $('.subject-attempts1').html(exam.data.STUDENT_SUBJECTS_AND_TOPICS[index].attempts);
          $('.subject-chosen1').html(shortText($('.chooseSubject').val()));
          exam.data.STUDENT_SUBJECT_INDEX = index;
          exam.data.STUDENT_SUBJECT_ID_CHOSEN = $('.chooseSubject').val();
        });
        $('.chooseTopicQuiz').change(function(){
          // loadChooseTopic($('.chooseSubject').val());
          quiz.data.STUDENT_TOPIC_ID_CHOSEN = $('.chooseTopicQuiz').val();
          // console.log(util.data.STUDENT_TOPIC_ID_CHOSEN);
          // console.log($('.chooseTopic').val());
        });
        $('.startexam').click(function(){
          // console.log("Start Exam");
          let examLog = {
            "user_id":1,
            "subject_id":exam.data.STUDENT_SUBJECT_ID_CHOSEN,
            "topic_id":exam.data.STUDENT_TOPIC_ID_CHOSEN,
            "question_id":1,
            "answer":"X",
            "timeremaining":`00:${$('.subject-timeduration').html()}:00`
          };
          // $("#exams1").load("app/models/exam2.php", {'subject_id':util.data.STUDENT_SUBJECT_ID_CHOSEN});
          loadExamSheet(exam.data.STUDENT_SUBJECT_ID_CHOSEN1);
          // console.log(examLog);
          // $.ajax({
          //   url:"app/models/exam.php",
          //   method: "post",
          //   data: {
          //     action:"setlog",
          //     examlog: examLog
          //   }
          // }).done(function(res){
          //   data = JSON.parse(res);
          //   // console.log(data.result);
          //   if(data.result=="ok"){
          //     $('.chooseSubject').attr('disabled','disabled');
          //     $('.subject-chosen').html(shortText($('.chooseSubject').val()));
          //     $('.startexam').attr('disabled','disabled');
          //     $('.chooseagain').attr('disabled','disabled');
          //     $('.exam-sheet').show();
          //     // $('.chooseSubject').removeAttr('disabled');
          //       $(".exam-timer")
          //       .countdown("2018/01/01", function(event) {
          //         $(this).text(
          //           event.strftime('%H:%M:%S')
          //         );
          //       });
          //   }
          //   else{
          //     console.log("Contact your admin! Course previously taken.");
          //   }
          //   // console.log(res);
          //   // if(res=="not ok"){
          //   //   console.log("Need to consult your admin! Exam previously taken!");
          //   // }
          //   // else{
          //   //   $('.chooseSubject').attr('disabled','disabled');
          //   //   $('.subject-chosen').html(shortText($('.chooseSubject').val()));
          //   //   $('.startexam').attr('disabled','disabled');
          //   //   $('.chooseagain').attr('disabled','disabled');
          //   //   $('.exam-sheet').show();
          //   //   // $('.chooseSubject').removeAttr('disabled');
          //   // }
          // });
        });
        $('.startquiz').click(function(){
          loadQuizSheet(quiz.data.STUDENT_TOPIC_ID_CHOSEN);
        });
      });
    }
    render_StudentSubjects();
    
  });
</script>
