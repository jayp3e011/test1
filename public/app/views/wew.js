


function loadExamSheet(topicid)
{
    $.ajax({
        method: "POST",
        url: "app/models/exam.php",
        // data:{'subjectid':subjectid,'action':'getquestions'}
        data:{'topicid':topicid,'action':'getquestions'}
    }).done(function(questions){
        console.log(questions);
        // $('#subjectdesc').html(getSubjectDesc(subjectid));
        quest = JSON.parse(questions);
        // console.log(quest)
        html = "";
        var i = 1;
        for(q in quest){
            let examSheet =`
                <table class="table">
                    <tr>
                        <th style="width:150px">Choose Answer</th>
                        <th style="padding-left:30px" id="questNo">Question: ${i}</th>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="">
                                            <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">A</div>
                                            <div id="r1" class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                                <input type="radio" name="item${i}" class="flat-red" style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="">
                                            <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">B</div>
                                            <div id="r2" class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                                <input type="radio" name="item${i}" class="flat-red" style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="">
                                            <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">C</div>
                                            <div id="r3" class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                                <input type="radio" name="item${i}" class="flat-red" style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="">
                                            <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">D</div>
                                            <div id="r4" class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                                <input type="radio" name="item${i}" class="flat-red" style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td style="padding-left:30px">
                            <div id "question">
                                ${quest[q].question}
                            </div>
                            <div>&nbsp;</div>
                            <table>
                                <tr>
                                    <td valign="top">A.</td>
                                    <td id="cA" style="padding-left:5px">${quest[q].choice_a}</td>
                                </tr>
                                <tr>
                                    <td valign="top">B.</td>
                                    <td id="cB" style="padding-left:5px">${quest[q].choice_b}</td>
                                </tr>
                                <tr>
                                    <td valign="top">C.</td>
                                    <td id="cC" style="padding-left:5px">${quest[q].choice_c}</td>
                                </tr>
                                <tr>
                                    <td valign="top">D.</td>
                                    <td id="cD" style="padding-left:5px">${quest[q].choice_d}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            `;
        }
        $('#examSheet').html(html);
    });
}