$Header
<% if $BackgroundImage %>
   <% include FeaturedImage %>
   <br /><br />
<% end_if %>
<section class="portfolio-post">
   $Form
   <% include PortfolioPostDetails %>
   <div class="portfolio-post__image-list row">
      <div class="columns large-12">
         <div class="portfolio-gallery">
            <% loop $GalleryImages %>
               <div>
                  <img class="dp-lazy $FirstLast" src="{$ThemeDir}/dist/images/placeholder.png" data-original="$ScaleWidth(1200).URL" data-original-small="$ScaleWidth(420).URL" data-original-medium="$ScaleWidth(768).URL" alt="$Top.Title">
                  <% if $Caption %><p class="caption">$Caption</p><% end_if %>
                  <%-- <noscript><img src="$Image.ScaleWidth(600).URL" alt="$Top.Title" /></noscript> --%>
               </div>
            <% end_loop %>
            <br />
            $AfterContentConstrained
         </div>
      </div>
   </div>
   <% include PortfolioPostNavigation %>
</section>

