<div class="staff-filter-list">
    <% loop $StaffPages.Limit(8) %>
      <a href="$Link"><img src="$Photo.CroppedImage(200,200).URL" /></a>
    <% end_loop %>
      <a href="meet-us" class="more-staff-link"><img src="{$ThemeDir}/dist/images/more-staff.gif" /></a>
</div>