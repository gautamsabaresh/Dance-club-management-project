$(document).ready(function(){
$('#updateresponse').hide();
$('#deleteresponse').hide();
	$('.edit_data').click(function()
		{
			var userid=this.id;
			var base_url = window.location.origin;
			var posturl= base_url+'/project1/index.php/admin_controller/edituserprofile';
			var data={ 'userid':userid };
			$.ajax(
			{
                url: posturl,
                type: 'post',               
                data: data,
				dataType: "json",
                success: function( returnData )
					{
						console.log(returnData);
						console.log(returnData.email);				
						$('#firstname').val(returnData.fname);
						$('#lastname').val(returnData.lname);
						$('#userid').val(returnData.userid);
						$('#emailid').val(returnData.email);
						$("#user_role").val(returnData.role_id);
						$("#userstatus").val(returnData.userstatus);
						$("#old_userid").val(returnData.userid);
					}
			});
		});

	$('.delete_user').click(function()
	{
		var userid=this.id;
		console.log(userid);
		$("#deluserid").val(userid);
	}); 

	$('#delete_data').click(function()
	{
		var userid	= $("#deluserid").val();
		var base_url = window.location.origin;
		var posturl= base_url+'/project1/index.php/admin_controller/deleteuser';
		var home_list= base_url+'/project1/index.php/admin_controller/list_home';
		var data={ 'userid':userid };
		$.ajax({
                url: posturl,
                type: 'post',               
                data: data,
				dataType: "json",
                success: function( returnData )
				{
					console.log(returnData);
					$('#deleteresponse').show();
					setTimeout(function(){	
						$('#edit_data_Modal').modal('toggle');				
						$('.modal-backdrop').remove();
						$("#listusers").load(home_list);
						},1000);
				}
			});
	});

	$('#updatebtn').click(function()
	{
			var old_userid= $("#old_userid").val();
			var fname = $('#firstname').val();
			var lname = $('#lastname').val();
			var userid = $('#userid').val();
			var email = $('#emailid').val();
			var role_id = $("#user_role").val();
			var userstatus = $("#userstatus").val();
			var base_url = window.location.origin;
			var posturl= base_url+'/project1/index.php/admin_controller/updateprofile';
			var home_list= base_url+'/project1/index.php/admin_controller/list_home';
			var data={ 
					'fname':fname,
					'lname':lname,	
					'userid':userid,
					'email':email,
					'role_id':role_id,
					'user_status':userstatus,
					'old_userid':old_userid
				};
			$.ajax({
                url: posturl,
                type: 'post',               
                data: data,
				dataType: "json",
                success: function( returnData ){
				$('#updateresponse').show();
				setTimeout(function(){	
					$('#delete_data_Modal').modal('toggle');				
					$('.modal-backdrop').remove();
					$("#listusers").load(home_list);
						},1000);
				}
			});
	});
 


	$('.filterable .btn-filter').click(function()
	{
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });
	
	
    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
	
	
});