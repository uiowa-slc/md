<div class="staff-filter-list large-12 columns">
  <span>By Person:</span>
    <% loop $StaffPages.Limit(12) %>
      <a href="$Link"><img src="$Photo.CroppedImage(200,200).URL" /></a>
    <% end_loop %>
      <a href="meet-us"><img src="{$ThemeDir}/images/more-staff.gif" /></a>
</div>