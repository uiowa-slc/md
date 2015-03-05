<section class="topics active-tags hide-print">
      <div class="row">
          
        <div class="large-6 columns mod">
        <h3 class="mod-title">Filter by Client</h3>
          <% loop $ActiveClients.Sort("Title") %>
            <a href="$Link">$Title</a><% if not $Last %>, <% end_if %>
          <% end_loop %>
        </div>
        <div class="large-6 columns mod"> 
            <h3 class="mod-title">Filter by Medium</h3>
            <% loop $ActiveMediums.Sort("Title") %>
                  <a href="$Link">$Title</a><% if not $Last %>, <% end_if %>
            <% end_loop %>     
        </div>
          
      </div>
</section>