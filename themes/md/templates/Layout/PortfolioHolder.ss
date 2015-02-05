<div class="portfolio-holder-container row">
<div class="large-12 columns">
  <section class="portfolio-holder-content">
  	$Form
  	$Content
        <% if SelectedTag %>
              <h1>$SelectedTag.ClassName: $SelectedTag.Title</h1>
        <% end_if %>
       <ul class="medium-block-grid-2 portfolio-card-list">
              <% loop PortfolioPosts %>
                    <li>
                          <a href="$Link">
                                <img class="b-lazy" src="{$ThemeDir}/images/placeholder.png" data-src="$Image.CroppedFocusedImage(672,420).URL" alt="$Title">
                                <div class="portfolio-card-overlay">&nbsp;</div>
                                <div class="portfolio-card-title"><h2>$Title</h2><p>
                                      <% loop $Mediums.Limit(3) %>$Title<% if not $Last %>, <% end_if %><% end_loop %>
                                </p>
                                 <% if $StaffPages %>
                                    <ul class="staff-work-list show-for-xlarge-up">
                                      <% loop $StaffPages.Limit(3) %>
                                            <% if $Photo %><li><img src="$Photo.CroppedImage(200,200).URL" alt="Photo of $FirstName $LastName" /></li><% end_if %>
                                      <% end_loop %>
                                            <li><img class="more-staff" src="{$ThemeDir}/images/more-staff.gif" /></li>
                                      </ul>
                                  <% end_if %>
                          
                                </div>
                          </a>
                    </li>
              <% end_loop %>

        </ul>
  </section>
</div>
    <% if $SelectedTag %>
      <% include PortfolioPostNavigation %>
    <% end_if %>
</div>
<% include ActiveTagsSection %>

<!--<section class="browse-container padding">
      <h2>Advanced Search</h2>
      <p>Additionally, you can filter our projects by the following categories:</p>
      <p><strong>Medium:</strong> <% loop $ActiveMediums %><a href="$Link">$Title<% if not Last %>, <% end_if %></a><% end_loop %><br />
      <strong>Client:</strong><% loop $ActiveClients %><a href="$Link">$Title<% if not Last %>, <% end_if %></a><% end_loop %></p>
</section>-->