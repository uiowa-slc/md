<% cached 'portfolio-post-roles', ID %>
<% if $Roles %>
	<div class="portfolio-roles" id="concat2">
		<%-- <h3 class="portfolio-roles__title">Project Roles</h3> --%>
		<% loop $Roles.Sort("Title") %>
			<div class="role $FirstLast">
				<p class="portfolio-roles__role"><strong>$Title:</strong>
				<% loop $SortedStaffPages %>
					<a href="$Link" class="portfolio-roles__anchor">$Title<% if not $Last %>, <% end_if %></a>
				<% end_loop %>
				</p>
			</div>
		<% end_loop %>
	</div>
<% end_if %>
<% end_cached %>
