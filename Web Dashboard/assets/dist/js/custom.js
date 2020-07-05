$(document).ready(function() {

	// $('table.use_datatable').DataTable();
	var url = window.location;
	var element = $('.spepdppdppd').filter(function() {
		return this.href == url || url.href.indexOf(this.href) == 0;
	}).addClass('active').parent().parent().addClass('in').parent();
	if (element.is('li')) {
		element.addClass('active');
	}
	$('#searchPatient').submit(function() {
		var national_id = $('#national_id_to_search').val();
		var baseUrl = $('#baseUrl').val();
		if (national_id.trim() == '') {
			alert('Please provide patient\'s National ID.');
			$('#national_id_to_search').focus();
			return false;
		} else {
		var $inputs = $('#searchPatient :input');
		var values = {};
		$inputs.each(function() {
			values[this.name] = $(this).val();
		});

		var url = baseUrl+national_id;
			$.get(url, function(data, status){
				var dataLength = data.length;
				var obj = JSON.parse(data);
				if (dataLength === 0 || obj == null){
					$("#resultTable").addClass('hidden');
					$("#updateBtn").addClass('hidden');
					$("#errorText").removeClass('hidden');

				}else {
					$("#resultTable").removeClass('hidden');
					$("#updateBtn").removeClass('hidden');
					$("#errorText").addClass('hidden');

					var fnam = obj.fname;
					var lnam = obj.surname;
					var phone = obj.phone;
					var county = obj.location;
					var gender = obj.gender;
					var email = obj.email;
					var status = obj.status;

					if (status === 'positive'){
						$("#negative").prop("checked", false);
						$("#positive").prop("checked", true);
					}else {

						$("#negative").prop("checked", true);
						$("#positive").prop("checked", false);
					}

					var table = document.getElementById('resultTable');
					table.innerHTML = "";
					var th = '<tr>';
					var thh = '<th>Name</th><th>Phone</th><th>County</th><th>Gender</th><th>Email</th><th>Status</th>' ;
					th += thh;
					th += "</tr>";
					var tr = "<tr>";
					var td = '<td>'+fnam+' '+lnam+'</td>'+'<td>'+phone+'</td>' +'<td>'+county+'</td>' +'<td>'+gender+'</td>' +'<td>'+email+'</td>' +'<td>'+status+'</td>' ;
					tr += td;
					tr += "</tr>";
					th += tr;
					table.innerHTML += (th);
				}
			});

		return false;
		}
	});

	$('#upDateUser').submit(function() {

		var national_id = $('#national_id_to_search').val();

		var formAction = $(this).attr("action");
		var status = document.querySelector('input[name="optradio"]:checked').value;
		 var url = formAction+national_id+"/"+status;
			$.get(url, function(data, status){
				if (data === "true") {
					var baseUrl = $('#baseUrl').val();
					var url = baseUrl+national_id;
					$.get(url, function(data, status){
						var dataLength = data.length;
						if (dataLength === 0){
							$("#resultTable").addClass('hidden');
							$("#updateBtn").addClass('hidden');
							$("#errorText").removeClass('hidden');

						}else {
							$("#resultTable").removeClass('hidden');
							$("#updateBtn").removeClass('hidden');
							$("#errorText").addClass('hidden');
							var obj = JSON.parse(data);
							var fnam = obj.fname;
							var lnam = obj.surname;
							var phone = obj.phone;
							var county = obj.location;
							var gender = obj.gender;
							var email = obj.email;
							var status = obj.status;

							if (status === 'positive'){
								$("#negative").prop("checked", false);
								$("#positive").prop("checked", true);
							}else {

								$("#negative").prop("checked", true);
								$("#positive").prop("checked", false);
							}

							var table = document.getElementById('resultTable');
							table.innerHTML = "";
							var th = '<tr>';
							var thh = '<th>Name</th><th>Phone</th><th>County</th><th>Gender</th><th>Email</th><th>Status</th>' ;
							th += thh;
							th += "</tr>";
							var tr = "<tr>";
							var td = '<td>'+fnam+' '+lnam+'</td>'+'<td>'+phone+'</td>' +'<td>'+county+'</td>' +'<td>'+gender+'</td>' +'<td>'+email+'</td>' +'<td>'+status+'</td>' ;
							tr += td;
							tr += "</tr>";
							th += tr;
							table.innerHTML += (th);
						}
					});

				}
				$('#myModal').modal('hide');
			});

		return false;

	});

});
