<section class="portfolio-post-content">
    $Form
    <div class="portfolio-post-heading row">
        <div class="large-3 columns details"><a href="#">Details +</a></div>
        <div class="large-6 columns end"><h1>$Title</h1></div>
        <!--<div class="large-3 columns end">


        <% loop $Roles %>
            <ul class="staff-work-list">
              <% loop $StaffPages %>
               <li><img src="$Photo.CroppedImage(200,200).URL" /></li>
              <% end_loop %>
                    <li><img class="more-staff" src="{$ThemeDir}/images/more-staff.gif" /></li>
              </ul>
          <% end_loop %>
        </div>
    </div>-->
    <!--$Content -->
    <div class="portfolio-image-list">
        <% if $Image %><img src="$Image.CroppedFocusedImage(765,512).URL" alt=""><% end_if %>
    </div>
    
</section>


<%--
<div class="gradient">
    <div class="container clearfix">
        <div class="white-cover"></div>
        <section class="main-content portfolio-single-content <% if $BackgroundImage %>margin-top<% end_if %>">
            <article>

                <% if $Image %>
                    <img src="$Image.CroppedFocusedImage(765,512).URL" alt="">
                <% end_if %>
                	<h1 class="postTitle">$Title</h1>
                    <p>
                <% if $Date %>
                    <strong>Created:</strong> $Date.Nice <br /> 
                <% end_if %>
                <% if $Roles %>
                    <strong>Contributors: </strong> <br />
                    <% loop $Roles %>
                    <strong>$Title:</strong> <% loop $StaffPages %><a href="$Link"> $FirstName $LastName</a><% if not $Last %>, <% end_if %><% end_loop %><br />
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

            <ul>
                <% loop $AlternativeImages %>
                    <li>
                        <img src="$CroppedFocusedImage(644,390).URL" alt="$Top.$Title">  
                    </li>
                <% end_loop %>
            </ul>

            <h2>About Project</h2>               	
	       $Content       
            </article>
        </section>
        
        <section class="sec-content hide-print">


           <% include BlogSideBar %>
        <% include BlogEntrySideNews %>
        </section>
    </div>
</div>--%>