$(document).ready(function () {
        var table = $('#genre_table').DataTable({
            "bProcessing": true,
			//"bServerSide": true,
            "sAjaxSource":"./loadtable?id=2",
			"sServerMethod": "POST",
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "iDisplayStart ": 1,
			"start": 1,
			"columns": [
				{ "data": "id" },
				{ "data": "title" },
				{ "data": "deskripsi",  "orderable": false }
				],
            "oLanguage": {
                "sProcessing": "<img src='../../assets/adminlte/plugins/datatables/images/ajax-loader_dark.gif'>"
            },
            "fnInitComplete": function () {
                //oTable.fnAdjustColumnSizing();
            },
            'fnServerData': function (sSource, aoData, fnCallback) {
                $.ajax
                ({
                    'dataType': 'json',
                    'type': "POST",
                    'url': sSource,
                    'data': aoData,
                    'success': fnCallback
                });
            },
			"autoWidth": true
        });
		$('#genre_table tbody').on( 'click', 'tr', function () {
			if ( $(this).hasClass('selected') ) {
				$(this).removeClass('selected');
			}
			else {
				table.$('tr.selected').removeClass('selected');
				$(this).addClass('selected');
				    var dataArr = [];
					var rowData = table.rows('tr.selected').data();
					$.each($(rowData),function(key,value){
						dataArr.push(value["id"]);
					});
					var anime_id=dataArr.toString();
					$.ajax({
						type: "POST",
						url: "getgenre",
						data: {"id":anime_id},
						dataType: "json",
						success: function(data){
							//alert(data[0].title);
							//console.log(data[0]);
							//console.log(data[0].genre);
							//console.log(selectedValues);
							$("#IdGenre_show").val(data[0].id);
							$("#IdGenre").val(data[0].id);
							$("#InputTitle").val(data[0].title);
							$("#InputDescription").val(data[0].deskripsi);
							$(".btn-khusus").prop('disabled', false);
						}
					});
					
			}
		});
		$('#btnReset').on('click', function(){
			$("#IdGenre_show").val('');
			$("#IdGenre").val('');
			$("#InputTitle").val('');
			$("#InputDescription").val('');
			$(".btn-khusus").prop('disabled', true);
			table.$('tr.selected').removeClass('selected');
		});
		
    });