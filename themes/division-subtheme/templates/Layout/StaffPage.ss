$Header
<div class="gradient">
    <section class="container clearfix">
        <div class="white-cover"></div>
        <section class="staff-page">


            <div class="row">
                <div class="columns small-12">
                    <div class="main-content__header">
                        <h1 class="staff-title">$Title</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="columns large-8">
                    <% if $Photo %>
                        <br />
                        <img data-interchange="[$Photo.FocusFill(400, 300).URL, small], [$Photo.FocusFill(600, 400).URL, medium], [$Photo.FocusFill(1024, 768).URL, large]">
                    <% end_if %>

                    <!-- Q & A -->
                    <div class="staff-qa">
                        <% if $FavoriteProject %>
                            <h4>Favorite M+D project and why?</h4>
                            $FavoriteProject
                        <% end_if %>

                        <% if $Interests %>
                            <h4>Interests</h4>
                            $Interests
                        <% end_if %>


                        <%-- student --%>
                        <% if $isStudent %>
                            <% if $DegreeDescription %>
                                <h4>Why I chose my degree</h4>
                                $DegreeDescription
                            <% end_if %>
                             <% if $TopStrengths %>
                                <h4>My top strengths</h4>
                                $TopStrengths
                            <% end_if %>

                            <% if $MDExperience %>
                                <h4>What I've learned from my experience at M+D</h4>
                                $MDExperience
                            <% end_if %>

                            <% if $PostGraduation %>
                                <h4>Plans after graduation</h4>
                                $PostGraduation
                            <% end_if %>
                         <% end_if %>

                        <%-- alumni --%>
                        <% if $inTeam("Alumni") %>
                            <% if $EmploymentLocation %>
                                <h4>Where I'm currently employed</h4>
                                <% if $EmploymentLocationURL %>
                                    <a href="$EmploymentLocationURL" target="_blank">$EmploymentLocation</a>
                                <% else %>
                                    $EmploymentLocation
                                <% end_if %>
                            <% end_if %>

                            <% if $CurrentPosition %>
                                <h4>My current position title</h4>
                                $CurrentPosition
                            <% end_if %>

                            <% if $FavoriteMemory %>
                                <h4>Favorite memory of M+D</h4>
                                $FavoriteMemory
                            <% end_if %>

                            <% if $Advice %>
                                <h4>What advice would you give to current students?</h4>
                                $Advice
                            <% end_if %>
                        <% end_if %>

                        <%-- Professional Staff --%>

                        <% if $inTeam("Professional Staff") %>
                            <% if $EnjoymentFactors %>
                                <h4>What I enjoy about working at M+D</h4>
                                $EnjoymentFactors
                            <% end_if %>

                            <% if $JoinDate %>
                                <h4>When I joined the M+D staff team</h4>
                                $JoinDate
                            <% end_if %>

                            <% if $Background %>
                                <h4>Background and education</h4>
                                $Background
                            <% end_if %>
                        <% end_if %>

                        <% if $FavoriteQuote %>
                            <h4>Favorite quote</h4>
                            <blockquote>$FavoriteQuote</blockquote>
                        <% end_if %>

                    </div>
                </div><!-- end columns -->
                <div class="columns large-4">
                    <br />
                    <% if $Position %>
                        <p><strong>Position:</strong><br />$Position</p>
                    <% end_if %>

                    <% if $inTeam("Professional Staff") &&  not $inTeam("Alumni") %>
                        <% if $EmailAddress %>
                            <p><strong>Email:</strong><br /><a href="mailto:$EmailAddress">$EmailAddress</a></p>
                        <% end_if %>

                        <% if $Phone %>
                            <p><strong>Phone:</strong><br />$Phone</p>
                        <% end_if %>
                    <% end_if %>

                    <% if $Teams %>
                        <p><strong>Team:</strong><br /><% loop $Teams %>$Title<% if not $Last %>, <% end_if %><% end_loop %></p>
                    <% end_if %>

                    <% if $isStudent %>
                        <% if $Major %>
                            <p><strong>Major:</strong><br />$Major</p>
                        <% end_if %>
                    <% end_if %>

                    <% if not $inTeam("Alumni") %>
                        <%-- <span class="social">
                            <% if $TwitterHandle %><a href="http://www.twitter.com/$TwitterHandle/" class="button social-button" target="_blank">{$TwitterHandle}</a> <% end_if %>
                            <% if $LinkedInURL %><a href="$LinkedInURL" class="button social-button" target="_blank">LinkedIn</a> <% end_if %>
                            <% if $GithubURL %><a href="$GithubURL" class="button social-button" target="_blank">GitHub</a> <% end_if %>
                            <% if $PortfolioURL %><a href="$PortfolioURL" class="button social-button" target="_blank">Website</a><% end_if %>
                        </span> --%>
                        <ul class="staff-social">
                            <% if $InstagramHandle %>
                                <li><a href="http://www.instagram.com/$InstagramHandle/" target="_blank" class="social--instagram">Instagram</a></li>
                            <% end_if %>
                            <% if $TwitterHandle %>
                                <li><a href="http://www.twitter.com/$TwitterHandle/" target="_blank" class="social--twitter">Twitter</a></li>
                            <% end_if %>
                            <% if $LinkedInURL %>
                                <li><a href="$LinkedInURL" target="_blank" class="social--linkedin">LinkedIn</a></li>
                            <% end_if %>
                            <% if $GithubURL %>
                                <li><a href="$GithubURL" target="_blank" class="social--github">Github</a></li>
                            <% end_if %>
                            <% if $PortfolioURL %>
                                <li><a href="$PortfolioURL" target="_blank" class="social--website">Website</a></li>
                            <% end_if %>
                            <%-- <% if $Member %>
                                <li><a href="{$Link}edit">Edit Profile</a></li>
                            <% end_if %> --%>
                        </ul>
                    <% end_if %>
                    <% if $CurrentMemberOwnsPage %>
                    <ul class="staff-social">
                        <li><a href="{$Link}edit">Edit Profile</a></li>
                    </ul>
                    <% end_if %>
                </div>
            </div><!-- end row -->
            <br />
            <br />

            <!-- News Posts -->
            <% if $Posts %>
                <div class="row">
                    <div class="columns small-12">
                        <hr />
                        <h4 class="article-title">Articles by $FirstName</h2>
                        <ul class="articles">
                            <% loop $Posts.limit(9) %>
                                <li class="articles__item">
                                    <a href="$Link" class="articles__title">$Title</a>
                                    <% include ByLine %>
                                </li>
                            <% end_loop %>
                        </ul>
                    </div>
                </div>
            <% end_if %>

            <!-- Project List -->
            <% if $Projects %>
            <div class="row">
                <div class="columns small-12">
                    <hr />
                    <h2 class="project-title">$FirstName's projects</h2>
                    <ul class="project-list">
                        <% loop $Projects.limit(9) %>
                            <% include PortfolioPostCard %>
                        <% end_loop %>
                    </ul>

                    <!-- If more than 9 project, show them in table view -->
                    <% if $Projects.Count > 9 %>
                        <br />
                        <h4>Additional Projects</h4>
                        <ul class="project-table">
                            <% loop $Projects.limit(20,9) %>
                                <li class="project-table__item">
                                    <a href="$Link" class="project-table__anchor">
                                        <h3 class="project-table__title">$Title</h3>
                                        <p class="project-table__year">$Date.Year</p>
                                        <p class="project-table__medium"><% loop $Mediums.Limit(3) %>$Title<% if not $Last %>, <% end_if %><% end_loop %></p>
                                    </a>
                                </li>
                            <% end_loop %>
                        </ul>
                    <% end_if %>
                </div>
            </div>
            <% end_if %>
        </section>
    </section>
</div>
