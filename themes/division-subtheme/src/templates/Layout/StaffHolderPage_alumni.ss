<div class="gradient">
      <div class="container clearfix">
            <section class="staff-content main-content">
            	<h1 class="text-center">M+D Alumni Network</h1>
                  <p class="text-center"><a href="https://docs.google.com/forms/d/1q44t27U28RlkOIUJ_2OXzrEHbxqap3TmLNbjAraLAUg/viewform?usp=send_form" target="_blank">If you've worked at M+D in the past and would like to be listed here, please fill out this form!</a></p>
                  <% loop $Teams.Sort("SortOrder") %>
                  <div class="staff-team $FirstLast">
                        <h2 class="staff-title">$Name</h2>
                        <ul class="staff-coin-list large">
                              <% loop $AlumniStaffPages.Sort("LastName ASC") %>
                                    <% include StaffCoin %>
                              <% end_loop %>
                              <li class="filler"></li>
                              <li class="filler"></li>
                        </ul>
                  </div>
                  <hr />
                  <% end_loop %>
            	
            </section>
            <section class="sec-content hide-print">
                  <% include AlumniSideNav %>
            </section>
      </div>
</div>
<% include TopicsAndNews %>