<div class="gradient">
      <div class="container clearfix">
            <section class="staff-content main-content">
            	
                  <div class="staff-team $FirstLast">
                        <h2 class="staff-title">M+D Alumni</h2>
                        <ul class="staff-work-list">
                              <% loop $StaffPages.Sort("LastName ASC") %>
                                    <% include StaffPageCoinLarge %>
                              <% end_loop %>
                              <li class="filler"></li>
                              <li class="filler"></li>
                        </ul>
                  </div>
            	
            </section>
            <section class="sec-content hide-print">
                  <% include AlumniSideNav %>
            </section>
      </div>
</div>
<% include TopicsAndNews %>
