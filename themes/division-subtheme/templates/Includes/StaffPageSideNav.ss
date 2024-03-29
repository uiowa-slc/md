
<%-- 
<% if Menu(2) %>
<nav class="sec-nav">
	<ul class="first-level">
		<% loop ActiveStaffPages %>
			<li <% if $LinkOrCurrent = "current" %>class="active"<% end_if %>><a href="$Link">$MenuTitle</a></li>
		<% end_loop %>
			<li><a href="meet-us/alumni">View Alumni</a></li>
	</ul>
</nav>
<% end_if %> --%>

<% if $Children || $Menu(2) %>
<%-- <nav class="sidenav" data-sticky data-margin-top="0" data-anchor="sticky-nav-area" data-sticky-on="large"> --%>
<nav class="sidenav">
	 <% if $Menu(2) %>
		<% with Level(1) %>
			<h2 class="sidenav__section-title"><% if $LinkOrCurrent = "current" %>$MenuTitle<% else %><a href="$Link">$MenuTitle</a><% end_if %></h2>
		<% end_with %>
	<% end_if %><%-- end_if Menu(2) --%>
	<% if $Menu(2) %>
		<ul class="sidenav__menu">
			<%-- <% with $Level(1) %>
				<li class="sidenav__item sidenav__item--$LinkOrCurrent"><a class="sidenav__link" href="<% if $regularLink %>$regularLink<% else %>$Link<% end_if %>">$MenuTitle</a></li>
			<% end_with %> --%>
			<%-- end_with Level(1) --%>

			<% loop ActiveStaffPages %>
				<li class="sidenav__item sidenav__item--$LinkingMode">
					<a class="sidenav__link" href="<% if $regularLink %>$regularLink<% else %>$Link<% end_if %>">$MenuTitle</a>
					<% if $LinkOrSection == "section" && $Children %>
						<ul class="sidenav__second-level">
							<% loop Children %>
								<li class="sidenav__item sidenav__item--second-level sidenav__item--$LinkingMode"><a class="sidenav__link" href="<% if $regularLink %>$regularLink<% else %>$Link<% end_if %>">$MenuTitle</a>
									<% if $LinkOrSection = "section" && Children %>
										<ul class="sidenav__third-level">
											<% loop Children %>
												<li class="sidenav__item sidenav__item--third-level sidenav__item--$LinkingMode"><a class="sidenav__link" href="<% if $regularLink %>$regularLink<% else %>$Link<% end_if %>">$MenuTitle</a>
											<% end_loop %><%-- end_loop Children --%>
										</ul>
									<% end_if %><%-- end_if $LinkOrSection = "section" && Children --%>
								</li>
							<% end_loop %><%-- end_loop Children --%>
						</ul>
					<% end_if %> <%-- end_if $LinkOrSection = "section" && Children --%>
				</li>
			<% end_loop %><%-- end_loop Menu(2) --%>
		</ul>
	<% end_if %><%-- end_if Menu(2) --%>
</nav>
<% end_if %>