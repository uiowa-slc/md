<div class="gradient">
      <section class="container clearfix">
            <div class="white-cover"></div>
            <section class="main-content staff-single-content <% if $BackgroundImage %>margin-top<% end_if %>">
            	
            	<% if $Photo %>
            		<img src="$Photo.SetWidth(760).URL" alt="$FirstName $LastName">
            	<% end_if %>
                        <p class="staff-small-info <% if not $Photo %>no-photo<% end_if %>">
                              <% if $Teams %><strong>Team:</strong> <% loop $Teams %>$Title<% if not $Last %>, <% end_if %><% end_loop %><br /><% end_if %>
                              <% if $Location %><strong>From:</strong> $Location<br /><% end_if %>
                              <% if $isStudent %>
                                    <% if $Major %><strong>Major:</strong> $Major<br /><% end_if %>
                              <% end_if %>
                              <% if $LinkedInURL %><a href="$LinkedInURL" target="_blank">View LinkedIn Page</a><br /><% end_if %>
                              <% if $PortfolioURL %><a href="$PortfolioURL" target="_blank">View Portfolio</a><% end_if %>
                        </p>
                        <h1>$Title</h1>
                        <% if $Projects %>
                              <h2>$FirstName's projects</h2>
                              <ul class="medium-block-grid-2 portfolio-card-list">
                                    <% cached %>
                                    <% loop $Projects %>
                                          <% include PortfolioPostCardSmall %>
                                    <% end_loop %>
                                    <% end_cached %>
                              </ul>
                        <% end_if %>
                        
                        <% if $NewsPosts %>
                              <h2>Posts by $FirstName</h2>
                              <ul class="medium-block-grid-2 portfolio-card-list">
                              <% cached 'staff-posts', ID %>
                                    <% loop $NewsPosts %>
                                          <% include PortfolioPostBlogCard %>
                                    <% end_loop %>
                              <% end_cached %>
                              </ul>
                        <% end_if %>

                        <% if $FavoriteProject %>
                              <h2>Favorite M+D project and why?</h2>
                              $FavoriteProject
                        <% end_if %>
                        
                        <% if $Interests %>
                              <h2>Interests</h2>
                              $Interests
                        <% end_if %>


                        <%-- student --%>
                        <% if $isStudent %>

                              <% if $DegreeDescription %>
                                    <h2>Why I chose my degree</h2> 
                                    $DegreeDescription
                              <% end_if %>                                                                                           
                               <% if $TopStrengths %>
                                    <h2>My top strengths</h2>
                                    $TopStrengths
                              <% end_if %>

                              <% if $MDExperience %>
                                    <h2>What I have learned from my experience at M+D</h2> 
                                    $MDExperience
                              <% end_if %>

                              <% if $PostGraduation %>
                              <h2>Plans after graduation</h2> 
                                    $PostGraduation
                              <% end_if %>

                              <% if $FavoriteQuote %>
                                    <h2>Favorite quote</h2> 
                                    <blockquote>$FavoriteQuote</blockquote>
                              <% end_if %>                                                                                                                                                                                                
                         <% end_if %>

                        <%-- alumni --%>
                        <% if $inTeam("Alumni") %>

                              <% if $EmploymentLocation %>
                                    <h2>Where are you employed?</h2>
                                    $EmploymentLocation
                              <% end_if %>

                              <% if $CurrentPosition %>
                                    <h2>What is your current position title?</h2>
                                    $CurrentPosition
                              <% end_if %>

                              <% if $FavoriteMemory %>
                                    <h2>What is your favorite memory of M+D?</h2>
                                    $FavoriteMemory
                              <% end_if %>

                              <% if $Advice %>
                                    <h2>What advice would you give to current students?</h2>
                                    $Advice
                              <% end_if %>


                        <% end_if %>

                        <%-- Professional Staff --%>

                        <% if $inTeam("Professional Staff") %>
                              <% if $PositionTitle %>
                                    <h2>Position title</h2>
                                    $PositionTitle
                              <% end_if %>

                              <% if $EnjoymentFactors %>
                                    <h2>What do you enjoy about working at M+D?</h2>
                                    $EnjoymentFactors
                              <% end_if %>

                              <% if $JoinDate %>
                                    <h2>When did you join the M+D staff?</h2>
                                    $JoinDate
                              <% end_if %>

                              <% if $Background %>
                                    <h2>Background and Education</h2>
                                    $Background
                              <% end_if %>

                        <% end_if %>

                        <% if $isAlum %>
                              <hr />
                              <p><a href="$EditPortfolioLink" target="_blank">Is this your M+D alumni page? If you'd like to make changes to it, please fill out this form.</a></p>

                        <% end_if %>

                        <% if $isStudent %>
                              <hr />
                              <p><a href="$EditPortfolioLink" target="_blank">Is this your M+D staff page? If you'd like to make changes to it, please fill out this form.</a></p>
                        <% end_if %>

                        <% if $inTeam("Professional Staff") %>
                               <hr />
                              <p><a href="$EditPortfolioLink" target="_blank">Is this your M+D professional staff page? If you'd like to make changes to it, please fill out this form.</a></p>
                        <% end_if %>
            </section>
            <section class="sec-content">
                  <% if $isAlum %>
                        <% include AlumniSideNav %>
                  <% else %>
            	     <% include StaffPageSideNav %> 
                  <% end_if %> 
            </section>
      </section>
</div>
<% include TopicsAndNews %>
