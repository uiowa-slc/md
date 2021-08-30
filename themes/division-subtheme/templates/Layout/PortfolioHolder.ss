$Header
<div class="portfolio-holder row row--large">
	<div class="portfolio-holder__columns columns large-12">
		<section class="portfolio-holder__content">
			$Form
			$Content
			<% if SelectedTag %>
				<h1>$SelectedTag.ClassName: $SelectedTag.Title</h1>
				<% if $SelectedTag.ClassName == "Medium" %>
					<p class="text-center"><a href="hire/">Want to work with us in this medium? Give us a shout!</a></p>
				<% end_if %>
				<hr />
			<% end_if %>
			<ul class="project-list">
				<% loop PortfolioPosts %>
					<% if not $IsArchived %>
						<% include PortfolioPostCard %>
					<% end_if %>
				<% end_loop %>
			</ul>
		</section>
	</div>
	<%-- <% if $SelectedTag %>
		<% include PortfolioPostNavigation %>
	<% end_if %> --%>
</div>
<%-- <div class="show-for-large">
	<% include ActiveTagsSection %>
</div> --%>
