<% if not $BackgroundImage %>
<div class="row">
	<div class="columns small-12">
		<div class="main-content__header">
			<h1>$Title<% if $Date %>, $Date.Format('Y')<% end_if %></h1>
		</div>
	</div>
</div>
<br /><br />
<% end_if %>

<div class="row">
	<div class="columns medium-7">
		$Content
	</div>
	<div class="columns medium-4 medium-offset-1">

		<!-- Roles -->
		<% include PortfolioPostRoles %>

		<!-- Client -->
		<% if $Clients %>
			<hr />
			<p class="client">
			<strong>Client:</strong><br />
			<% loop $Clients %>
				<a href="$Link">$Title<% if not Last %>, <% end_if %></a>
			<% end_loop %>
			</p>
		<% end_if %>

		<!-- Mediums -->
		<% if $Mediums %>
			<hr />
			<p class="medium">
			<strong>Services Provided:</strong><br />
			<% loop $Mediums %>
				<a href="$Link">$Title</a>
			<% end_loop %>
			</p>
		<% end_if %>

		<!-- Date -->
		<% if $Date %>
			<hr />
			<p class="date">
				<strong>Date Completed:</strong><br />
				$Date.Format('MMMM, Y')
			</p>
		<% end_if %>

		<!-- Site Link -->
		<% if $SiteLink %>
			<hr />
			<p class="link">
				<strong>Link:</strong><br />
				<a href="$SiteLink" target="_blank">Visit Website</a>
			</p>
		<% end_if %>
	</div>
</div>
<br /><br />
