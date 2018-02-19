   <div class="portfolio-post__details row">
                <div class="columns large-7 large-centered">
                        
                        <div class="portfolio-content">
                        <% include PortfolioPostRoles %>
                        $Content
                        </div>

                        <div class="portfolio-post__details-nav">
                            <a href="#" id="unconcat" class="button details-nav__button">Continue Reading +</a>
                            <% if $SiteLink %>
                               <a href="$SiteLink" class="button details-nav__button" target="_blank">Visit Website</a></strong><br /> 
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
                </div>



    </div>