
$Header
<div class="row large-12 columns">
	<section class="staff">
		$Form
		<h1 class="text-center">SLC Alumni Network</h1>
		<p class="text-center">If you've worked at SLC (formerly M+D) in the past and would like to be listed here, please give us a shout at <a href="mailto:imu-web@uiowa.edu" target="_blank">imu-web@uiowa.edu</a>!</p>
		$Content
		<% loop $Teams.Sort("SortOrder") %>
			<div class="$FirstLast">
				<h2 class="staff__title">$Title</h2>
				<ul class="staff__coin-list staff__coin-list--alumni">
					<% loop $AlumniStaffPages.Sort("LastName ASC") %>
						<% include StaffCoin %>
					<% end_loop %>
				</ul>
			</div>
			<hr />
		<% end_loop %>
	</section>
</div>
