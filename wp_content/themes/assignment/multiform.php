<?php
/* Template Name: Multi Form */
get_header();
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.js"></script>
<?php
if (isset($_POST['multiform_submit'])) {
    $post_all_fields = $_POST;
    unset($post_all_fields['multiform_submit']);
    unset($post_all_fields['help']);
    $post_all_fields['session_id'] = session_id();
    multiform_enter($post_all_fields);
}
?>
<style type="text/css">
    #registration_form fieldset:not(:first-of-type) {
        display: none;
    }
</style>
<script>
    $(document).ready(function() {
        $('html, body').animate({
            scrollTop: $('#first_slide').offset().top
        }, 'slow');
        var current = 1,
            current_step, next_step, steps;
        steps = $("fieldset").length;
        $(".next").click(function() {
            var form = $("#registration_form");
            form.validate({
                errorElement: 'span',
                errorClass: 'help-block',
                highlight: function(element, errorClass, validClass) {
                    $(element).closest('.form-group').addClass("has-error");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).closest('.form-group').removeClass("has-error");
                }
            });
            if (form.valid() === true) {
                current_step = $(this).parent().parent();
                next_step = $(this).parent().parent().next();
                next_step.show();
                current_step.hide();
                setProgressBar(++current);
            }
        });
        $(".previous").click(function() {
            current_step = $(this).parent().parent();
            next_step = $(this).parent().parent().prev();
            next_step.show();
            current_step.hide();
            setProgressBar(--current);
        });
        setProgressBar(current);
        // Change progress bar action
        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
                .html(percent + "%");
        }
    });
</script>
<div class="container">
    <div class="bwp-sidebar page_sidebar sidebar-product col-lg-3 col-md-3 hidden-sm hidden-xs">
        <?php if (!dynamic_sidebar('Sidebar Shop')) : ?><?php endif; ?>
        <?php if (!dynamic_sidebar('sidebar-28')) : ?><?php endif; ?>
        <?php if (!dynamic_sidebar('sidebar-30')) : ?><?php endif; ?>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <div id="main-content" class="main-content">
            <div id="primary" class="content-area">
                <div id="content" class="site-content" role="main">

                    <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <?php if ($message_info) {
                        ?><div class="alert alert-success" role="alert">
                            <?php echo $message_info; ?>
                        </div>
                    <?php
                    }
                    ?>

                    <form id="registration_form" method="post" role="form" class="form_img">
                        <fieldset>
                            <h2>Approximately how many cubicles or modular furniture units do you need?</h2>
                            <div class="btn-group-toggle row radio_option_btn" data-toggle="buttons">

                                <div class="col-lg-3 col-sm-4 col-xs-12 col-md-3 ">
                                    <div class="form-group btn btn-light"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/1dd5eea4-39b8-4d26-c7fb-b3ae1634faf4.svg" class="svg-radio-btn">
                                        <label for="units">1-2</label>
                                        <input type="radio" class="form-control" name="units" value="1-2" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-4 col-xs-12 col-md-3 ">
                                    <div class="form-group btn btn-light">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/0947ceb6-fde6-40ed-75db-e790b8ba816e.svg" class="svg-radio-btn">
                                        <label for="units">3-5</label>
                                        <input type="radio" class="form-control" name="units" value="3-5">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-4 col-xs-12 col-md-3 ">

                                    <div class="form-group   btn btn-light">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/3bd1bb11-f847-c8b9-ffbf-6f5224e00ec4.svg" class="svg-radio-btn">
                                        <label for="units">6-10</label>
                                        <input type="radio" class="form-control" name="units" value="6-10">
                                    </div>

                                </div>
                                <div class="col-lg-3 col-sm-4 col-xs-12 col-md-3 ">
                                    <div class="form-group btn btn-light">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/f37ae3ac-f2b1-ac48-052d-0e25c3318443.svg" class="svg-radio-btn">
                                        <label for="units">11-49</label>
                                        <input type="radio" class="form-control" name="units" value="11-49">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-4 col-xs-12 col-md-3 ">
                                    <div class="form-group btn btn-light">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/6b26f14c-699f-8c29-7c53-6ae087d2722c.svg" class="svg-radio-btn">
                                        <label for="units">More than 50</label>
                                        <input type="radio" class="form-control" name="units" value="More than 50">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-4 col-xs-12 col-md-3 ">
                                    <div class="form-group btn btn-light">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/5c77bb02-09c2-2d0f-7d6b-15f98f472d6b.svg" class="svg-radio-btn">
                                        <label for="units">Not sure</label>
                                        <input type="radio" class="form-control" name="units" value="Not sure">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" id="first_slide"><input type="button" name="next" class="next btn quote_btn_prev" value="Next" /></div>
                        </fieldset>
                        <fieldset>
                            <h2>Which of the following features are you interested in?</h2>
                            <span>(please select all that apply)</span><br>
                            <div class="col-lg-4 col-sm-4 col-xs-6 col-md-3">
                                <div class="checkbox">
                                    <input type="checkbox" name="features[]" value="Low walls" required>
                                    <label for="features">Low walls</label>

                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-xs-6 col-md-3">
                                <div class="checkbox">
                                    <input type="checkbox" name="features[]" value="High walls">
                                    <label for="features">High walls</label>

                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-xs-6 col-md-3">
                                <div class="checkbox">
                                    <input type="checkbox" name="features[]" value="Glass walls/windows">
                                    <label for=" features">Glass walls/windows</label>

                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-xs-6 col-md-3">
                                <div class="checkbox">
                                    <input type="checkbox" name="features[]" value="Filing systems">
                                    <label for="features">Filing systems</label>

                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-xs-6 col-md-3">
                                <div class="checkbox">
                                    <input type="checkbox" name="features[]" value="Overhead cabinets/bins">
                                    <label for="features">Overhead cabinets/bins</label>

                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-xs-6 col-md-3">
                                <div class="checkbox">
                                    <input type="checkbox" name="features[]" value="Benching">
                                    <label for="features">Benching</label>

                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-xs-6 col-md-3">
                                <div class="checkbox">
                                    <input type="checkbox" name="features[]" value="Other">
                                    <label for="features">Other</label>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="button" name="previous" class="previous btn quote_btn_next" value="Previous" />
                                <input type="button" name="next" class="next btn quote_btn_prev" value="Next" />
                            </div>
                        </fieldset>
                        <fieldset>
                            <h2>How soon are you looking to have your cubicles delivered?</h2>
                            <div class="btn-group-toggle row radio_option_btn" data-toggle="buttons">
                                <div class="col-lg-3 col-sm-4 col-xs-12 col-md-3 ">
                                    <div class="form-group btn btn-light">
                                        <label for="delivered">ASAP</label>
                                        <input type="radio" class="form-control" name="delivered" value="ASAP" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-4 col-xs-12 col-md-3 ">
                                    <div class="form-group  btn btn-light">
                                        <label for="delivered">Less than three months</label>
                                        <input type="radio" class="form-control" name="delivered" value="Less than three months">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-4 col-xs-12 col-md-3 ">
                                    <div class="form-group btn btn-light">
                                        <label for="delivered">In three months or more</label>
                                        <input type="radio" class="form-control" name="delivered" value="In three months or more">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12"><input type="button" name="previous" class="previous btn quote_btn_next" value="Previous" />
                                <input type="button" name="next" class="next btn quote_btn_prev" value="Next" />
                            </div>

                        </fieldset>
                        <fieldset>
                            <h2>What's your zip code?</h2>
                            <span>(Your zip ensures quotes are as accurate as possible for your area. We only serve the U.S. at this time.)</span>
                            <div class="form-group">
                                <input type="text" class="form-control" name="zipcode" value="" required>
                            </div>
                            <div class="col-md-12"> <input type="button" name="previous" class="previous btn quote_btn_next" value="Previous" />
                                <input type="button" name="next" class="next btn quote_btn_prev" value="Next" />
                            </div>

                        </fieldset>
                        <fieldset>
                            <h2>What's your email address?</h2>
                            <span>(This will only be used to provide you your price quotes.)</span>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" value="" required>
                            </div>
                            <div class="col-md-12">
                                <input type="button" name="previous" class="previous btn quote_btn_next" value="Previous" />
                                <input type="button" name="next" class="next btn quote_btn_prev" value="Next" />
                            </div>

                        </fieldset>
                        <fieldset>
                            <h2>Please describe any additional requirements or features you'd prefer. </h2>
                            <span>(optional)</span>
                            <div class="form-group">
                                <textarea class="form-control" name="requirements" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <input type="button" name="previous" class="previous btn quote_btn_next" value="Previous" />
                                <input type="button" name="next" class="next btn quote_btn_prev" value="Next" />
                            </div>

                        </fieldset>
                        <fieldset>
                            <h2>How soon are you looking to have your cubicles delivered?</h2>
                            <div class="btn-group-toggle row radio_option_btn" data-toggle="buttons">
                                <div class="col-lg-4 col-sm-4 col-xs-12 col-md-4 ">
                                    <div class=" form-group col-md-3 btn btn-light">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/d4aac70a-d0b7-a5cf-2402-6960fbf8ec74.svg" class="svg-radio-btn">
                                        <label for="delivered">ASAP</label>
                                        <input type="radio" class="form-control" name="delivered" value="ASAP" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-xs-12 col-md-4 ">
                                    <div class="form-group col-md-3 btn btn-light">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/3210a857-191a-fc62-ed8a-fcb6cc8d77bc.svg" class="svg-radio-btn">
                                        <label for="delivered">Less than three months</label>
                                        <input type="radio" class="form-control" name="delivered" value="Less than three months">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-xs-12 col-md-4 ">
                                    <div class="form-group col-md-3 btn btn-light">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/6671b1cd-032a-36dd-280b-c974655ea6a6.svg" class="svg-radio-btn">
                                        <label for="delivered">In three months or more</label>
                                        <input type="radio" class="form-control" name="delivered" value="In three months or more">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="button" name="previous" class="previous btn quote_btn_next" value="Previous" />
                                <input type="button" name="next" class="next btn quote_btn_prev" value="Next" />
                            </div>
                        </fieldset>
                        <fieldset>
                            <h2>Let's finish up! Tell us about yourself:</h2>
                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control" name="first_name" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control" name="last_name" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="job_title">Your Job Title:</label>
                                <select name="job_title" class="form-control" required>
                                    <option value="">Choose Below...</option>
                                    <option value="Accounting/Finance">Accounting/Finance</option>
                                    <option value="Admin. Assistant">Admin. Assistant</option>
                                    <option value="Attorney">Attorney</option>
                                    <option value="CEO/President/Owner">CEO/President/Owner</option>
                                    <option value="CFO">CFO</option>
                                    <option value="CIO">CIO</option>
                                    <option value="Consultant">Consultant</option>
                                    <option value="Dentist/Physician">Dentist/Physician</option>
                                    <option value="Designer/Writer/Producer">Designer/Writer/Producer</option>
                                    <option value="Educator">Educator</option>
                                    <option value="Engineer/Programmer">Engineer/Programmer</option>
                                    <option value="Facilities/Operations">Facilities/Operations</option>
                                    <option value="General Manager">General Manager</option>
                                    <option value="Human Resources">Human Resources</option>
                                    <option value="Manufacturing">Manufacturing</option>
                                    <option value="Marketing/Public Relations">Marketing/Public Relations</option>
                                    <option value="MIS/IT">MIS/IT</option>
                                    <option value="Office Manager">Office Manager</option>
                                    <option value="Other">Other</option>
                                    <option value="Partner/Principal">Partner/Principal</option>
                                    <option value="Purchasing Manager">Purchasing Manager</option>
                                    <option value="R&D">R&D</option>
                                    <option value="Receptionist">Receptionist</option>
                                    <option value="Sales/Business Devt.">Sales/Business Devt.</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <input type="button" name="previous" class="previous btn quote_btn_next" value="Previous" />
                                <input type="button" name="next" class="next btn quote_btn_prev" value="Next" />
                            </div>

                        </fieldset>
                        <fieldset>
                            <h2>Tell us about your company:</h2>
                            <div class="form-group">
                                <label for="company_name">Company Name:</label>
                                <input type="text" class="form-control" name="company_name" value="" placeholder="Your Company's Name">
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Your Phone Number:</label>
                                <input type="text" class="form-control" name="phone_number" placeholder="Your Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="company_industry">Industry you work in:</label>
                                <select name="company_industry" class="form-control">
                                    <option value="">Choose Below...</option>
                                    <option value="Advertising/Marketing/PR">Advertising/Marketing/PR</option>
                                    <option value="Agriculture">Agriculture</option>
                                    <option value="Biotech/Pharmaceuticals">Biotech/Pharmaceuticals</option>
                                    <option value="Computers - Hardware">Computers - Hardware</option>
                                    <option value="Computers - Software">Computers - Software</option>
                                    <option value="Construction/General Contracting">Construction/General Contracting</option>
                                    <option value="Consulting">Consulting</option>
                                    <option value="Education">Education</option>
                                    <option value="Equipment Sales & Service">Equipment Sales &amp; Service</option>
                                    <option value="Financial Services">Financial Services</option>
                                    <option value="Government">Government</option>
                                    <option value="Healthcare">Healthcare</option>
                                    <option value="Information Services">Information Services</option>
                                    <option value="Insurance">Insurance</option>
                                    <option value="Legal">Legal</option>
                                    <option value="Manufacturing">Manufacturing</option>
                                    <option value="Media/Entertainment/Publishing">Media/Entertainment/Publishing</option>
                                    <option value="Non-Profit">Non-Profit</option>
                                    <option value="Other Services">Other Services</option>
                                    <option value="Real Estate">Real Estate</option>
                                    <option value="Restaurant">Restaurant</option>
                                    <option value="Retail">Retail</option>
                                    <option value="Telecom/Utilities">Telecom/Utilities</option>
                                    <option value="Transportation/Logistics">Transportation/Logistics</option>
                                    <option value="Travel/Hospitality">Travel/Hospitality</option>
                                    <option value="Wholesale">Wholesale</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <input type="button" name="previous" class="previous btn quote_btn_next" value="Previous" />
                                <input type="button" name="next" class="next btn quote_btn_prev" value="Next" />
                            </div>

                        </fieldset>
                        <fieldset>
                            <h2>Last step! Tell us where you're located:</h2>
                            <div class="form-group">
                                <label for="street_address">Street Address:</label>
                                <input type="text" class="form-control" name="street_address" value="" placeholder="Your Street Address">
                            </div>
                            <div class="form-group">
                                <label for="city">City:</label>
                                <input type="text" class="form-control" name="city" placeholder="City" required>
                            </div>
                            <div class="form-group">
                                <label for="state">State:</label>
                                <select name="state" class="form-control">
                                    <option value="">Choose Below...</option>
                                    <option value="Alabama">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="GU">Guam</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VI">Virgin Islands</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="zip_code">Zip Code:</label>
                                <input type="text" class="form-control" name="zip_code" placeholder="Zip Code" required>
                            </div>
                            <div class="form-group">
                                <label for="help">Help me make smarter business decisions with occasional emails featuring useful buying advice and relevant industry content from Business.com.</label>
                                <input type="checkbox" class="form-control" name="help" required>
                            </div>
                            <div class="col-md-12">
                                <input type="button" name="previous" class="previous btn quote_btn_next" value="Previous" />
                                <input type="submit" name="multiform_submit" class="submit btn quote_btn_prev" value="Submit" /></div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
