$Header
<main class="main-content__container" id="main-content__container">

	<!-- Background Image Feature -->
	<% if $BackgroundImage %>
		<% include FeaturedImage %>
	<% end_if %>
	$Breadcrumbs

<% if not $BackgroundImage %>
	<div class="column row">
		<div class="main-content__header">
			<h1>$Title</h1>
		</div>
	</div>
<% end_if %>

$BlockArea(BeforeContent)

<div class="row">

	<article role="main" class="main-content main-content--with-padding <% if $Children || $Menu(2) %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">
		$BlockArea(BeforeContentConstrained)
		<div class="main-content__text">
			$Content

			<h2 class="campaign__image-group-header campaign__image-group-header--facebook" id="facebook">Facebook</h2>
			<div class="campaign__image-container">
				<div class="campaign__image-header campaign__image-header--facebook">
					<div class="row">
						<div class="large-6 columns">
							<h3 class="campaign__image-desc subheader subheader--white">Share Image (1200 x 630)</h3>
						</div>
						<div class="large-6 columns text-right">
							<a href="{$ThemeDir}/dist/images/campaigns/fb1.jpg" class="button button--hollow campaign__save" download>Save Image <i class="fa fa-download" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="large-12 columns">
						<img class="campaign__image" src="{$ThemeDir}/dist/images/campaigns/fb1.jpg" />
					</div>
				</div>
			</div>
			<div class="campaign__image-container">
				<div class="campaign__image-header campaign__image-header--facebook">
					<div class="row">
						<div class="large-6 columns">
							<h3 class="campaign__image-desc subheader subheader--white">Event Cover Image (828 x ~315-465)</h3>
						</div>
						<div class="large-6 columns text-right">
							<a href="{$ThemeDir}/dist/images/campaigns/fb2.jpg" class="button button--hollow campaign__save" download>Save Image <i class="fa fa-download" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="large-12 columns">
						<img class="campaign__image" src="{$ThemeDir}/dist/images/campaigns/fb2.jpg" />
					</div>
				</div>
			</div>
			<h2 class="campaign__image-group-header campaign__image-group-header--twitter" id="twitter">Twitter</h2>
			<div class="campaign__image-container">
				<div class="campaign__image-header campaign__image-header--twitter">
					<div class="row">
						<div class="large-6 columns">
							<h3 class="campaign__image-desc subheader subheader--white">Share Image (440 x 220)</h3>
						</div>
						<div class="large-6 columns text-right">
							<a href="{$ThemeDir}/dist/images/campaigns/twitter1.jpg" class="button button--hollow campaign__save" download>Save Image <i class="fa fa-download" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="large-12 columns">
						<img class="campaign__image" src="{$ThemeDir}/dist/images/campaigns/twitter1.jpg" />
					</div>
				</div>
			</div>
			<h2 class="campaign__image-group-header campaign__image-group-header--instagram" id="instagram">Instagram</h2>
			<div class="campaign__image-container">
				<div class="campaign__image-header campaign__image-header--instagram">
					<div class="row">
						<div class="large-6 columns">
							<h3 class="campaign__image-desc subheader subheader--white">Post Image (1080 x 1080)</h3>
						</div>
						<div class="large-6 columns text-right">
							<a href="{$ThemeDir}/dist/images/campaigns/insta1.jpg" class="button button--hollow campaign__save" download>Save Image <i class="fa fa-download" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			
				<div class="row">
					<div class="large-12 columns">
						<img class="campaign__image" src="{$ThemeDir}/dist/images/campaigns/insta1.jpg" />
					</div>
				</div>
			</div>
			<h2 class="campaign__image-group-header campaign__image-group-header--email" id="email">Email Newsletter</h2>
			<div class="campaign__image-container">
				<div class="campaign__image-header campaign__image-header--email">
					<div class="row">
						<div class="large-6 columns">
							<h3 class="campaign__image-desc subheader subheader--white">Mailchimp Header (1000 x 385)</h3>
						</div>
						<div class="large-6 columns text-right">
							<a href="{$ThemeDir}/dist/images/campaigns/insta1.jpg" class="button button--hollow campaign__save" download>Save Image <i class="fa fa-download" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			
				<div class="row">
					<div class="large-12 columns">
						<img class="campaign__image" src="{$ThemeDir}/dist/images/campaigns/email1.jpg" />
					</div>
				</div>
			</div>
		$BlockArea(AfterContentConstrained)
		$Form
		<% include ChildPages %>
	</article>
	<aside class="sidebar">

		<%-- <nav class="sidenav" data-sticky data-margin-top="0" data-sticky-on="large"> --%>
			<nav class="sidenav">
				<h2 class="sidenav__section-title">Jump to:</h2>
				<ul class="sidenav__menu">
				<li class="sidenav__item campaign__sidenav-item campaign__sidenav-item--facebook">
					<a href="#facebook" class="sidenav__link campaign__sidenav-link">Facebook</a>
				</li>
				<li class="sidenav__item campaign__sidenav-item campaign__sidenav-item--twitter">
					<a href="#twitter" class="sidenav__link campaign__sidenav-link">Twitter</a>
				</li>
				<li class="sidenav__item campaign__sidenav-item campaign__sidenav-item--instagram">
					<a href="#instagram" class="sidenav__link campaign__sidenav-link">Instagram</a>
				</li>
				<li class="sidenav__item campaign__sidenav-item campaign__sidenav-item--email">
					<a href="#email" class="sidenav__link campaign__sidenav-link">Email Newsletter</a>
				</li>
				</ul>
				
			</nav>
			<nav class="sidenav">
			<h2 class="sidenav__section-title">Campaign Details</h2>
			<ul class="sidenav__menu">
				<li class="sidenav__item">
					<span class="sidenav__link">Date published: January 26, 2017</span>
				</li>
				<li class="sidenav__item">
					<span class="sidenav__link">Expires: End of spring semester, 2017</span>
				</li>
				<li class="sidenav__item">
					<span class="sidenav__link">Primary contact: OSMRC <a href="mailto:osmrc@uiowa.edu">osmrc@uiowa.edu</a></span>
				</li>
				<li class="sidenav__item">
					<span class="sidenav__link">Intended audience: Undergrad students</span>
				</li>
			</ul>
		</nav>
	</div>
	</aside>
</div>
$BlockArea(AfterContent)

</main>