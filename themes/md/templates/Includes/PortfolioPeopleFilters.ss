<div class="staff-filter-list">
    <% loop $StaffPages.Limit(5) %>
      <a href="$Link" <% if $Last %>class="last"<% end_if %>><img src="$Photo.CroppedImage(200,200).URL" /></a>
    <% end_loop %>
      <a href="meet-us" class="more-staff-link"><img src="{$ThemeDir}/images/more-staff.gif" /></a>
</div>