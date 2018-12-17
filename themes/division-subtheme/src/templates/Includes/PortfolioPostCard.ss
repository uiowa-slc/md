<li class="project-list__item">
	<a href="$Link" class="project-list__anchor">
		<div class="project-list__img-holder">
			<img class="project-list__img" src="$Image.CroppedFocusedImage(500,400).URL" alt="$Title">
		</div>
		<div class="project-list__content">
			<h3 class="project-list__title">$Title<% if $Date %>, $Date.Format('Y')<% end_if %></h3>
			<p class="project-list__taglist"><% loop $Mediums.Limit(3) %>$Title<% if not $Last %>, <% end_if %><% end_loop %></p>
		</div>
	</a>
</li>
