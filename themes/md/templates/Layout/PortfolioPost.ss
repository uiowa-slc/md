<% if $BackgroundImage %>
    <div class="img-container" style="background-image: url($BackgroundImage.URL);">
        <div class="img-fifty-top"></div>
    </div>
<% end_if %>
<div class="gradient">
    <div class="container clearfix">
        <div class="white-cover"></div>
        <section class="main-content <% if $BackgroundImage %>margin-top<% end_if %>">
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

                <% if $PieceDescription %>
                    <strong>Description:</strong> $PieceDescription <br />
                <% end_if %>

                <% if $Audience %>
                    <strong>Target Audience:</strong> $Audience <br />
                <% end_if %>

                <% if $Medium %>
                    <strong>Designed for:</strong> $Medium <br />  
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
                
                    <% if TagsCollection %>
                    <br />
                    <p class="tags">
                         <% _t('TAGS', 'Tags:') %> 
                        <% loop TagsCollection %>
                            <a href="$Link" title="<% _t('VIEWALLPOSTTAGGED', 'View all posts tagged') %> '$Tag'" rel="tag">$Tag</a><% if not Last %>,<% end_if %>
                        <% end_loop %>
                    </p>
                <% end_if %>      

            </article>
        </section>
        
        <section class="sec-content hide-print">
            <%-- include SideNav --%>


           <% include BlogSideBar %>
            <% include BlogEntrySideNews %>
        </section>
    </div>
</div>