<div class="staff-filter-list">
    <% loop $StaffPages.Limit(5) %>
      <img src="$Photo.CroppedImage(200,200).URL" />
    <% end_loop %>
</div>