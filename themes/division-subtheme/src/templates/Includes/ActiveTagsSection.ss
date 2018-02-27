<section class="topics active-tags hide-print">
<div class="row expanded">
          
        <div class="columns large-6">
        <h3 class="active-tags__title">Filter by Client</h3>
          <% loop $ActiveClients.Sort("Title ASC") %>
            <a href="$Link">$Title</a><% if not $Last %>, <% end_if %>
          <% end_loop %>
        </div>
        <div class="columns large-6"> 
            <h3 class="active-tags__title">Filter by Medium</h3>
            <% loop $ActiveMediums.Sort("Title ASC") %>
                  <a href="$Link">$Title</a><% if not $Last %>, <% end_if %>
            <% end_loop %>     
        </div>
          
</div>
</section>
