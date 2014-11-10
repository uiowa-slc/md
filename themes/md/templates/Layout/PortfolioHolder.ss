<div class="container clearfix">

      
      <section class="portfolio-holder-content main-content">
      	$Form
      	$Content
      	
                 <ul class="staff-list">
                  <% loop BlogEntries %>
                  
                  
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
                        </li>
                  <% end_loop %>
                        <li class="filler"></li>
                        <li class="filler"></li>
                  </ul>
                  
      	
      	
      </section>
</div>
<% include TopicsAndNews %>
