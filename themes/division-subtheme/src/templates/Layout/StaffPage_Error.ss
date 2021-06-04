$Header
<div class="gradient">
    <section class="container clearfix">
        <div class="white-cover"></div>
        <section class="main-content main-content--with-padding main-content--full-width staff-page">


            <div class="row">
                <div class="columns small-12">
                    <div class="main-content__header">
                        <h1 class="staff-title">Your SLC Public Profile Page</h1>
                    </div>
                </div>
            </div>
            <div class="row">
            	<div class="columns small-12">
                    <p>Sorry, there's been an issue editing your profile. Please email Dustin (<a href="mailto:dustin-quam@uiowa.edu">dustin-quam@uiowa.edu</a>) and tell him you received this error. It's likely his fault.</p>
                    <% if ErrorMessage %>
                    <p>Please include the following error message in the email:</p>
                    <h2>Error information:</h2>
                    $ErrorMessage
                    <% end_if %>
                </div>
            </div><!-- end row -->
            <br />
            <br />

            
           
        </section>
    </section>
</div>

							           
							        
