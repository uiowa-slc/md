<section class="portfolio-post-content">
    $Form

    <div class="portfolio-image-list row">
        <div class="large-12">
            <% if $Image %><img src="$Image.URL" alt=""><% end_if %>
        </div>
    </div>
    <div class="portfolio-post-heading row">
        <div class="large-12 columns summary"><h1>$Title</h1>     
            <ul class="staff-work-list">
              <% loop $StaffPages.Sort('RAND()') %>
               <li><a href="$Link"><img src="$Photo.CroppedImage(200,200).URL" /></a></li>
              <% end_loop %>
            </ul>
            <a href="#" id="details-toggle" class="btn">Details</a>
        </div>
    </div>
    <div class="portfolio-post-details row">
        <section class="large-6 columns">
                <%--<% if $Date %>
                    <strong>Created:</strong> $Date.Nice <br /> 
                <% end_if %>--%>
                
                $Content

                <% if $Mediums %>
                    <strong>Mediums:</strong> 
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
                    <strong>Site Link:</strong> 
                   <a href="$SiteLink">$SiteLink</a></strong><br /> 
                <% end_if %>
                <% if $Date %>
                    <strong>Date: $Date</strong> 
                  
                <% end_if %>

        </section>
        <section class="large-6 columns portfolio-roles">          
                <% if $Roles %>
                    <% loop $Roles %>
                        <div class="role">
                            <h3>$Title</h3>
                            <% loop $StaffPages %>
                                <a href="#">$Title<% if not $Last %>, <% end_if %></a>
                            <% end_loop %>
                        </div>
                    <% end_loop %>
                <% end_if %>             
        </section>    
    </div>
    <div class="portfolio-image-list row">
        <div class="large-12">
             <% loop $AlternativeImages %>
                    <img src="$URL" alt="$Top.$Title">  
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