  <h3>Medium:</h3>
  <ul class="tag-nav">
  	 <% if SelectedTag %>
       <li><a href="{$Link}" class="clear-filters">Clear All Filters</a></li>
    <% end_if %>
    <% loop MediumTags %>
    	<% include TagListItem %>
    <% end_loop %>
  </ul>