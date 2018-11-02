<li>
	<% if $Photo %>
		<a href="$Link" class="staff__link">
			<img class="staff-img" src="$Photo.CroppedFocusedImage(350,260).URL" alt="Image showing $FirstName $LastName">
		</a>
	<% else %>
		<a href="$Link" class="staff__link">
			<img src="{$ThemeDir}/dist/images/staff-coin-placeholder.png" alt="Image showing $FirstName $LastName" class="staff-img">
		</a>
	<% end_if %>
	<p class="staff-name">
		<a href="$Link" class="show-for-large">$FirstName $LastName</a>
		<a href="$Link" class="hide-for-large">$FullNameTruncated</a>
		<br />
		<% if $Position %>
			<small class="staff-position show-for-large">$Position</small>
		<% end_if %>
	</p>
</li>
