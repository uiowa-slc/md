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


                  <% if $Location %><li>From: $Location</li><% end_if %>
                  <% if $Interests %><li>Interests: $Interests</li><% end_if %>
                  <% if $Major %><li>Major: $Major</li><% end_if %>
                  <% if $DegreeDescription %><li>Why I chose my degree: $DegreeDescription</li><% end_if %>
                  <% if $MDExperience %><li>What I have learned from my experience at M+D: $MDExperience</li><% end_if %>
                  <% if $FavoriteProject %><li>Favorite M+D Project and why?: $FavoriteProject</li><% end_if %>
                  <% if $TopStrengths %><li>My Top Strengths: $TopStrengths</li><% end_if %>
                  <% if $FavoriteQuote %><li>Favorite Quote: $FavoriteQuote</li><% end_if %>
                  <% if $PostGraduation %><li>Plans After Graduation: $PostGraduation</li><% end_if %>
                  <% if $LinkedInURL %><li>LinkedIn URL: $LinkedInURL</li><% end_if %>
                  <% if $PortfolioURL %><li>Portfolio URL: $PortfolioURL</li><% end_if %>
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
