/**
 * This file include the custom javascript script for Incident management project.
 */

 /**
  * JavaScript Closure for Bootstrap Datepicker
  */
 var date_picker = (function() {
	return function() {
		$("#datepicker_date").datepicker({
			endDate: "+0d"
		});
	};
})();

/**
 * Closure for Validate and submit a form
 */
var validate_form = (function() {
	return function() {
		$("form[id='myform']").validate({
			rules: {
				incident_type: "required",
				incident_date: "required",
				description: {
					required: true,
					maxlength: 1000
				}
			},
			messages: {
				incident_type: "Please Select an Incident type",
				incident_date: "Select date",
				description: {
					required: "Please Enter description about Incident",
					maxlength: "Maximum 1000 characters are allowed."
				} 
			},
			submitHandler: function() {
				var form_data = $("#myform").serialize();
				var incident_type = $("#incident_type").val();
				var incident_date = $("#incident_date").val();
				var description = $("#description").val();
				/**Creating dynamic row for table */
				var tBody =
					"<tr><td>" +
					incident_date +
					"</td><td>" +
					incident_type +
					'</td><td class="text-justify">' +
					description +
					"</td><td><button class='btn btn-outline-danger btn-sm delete_button' disabled>Delete</button>" +
					"</td></tr>";
				$.post("http://localhost/incident_mgmt/index.php/Incident/new_incident",
					form_data,
					function(result) {
						if (result) {
							$('#notice').css("display", "block");
							$("#notice").fadeOut(3000, function(){
								$(this).css("display", "none");
							});
							$("tbody").prepend(tBody); // Appending row to DOM

							/**To reset the form after successfully submission */
							$('form').each(function(){
								this.reset();
							});
						} else {
							alert("Data not inserted");
						}
					}
				);
			}
		});
	};
})();

$(document).ready(function() {
	/**Implementing the data-table */
	$('#mytable').DataTable({
		scrollY:        '50vh',
        scrollCollapse: true,
		paging:         false,
		order: false
	});
	date_picker();
	validate_form();
	
	/** 
	 * This function call on clicking of delete button at the end of each of.
	 * This function sends a ajax post request to delete_incident() method of Incident Controller,
	 * with the ID of the row, as a data.
	 * On success:  Remove row from HTML Table, otherwise shows an 'Failed to delete this row' alert.
	 */
	$('.delete_button').click(function(){
		var element = this;
		var del_id = this.id;
		$.ajax({
			url: "http://localhost/incident_mgmt/index.php/Incident/delete_incident",
			type: 'POST',
			data: { id:del_id },
			success: function(response) {
				if(response){
					// Remove row from HTML Table
	 				$(element).closest('tr').css('background','tomato');
	 				$(element).closest('tr').fadeOut(500,function(){
	    			$(this).remove();
	 				});
				} else {
					alert('Failed to delete this row');
				}
			 }
		});
	});

});
