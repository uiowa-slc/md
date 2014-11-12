<% if $BackgroundImage %>
    <div class="img-container" style="background-image: url($BackgroundImage.URL);">
        <div class="img-fifty-top"></div>
    </div>
<% end_if %>
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
                    <strong>Contributors: <br />
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
            <%-- include SideNav --%>


           <% include BlogSideBar %>
            <% include BlogEntrySideNews %>
        </section>
    </div>
</div>