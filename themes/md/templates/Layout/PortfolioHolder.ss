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
                  <% include PortfolioPostCard %>
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