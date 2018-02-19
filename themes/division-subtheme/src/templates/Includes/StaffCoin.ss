<li>
      <% if $Photo %>
      <a href="$Link" class="staff__link">
            <img class="b-lazy staff-img" data-src="$Photo.CroppedFocusedImage(350,350).URL" data-src-small="$Photo.CroppedFocusedImage(150,150).URL" data-src-medium="$Photo.CroppedFocusedImage(250,250).URL" alt="Image showing $FirstName $LastName">
      </a>
      <% else %>
      <a href="$Link" class="staff__link">
            <img src="{$ThemeDir}/images/staff-coin-placeholder.png" alt="Image showing $FirstName $LastName" class="staff-img">
      </a>
      <% end_if %>
      <p class="staff-name">
            <a href="$Link" class="show-for-large">$FirstName $LastName</a>
            <a href="$Link" class="hide-for-large">$FullNameTruncated</a>
            <% if $Position %><small class="staff-position show-for-large">$Position</small><% end_if %>
      </p>
</li>