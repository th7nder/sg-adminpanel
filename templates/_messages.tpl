{if $MESSAGES}
	{if $MESSAGES.success}
		{foreach $MESSAGES.success as $msg}
			<div class="alert alert-icon alert-success alert-dismissable fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="icon-checkmark"></i> {$msg}
			</div>
		{/foreach}
	{/if}
	
	{if $MESSAGES.info}
		{foreach $MESSAGES.info as $msg}
			<div class="alert alert-icon alert-info alert-dismissable fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="icon-info"></i> {$msg}
			</div>
		{/foreach}	
	{/if}
	
	{if $MESSAGES.warning}
		{foreach $MESSAGES.warning as $msg}
			<div class="alert alert-icon alert-warning alert-dismissable fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="icon-warning"></i> {$msg}
			</div>
		{/foreach}	
	{/if}
	
	{if $MESSAGES.error}
		{foreach $MESSAGES.error as $msg}
			<div class="alert alert-icon alert-danger alert-dismissable fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="icon-close"></i> {$msg}
			</div>
		{/foreach}	
	{/if}
{/if}