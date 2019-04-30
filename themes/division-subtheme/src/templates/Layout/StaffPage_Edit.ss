$Header

<section class="main-content main-content--with-padding main-content--full-width staff-page">

            <div class="row">
                <div class="columns small-12">
                    <div class="main-content__header">
                        <h1 class="staff-title">Your M+D Public Profile Page</h1>
                    </div>
                </div>
            </div>
    <div class="row">
        <div class="columns large-8">
            <div class="main-content__header">


                <% if $Saved %>
                <div class="callout success">
                    <p>Your profile has been saved. <a href="$Link">View your public page</a> or continue editing it below:</p>
                </div>
                <% end_if %>
                $EditProfileForm
            </div>
        </div>
        <div class="columns large-4 dp-sticky">

            <% if $Photo %>
               <a href="{$Link}" target="_blank"><img data-interchange="[$Photo.FocusFill(400, 300).URL, small], [$Photo.FocusFill(600, 400).URL, medium], [$Photo.FocusFill(1024, 768).URL, large]" class="edit-profile__image-preview"></a>
            <% end_if %>
            <p><a href="{$Link}" target="_blank" class="button view-public-link">View your public profile <i class="fa fa-external-link" aria-hidden="true"></i></a></p>
        </div>
    </div>

</section>



							           
							        