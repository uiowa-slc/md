<div class="gradient">
      <section class="container clearfix">
            <div class="white-cover"></div>
            <section class="main-content staff-single-content <% if $BackgroundImage %>margin-top<% end_if %>">
            	<h1>$Title</h1>
            	<% if $Photo %>
            		<img src="$Photo.SetWidth(760).URL" alt="$FirstName $LastName">
            	<% end_if %>
                        <p class="staff-small-info">
                              <% if $Teams %><strong>Team:</strong> <% loop $Teams %>$Title<% if not $Last %>, <% end_if %><% end_loop %><br /><% end_if %>
                              <% if $Location %><strong>From:</strong> $Location<br /><% end_if %>
                              <% if $Major %><strong>Major:</strong> $Major<br /><% end_if %>
                              <% if $LinkedInURL %><a href="$LinkedInURL" target="_blank">View LinkedIn Page</a><br /><% end_if %>
                              <% if $PortfolioURL %><a href="$PortfolioURL" target="_blank">View Portfolio</a><% end_if %>
                        </p>
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
                        <% if $FavoriteProject %>
                              <h2>Favorite M+D project and why?</h2>
                              $FavoriteProject
                        <% end_if %>
                        <% if $PostGraduation %>
                        <h2>Plans after graduation</h2> 
                              $PostGraduation
                        <% end_if %>
                        <% if $FavoriteQuote %>
                              <h2>Favorite quote</h2> 
                              <blockquote>$FavoriteQuote</blockquote>
                        <% end_if %>
                        <% if $Interests %>
                              <h2>Interests</h2>
                              $Interests
                        <% end_if %>

                        <h2>$FirstName's projects</h2>
                        <ul class="medium-block-grid-2 portfolio-card-list">
                              <% loop $Roles %>
                              <% with $PortfolioPost %> 
                              <li>
                                    <a href="$Link">
                                          <img src="$Image.CroppedFocusedImage(800,500).URL" alt="$Title">
                                          <div class="portfolio-card-overlay">&nbsp;</div>
                                          <div class="portfolio-card-title"><h2>$Title</h2><p>
                                          $Up.Title
                                          </p>
                                    </div>
                              </a>
                        </li>
                        <% end_with %>
                        <% end_loop %>
                  </ul>
            </section>
            <section class="sec-content">
            	<% include SideNav %>  
            </section>
      </section>
</div>
<% include TopicsAndNews %>
