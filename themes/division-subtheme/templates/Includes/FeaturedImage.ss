<% with $BackgroundImage %>
<div class="background-image" data-interchange="[$FocusFill(600,400).URL, small], [$FocusFill(1600,500).URL, medium]" style="background-position: {$PercentageX}% {$PercentageY}%">
<% end_with %>
	<%-- <% if $LayoutType == "MainImage" %> --%>
		<div class="column row">
			<div class="background-image__header">
				<h1 class="background-image__title">$Title<% if $Date %>, $Date.Format('Y')<% end_if %></h1>
			</div>
		</div>
	<%-- <% end_if %> --%>
</div>
