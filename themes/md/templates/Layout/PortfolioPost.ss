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
                    <img src="$Image.CroppedImage(765,512).URL" alt="">
                <% end_if %>
                	<h1 class="postTitle">$Title</h1>


                <% if $Date %>
                    <h5>Created on: $Date.Nice</h5> 
                   <% end_if %>

                <% if $Roles %>
                    <h6>Project Contribuitors: </h6>
                    <% loop $Roles %>
                    <p>$Title: <% loop $StaffPages %><a href="$Link"> $FirstName $LastName</a><% if not $Last %>, <% end_if %><% end_loop %> </p>
                    <% end_loop %>

             
			    <% end_if %>

                <% if $PieceDescription %>
                	<h6>Description: $PieceDescription</h6> 
                   <% end_if %>

                  <% if $Audience %>
                    <h6>Target Audience: $Audience</h6>  

                  <% end_if %>

                   <% if $Medium %>
                    <h6>Designed for: $Medium</h6>  

                  <% end_if %>

                  <ul>
                <% loop $AlternativeImages %>
                    <li>
                        <img src="$CroppedImage(644,390).URL" alt="$Top.$Title">  
                    </li>
                <% end_loop %>
            </ul>


                    <h3>About Project</h3>               	
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