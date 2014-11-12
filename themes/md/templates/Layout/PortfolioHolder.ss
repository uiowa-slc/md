<div class="filter-container show-for-large-up">
<section class="portfolio-holder-content">

      <div class="row">
            <div class="filter-list">
                  <div class="large-4 columns"><% include PortfolioQuickFilters %></div>
                  <div class="large-4 columns"><% include PortfolioAudienceFilters %></div>
                  <div class="large-4 columns">$SideBarView</div>
                  <!--<li><% include PortfolioPeopleFilters %></li>-->
            </div>

      </div>
      <div class="row">
            <% include PortfolioPeopleFilters %>
      </div>
</section>
</div>

<section class="portfolio-holder-content">
	$Form
	$Content
      <% if SelectedTag %>
            <h1>Viewing entries tagged as $SelectedTag</h1>
      <% end_if %>
     <ul class="xlarge-block-grid-4 large-block-grid-3 medium-block-grid-2">
      <% loop BlogEntries %>
            <li>
                  <% if $Image %>
                  <a href="$Link" class="staff-link">
                        <img src="$Image.CroppedFocusedImage(550,434).URL" alt="$Title" class="staff-img">
                  </a>
                  <% else %>
                  <a href="$Link" class="staff-link"> 
                        <img src="division-project/images/dosl.png" alt="$Title" class="staff-img">
                  </a>
                  <% end_if %>
                  <h2><a href="$Link">$Title</a></h2>
                  <p><strong>Medium:</strong> $Medium</p>
            </li>
      <% end_loop %>
            <li class="filler"></li>
            <li class="filler"></li>
      </ul>
</section>
<div class="container">
      <% include TopicsAndNews %>
</div>