<div class="gradient">
      <section class="container clearfix">
            <div class="white-cover"></div>
            <section class="main-content <% if $BackgroundImage %>margin-top<% end_if %>">
            	<h1>$Title</h1>
            	<% if $Photo %>
            		<img src="$Photo.SetWidth(760).URL" alt="$FirstName $LastName">
            	<% end_if %>
                  <h2>$Position</h2>

                  
                  <ul>
                        <% if $EmailAddress %><li>Email: <a href="mailto:$EmailAddress">$EmailAddress</a></li><% end_if %>
                        <% if $Phone %><li>Phone: $Phone</li><% end_if %>
                        <% if $DepartmentName %>
                              <li>
                                    <% if $DepartmentURL %>
                                          <a href="$DepartmentURL">$DepartmentName</a>
                                    <% else %>
                                          $DepartmentName
                                    <% end_if %>
                              </li>
                        <% end_if %>
                  </ul>

                  <h6> Previous Work </h6>
                  <ul class="staff-list">
                  <% loop $Roles %>
                        
                        <% with $PortfolioPost %> 
                              
                              <li>
                              <% if $Image %>
                              <a href="$Link" class="staff-link">
                                    
                                    <img src="$Image.CroppedFocusedImage(350,234).URL" alt="$Title" class="staff-img">
                              </a>
                              <% else %>
                              <a href="$Link" class="staff-link">
                                    
                                    <img src="division-project/images/dosl.png" alt="$Title" class="staff-img">
                              </a>
                              <% end_if %>
                              <p class="staff-name">
                                    <a href="$Link">$Title</a>
                                    <% if $Position %><small class="staff-position">$Position</small><% end_if %>
                              </p>

                        <% end_with %>
                              <h6>$Title</h6>
                        </li>
                        
                        
                  <% end_loop %>
                </ul>


                  
                  $Content
            </section>
            <section class="sec-content">
            	<% include SideNav %>  
            </section>
      </section>
</div>
<% include TopicsAndNews %>