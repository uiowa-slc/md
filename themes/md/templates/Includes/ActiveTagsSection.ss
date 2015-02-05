<section class="topics active-tags hide-print">
      <div class="row">
          
        <div class="large-6 columns mod">
        <h3 class="mod-title">Clients</h3>
          <% loop $ActiveClients %>
            <a href="$Link">$Title</a><% if not $Last %>, <% end_if %>
          <% end_loop %>
        </div>
        <div class="large-6 columns mod"> 
            <h3 class="mod-title">Mediums</h3>
            <% loop $ActiveMediums %>
                  <a href="$Link">$Title</a><% if not $Last %>, <% end_if %>
            <% end_loop %>     
        </div>
          
      </div>
</section>