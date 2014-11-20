<section class="portfolio-post-content">
    $Form

    <div class="portfolio-image-list row">
        <div class="large-12 columns">
            <% if $Image %><img src="$Image.URL" alt=""><% end_if %>
        </div>
    </div>
    <div class="portfolio-post-heading row">
        <div class="large-12 columns details"><h1>$Title</h1>
                        <% loop $Roles %>
                            <ul class="staff-work-list">
                              <% loop $StaffPages %>
                               <li><a href="$Link"><img src="$Photo.CroppedImage(200,200).URL" /></a></li>
                              <% end_loop %>
                            </ul>
                        <% end_loop %>

        <a href="#" id="details">Details +</a></div>
    </div>
    <div class="portfolio-post-details row">
        <section class="large-6 columns">
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
        <section class="large-6 columns portfolio-roles">          
                <% if $Roles %>
                    <% loop $Roles %>
                            <h3>$Title</h3>
                            <% loop $StaffPages %>
                                <a href="#">$Title<% if not $Last %>, <% end_if %></a>
                            <% end_loop %>
                    <% end_loop %>
                <% end_if %>             
        </section>    
    </div>
    <div class="row">
    <div class="portfolio-image-list row">
        <div class="large-12 columns">
             <% loop $AlternativeImages %>
                    <img src="$URL" alt="$Top.$Title">  
            <% end_loop %>
        </div>
    </div>
        <div class="small-12 columns">
           <ul>
   
            </ul>  
        </div>
    </div>


    <!--$Content -->

    
</section>