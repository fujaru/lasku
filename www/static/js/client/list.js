/**
 * Client scripting for Client List page
 * 
 * @author Fajar Chandra
 * @since  0.1.0
 */
$(function() {
	$('#AddBtn').click(function() {
		location.href = Page.add_url;
	});
	
	$('#EditBtn').click(function() {
		location.href = Page.edit_url.replace('{ID}', $('#ClientDetails').attr('data-id'));
	});
	
	$('#DeleteBtn').click(function() {
		var id = $('#ClientDetails').attr('data-id');
		if(confirm("Are you sure to delete " + Page.client_data[id].name + "?")) {
			location.href = Page.delete_url.replace('{ID}', id);
		}
		else
			return false;
	});
	
	$('#DetailsCloseBtn').click(function() {
		$('#ClientDetails').hide();
		$('#ClientList').removeClass('HasDetails');
	});
	
	$('#ClientTable tr').click(function() { 
		var id = $(this).attr('data-id');
		$('#ClientDetails').attr('data-id', id);
		
		$('#ClientTable tr.selected').removeClass('selected');
		$(this).addClass('selected');
		
		var data = Page.client_data[id];
		$('#ClientDetails .Heading h2').html(data.name);
		$('#ClientDetails .StatusLabel').html(data.is_active == 1 ? 
			'<span class="status active">Active</span>' : 
			'<span class="status inactive">Inactive</span>'
		);
		
		$('#ClientDetails .Content').html(
			'<div class="label">Name</div>' + 
			'<div class="value">' + data.name + '</div>' + 
			
			'<div class="label">Total Billed</div>' +
			'<div class="value">0</div>' +
			
			'<div class="label">Total Paid</div>' +
			'<div class="value">0</div>' +
			
			'<div class="label">Balance</div>' +
			'<div class="value">0</div>' +
			
			'<div class="label">Address</div>' + 
			'<div class="value">' + 
				(data.address1 != '' ? data.address1 + '<br />' : '') +
				(data.address2 != '' ? data.address2 + '<br />' : '') +
				(data.city != '' || data.zip != '' ? data.city + ' ' + data.zip + '<br />' : '') +
				(data.state != '' ? data.state + '<br />' : '') +
				(data.country != '' ? data.country + '<br />' : '') +
			'</div>' + 
			
			(data.contact_name != '' ? 
				'<div class="label">Contact Person</div>' +
				'<div class="value">' + data.contact_name + '</div>'
			: '') +
				
			(data.phone != '' ? 
				'<div class="label">Phone</div>' + 
				'<div class="value">' + data.phone + '</div>'
			: '') +
				
			(data.mobile != '' ? 
				'<div class="label">Mobile</div>' +
				'<div class="value">' + data.mobile + '</div>'
			: '') +
				
			(data.fax != '' ? 
				'<div class="label">Fax</div>' +
				'<div class="value">' + data.fax + '</div>'
			: '') +
				
			(data.email != '' ? 
				'<div class="label">Email</div>' +
				'<div class="value"><a href="mailto:' + data.email + '">' + data.email + '</a></div>'
			: '') +
				
			(data.website != '' ? 
				'<div class="label">Website</div>' +
				'<div class="value"><a href="' + data.website + '">' + data.website + '</a></div>'
			: '') +
			
			(data.notes != '' ? 
				'<div class="label">notes</div>' + 
				'<div class="value">' + data.notes.replace(/\n/g, "<br />") + '</div>'
			: '')
		);
		
		// Show the panel
		$('#ClientDetails').show();
		$('#ClientList').addClass('HasDetails');
	});
});
