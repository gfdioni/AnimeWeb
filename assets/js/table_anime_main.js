 $(document).ready(function () {
        var table = $('#anime_full').DataTable({
            "bProcessing": true,
			//"bServerSide": true,
            "sAjaxSource":"loadtable?id=1",
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
		
    });