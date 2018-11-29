<% cached 'portfolio-post-roles', ID %>
<% if $Roles %>
	<div class="portfolio-roles" id="concat2">
		<p class=""><strong>Credits:</strong><br />
		<% loop $Roles.Sort("Title") %>
				<% loop $SortedStaffPages %>
					<a href="$Link" class="portfolio-roles__anchor">$Title</a>, <small>$Up.Title</small>
					<br />
				<% end_loop %>
		<% end_loop %>
		</p>
	</div>
<% end_if %>
<% end_cached %>
