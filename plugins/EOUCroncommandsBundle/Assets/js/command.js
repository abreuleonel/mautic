Mautic.commandList = function() { 
	mQuery('.execute_command').on('click', function() {
		var $this = mQuery(this);
		$this.children('span').removeClass('fa-terminal').addClass('fa-spinner fa-spin');
		
		var query = "action=plugin:EOUCroncommands:executeCommand&command=" + mQuery(this).data('cmd');
		
		mQuery.ajax({
	        url: mauticAjaxUrl,
	        type: "POST",
	        data: query,
	        success: function (response) {
	        	mQuery('#MonitoringPreviewModal .modal-body').html('<div class="modal-body-content">' + response.message +  '</div>');
	        	mQuery('#MonitoringPreviewModal').modal();
	        },
	        error: function (request, textStatus, errorThrown) {
	            Mautic.processAjaxError(request, textStatus, errorThrown);
	        },
	        complete: function(response) {
	        	$this.children('span').removeClass('fa-spinner fa-spin').addClass('fa-terminal');
	        }
	    });
		
		
		return false;
	});
	
	
	
};