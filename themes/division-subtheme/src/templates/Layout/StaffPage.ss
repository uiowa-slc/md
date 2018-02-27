$Header
<div class="gradient">
      <section class="container clearfix">
            <div class="white-cover"></div>
            <section class="main-content staff-page <% if $BackgroundImage %>margin-top<% end_if %>">
            	
            	<% if $Photo %>
            		<img src="$Photo.SetWidth(760).URL" alt="$FirstName $LastName">
            	<% end_if %>
                        <p class="staff-page__info <% if not $Photo %>no-photo<% end_if %>">
                              <% if $inTeam("Professional Staff") %><strong>Position: </strong>$Position <br />
                                    <% if $EmailAddress %><a href="mailto:$EmailAddress">$EmailAddress <br /></a><% end_if %>
                                     <% if $Phone %><a href="tel:$Phone">$Phone</a><br /><% end_if %>
                              <% end_if %>
                              <% if $Teams %><strong>Team:</strong> <% loop $Teams %>$Title<% if not $Last %>, <% end_if %><% end_loop %><br /><% end_if %>
                              <% if $Location %><strong>From:</strong> $Location<br /><% end_if %>
                              <% if $isStudent %>
                                    <% if $Major %><strong>Major:</strong> $Major<br /><% end_if %>
                              <% end_if %>
                              <span class="social">
                                    <% if $TwitterHandle %><a href="http://www.twitter.com/$TwitterHandle/" class="button social-button" target="_blank">{$TwitterHandle}</a> <% end_if %>
                                    <% if $LinkedInURL %><a href="$LinkedInURL" class="button social-button" target="_blank">LinkedIn</a> <% end_if %>
                               
         
                              <% if $GithubURL %><a href="$GithubURL" class="button social-button" target="_blank">GitHub</a> <% end_if %>
                               <% if $PortfolioURL %><a href="$PortfolioURL" class="button social-button" target="_blank">Website</a><% end_if %>
                               </span>
                        </p>
                        <h1 class="staff-title">$Title</h1>
                        <% if $Projects %>
                              <h2 class="project-title">$FirstName's projects</h2>
                              <div class="row small-up-1 medium-up-2 portfolio__cards">
                                    <% cached 'staff-portfolio-posts', ID %>
                                    <% loop $Projects %>
                                          <% include PortfolioPostCardSmall %>
                                    <% end_loop %>
                                    <% end_cached %>
                              </div>
                        <% end_if %>
                        
                        <% if $NewsPosts %>
                              <h2>Posts by $FirstName</h2>
                              <div class="small-up-1 medium-up-2 portfolio__cards">
                              <% cached 'staff-posts', ID %>
                                    <% loop $NewsPosts %>
                                          <% include PortfolioPostBlogCard %>
                                    <% end_loop %>
                              <% end_cached %>
                              </div>
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
                                    <h2>What I've learned from my experience at M+D</h2> 
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
                                    <h2>Where I'm currently employed</h2>
                                    <% if $EmploymentLocationURL %>
                                          <a href="$EmploymentLocationURL" target="_blank">$EmploymentLocation</a>
                                    <% else %>
                                          $EmploymentLocation
                                    <% end_if %>
                              <% end_if %>

                              <% if $CurrentPosition %>
                                    <h2>My current position title</h2>
                                    $CurrentPosition
                              <% end_if %>

                              <% if $FavoriteMemory %>
                                    <h2>Favorite memory of M+D</h2>
                                    $FavoriteMemory
                              <% end_if %>

                              <% if $Advice %>
                                    <h2>What advice would you give to current students?</h2>
                                    $Advice
                              <% end_if %>

                              <% if $FavoriteQuote %>
                                    <h2>Favorite quote</h2> 
                                    <blockquote>$FavoriteQuote</blockquote>
                              <% end_if %> 

                        <% end_if %>

                        <%-- Professional Staff --%>

                        <% if $inTeam("Professional Staff") %>
      

                              <% if $EnjoymentFactors %>
                                    <h2>What I enjoy about working at M+D</h2>
                                    $EnjoymentFactors
                              <% end_if %>

                              <% if $JoinDate %>
                                    <h2>When I joined the M+D staff team</h2>
                                    $JoinDate
                              <% end_if %>

                              <% if $Background %>
                                    <h2>Background and education</h2>
                                    $Background
                              <% end_if %>

                              <% if $FavoriteQuote %>
                                    <h2>Favorite quote</h2> 
                                    <blockquote>$FavoriteQuote</blockquote>
                              <% end_if %> 

                        <% end_if %>


            </section>
           
            <aside class="sidebar" class="dp-sticky">
                 <% if $isAlum %>
                        <% include AlumniSideNav %>
                  <% else %>
                       <% include StaffPageSideNav %> 
                  <% end_if %> 
                  $BlockArea(Sidebar)
            </aside>
      </section>
</div>
<% include TopicsAndNews %>
