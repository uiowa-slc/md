<section class="portfolio-post-content">
    $Form

    <div class="portfolio-image-list main-image row">
        <div class="large-12">
            <% if $Image %><img src="$Image.URL" alt="Cover photograph for $Title"><% end_if %>
        </div>
    </div>
    <div class="portfolio-post-heading row">
        <div class="large-12 columns summary"><h1>$Title</h1>     
            <ul class="staff-work-list single">
              <% loop $StaffPages %>
                <li><img src="$Photo.CroppedImage(200,200).URL" alt="Photograph of a project, $Title" /></li>
              <% end_loop %>
                <li><img id="details-toggle" src="{$ThemeDir}/images/details-toggle.gif" alt="More information below." /></li>
            </ul>
            
        </div>
    </div>
    <div class="portfolio-post-details row">
                <section class="large-7 columns">
                        <%--<% if $Date %>
                            <strong>Created:</strong> $Date.Nice <br /> 
                        <% end_if %>--%>
                        
                        $Content

                        <% if $Mediums %>
                            <% loop $Mediums %>
                                <a href="$Link">$Title<% if not Last %>, <% end_if %></a>
                            <% end_loop %>
                            <br />
                        <% end_if %>


                        <% if $Clients %>
                            <strong>Clients:</strong> 
                            <% loop $Clients %>
                                <a href="$Link">$Title<% if not Last %>, <% end_if %></a>
                            <% end_loop %>
                            <br />
                        <% end_if %>
                        <% if $SiteLink %>
                           <a href="$SiteLink">Visit Website</a></strong><br /> 
                        <% end_if %>


                </section>

                <section class="large-5 end columns portfolio-roles">
                <hr class="hide-for-large-up" />       
                        <% if $Roles %>
                            <% loop $Roles %>
                                <div class="role $FirstLast">
                                    <h3>$Title</h3>
                                    <% loop $SortedStaffPages %>
                                        <a href="$Link">$Title<% if not $Last %>, <% end_if %></a>
                                    <% end_loop %>
                                </div>
                            <% end_loop %>
                        <% end_if %>             
                </section>

    </div>
    <div class="portfolio-image-list row">
        <div class="large-12">
             <% loop $GalleryImages %>
                    <img class="b-lazy" src="{$ThemeDir}/images/more-staff.gif" data-src="$URL" alt="$Top.$Title">  
            <% end_loop %>
        </div>
    </div>

    <% include PortfolioPostNavigation %>

</section>