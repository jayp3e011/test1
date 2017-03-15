
<script type="text/javascript" src="dist/js/jquery.bootpag.min.js"></script>
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
      
      <li class="pull-right"><a href="#">Welcome Student (student@gmail.com)!</a></li>

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
        <div class="row">
          <div class="col-md-4">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Exam Information</h3>
                  <div class="box-tools pull-right">
                    <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
                  </div>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Choose Subject</label>
                      <select class="form-control select2 chooseSubject" style="width: 100%;">
                        <option selected="selected">Loading Subjects...</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="text-red">Note: <span class="text-gray">Please avoid refreshing this page once you started the exam.</span></div>
              </div>
              <div class="box-footer">
                <div class="btn-group pull-right">
                  <button type="submit" class="btn bg-maroon btn-flat margin startexam">Start Examination</button>               
                  <!-- <button type="submit" class="btn bg-purple btn-flat margin chooseagain">Choose Again</button> -->
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md-8">
            <div class="box exam-sheet">
              <div class="box-header with-border">
                <h3 class="box-title subject-chosen">Subject Chosen</h3>
                <h5 class="box-title pull-right">
                  Items you answered: 0
                </h5>
                </div>
                <div class="box-body">
                  <!-- <button type="submit" class="btn bg-green btn-flat startexam">Press this button once you are ready!</button>  -->
                  <!-- <div class="form-group">
                    <label>Choose Topic</label>
                    <select class="form-control select2 chooseTopic" style="width: 100%;">Loading Topics...</select>
                  </div> -->
                  <div class="text-center" style="margin-bottom: 30px;">                    
                      <h1 class="exam-timer">00:00:00</h1>
                      <h6>Time Remaining</h6>                    
                  </div>
                  <div class="row">
                    <center>
                      <ul class="pagination pagination-sm no-margin" id="exam-nav">
                      </ul>
                    </center>  
                  </div>
                  <table class="table" id="exam-table">
                    <tr>
                      <th style="width:150px">Choose Answer</th>
                      <th style="padding-left:30px">Question: <span id="exam-question-sequence">001</span></th>
                    </tr>
                    <tr>
                      <td width="30%">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-sm-3">
                              <label id="exam_handle_a">
                                <div id="exam_select1_a" style="position: absolute;margin-left: 6.5px;margin-top:1px;">A</div>
                                <div id="exam_select2_a" class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                  <input id="exam_radio_a" type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 0;">
                                  <ins id="exam_select_a" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                              </label>                              
                            </div>
                            <div class="col-sm-3">
                              <label id="exam_handle_b">
                                <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">B</div>
                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                  <input id="exam_radio_b" type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 100;">
                                  <ins id="exam_select_b" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                              </label>   
                            </div>
                            <div class="col-sm-3">
                              <label id="exam_handle_c">
                                <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">C</div>
                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                  <input id="exam_radio_c" type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 0;">
                                  <ins id="exam_select_c" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                              </label>   
                            </div>
                            <div class="col-sm-3">
                              <label id="exam_handle_d">
                                <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">D</div>
                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                  <input id="exam_radio_d" type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 0;">
                                  <ins id="exam_select_d" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                              </label>   
                            </div>
                          </div>
                        </div>
                      </td>
                      <td style="padding-left:30px" width="70%">
                        <div id="exam-question">
                          The mailbox rule generally makes acceptance of an offer effective at the time the acceptance is dispatched. The mailbox rule does not apply if
                        </div>
                        <div>&nbsp;</div>
                        <table>
                          <tr>
                            <td valign="top">A.</td>
                            <td style="padding-left:5px" id="exam-choice_a">Both the offeror and offeree are merchants.asdfasdfasdfasdf adsfa dfa sdfa sdf asdf asdf asdf asdf asdf asdf adsf asdf asdf adsf asdf asdf asdf asdf asdf asdf asdfasd f</td>
                          </tr>
                          <tr>
                            <td valign="top">B.</td>
                            <td style="padding-left:5px" id="exam-choice_b">The offer proposes a sale of real estate.</td>
                          </tr>
                          <tr>
                            <td valign="top">C.</td>
                            <td style="padding-left:5px" id="exam-choice_c">The offer provides that an acceptance shall not be effective until actually received.</td>
                          </tr>
                          <tr>
                            <td valign="top">D.</td>
                            <td style="padding-left:5px" id="exam-choice_d">The duration of the offer is not in excess of 3 months.</td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <span id="chosen_intromsg">Please choose a letter now</span>&nbsp;
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
        </div>
      </div>
      <!-- end exam tab -->
      <!-- start quiz tab -->
      <div class="tab-pane" id="takequiz">
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
                      <select class="form-control select2 chooseSubject1" style="width: 100%;">
                        <option selected="selected">Loading Subjects...</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Choose Topic</label>
                      <select class="form-control select2 chooseTopic" style="width: 100%;">Loading Topics...</select>
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
                      <!-- <th style="width:150px">Choose Answer</th> -->
                      <!-- <th style="padding-left:30px">Question: <span id="quiz-question-sequence">001</span></th> -->
                      <th>Question: <span id="quiz-question-sequence">001</span></th>
                    </tr>
                    <tr>
                      <!-- <td width="30%">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-sm-3">
                              <label id="quiz_handle_a">
                                <div id="quiz_select1_a" style="position: absolute;margin-left: 6.5px;margin-top:1px;">A</div>
                                <div id="quiz_select2_a" class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                  <input id="quiz_radio_a" type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 0;">
                                  <ins id="quiz_select_a" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                              </label>                              
                            </div>
                            <div class="col-sm-3">
                              <label id="quiz_handle_b">
                                <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">B</div>
                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                  <input id="quiz_radio_b" type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 100;">
                                  <ins id="quiz_select_b" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                              </label>   
                            </div>
                            <div class="col-sm-3">
                              <label id="quiz_handle_c">
                                <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">C</div>
                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                  <input id="quiz_radio_c" type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 0;">
                                  <ins id="quiz_select_c" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                              </label>   
                            </div>
                            <div class="col-sm-3">
                              <label id="quiz_handle_d">
                                <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">D</div>
                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                  <input id="quiz_radio_d" type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 0;">
                                  <ins id="quiz_select_d" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                              </label>   
                            </div>
                          </div>
                        </div>
                      </td> -->
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
                        <!-- <span id="chosen_intromsg">Please choose a letter now</span>&nbsp; -->
                        <div id="quizNxtBtnHere" class="pull-right"><button class="btn btn-success btn-lg" id="btnNxt" onclick="util.showNextQuiz(util.data.CURRENT_QUIZ_PAGE)"><span>Next</span></button></div>
                        <div id="quizPrevBtnHere" class="pull-left"><button class="btn btn-success btn-lg" id="btnPrev" onclick="util.ShowPrevQuiz(util.data.PREV_QUIZ_PAGE)"><span>Previous</span></button></div>
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
        </div>
      </div>
      <!-- end quiz tab -->
    </div>
  </div>
</div>
<script>

  $(function(){
    $('input[type=radio]').iCheck({
      checkboxClass: 'icheckbox_square-green',
      radioClass: 'iradio_square-green',
      increaseArea: '20%' // optional
    });

    //Home Tab Controllers
    function shortText(text){if(text.length<10)return text; var shortText = jQuery.trim(text).substring(0, 50).split(" ").slice(0, -1).join(" ") + "..."; return shortText; }
    function render_StudentNews(){
      let html = ``;
      for(let i=0;i<5;i++){
        html += `
          <div class="post" style="border:1px solid #ddd;padding:5px;">
            <div class="user-block">
              <img class="img-circle img-bordered-sm" src="dist/img/avatar.png" alt="user image">
              <span class="username">
                <a href="#">The Administrator</a>
                <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
              </span>
              <span class="description">Shared publicly - 7:30 PM today</span>
            </div>
            <p>
              Lorem ipsum represents a long-held tradition for designers,
              typographers and the like. Some people hate it and argue for
              its demise, but others ignore the hate as they create awesome
              tools to help create filler text for everyone from bacon lovers
              to Charlie Sheen fans.
            </p>
            <ul class="list-inline">
              <li><a href="#" class="link-black text-sm"><i class="fa fa-commenting-o margin-r-5"></i> General Announcement</a></li>
              <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-eye margin-r-5"></i> Seen (5)</a></li>
            </ul>
          </div>
        `;
      }
      $('.news').html(html);
    }
    function render_StudentExams(){
      let data = [
        {
          "subject":"Finance",
          "result":{
            "progressbar":"danger",
            "width":"55",
          },
          "score":{
            "badge":"red",
            "data":"55"
          }
        },
        {
          "subject":"Law and Order",
          "result":{
            "progressbar":"yellow",
            "width":"70",
          },
          "score":{
            "badge":"yellow",
            "data":"70"
          }
        },
        {
          "subject":"History",
          "result":{
            "progressbar":"primary",
            "width":"30",
          },
          "score":{
            "badge":"light-blue",
            "data":"30"
          }
        },
        {
          "subject":"Criminal and Investigation",
          "result":{
            "progressbar":"success",
            "width":"100",
          },
          "score":{
            "badge":"green",
            "data":"100"
          }
        }
      ];
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
            <td><span class="badge bg-${data[i].score.badge}">${data[i].score.data}%</span></td>
          </tr>        
      `;
      }
      html+=`</table>`;
      $('.exams').html(html);
      $('.exams-total').html(`Total Exam Taken: 5`);
    }
    render_StudentNews();
    render_StudentExams();

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
        util.data.STUDENT_SUBJECTS_AND_TOPICS = JSON.parse(data);
        // console.log(util.data.STUDENT_SUBJECTS_AND_TOPICS[0][0][0]);
        loadChooseSubject();
        loadChooseSubject1();

        function loadChooseSubject(){
          /*
            bootstrap css select guide
            <option selected="selected">Alabama</option>
            <option>Alaska</option>
            <option disabled="disabled">California (disabled)</option>
          */
          let html = ``;
         util.data.STUDENT_SUBJECTS_AND_TOPICS.map((obj)=>{
            html += `<option>${obj.name}</option>`;          
          });
          $('.chooseSubject').html(html);
        }
        function loadChooseSubject1(){
          /*
            bootstrap css select guide
            <option selected="selected">Alabama</option>
            <option>Alaska</option>
            <option disabled="disabled">California (disabled)</option>
          */
          let html = ``;
         util.data.STUDENT_SUBJECTS_AND_TOPICS.map((obj)=>{
            html += `<option>${obj.name}</option>`;          
          });
          $('.chooseSubject1').html(html);  
          if(util.data.STUDENT_SUBJECTS_AND_TOPICS.length>0){        
            loadChooseTopic(util.data.STUDENT_SUBJECTS_AND_TOPICS[0].name);            
          }
        }
        function loadChooseTopic(subject){          
          let html = ``;
          let index=0;
          for(let obj of util.data.STUDENT_SUBJECTS_AND_TOPICS){
            // console.log(`${obj.name}===${subject}`);
            if(obj.name==subject){
              util.data.STUDENT_SUBJECTS_AND_TOPICS[index][0].map((topic)=>{
                html += `<option value="${topic.id}">${topic.name}</option>`;
                
              });
              break;
            }
            index++;
          }          
          $('.chooseSubject').val(util.data.STUDENT_SUBJECTS_AND_TOPICS[index].name);
          $('.chooseTopic').html(html);
          $('.subject-totalitems').html(util.data.STUDENT_SUBJECTS_AND_TOPICS[index].items);
          $('.subject-passingrate').html(util.data.STUDENT_SUBJECTS_AND_TOPICS[index].passingrate);
          $('.subject-timeduration').html(util.data.STUDENT_SUBJECTS_AND_TOPICS[index].timeduration);
          $('.subject-attempts').html(util.data.STUDENT_SUBJECTS_AND_TOPICS[index].attempts);
          $('.subject-chosen').html(shortText($('.chooseSubject').val()));

          util.data.STUDENT_SUBJECT_INDEX = index;
          util.data.STUDENT_SUBJECT_ID_CHOSEN = util.data.STUDENT_SUBJECTS_AND_TOPICS[index].id;
          util.data.STUDENT_TOPIC_ID_CHOSEN = $('.chooseTopic').val();
        }

        
        function getTopicID(topic,index){let id = -1; util.data.STUDENT_SUBJECTS_AND_TOPICS[index][0].map((obj)=>{if(obj.name === topic){id = obj.id; } }); return id; }
        
        $('.chooseSubject1').change(function(){
          loadChooseTopic($('.chooseSubject1').val());          
          // console.log($('.chooseSubject').val());
        });
        $('.chooseTopic').change(function(){
          // loadChooseTopic($('.chooseSubject').val());
          util.data.STUDENT_TOPIC_ID_CHOSEN = $('.chooseTopic').val();
          // console.log(util.data.STUDENT_TOPIC_ID_CHOSEN);
          // console.log($('.chooseTopic').val());
        });
        $('.startexam').click(function(){
          // console.log("Start Exam");
          let examLog = {
            "user_id":1,
            "subject_id":util.data.STUDENT_SUBJECT_ID_CHOSEN,
            "topic_id":util.data.STUDENT_TOPIC_ID_CHOSEN,
            "question_id":1,
            "answer":"X",
            "timeremaining":`00:${$('.subject-timeduration').html()}:00`
          };
          // $("#exams1").load("app/models/exam2.php", {'subject_id':util.data.STUDENT_SUBJECT_ID_CHOSEN});
          loadExamSheet(util.data.STUDENT_SUBJECT_ID_CHOSEN);
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
          // console.log("Start Exam");
          let quizLog = {
            "user_id":1,
            "subject_id":util.data.STUDENT_SUBJECT_ID_CHOSEN,
            "topic_id":util.data.STUDENT_TOPIC_ID_CHOSEN,
            "question_id":1,
            "answer":"X",
            "timeremaining":`00:${$('.subject-timeduration').html()}:00`
          };
          // $("#exams1").load("app/models/exam2.php", {'subject_id':util.data.STUDENT_SUBJECT_ID_CHOSEN});
          loadQuizSheet(util.data.STUDENT_TOPIC_ID_CHOSEN);
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
      });
    }
    render_StudentSubjects();



    function loadExamSheet(subject_id)
    {
        // console.log('subjectid_____'+subject_id);
        $.ajax({
            method: "POST",
            url: "app/models/exam.php",
            // data:{'subject_id':subject_id}
            data:{'subject_id':subject_id,'action':'getquestions'}
        }).done(function(questions){
            // console.log(questions);
            // $('#subjectdesc').html(getSubjectDesc(subjectid));
            quest = JSON.parse(questions);
            util.data.STUDENT_SUBJECTS_AND_TOPICS_EXAM = quest;
            // console.log(quest);
            if(quest.length>0){
              util.showExam(0);
              let html = ``;
              for(let i=0;i<quest.length;i++){
                html+=`<li><a href="#" id="btnQuiz${quest[i].id}" onclick="util.showExam(${i})">${util.formatItem(i+1)}</a></li>`;
              }
              $('#exam-nav').html(html);
            }
            else{
              util.showExam(-1);
            }
            $('.chooseSubject').attr('disabled','disabled');
            $('.subject-chosen').html(shortText($('.chooseSubject').val()));
            $('.startexam').attr('disabled','disabled');
            $('.chooseaTopic').attr('disabled','disabled');
            $('.exam-sheet').show();
            // $('.chooseSubject').removeAttr('disabled');

            $(".exam-timer")
            .countdown("2018/01/01", function(event) {
              $(this).text(
                event.strftime('%H:%M:%S')
              );
            });
        });
    }
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
          util.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ = quest;
          util.data.CURRENT_QUIZ_ITEMS = quest.length;
          util.data.PREV_QUIZ_ITEMS = util.data.CURRENT_QUIZ_PAGE-1;
          // console.log(quest);
          if(quest.length>0){
            util.showQuiz(util.data.CURRENT_QUIZ_PAGE);
            // let html = ``;
            // for(let i=0;i<quest.length;i++){
            //   html+=`<li><a href="#" id="btnQuiz${quest[i].id}" onclick="util.showQuiz(${i})">${util.formatItem(i+1)}</a></li>`;
            // }
            // $('#quiz-nav').html(html);
          }
          else{
            util.showQuiz(-1);
          }
          $('.chooseSubject1').attr('disabled','disabled');
          $('.subject-chosen').html(shortText($('.chooseSubject').val()));
          $('.startquiz').attr('disabled','disabled');
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
    $('.exam-sheet').hide();
    $('.quiz-sheet').hide();
  });
class Utilities{
      constructor(){      
        this.data = {
          STUDENT_SUBJECTS_AND_TOPICS:[],
          STUDENT_SUBJECT_INDEX:[],
          STUDENT_SUBJECT_ID_CHOSEN:[],
          STUDENT_TOPIC_ID_CHOSEN:[],
          STUDENT_SUBJECTS_AND_TOPICS_QUIZ:[],
          STUDENT_SUBJECTS_AND_TOPICS_EXAM:[],
          STUDENT_QUIZ_LOG:[],
          STUDENT_SUBJECTS_AND_TOPICS_QUIZ_SELECTED_INDEX:-1,
          CURRENT_QUIZ_ID: 0,
          CURRENT_QUIZ_ITEMS: 0,
          CURRENT_QUIZ_PAGE: 0,
          PREV_QUIZ_PAGE: 0,
          CURRENT_QUIZ_SCORE: 0
        };
      }
      formatItem(val){if(val<10)return '00'+val; else if(val<100)return '0'+val; else return val; }
      showExam(q){
        if (q>=0) {
          // console.log(this.data.STUDENT_SUBJECTS_AND_TOPICS_EXAM[q].question);
          $('#exam-table').show();
          $('#exam-question-sequence').html(this.formatItem(q+1));
          $('#exam-question').html(this.data.STUDENT_SUBJECTS_AND_TOPICS_EXAM[q].question);
          $('#exam-choice_a').html(this.data.STUDENT_SUBJECTS_AND_TOPICS_EXAM[q].choice_a);
          $('#exam-choice_b').html(this.data.STUDENT_SUBJECTS_AND_TOPICS_EXAM[q].choice_b);
          $('#exam-choice_c').html(this.data.STUDENT_SUBJECTS_AND_TOPICS_EXAM[q].choice_c);
          $('#exam-choice_d').html(this.data.STUDENT_SUBJECTS_AND_TOPICS_EXAM[q].choice_d); 
        }
        else{
          $('#exam-table').hide();
          $('#exam-nav').html("NO QUESTION ASSIGNED!");
        }
      }
      //End Exam Utils
      //Quiz Utils
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
        txt+='<font size="2.5">';
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
        txt+='</font>';
        swal({
          title: title,
          text: txt,
          html: true
        });
        $('#btnNxt').attr('disable','disabled');
      }
      ShowPrevQuiz(page)
      {
        this.showQuiz(page);
        this.data.CURRENT_QUIZ_PAGE--;
      }
      showNextQuiz(q)
      {
        // console.log('it__'+this.data.CURRENT_QUIZ_ITEMS);
        // console.log('snq__'+q);
        if (this.data.CURRENT_QUIZ_PAGE<=this.data.CURRENT_QUIZ_ITEMS) {
          // this.saveQuizAnswer();
          this.showQuiz(q);
        }        
        if(this.data.CURRENT_QUIZ_PAGE==this.data.CURRENT_QUIZ_ITEMS)
        {
          let html = `<button class="btn btn-success btn-lg" id="btnSubmit" onclick="util.showQuizResult()"><span>Submit</span>`;
          $('#quizNxtBtnHere').html(html);
        }
        console.log(this.data.STUDENT_QUIZ_LOG);
      }
      showQuiz(q){

        var save = true;
        var log = 0;
        var logs = this.data.STUDENT_QUIZ_LOG;

        
        // console.log('pg__'+this.data.CURRENT_QUIZ_PAGE);
        // if (this.data.CURRENT_QUIZ_PAGE<=0) {
        //   $('#btnPrev').attr('disabled','disable');
        // }
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
          for(log in logs)
          {  
            
            if (logs[log].quizID==this.formatItem(q+1)) {
              save=false;
              console.log(this.formatItem(q+1)+'__'+logs[log].quizID+'__'+save);
              this.quizSelectAnswer(logs[log].selected_answer);
            }
          }
          if (q>=1 && save) {
            this.saveQuizAnswer();
          }

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
            "quizID":$('#quiz-question-sequence').html(),
            "quesID":this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].id,
            "question":$('#quiz-question').html(),
            "selected_answer":"A",
            "selected_answer_details":$('#quiz-choice_A').html(),
            "B_answer_details":$('#quiz-choice_B').html(),
            "C_answer_details":$('#quiz-choice_C').html(),
            "D_answer_details":$('#quiz-choice_D').html(),
            "correct_answer":this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer,
            "correct_answer_details":$('#quiz-choice_'+this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer).html()
          });
        this.showQuizScore(this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer,'A');

        }
        else if(cB){
          this.saveQuizLog({
            "quizID":$('#quiz-question-sequence').html(),
            "quesID":this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].id,
            "question":$('#quiz-question').html(),
            "selected_answer":"B",
            "selected_answer_details":$('#quiz-choice_B').html(),
            "A_answer_details":$('#quiz-choice_A').html(),
            "C_answer_details":$('#quiz-choice_C').html(),
            "D_answer_details":$('#quiz-choice_D').html(),
            "correct_answer":this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer,
            "correct_answer_details":$('#quiz-choice_'+this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer).html()
          });
        this.showQuizScore(this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer,'B');
        }
        else if(cC){
          this.saveQuizLog({
            "quizID":$('#quiz-question-sequence').html(),
            "quesID":this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].id,
            "question":$('#quiz-question').html(),
            "selected_answer":"C",
            "selected_answer_details":$('#quiz-choice_C').html(),
            "B_answer_details":$('#quiz-choice_B').html(),
            "A_answer_details":$('#quiz-choice_A').html(),
            "D_answer_details":$('#quiz-choice_D').html(),
            "correct_answer":this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer,
            "correct_answer_details":$('#quiz-choice_'+this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer).html()
          });
        this.showQuizScore(this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].answer,'C');
        }
        else if(cD){
          this.saveQuizLog({
            "quizID":$('#quiz-question-sequence').html(),
            "quesID":this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[this.data.CURRENT_QUIZ_PAGE].id,
            "question":$('#quiz-question').html(),
            "selected_answer":"D",
            "selected_answer_details":$('#quiz-choice_D').html(),
            "B_answer_details":$('#quiz-choice_B').html(),
            "C_answer_details":$('#quiz-choice_C').html(),
            "A_answer_details":$('#quiz-choice_A').html(),
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
      // console.log(this.data.STUDENT_QUIZ_LOG);
    }
    quizSelectAnswer(answer){
      let btnQuiz = '#btnQuiz'+this.getSelectedQuiz();
      $(btnQuiz).addClass('bg-green');
      if(answer=="A"){
          $('#quiz_radio_a').iCheck('check');
          $('#quiz_radio_b').attr('disabled','disabled');
          $('#quiz_radio_c').attr('disabled','disabled');
          $('#quiz_radio_d').attr('disabled','disabled');
          $('#chosen_intromsg').html("You choose ");
          $('#chosen_letter').html("A");
          $('#chosen_details').html($('#quiz-choice_a').html());
      }
      else if(answer=="B"){
          $('#quiz_radio_b').iCheck('check');
          $('#quiz_radio_a').attr('disabled','disabled');
          $('#quiz_radio_c').attr('disabled','disabled');
          $('#quiz_radio_d').attr('disabled','disabled');
          $('#chosen_intromsg').html("You choose ");
          $('#chosen_letter').html("B");
          $('#chosen_details').html($('#quiz-choice_a').html());
      }
      else if(answer=="C"){
          $('#quiz_radio_c').iCheck('check');
          $('#quiz_radio_a').attr('disabled','disabled');
          $('#quiz_radio_b').attr('disabled','disabled');
          $('#quiz_radio_d').attr('disabled','disabled');
          $('#chosen_intromsg').html("You choose ");
          $('#chosen_letter').html("C");
          $('#chosen_details').html($('#quiz-choice_c').html());
      }
      else if(answer=="D"){
          $('#quiz_radio_d').iCheck('check');
          $('#quiz_radio_a').attr('disabled','disabled');
          $('#quiz_radio_b').attr('disabled','disabled');
          $('#quiz_radio_c').attr('disabled','disabled');
          $('#chosen_intromsg').html("You choose ");
          $('#chosen_letter').html("D");
          $('#chosen_details').html($('#quiz-choice_d').html());
      }
    }
  }
  let util = new Utilities();
</script>
