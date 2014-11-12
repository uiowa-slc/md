<div class="staff-filter-list large-12 columns">
    <% loop $StaffPages.Limit(4) %>
      <a href="$Link"><img src="$Photo.CroppedImage(200,200).URL" /></a>
    <% end_loop %>
      <a href="meet-us" class="more-staff-link"><img src="{$ThemeDir}/images/more-staff.gif" /></a>
</div>