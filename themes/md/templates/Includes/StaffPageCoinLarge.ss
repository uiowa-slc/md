<li>
      <% if $Photo %>
      <a href="$Link" class="staff-link">
            <img src="$Photo.CroppedImage(350,350).URL" alt="Image showing $FirstName $LastName" class="staff-img">
      </a>
      <% else %>
      <a href="$Link" class="staff-link">
            <img src="{$ThemeDir}/images/staff-coin-placeholder.png" alt="Image showing $FirstName $LastName" class="staff-img">
      </a>
      <% end_if %>
      <p class="staff-name">
            <a href="$Link" class="show-for-large-up">$FirstName $LastName</a>
            <a href="$Link" class="hide-for-large-up">$FullNameTruncated</a>
            <% if $Position %><small class="staff-position">$Position</small><% end_if %>
      </p>
</li>