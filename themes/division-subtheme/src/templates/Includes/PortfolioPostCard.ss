<div class="portfolio__card column column-block">
	<a href="$Link" class="portfolio__card-link">
		<img class="dp-lazy portfolio__cover-image" src="{$ThemeDir}/images/placeholder.png" data-original="$Image.CroppedFocusedImage(690,440).URL" data-original-small="$Image.CroppedFocusedImage(300,191).URL" data-original-medium="$Image.CroppedFocusedImage(400,255).URL"  alt="$Title">
		<div class="portfolio__card-overlay">&nbsp;</div>
		<div class="portfolio__card-title"><h2>$Title</h2>
			<p><% loop $Mediums.Limit(3) %>$Title<% if not $Last %>, <% end_if %><% end_loop %></p>
			<% if $StaffPages %>
			<ul class="staff__coin-list show-for-xlarge-up">
				<% loop $StaffPages.Limit(3) %>
				<% if $Photo %><li><img src="$Photo.CroppedImage(200,200).URL" alt="Photo of $FirstName $LastName" /></li><% end_if %>
				<% end_loop %>
				<li><img class="more-staff" src="{$ThemeDir}/images/more-staff.gif" /></li>
			</ul>
			<% end_if %>
		</div>
	</a>
</div>