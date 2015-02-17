   <div class="portfolio-post-details row">
                <section class="large-7 end large-centered columns">
                        
                        <div class="portfolio-content">
                        <% include PortfolioPostRoles %>
                        $Content
                        </div>

                        <div class="portfolio-details-nav">
                            <a href="#" id="unconcat" class="btn">Continue Reading +</a>
                            <% if $SiteLink %>
                               <a href="$SiteLink" class="btn" target="_blank">Visit Website</a></strong><br /> 
                            <% end_if %>
                        </div>
                         <hr />
                        <% if $Mediums %>
                            <strong>Mediums: </strong>
                            <% loop $Mediums %>
                                <a href="$Link">$Title<% if not Last %>, <% end_if %></a>
                            <% end_loop %>
                            <br />
                        <% end_if %>


                        <% if $Clients %>
                            <strong>Clients: </strong> 
                            <% loop $Clients %>
                                <a href="$Link">$Title<% if not Last %>, <% end_if %></a>
                            <% end_loop %>
                            <br />
                        <% end_if %>
                </section>



    </div>