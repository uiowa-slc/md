$Header
<% if $BackgroundImage %>
	<% include FeaturedImage %>
	<br /><br />
<% end_if %>
<section class="portfolio-post">
	$Form
	<% include PortfolioPostDetails %>
	<div class="portfolio-post__image-list row row--large">
		<div class="columns large-12">
			<div class="portfolio-gallery">
				<% loop $GalleryImages %>
					<div>
						<img class="dp-lazy $FirstLast" src="{$ThemeDir}/dist/images/placeholder.png" data-original="$SetWidth(1400).URL" data-original-small="$SetWidth(420).URL" data-original-medium="$SetWidth(768).URL" alt="$Top.$Title">
						<% if $Caption %><p class="caption">$Caption</p><% end_if %>
						<%-- <noscript><img src="$Image.SetWidth(600).URL" alt="$Top.Title" /></noscript> --%>
					</div>
				<% end_loop %>
			</div>
		</div>
	</div>
	<% include PortfolioPostNavigation %>
</section>
<%-- include ActiveTagsSection --%>
