$Header

<section class="main-content main-content--with-padding main-content--full-width staff-page">

            <div class="row">
                <div class="columns small-12">
                    <div class="main-content__header">
                        <h1 class="staff-title">Your SLC Public Profile Page</h1>
                    </div>
                </div>
            </div>
    <div class="row">
        <div class="small-12 large-8 columns">
            <div class="main-content__header">


                <% if $Saved %>
                <div class="callout success">
                    <p>Your profile has been saved. <a href="$Link">View your public page</a> or continue editing it below:</p>
                </div>
                <% end_if %>
                $EditProfileForm
            </div>
        </div>
        <div class="small-12 large-4 columns">

            <div class="dp-sticky">
                <% if $Photo %>
                   <a href="{$Link}" target="_blank"><img data-interchange="[$Photo.FocusFill(400, 300).URL, small], [$Photo.FocusFill(600, 400).URL, medium], [$Photo.FocusFill(1024, 768).URL, large]" class="edit-profile__image-preview"></a>
                <% end_if %>
                <p class=""><a href="{$Link}" target="_blank" class="button view-public-link">View your public profile <i class="fa fa-external-link-alt" aria-hidden="true"></i></a></p><p class="edit-profile__photo-blurb">If you'd like to edit/change/remove your profile photo, please email us at <br /><a href="mailto:imu-web@uiowa.edu">imu-web@uiowa.edu</a>.</p>
            </div>
        </div>
    </div>

</section>



							           
							        
