<section class="portfolio-post-content">
    $Form
    <div class="portfolio-post-heading row">
        <div class="large-3 columns details"><a href="#" id="details">Details +</a></div>
        <div class="large-6 columns end"><h1>$Title</h1></div>
        <div class="large-3 columns end">

        </div>
    </div>
    <div class="portfolio-post-details row hide">
  
        <section class="large-6 columns<% if $BackgroundImage %>margin-top<% end_if %>">
            <article>
                <h2 class="text-center">About the Project</h2> 
                    <p>
                <% if $Date %>
                    <strong>Created:</strong> $Date.Nice <br /> 
                <% end_if %>
                <% if $Roles %>
                    <strong>Contributors: </strong> <br />
                    <% loop $Roles %>
                        <ul class="staff-work-list">
                          <% loop $StaffPages %>
                           <li><a href="$Link"><img src="$Photo.CroppedImage(200,200).URL" /></li></a>
                          <% end_loop %>
                            <li><img class="more-staff" src="{$ThemeDir}/images/more-staff.gif" /></li>
                        </ul>
                    <% end_loop %>
                <% end_if %>
                </p>
                <% if $Audience %>
                    <strong>Audience:</strong> 
                    <ul class="tag-nav">
                    <% loop $Audience %>
                        <% include TagListItem %>
                    <% end_loop %>
                    </ul>
                <% end_if %>

                <% if $Mediums %>
                    <strong>Mediums:</strong> 
                    <ul class="tag-nav">
                    <% loop $Mediums %>
                        <% include TagListItem %>
                    <% end_loop %>
                    </ul>
                <% end_if %>
            </section>
            <section class="large-6 columns">          
                $Content       
            </article>
        </section>

    </div>
    <div class="row">
        <div class="small-12 columns">
           <ul>
                <% loop $AlternativeImages %>
                    <li>
                        <img src="$CroppedFocusedImage(644,390).URL" alt="$Top.$Title">  
                    </li>
                <% end_loop %>
            </ul>  
        </div>
    <!--$Content -->
    <div class="portfolio-image-list">
        <% if $Image %><img src="$Image.CroppedFocusedImage(765,512).URL" alt=""><% end_if %>
    </div>
    
</section>