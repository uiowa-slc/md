
      <div class="container clearfix">
            <section class="staff-content">
            	$Form
            	$Content
            	<% loop Teams %>
                        <% if $Title != "Alumni" %>
                              <div class="staff-team $FirstLast">
                                    <h2 class="staff-title">$Title</h2>
                                    <ul class="staff-work-list">
                                          <% loop $ActiveStaffPages.Sort("LastName ASC") %>
                                                <% include StaffPageCoinLarge %>
                                          <% end_loop %>
                                          <li class="filler"></li>
                                          <li class="filler"></li>
                                    </ul>
                              </div>
                              <hr />

                        <% else %>
                              <div class="staff-team $FirstLast">
                                    <h2 class="staff-title">$Title</h2>
                                    <ul class="staff-work-list alumni">
                                          <% loop $StaffPages.Sort("RAND()").Limit(5) %>
                                                <% if $Photo %>
                                                      <% include StaffPageCoinLarge %>
                                                <% end_if %>
                                          <% end_loop %>
                                          <li><a href="meet-us/alumni"><img class="details-toggle" src="{$ThemeDir}/images/details-toggle.gif" alt="More information below." /></a>
                                                <p class="staff-name"><a href="$Link">View all Alumni</a></p>
                                          </li>
                                          <li class="filler"></li>
                                          <li class="filler"></li>
                                    </ul>
                                    <p class="text-center"><a href="meet-us/alumni" class="btn">View all Alumni</a></p>
                              </div>

                        <% end_if %>
            	<% end_loop %>
                  

            	
            </section>
      </div>

<% include TopicsAndNews %>