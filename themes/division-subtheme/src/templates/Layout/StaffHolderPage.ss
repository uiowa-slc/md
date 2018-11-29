$Header
<div class="container clearfix">
	<div class="row large-12 columns">
	<section class="staff">
		<h1 class="text-center">$Title</h1>
		$Form
		$Content
		<% loop Teams %>
			<% if $Title != "Alumni" %>
				<div class="">
					<h2 class="staff__title">$Title</h2>
					<ul class="staff__coin-list">
						<% loop $ActiveStaffPages.Sort("LastName ASC") %>
							<% include StaffCoin %>
						<% end_loop %>
					</ul>
				</div>
				<hr />
			<% else %>
				<div class="">
					<h2 class="staff__title">$Title</h2>
					<ul class="staff__coin-list staff__coin-list--alumni">
						<% loop $StaffPages.Sort("RAND()").Limit(4) %>
							<% if $Photo %>
								<% include StaffCoin %>
							<% end_if %>
						<% end_loop %>
					</ul>
					<p class="text-center alumni-link"><a href="meet-us/alumni" class="btn">View all Alumni</a></p>
				</div>
				<hr />
			<% end_if %>
		<% end_loop %>
	</section>
	</div>
</div>
