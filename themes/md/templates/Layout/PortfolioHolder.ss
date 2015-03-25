<div class="show-for-large-up"><% include ActiveTagsSection %></div>
<div class="portfolio-holder-container row">
<div class="large-12 columns">
  <section class="portfolio-holder-content">
  	$Form
  	$Content
        <% if SelectedTag %>
              <h1>$SelectedTag.ClassName: $SelectedTag.Title</h1>

              <% if $SelectedTag.ClassName == "Medium" %><p class="text-center"><a href="hire/">Want to work with us in this medium? Give us a shout!</a></p><% end_if %>
              <hr />
        <% end_if %>

       <ul class="small-block-grid-1 medium-block-grid-2 portfolio-card-list">
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
<div class="hide-for-large-up"><% include ActiveTagsSection %></div>
