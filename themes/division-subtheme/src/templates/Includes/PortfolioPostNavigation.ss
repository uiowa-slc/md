<br />

<div class="row">
	<div class="columns large-10 large-centered clearfix">
		<hr />
		<ul class="project-list project-list--prevnext">
			<% if $PreviousPage %>
				<% with $PreviousPage %>
					<% include PortfolioPostCard %>
				<% end_with %>
			<% end_if %>
			<% if $NextPage %>
				<% with $NextPage %>
					<% include PortfolioPostCard %>
				<% end_with %>
			<% end_if %>
		</ul>
	</div>
</div>
