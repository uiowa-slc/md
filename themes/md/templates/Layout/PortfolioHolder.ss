<div class="portfolio-holder-container row">
<div class="large-12 columns">
  <section class="portfolio-holder-content">
  	$Form
  	$Content
        <% if SelectedTag %>
              <h1>$SelectedTag.ClassName: $SelectedTag.Title</h1>
        <% end_if %>

       <ul class="small-block-grid-1 medium-block-grid-2 portfolio-card-list">
          <% cached %>
            <% loop PortfolioPosts %>
                  <% include PortfolioPostCard %>
            <% end_loop %>
          <% end_cached %>
        </ul>
  </section>
</div>
    <% if $SelectedTag %>
      <% include PortfolioPostNavigation %>
    <% end_if %>
</div>
<% include ActiveTagsSection %>