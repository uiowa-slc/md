<li>
	<% if $Photo %>
		<a href="$Link" class="staff__link">
			<img class="staff-img" src="$Photo.FocusFill(350,260).URL" alt="Image showing $FirstName $LastName">
		</a>
	<% else %>
		<a href="$Link" class="staff__link">
			<img src="{$ThemeDir}/dist/images/staff-coin-placeholder.png" alt="Image showing $FirstName $LastName" class="staff-img">
		</a>
	<% end_if %>
	<p class="staff-name">
		<a href="$Link" class="staff-name__firstlast">$FirstName $LastName</a>
		<% if $Position %>
			<small class="staff-name__position show-for-medium">$Position</small>
		<% end_if %>
	</p>
</li>
