<div class="filter-container show-for-large-up">
<section class="portfolio-holder-content">
      <div class="row">
            <div class="filter-list">
                  <div class="large-4 columns"><% include PortfolioQuickFilters %></div>
                  <div class="large-3 columns"><% include PortfolioAudienceFilters %></div>
                  <div class="large-5 columns"><% include PortfolioPeopleFilters %></div>
                  <!--<li><% include PortfolioPeopleFilters %></li>-->
            </div>
      </div>
</section>
</div>

<section class="portfolio-holder-content">
	$Form
	$Content
      <% if SelectedTag %>
            <ul class="tag-nav"><li><a href="{$Link}" class="clear-filters">Clear All Filters</a></li></ul>
            <h1>$SelectedTag.ClassName: $SelectedTag.Title</h1>
      <% end_if %>
     <ul class="xlarge-block-grid-4 large-block-grid-3 medium-block-grid-2">
      <% loop PortfolioPosts %>
            <li>
                  <% if $Image %>
                  <a href="$Link">
                        <img src="$Image.CroppedFocusedImage(550,400).URL" alt="$Title">
                  </a>
                  <% else %>
                  <a href="$Link"> 
                        <img src="division-project/images/dosl.png" alt="$Title">
                  </a>
                  <% end_if %>
            </li>
      <% end_loop %>
            <li class="filler"></li>
            <li class="filler"></li>
      </ul>
</section>
<div class="container">
      <% include TopicsAndNews %>
</div>