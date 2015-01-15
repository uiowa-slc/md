 <% if Menu(2) %>
	<% with Level(1) %>
		<h3 class="section-title"><a href="$Link">$MenuTitle</a></h3>
	<% end_with %>
<% end_if %>

<% if Menu(2) %>
<nav class="sec-nav">
	<ul class="first-level">
		<% loop ActiveStaffPages %>
			<li <% if $LinkOrCurrent = "current" %>class="active"<% end_if %>><a href="$Link">$MenuTitle</a></li>
		<% end_loop %>
			<li><a href="meet-us/alumni">View Alumni</a></li>
	</ul>
</nav>
<% end_if %>

<aside>
	<% if SidebarItems %>
		<% loop SidebarItems %>
			<% include SidebarItem %>
		<% end_loop %>
	<% end_if %>
</aside>