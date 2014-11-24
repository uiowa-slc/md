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
                              <img src="$Image.CroppedFocusedImage(800,500).URL" alt="$Title">
                              <div class="portfolio-card-overlay">&nbsp;</div>
                              <div class="portfolio-card-title"><h2>$Title</h2><p>
                                    <% loop $Mediums.Limit(3) %>$Title<% if not $Last %>, <% end_if %><% end_loop %>
                              </p>
                               
                                        <ul class="staff-work-list">
                                          <% loop $StaffPages.Limit(3) %>
                                           <li><img src="$Photo.CroppedImage(200,200).URL" /></li>
                                          <% end_loop %>
                                                <li><img class="more-staff" src="{$ThemeDir}/images/more-staff.gif" /></li>
                                          </ul>
                                    
                              </div>
                        </a>
                  </li>
            <% end_loop %>
      </ul>
</section>