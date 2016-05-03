 $(document).ready(function () {
        var table = $('#anime_full').DataTable({
            "bProcessing": true,
			//"bServerSide": true,
            "sAjaxSource":"./loadtable?id=1",
			"sServerMethod": "POST",
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "iDisplayStart ": 1,
			"start": 1,
			"columns": [
				{ "data": "id" },
				{ "data": "title" },
				{ "data": "eps", "orderable": false },
				{ "data": "desc_pendek",  "orderable": false }
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
		jQuery.getJSON('getgenre').done(
			function( data ) {

				data = $.map(data, function(item) {
					return { id: item.id, text: item.title }; 
				});

				jQuery('#InputGenre').select2({
					placeholder: 'Type any portion of a genre name...',
					allowClear: true,
					minimumInputLength: 1,
					multiple: true,
					data: data
				});
			}
		);
		$('#anime_full tbody').on( 'click', 'tr', function () {
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
						url: "getdata",
						data: {"id":anime_id},
						dataType: "json",
						success: function(data){
							//alert(data[0].title);
							//console.log(data[0]);
							//console.log(data[0].genre);
							//console.log(selectedValues);
							$("#IdAnime_show").val(data[0].id);
							$("#IdAnime").val(data[0].id);
							$("#InputTitle").val(data[0].title);
							$("#InputDescription").val(data[0].desc_panjang);
							if(data[0].genre != ""){
								var json = $.parseJSON(data[0].genre);
								var selectedValues = [];
								$.each(json, function(bb) {
							   selectedValues.push(json[bb]);
								});
								$("#InputGenre").val(selectedValues).trigger("change");
							} else {
								$("#InputGenre").val([""]).trigger("change");
							}
								$(".btn-khusus").prop('disabled', false);
						}
					});
					
			}
		});
		$('#btnReset').on('click', function(){
			$("#IdAnime_show").val('');
			$("#IdAnime").val('');
			$("#InputTitle").val('');
			$("#InputDescription").val('');
			$("#InputGenre").select2("val","");
			$(".btn-khusus").prop('disabled', true);
			table.$('tr.selected').removeClass('selected');
		});
		
    });