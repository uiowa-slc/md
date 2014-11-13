<div class="filter-container">
<section class="portfolio-holder-content">
      <div class="row">
            <div class="filter-list">
                  <div class="large-12 columns"><% include PortfolioQuickFilters %></div>
                  <%--<div class="large-3 medium-6 columns"><% include PortfolioAudienceFilters %></div>--%>
                 <%-- <div class="large-5 show-for-large-up columns"><% include PortfolioPeopleFilters %></div> --%>
                  <!--<li><% include PortfolioPeopleFilters %></li>-->
            </div>
      </div>
</section>
</div>

<section class="portfolio-holder-content">
	$Form
	$Content
      <% if SelectedTag %>
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
      </ul>
</section>
<div class="container">
      <% include TopicsAndNews %>
</div>