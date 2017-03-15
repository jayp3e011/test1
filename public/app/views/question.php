<script src="app/controllers/question.js"></script>
<script src="dist/js/xlsx.full.min.js"></script>
<div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title">Manage Question</h3>
	</div>
	<div class="box-body">
		<div class="btn-group" role="group" aria-label="...">
			<button id="questiontable-btncreate" type="button" class="btn btn-primary" data-toggle="modal" data-target="#questionmodal-create" data-id="0" style="display:none;">
				<i class="fa fa-plus text-gray"></i> &nbsp;&nbsp;Create </button>
			<button id="questiontable-btnread" type="button" class="btn btn-success" data-toggle="modal" data-target="#questionmodal-read" data-id="0" style="display:none;" disabled>
				<i class="fa fa-eye text-gray"></i> &nbsp;&nbsp;Read </button>
			<button id="questiontable-btnupdate" type="button" class="btn btn-warning" data-toggle="modal" data-target="#questionmodal-update" data-id="0" style="display:none;" disabled>
				<i class="fa fa-pencil text-gray"></i> &nbsp;&nbsp;Update</button>
			<button id="questiontable-btndelete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#questionmodal-delete" data-id="0" style="display:none;" disabled>
				<i class="fa fa-times text-gray"></i> &nbsp;&nbsp;Delete</button>
			<button id="questiontable-btnimport" type="button" class="btn btn-default" data-toggle="modal" data-target="#questionmodal-import" data-id="0" style="display:none;">
				<i class="fa fa-file-excel-o text-green"></i> &nbsp;&nbsp;Import</button>
		</div>
		<div id="questiontable-status" style="text-align: center"></div>
		<div>&nbsp;</div>
		<!-- datatable start-->
		<table id="questiontable" class="table table-bordered table-hover table-responsive">
			<div id="questiontable-loading" style="text-align: center;">
				<img src="dist/img/loading1.gif">
			</div>
		</table>
		<!-- datatable end-->

	</div>				
	<!-- /.box-body -->
</div>
<!-- modals start-->

<!-- read modal start -->
<div class="modal fade" id="questionmodal-read" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-success modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">New message</h4>
			</div>
			<div class="modal-body">			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline" data-dismiss="modal">Close</button> 
			</div>
		</div>
	</div>
</div>
<!-- read modal end -->

<!-- create modal start-->
<div class="modal fade" id="questionmodal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-primary modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Create</h4>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-outline" id="questionbtnmodalcreate">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!-- create modal end -->

<!-- update modal start -->
<div class="modal fade" id="questionmodal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-warning modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">New message</h4>
			</div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-outline" id="questionbtnmodalupdate">Save changes</button>
				<!-- <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>  -->
			</div>
		</div>
	</div>
</div>

<!-- update modal end -->
<!-- delete modal start -->
<div class="modal fade" id="questionmodal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-danger modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">New message</h4>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-outline" id="questionbtnmodaldelete">Save changes</button>
				<!-- <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>  -->
			</div>
		</div>
	</div>
</div>

<!-- delete modal end -->

<!-- modal import start -->
<div class="modal fade" id="questionmodal-import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-default modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Import Question</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input type="file" class="form-control" id="import">
				</div>
				<label for="count" id="count">0</label>&nbsp;<label for="count" id="saved">0</label>
				<!-- <button class="btn btn-lg btn-success" id="btnImport" disabled="disable">Import</button> -->
				<table class="table table-condense table-responsive" id="excelData">
					<thead>
						<tr>
							<th>No.</th>
							<th>Question</th>
							<th>Answer</th>
							<th>Choice A</th>
							<th>Choice B</th>
							<th>Choice C</th>
							<th>Choice D</th>
							<th>Reference</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" id="questionbtnmodalimport" disabled="disable">Import</button>
				<!-- <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>  -->
			</div>
		</div>
	</div>
</div>
<!-- modal import end -->
<!-- modals end-->

<script>
	// $(document).ready(function() {
	//     $('#questiontable').DataTable( {
	//         // initComplete: function () {
	//             this.api().columns().every( function () {
	//                 var column = this;
	//                 var select = $('<select><option value=""></option></select>')
	//                     .appendTo( $(column.footer()).empty() )
	//                     .on( 'change', function () {
	//                         var val = $.fn.dataTable.util.escapeRegex(
	//                             $(this).val()
	//                         );
	 
	//                         column
	//                             .search( val ? '^'+val+'$' : '', true, false )
	//                             .draw();
	//                     } );
	 
	//                 column.data().unique().sort().each( function ( d, j ) {
	//                     select.append( '<option value="'+d+'">'+d+'</option>' )
	//                 } );
	//             } );
	//         // }
	//     } );
	// } );
	$elm = $('#import');
	$elm.on('change', function (changeEvent) {
        var reader = new FileReader();
        
        reader.onload = function (evt) {
			var data = evt.target.result;

			var workbook = XLSX.read(data, {type: 'binary'});

			var headerNames = XLSX.utils.sheet_to_json( workbook.Sheets[workbook.SheetNames[0]], { header: 1 })[0];

			var data = XLSX.utils.sheet_to_json( workbook.Sheets[workbook.SheetNames[0]]);

			// console.log('RAW______'+XLSX.utils.sheet_to_json(workbook.Sheets[workbook.SheetNames]));
			// console.log('head____'+headerNames);
			// console.log(data);

			// dt = JSON.parse(data);
			
			data.map(function(xlobject){
				// console.log(rowCount);
				var html = "";
				html+=  "<tr><td>"+xlobject.__rowNum__+"</td>";
				html+=  "<td>"+xlobject.question+"</td>";
				html+=  "<td>"+xlobject.answer+"</td>";
				html+=  "<td>"+xlobject.choice_a+"</td>";
				html+=  "<td>"+xlobject.choice_b+"</td>";
				html+=  "<td>"+xlobject.choice_c+"</td>";
				html+=  "<td>"+xlobject.choice_d+"</td>";
				html+=  "<td>"+xlobject.reference+"</td>";
				html+=  '<td><span class="label label-danger">Not Saved</span></td><tr>';
				$('#excelData tbody').append(html);
				$('#count').text('Rows: '+xlobject.__rowNum__);
				if ($('#questionbtnmodalimport').on('click', function(e){
					e.preventDefault();
					if (saveData(xlobject.question,xlobject.answer,xlobject.choice_a,xlobject.choice_b,xlobject.choice_c,xlobject.choice_d,xlobject.reference)) {
						alert('Saved....');
					}
					
				}));
			});
			setTimeout(changeTableStatus('<span class="label label-warning">Already Saved</span>'),10000);
			$('#questionbtnmodalimport').removeAttr('disabled', 'disable');
        };
        
        reader.readAsBinaryString(changeEvent.target.files[0]);
  });
function saveData(question,answer,choice_a,choice_b,choice_c,choice_d,reference)
{
	var success = false;
	$.ajax({
		method :"POST",
		url : "app/models/question.php",
		data : {
			'action':'importquestion',
			'question' : question,
			'answer' : answer,
			'choice_a' : choice_a,
			'choice_b' : choice_b,
			'choice_c' : choice_c,
			'choice_d' : choice_d,
			'reference' : reference
		}
		}).done(function(res){
			// alert(res);
			// console.log(res); 
			setTimeout(changeTableStatus('<span class="label label-success">Saved</span>'),3000);
			success = true;
			

		});
		return success;
}
function changeTableStatus(status)
{
	var count = 0;
	$.ajax({
		method :"POST",
		url : "app/models/question.php",
		data : {
			'action':'getQuest1'
		}
	}).done(function(dt){
		var dbe = JSON.parse(dt);
		// console.log(dt);
		dbe.map(function(dbobject){
			$('#excelData tbody tr').each(function(row, tr){
		        if ($(tr).find('td:eq(1)').text() === dbobject.question && $(tr).find('td:eq(2)').text()===dbobject.answer && $(tr).find('td:eq(3)').text()===dbobject.choice_a && $(tr).find('td:eq(4)').text()===dbobject.choice_b && $(tr).find('td:eq(5)').text()===dbobject.choice_c && $(tr).find('td:eq(6)').text()===dbobject.choice_d && $(tr).find('td:eq(7)').text()===dbobject.reference) 
		        {
		        	$(tr).find('td:eq(8)').html(status);
		        	$('#questionbtnmodalimport').attr('disabled','disable');
		        	count++;
		        }
		        
		    }); 
		});
		 $('#saved').text(' / Rows saved: '+count);

	});
}
</script>


