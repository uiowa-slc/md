$Header
<% if $YoutubeBackgroundEmbed %>
    <div class="backgroundvideo">

      <% if $BackgroundImage %>
         <div id="ESEE" class="backgroundvideo__container" data-interchange="[$BackgroundImage.URL, small], [$BackgroundImage.URL, large]">
         <a href="http://www.youtube.com/embed/$YoutubeBackgroundEmbed" data-video="$YoutubeBackgroundEmbed" class="backgroundvideo__link">
      <% else %>

         <div id="ESEE" class="backgroundvideo__container" data-interchange="[http://img.youtube.com/vi/$YoutubeBackgroundEmbed/sddefault.jpg, small], [http://img.youtube.com/vi/$YoutubeBackgroundEmbed/maxresdefault.jpg, large]">
         <a href="http://www.youtube.com/embed/$YoutubeBackgroundEmbed" data-video="$YoutubeBackgroundEmbed" class="backgroundvideo__link">
      <% end_if %>
         </a>
      </div>
   </div>
   <br /><br />
<% end_if %>
   <div class="column row">

         <h1>$Title</h1>

   </div>
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
         </div>
      </div>
   </div>
   <% include PortfolioPostNavigation %>
</section>
<%-- include ActiveTagsSection --%>
