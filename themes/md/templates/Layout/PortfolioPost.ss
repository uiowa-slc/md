<section class="portfolio-post-content">
    $Form

    <div class="portfolio-image-list main-image row">
        <div class="large-12">
            <% if $Image %><img class="b-lazy" src="{$ThemeDir}/images/more-staff.gif" data-src="$Image.AbsoluteURL" alt=""><% end_if %>
        </div>
    </div>
    <div class="portfolio-post-heading row">
        <div class="large-12 columns summary"><h1>$Title</h1>     
            <ul class="staff-work-list single">
              <% loop $StaffPages.Sort('RAND()') %>
                <li><img src="$Photo.CroppedImage(200,200).URL" /></li>
              <% end_loop %>
                <li><a href="#" id="details-toggle"><img src="{$ThemeDir}/images/details-toggle.gif" /></a></li>
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
                        <% if $Roles %>
                            <% loop $Roles %>
                                <div class="role $FirstLast">
                                    <h3>$Title</h3>
                                    <% loop $StaffPages %>
                                        <a href="$Link">$Title<% if not $Last %>, <% end_if %></a>
                                    <% end_loop %>
                                </div>
                            <% end_loop %>
                        <% end_if %>             
                </section>

    </div>
    <div class="portfolio-image-list row">
        <div class="large-12">
             <% loop $AlternativeImages %>
                    <img class="b-lazy" src="{$ThemeDir}/images/more-staff.gif" data-src="$URL" alt="$Top.$Title">  
            <% end_loop %>
        </div>
    </div>

    <div class="row">
        <div class="large-12 next-project">
            <% if $NextPage %>
                <% with $NextPage %>
                    <a href="$Link">Next: $Title</a>
                <% end_with %>
            <% end_if %>
        </div>
    </div>

</section>