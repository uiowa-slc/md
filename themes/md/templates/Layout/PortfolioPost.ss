<section class="portfolio-post-content">
    $Form

    <div class="portfolio-image-list main-image row">
        <div class="large-12">
            <% if $Image %><img class="b-lazy $FirstLast" src="{$ThemeDir}/images/placeholder.png" data-src="$Image.SetWidth(1400).URL" data-src-small="$Image.SetWidth(420).URL" data-src-medium="$Image.SetWidth(768).URL" alt="Cover photograph for $Title"><% end_if %>
             <noscript><img src="$Image.SetWidth(600).URL" alt="Cover photograph for $Title" /></noscript>
        </div>
    </div>
    <div class="portfolio-post-heading active row">
        <div class="large-12 columns summary">
            <% if $SiteLink %><h1><a class="external" target="_blank" href="$SiteLink">$Title</a></h1>
            <% else %><h1 class="internal">$Title</h1>
            <% end_if %>
            <ul class="staff-coin-list small">
              <% loop $StaffPages %>
                <% include StaffCoinSmall %>
              <% end_loop %>
                <%--<li><img id="details-toggle" src="{$ThemeDir}/images/details-toggle.gif" alt="More information below." /></li>--%>
            </ul>
            
        </div>
    </div>
    <% include PortfolioPostDetails %>
    <div class="portfolio-image-list row">
        <div class="large-12">
             <% loop $GalleryImages %>
                    <img class="b-lazy $FirstLast" src="{$ThemeDir}/images/placeholder.png" data-src="$SetWidth(1400).URL" data-src-small="$SetWidth(420).URL" data-src-medium="$SetWidth(768).URL" alt="$Top.$Title">
                    <noscript><img src="$Image.SetWidth(600).URL" alt="$Top.Title" /></noscript>
                    <%-- if $Pos == 1 %>
                        <% with $Top %><% include PortfolioPostNavigation %><% end_with %>
                    <% end_if --%>

            <% end_loop %>
        </div>
    </div>
    <% include PortfolioPostNavigation %>
</section>
<% include ActiveTagsSection %>