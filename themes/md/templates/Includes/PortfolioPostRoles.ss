<div class="portfolio-roles" id="concat2">
    <hr class="hide-for-large-up" />  
    <% cached 'portfolio-post-roles', ID %>     
        <% if $Roles %>
            <% loop $Roles.Sort("Title") %>
                <div class="role $FirstLast">
                    <h3>$Title</h3>
                    <% loop $SortedStaffPages %>
                        <a href="$Link">$Title<% if not $Last %>, <% end_if %></a>
                    <% end_loop %>
                </div>
            <% end_loop %>
        <% end_if %>  
    <% end_cached %>  
</div>