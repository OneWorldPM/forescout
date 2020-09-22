<!-- SECTION -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<style>
    /* The message box is shown when the user clicks on the password field */

    #message p {
        padding: 0px 5px;
        font-size: 14px;
        margin-bottom: 0px;
    }

    /* Add a green text color and a checkmark when the requirements are right */
    .valid {
        color: green;
    }

    .valid:before {
        position: relative;
        left: -10px;
        content: "✔";
    }

    /* Add a red text color and an "x" when the requirements are wrong */
    .invalid {
        color: red;
    }

    .invalid:before {
        position: relative;
        left: -10px;
        content: "✖";
    }
</style>
<section class="parallax" style="background-image: url(<?= base_url() ?>front_assets/images/tiada.jpg); top: 80; padding-top: 80px;">
    <div class="container container-fullscreen">
        <div class="text-middle">
            <div class="row p-b-40">
                <form id="frm_reg" name="frm_reg" method="post" action="<?= base_url() ?>register/add_customer" enctype="multipart/form-data">
                    <div class="col-md-8 col-md-offset-2 background-white" style="border-radius: 10px; padding: 30px 80px 20px 80px; border: 3px solid;">
                        <div class="row" style="text-align: center;">
                            <div class="col-md-12">
                                <h5 style="padding-bottom: 22px; border-bottom: 2px solid #ebebeb; font-size: 25px; font-weight: 700;">Register Now!</h5>
                            </div>
                        </div>
                        <input type="hidden" value="<?= (isset($type)) ? $type : ''; ?>" id="type" name="type">
                        <input type="hidden" value="<?= (isset($myprofile)) ? $myprofile->cust_id : ''; ?>" id="cust_id" name="cust_id">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" value="<?= (isset($myprofile)) ? $myprofile->first_name : ''; ?>" placeholder="First Name" name="first_name" id="first_name" class="form-control">
                                <span id="errorfirst_name" style="color:red"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" value="<?= (isset($myprofile)) ? $myprofile->last_name : ''; ?>" placeholder="Last Name" name="last_name" id="last_name" class="form-control">
                                <span id="errorlast_name" style="color:red"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="email" value="<?= (isset($myprofile)) ? $myprofile->email : ''; ?>" placeholder="Email"  name="email" id="email" class="form-control">
                                <span id="erroremail" style="color:red"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" value="<?= (isset($myprofile)) ? $myprofile->email : ''; ?>" placeholder="Confirm Email" name="confirm_email" id="confirm_email" class="form-control">
                                <span id="errorconfirm_email" style="color:red"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="password" value="" id="password" name="password" placeholder="Password" class="form-control input-lg">
                                <span id="errorpassword" style="color:red"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="password" value="" id="confirm_password" name="confirm_password" placeholder="Confirm Password" class="form-control input-lg">
                                <span id="errorconfirm_password" style="color:red"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div id="message">
                                    <h6 style="padding-bottom: 3px; border-bottom: 2px solid #ebebeb">Password Strength:</h6>
                                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                    <p id="number" class="invalid">A <b>number</b></p>
                                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" value="<?= (isset($myprofile)) ? $myprofile->job_title : ''; ?>" placeholder="Job Title" name="job_title" id="job_title" class="form-control">
                                <span id="errorjob_title" style="color:red"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <select id="attendee_type" name="attendee_type" class="form-control">
                                    <option value="" selected="">Select Attendee Type</option>
                                    <option value="Employee" <?= (isset($myprofile)) ? ($myprofile->member_status == "Employee") ? "selected" : "" : '' ?>>Employee</option>
                                    <option value="Customer"  <?= (isset($myprofile)) ? ($myprofile->member_status == "Customer") ? "selected" : "" : '' ?>>Customer</option>
                                    <option value="Partner(Channel&Alliance)" <?= (isset($myprofile)) ? ($myprofile->member_status == "Partner(Channel&Alliance)") ? "selected" : "" : '' ?>>Partner(Channel&Alliance)</option>
                                    <option value="Analyst" <?= (isset($myprofile)) ? ($myprofile->member_status == "Analyst") ? "selected" : "" : '' ?>>Analyst</option>
                                </select>
                                <span id="errorattendee_type" style="color:red"></span>
                            </div>
                        </div>
                        <hr style="margin-bottom: 10px;">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" value="<?= (isset($myprofile)) ? $myprofile->job_title : ''; ?>" placeholder="Company Name" name="company_name" id="company_name" class="form-control input-lg">
                                <span id="errorcompany_name" style="color:red"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <select id="number_of_employees" name="number_of_employees" class="form-control">
                                    <option value="" selected="">Select Number of Employees in Company</option>
                                    <option value="0-2499" <?= (isset($myprofile)) ? ($myprofile->number_of_employees == "0-2499") ? "selected" : "" : '' ?>>2499</option>
                                    <option value="2500-7999" <?= (isset($myprofile)) ? ($myprofile->number_of_employees == "2500-7999") ? "selected" : "" : '' ?>>5000</option>
                                    <option value="8000" <?= (isset($myprofile)) ? ($myprofile->number_of_employees == "8000") ? "selected" : "" : '' ?>>8000</option>
                                </select>
                                <span id="errornumber_of_employees" style="color:red"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <select id="industry" name="industry" class="form-control">
                                    <option value="" selected="">Select Industry</option>
                                    <option value="Financial" <?= (isset($myprofile)) ? ($myprofile->industry == "Financial") ? "selected" : "" : '' ?> >Financial</option>
                                    <option value="Government" <?= (isset($myprofile)) ? ($myprofile->industry == "Government") ? "selected" : "" : '' ?>>Government</option>
                                    <option value="Healthcare" <?= (isset($myprofile)) ? ($myprofile->industry == "Healthcare") ? "selected" : "" : '' ?>>Healthcare</option>
                                    <option value="Commerce" <?= (isset($myprofile)) ? ($myprofile->industry == "Commerce") ? "selected" : "" : '' ?>>Commerce</option>
                                    <option value="Construction" <?= (isset($myprofile)) ? ($myprofile->industry == "Construction") ? "selected" : "" : '' ?>>Construction</option>
                                    <option value="Technology" <?= (isset($myprofile)) ? ($myprofile->industry == "Technology") ? "selected" : "" : '' ?>>Technology</option>
                                    <option value="Retail" <?= (isset($myprofile)) ? ($myprofile->industry == "Retail") ? "selected" : "" : '' ?>>Retail</option>
                                    <option value="Education" <?= (isset($myprofile)) ? ($myprofile->industry == "Education") ? "selected" : "" : '' ?>>Education</option>
                                    <option value="Entertainment" <?= (isset($myprofile)) ? ($myprofile->industry == "Utilities") ? "selected" : "" : '' ?>>Entertainment</option>
                                    <option value="Utilities" <?= (isset($myprofile)) ? ($myprofile->industry == "Utilities") ? "selected" : "" : '' ?> >Utilities</option>
                                    <option value="Oil & Gas" <?= (isset($myprofile)) ? ($myprofile->industry == "Oil & Gas") ? "selected" : "" : '' ?>>Oil & Gas</option>
                                    <option value="Manufacturing" <?= (isset($myprofile)) ? ($myprofile->industry == "Manufacturing") ? "selected" : "" : '' ?>>Manufacturing</option>
                                    <option value="Other" <?= (isset($myprofile)) ? ($myprofile->industry == "Other") ? "selected" : "" : '' ?>>Other</option>
                                </select>
                                <span id="errorindustry" style="color:red"></span>
                            </div>
                        </div>
                        <hr style="margin-bottom: 10px;">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" value="<?= (isset($myprofile)) ? $myprofile->address : ''; ?>" placeholder="Address" name="address" id="address" class="form-control input-lg">
                                <span id="erroraddress" style="color:red"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" value="<?= (isset($myprofile)) ? $myprofile->phone : ''; ?>" placeholder="Phone Number" name="phone_number" id="phone_number" class="form-control input-lg">
                                <span id="errorphone_number" style="color:red"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <select id="country" name="country" class="form-control">
                                    <option value="" selected="">Country</option>
                                    <option value="US" <?= (isset($myprofile)) ? ($myprofile->country == "US" || $myprofile->country == "United States") ? "selected" : "" : '' ?>>United States</option>
                                    <option value="CA" <?= (isset($myprofile)) ? ($myprofile->country == "CA" || $myprofile->country == "Canada") ? "selected" : "" : '' ?>>Canada</option>
                                    <option value="AF" <?= (isset($myprofile)) ? ($myprofile->country == "AF" || $myprofile->country == "Afghanistan") ? "selected" : "" : '' ?>>Afghanistan</option>
                                    <option value="AX" <?= (isset($myprofile)) ? ($myprofile->country == "AX" || $myprofile->country == "Aland Islands") ? "selected" : "" : '' ?>>Aland Islands</option>
                                    <option value="AL" <?= (isset($myprofile)) ? ($myprofile->country == "AL" || $myprofile->country == "Albania" ) ? "selected" : "" : '' ?>>Albania</option>
                                    <option value="DZ" <?= (isset($myprofile)) ? ($myprofile->country == "DZ" || $myprofile->country == "Algeria") ? "selected" : "" : '' ?>>Algeria</option>
                                    <option value="AS" <?= (isset($myprofile)) ? ($myprofile->country == "AS" || $myprofile->country == "American Samoa") ? "selected" : "" : '' ?>>American Samoa</option>
                                    <option value="AD" <?= (isset($myprofile)) ? ($myprofile->country == "AD" || $myprofile->country == "Andorra") ? "selected" : "" : '' ?>>Andorra</option>
                                    <option value="AO" <?= (isset($myprofile)) ? ($myprofile->country == "AO" || $myprofile->country == "Angola") ? "selected" : "" : '' ?>>Angola</option>
                                    <option value="AI" <?= (isset($myprofile)) ? ($myprofile->country == "AI" || $myprofile->country == "Anguilla") ? "selected" : "" : '' ?>>Anguilla</option>
                                    <option value="AQ" <?= (isset($myprofile)) ? ($myprofile->country == "AQ" || $myprofile->country == "Antarctica") ? "selected" : "" : '' ?>>Antarctica</option>
                                    <option value="AG" <?= (isset($myprofile)) ? ($myprofile->country == "AG" || $myprofile->country == "Antigua and Barbuda") ? "selected" : "" : '' ?>>Antigua and Barbuda</option>
                                    <option value="AR" <?= (isset($myprofile)) ? ($myprofile->country == "AR" || $myprofile->country == "Argentina" ) ? "selected" : "" : '' ?>>Argentina</option>
                                    <option value="AM" <?= (isset($myprofile)) ? ($myprofile->country == "AM" || $myprofile->country == "Armenia") ? "selected" : "" : '' ?>>Armenia</option>
                                    <option value="AW" <?= (isset($myprofile)) ? ($myprofile->country == "AW" || $myprofile->country == "Aruba") ? "selected" : "" : '' ?>>Aruba</option>
                                    <option value="AU" <?= (isset($myprofile)) ? ($myprofile->country == "AU" || $myprofile->country == "Australia") ? "selected" : "" : '' ?>>Australia</option>
                                    <option value="AT" <?= (isset($myprofile)) ? ($myprofile->country == "AT" || $myprofile->country == "Austria") ? "selected" : "" : '' ?>>Austria</option>
                                    <option value="AZ" <?= (isset($myprofile)) ? ($myprofile->country == "AZ" || $myprofile->country == "Azerbaijan") ? "selected" : "" : '' ?>>Azerbaijan</option>
                                    <option value="BS" <?= (isset($myprofile)) ? ($myprofile->country == "BS" || $myprofile->country == "Bahamas") ? "selected" : "" : '' ?>>Bahamas</option>
                                    <option value="BH" <?= (isset($myprofile)) ? ($myprofile->country == "BH" || $myprofile->country == "Bahrain") ? "selected" : "" : '' ?>>Bahrain</option>
                                    <option value="BD" <?= (isset($myprofile)) ? ($myprofile->country == "BD" || $myprofile->country == "Bangladesh") ? "selected" : "" : '' ?>>Bangladesh</option>
                                    <option value="BB" <?= (isset($myprofile)) ? ($myprofile->country == "BB" || $myprofile->country == "Barbados") ? "selected" : "" : '' ?>>Barbados</option>
                                    <option value="BY" <?= (isset($myprofile)) ? ($myprofile->country == "BY" || $myprofile->country == "Belarus") ? "selected" : "" : '' ?>>Belarus</option>
                                    <option value="BE" <?= (isset($myprofile)) ? ($myprofile->country == "BE" || $myprofile->country == "Belgium") ? "selected" : "" : '' ?>>Belgium</option>
                                    <option value="BZ" <?= (isset($myprofile)) ? ($myprofile->country == "BZ" || $myprofile->country == "Belize") ? "selected" : "" : '' ?>>Belize</option>
                                    <option value="BJ" <?= (isset($myprofile)) ? ($myprofile->country == "BJ" || $myprofile->country == "Benin") ? "selected" : "" : '' ?>>Benin</option>
                                    <option value="BM" <?= (isset($myprofile)) ? ($myprofile->country == "BM" || $myprofile->country == "Bermuda") ? "selected" : "" : '' ?>>Bermuda</option>
                                    <option value="BT" <?= (isset($myprofile)) ? ($myprofile->country == "BT" || $myprofile->country == "Bhutan") ? "selected" : "" : '' ?>>Bhutan</option>
                                    <option value="BO" <?= (isset($myprofile)) ? ($myprofile->country == "BO" || $myprofile->country == "Bolivia, Plurinational State of") ? "selected" : "" : '' ?>>Bolivia, Plurinational State of</option>
                                    <option value="BQ" <?= (isset($myprofile)) ? ($myprofile->country == "BQ" || $myprofile->country == "Bonaire, Sint Eustatius and Saba") ? "selected" : "" : '' ?>>Bonaire, Sint Eustatius and Saba</option>
                                    <option value="BA" <?= (isset($myprofile)) ? ($myprofile->country == "BA" || $myprofile->country == "Bosnia and Herzegovina") ? "selected" : "" : '' ?>>Bosnia and Herzegovina</option>
                                    <option value="BW" <?= (isset($myprofile)) ? ($myprofile->country == "BW" || $myprofile->country == "Botswana") ? "selected" : "" : '' ?>>Botswana</option>
                                    <option value="BV" <?= (isset($myprofile)) ? ($myprofile->country == "BV" || $myprofile->country == "Bouvet Island") ? "selected" : "" : '' ?>>Bouvet Island</option>
                                    <option value="BR" <?= (isset($myprofile)) ? ($myprofile->country == "BR" || $myprofile->country == "Brazil") ? "selected" : "" : '' ?>>Brazil</option>
                                    <option value="IO" <?= (isset($myprofile)) ? ($myprofile->country == "IO" || $myprofile->country == "British Indian Ocean Territory") ? "selected" : "" : '' ?>>British Indian Ocean Territory</option>
                                    <option value="BN" <?= (isset($myprofile)) ? ($myprofile->country == "BN" || $myprofile->country == "Brunei Darussalam") ? "selected" : "" : '' ?>>Brunei Darussalam</option>
                                    <option value="BG" <?= (isset($myprofile)) ? ($myprofile->country == "BG" || $myprofile->country == "Bulgaria") ? "selected" : "" : '' ?>>Bulgaria</option>
                                    <option value="BF" <?= (isset($myprofile)) ? ($myprofile->country == "BF" || $myprofile->country == "Burkina Faso") ? "selected" : "" : '' ?>>Burkina Faso</option>
                                    <option value="BI" <?= (isset($myprofile)) ? ($myprofile->country == "BI" || $myprofile->country == "Burundi") ? "selected" : "" : '' ?>>Burundi</option>
                                    <option value="KH" <?= (isset($myprofile)) ? ($myprofile->country == "KH" || $myprofile->country == "Cambodia") ? "selected" : "" : '' ?>>Cambodia</option>
                                    <option value="CM" <?= (isset($myprofile)) ? ($myprofile->country == "CM" || $myprofile->country == "Cameroon") ? "selected" : "" : '' ?>>Cameroon</option>
                                    <option value="CV" <?= (isset($myprofile)) ? ($myprofile->country == "CV" || $myprofile->country == "Cape Verde") ? "selected" : "" : '' ?>>Cape Verde</option>
                                    <option value="KY" <?= (isset($myprofile)) ? ($myprofile->country == "KY" || $myprofile->country == "Cayman Islands") ? "selected" : "" : '' ?>>Cayman Islands</option>
                                    <option value="CF" <?= (isset($myprofile)) ? ($myprofile->country == "CF" || $myprofile->country == "Central African Republic") ? "selected" : "" : '' ?>>Central African Republic</option>
                                    <option value="TD" <?= (isset($myprofile)) ? ($myprofile->country == "TD" || $myprofile->country == "Chad" ) ? "selected" : "" : '' ?> >Chad</option>
                                    <option value="CL" <?= (isset($myprofile)) ? ($myprofile->country == "CL" || $myprofile->country == "Chile") ? "selected" : "" : '' ?>>Chile</option>
                                    <option value="CN" <?= (isset($myprofile)) ? ($myprofile->country == "CN" || $myprofile->country == "China") ? "selected" : "" : '' ?>>China</option>
                                    <option value="CX" <?= (isset($myprofile)) ? ($myprofile->country == "CX" || $myprofile->country == "Christmas Island") ? "selected" : "" : '' ?>>Christmas Island</option>
                                    <option value="CC" <?= (isset($myprofile)) ? ($myprofile->country == "CC" || $myprofile->country == "Cocos (Keeling) Islands") ? "selected" : "" : '' ?>>Cocos (Keeling) Islands</option>
                                    <option value="CO" <?= (isset($myprofile)) ? ($myprofile->country == "CO" || $myprofile->country == "") ? "selected" : "" : '' ?>>Colombia</option>
                                    <option value="KM" <?= (isset($myprofile)) ? ($myprofile->country == "KM" || $myprofile->country == "Colombia") ? "selected" : "" : '' ?>>Comoros</option>
                                    <option value="CG" <?= (isset($myprofile)) ? ($myprofile->country == "CG" || $myprofile->country == "Congo") ? "selected" : "" : '' ?> >Congo</option>
                                    <option value="CD" <?= (isset($myprofile)) ? ($myprofile->country == "CD" || $myprofile->country == "Congo, the Democratic Republic of the") ? "selected" : "" : '' ?>>Congo, the Democratic Republic of the</option>
                                    <option value="CK" <?= (isset($myprofile)) ? ($myprofile->country == "CK" || $myprofile->country == "Cook Islands") ? "selected" : "" : '' ?>>Cook Islands</option>
                                    <option value="CR" <?= (isset($myprofile)) ? ($myprofile->country == "CR" || $myprofile->country == "Costa Rica") ? "selected" : "" : '' ?>>Costa Rica</option>
                                    <option value="CI" <?= (isset($myprofile)) ? ($myprofile->country == "CI" || $myprofile->country == "CÃ´te d'Ivoire") ? "selected" : "" : '' ?>>CÃ´te d'Ivoire</option>
                                    <option value="HR" <?= (isset($myprofile)) ? ($myprofile->country == "HR" || $myprofile->country == "Croatia") ? "selected" : "" : '' ?>>Croatia</option>
                                    <option value="CU" <?= (isset($myprofile)) ? ($myprofile->country == "CU" || $myprofile->country == "Cuba") ? "selected" : "" : '' ?>>Cuba</option>
                                    <option value="CW" <?= (isset($myprofile)) ? ($myprofile->country == "CW" || $myprofile->country == "CuraÃ§ao") ? "selected" : "" : '' ?>>CuraÃ§ao</option>
                                    <option value="CY" <?= (isset($myprofile)) ? ($myprofile->country == "CY" || $myprofile->country == "Cyprus") ? "selected" : "" : '' ?>>Cyprus</option>
                                    <option value="CZ" <?= (isset($myprofile)) ? ($myprofile->country == "CZ" || $myprofile->country == "Czech") ? "selected" : "" : '' ?>>Czech Republic</option>
                                    <option value="DK" <?= (isset($myprofile)) ? ($myprofile->country == "DK" || $myprofile->country == "Denmark") ? "selected" : "" : '' ?>>Denmark</option>
                                    <option value="DJ" <?= (isset($myprofile)) ? ($myprofile->country == "DJ" || $myprofile->country == "Djibouti") ? "selected" : "" : '' ?>>Djibouti</option>
                                    <option value="DM" <?= (isset($myprofile)) ? ($myprofile->country == "DM" || $myprofile->country == "Dominica") ? "selected" : "" : '' ?>>Dominica</option>
                                    <option value="DO" <?= (isset($myprofile)) ? ($myprofile->country == "DO" || $myprofile->country == "Dominican Republic") ? "selected" : "" : '' ?>>Dominican Republic</option>
                                    <option value="EC" <?= (isset($myprofile)) ? ($myprofile->country == "EC" || $myprofile->country == "Ecuador") ? "selected" : "" : '' ?>>Ecuador</option>
                                    <option value="EG" <?= (isset($myprofile)) ? ($myprofile->country == "EG" || $myprofile->country == "Egypt") ? "selected" : "" : '' ?>>Egypt</option>
                                    <option value="SV" <?= (isset($myprofile)) ? ($myprofile->country == "SV" || $myprofile->country == "El Salvador") ? "selected" : "" : '' ?>>El Salvador</option>
                                    <option value="GQ" <?= (isset($myprofile)) ? ($myprofile->country == "GQ" || $myprofile->country == "Equatorial Guinea") ? "selected" : "" : '' ?>>Equatorial Guinea</option>
                                    <option value="ER" <?= (isset($myprofile)) ? ($myprofile->country == "ER" || $myprofile->country == "Eritrea") ? "selected" : "" : '' ?>>Eritrea</option>
                                    <option value="EE" <?= (isset($myprofile)) ? ($myprofile->country == "EE" || $myprofile->country == "Estonia") ? "selected" : "" : '' ?>>Estonia</option>
                                    <option value="ET" <?= (isset($myprofile)) ? ($myprofile->country == "ET" || $myprofile->country == "Ethiopia") ? "selected" : "" : '' ?>>Ethiopia</option>
                                    <option value="FK" <?= (isset($myprofile)) ? ($myprofile->country == "FK" || $myprofile->country == "Falkland Islands (Malvinas)") ? "selected" : "" : '' ?>>Falkland Islands (Malvinas)</option>
                                    <option value="FO" <?= (isset($myprofile)) ? ($myprofile->country == "FO" || $myprofile->country == "Faroe Islands") ? "selected" : "" : '' ?>>Faroe Islands</option>
                                    <option value="FJ" <?= (isset($myprofile)) ? ($myprofile->country == "FJ" || $myprofile->country == "Fiji") ? "selected" : "" : '' ?>>Fiji</option>
                                    <option value="FI" <?= (isset($myprofile)) ? ($myprofile->country == "FI" || $myprofile->country == "Finland") ? "selected" : "" : '' ?>>Finland</option>
                                    <option value="FR" <?= (isset($myprofile)) ? ($myprofile->country == "FR" || $myprofile->country == "France") ? "selected" : "" : '' ?>>France</option>
                                    <option value="GF" <?= (isset($myprofile)) ? ($myprofile->country == "GF" || $myprofile->country == "French Guiana") ? "selected" : "" : '' ?>>French Guiana</option>
                                    <option value="PF" <?= (isset($myprofile)) ? ($myprofile->country == "PF" || $myprofile->country == "French Polynesia") ? "selected" : "" : '' ?>>French Polynesia</option>
                                    <option value="TF" <?= (isset($myprofile)) ? ($myprofile->country == "TF" || $myprofile->country == "French Southern Territories") ? "selected" : "" : '' ?>>French Southern Territories</option>
                                    <option value="GA" <?= (isset($myprofile)) ? ($myprofile->country == "GA" || $myprofile->country == "Gabon") ? "selected" : "" : '' ?>>Gabon</option>
                                    <option value="GM" <?= (isset($myprofile)) ? ($myprofile->country == "GM" || $myprofile->country == "Gambia") ? "selected" : "" : '' ?>>Gambia</option>
                                    <option value="GE" <?= (isset($myprofile)) ? ($myprofile->country == "GE" || $myprofile->country == "Georgia") ? "selected" : "" : '' ?>>Georgia</option>
                                    <option value="DE" <?= (isset($myprofile)) ? ($myprofile->country == "DE" || $myprofile->country == "Germany") ? "selected" : "" : '' ?>>Germany</option>
                                    <option value="GH" <?= (isset($myprofile)) ? ($myprofile->country == "GH" || $myprofile->country == "Ghana") ? "selected" : "" : '' ?>>Ghana</option>
                                    <option value="GI" <?= (isset($myprofile)) ? ($myprofile->country == "GI" || $myprofile->country == "Gibraltar") ? "selected" : "" : '' ?>>Gibraltar</option>
                                    <option value="GR" <?= (isset($myprofile)) ? ($myprofile->country == "GR" || $myprofile->country == "Greece") ? "selected" : "" : '' ?>>Greece</option>
                                    <option value="GL" <?= (isset($myprofile)) ? ($myprofile->country == "GL" || $myprofile->country == "Greenland") ? "selected" : "" : '' ?>>Greenland</option>
                                    <option value="GD" <?= (isset($myprofile)) ? ($myprofile->country == "GD" || $myprofile->country == "Grenada") ? "selected" : "" : '' ?>>Grenada</option>
                                    <option value="GP" <?= (isset($myprofile)) ? ($myprofile->country == "GP" || $myprofile->country == "Guadeloupe") ? "selected" : "" : '' ?>>Guadeloupe</option>
                                    <option value="GU" <?= (isset($myprofile)) ? ($myprofile->country == "GU" || $myprofile->country == "Guam") ? "selected" : "" : '' ?>>Guam</option>
                                    <option value="GT" <?= (isset($myprofile)) ? ($myprofile->country == "GT" || $myprofile->country == "Guatemala") ? "selected" : "" : '' ?>>Guatemala</option>
                                    <option value="GG" <?= (isset($myprofile)) ? ($myprofile->country == "GG" || $myprofile->country == "Guernsey") ? "selected" : "" : '' ?>>Guernsey</option>
                                    <option value="GN" <?= (isset($myprofile)) ? ($myprofile->country == "GN" || $myprofile->country == "Guinea") ? "selected" : "" : '' ?> >Guinea</option>
                                    <option value="GW" <?= (isset($myprofile)) ? ($myprofile->country == "GW" || $myprofile->country == "Guinea-Bissau") ? "selected" : "" : '' ?>>Guinea-Bissau</option>
                                    <option value="GY" <?= (isset($myprofile)) ? ($myprofile->country == "GY" || $myprofile->country == "Guyana") ? "selected" : "" : '' ?>>Guyana</option>
                                    <option value="HT" <?= (isset($myprofile)) ? ($myprofile->country == "HT" || $myprofile->country == "Haiti") ? "selected" : "" : '' ?>>Haiti</option>
                                    <option value="HM" <?= (isset($myprofile)) ? ($myprofile->country == "HM" || $myprofile->country == "Heard Island and McDonald Islands") ? "selected" : "" : '' ?>>Heard Island and McDonald Islands</option>
                                    <option value="VA" <?= (isset($myprofile)) ? ($myprofile->country == "VA" || $myprofile->country == "Holy See (Vatican City State)") ? "selected" : "" : '' ?>>Holy See (Vatican City State)</option>
                                    <option value="HN" <?= (isset($myprofile)) ? ($myprofile->country == "HN" || $myprofile->country == "Honduras") ? "selected" : "" : '' ?>>Honduras</option>
                                    <option value="HK" <?= (isset($myprofile)) ? ($myprofile->country == "HK" || $myprofile->country == "Hong Kong") ? "selected" : "" : '' ?>>Hong Kong</option>
                                    <option value="HU" <?= (isset($myprofile)) ? ($myprofile->country == "HU" || $myprofile->country == "Hungary") ? "selected" : "" : '' ?>>Hungary</option>
                                    <option value="IS" <?= (isset($myprofile)) ? ($myprofile->country == "IS" || $myprofile->country == "Iceland") ? "selected" : "" : '' ?>>Iceland</option>
                                    <option value="IN" <?= (isset($myprofile)) ? ($myprofile->country == "IN" || $myprofile->country == "India") ? "selected" : "" : '' ?>>India</option>
                                    <option value="ID" <?= (isset($myprofile)) ? ($myprofile->country == "ID" || $myprofile->country == "Indonesia") ? "selected" : "" : '' ?>>Indonesia</option>
                                    <option value="IR" <?= (isset($myprofile)) ? ($myprofile->country == "IR" || $myprofile->country == "Iran, Islamic Republic of") ? "selected" : "" : '' ?>>Iran, Islamic Republic of</option>
                                    <option value="IQ" <?= (isset($myprofile)) ? ($myprofile->country == "IQ" || $myprofile->country == "Iraq") ? "selected" : "" : '' ?>>Iraq</option>
                                    <option value="IE" <?= (isset($myprofile)) ? ($myprofile->country == "IE" || $myprofile->country == "Ireland") ? "selected" : "" : '' ?>>Ireland</option>
                                    <option value="IM" <?= (isset($myprofile)) ? ($myprofile->country == "IM" || $myprofile->country == "Isle of Man") ? "selected" : "" : '' ?>>Isle of Man</option>
                                    <option value="IL" <?= (isset($myprofile)) ? ($myprofile->country == "IL" || $myprofile->country == "Israel") ? "selected" : "" : '' ?>>Israel</option>
                                    <option value="IT" <?= (isset($myprofile)) ? ($myprofile->country == "IT" || $myprofile->country == "Italy") ? "selected" : "" : '' ?>>Italy</option>
                                    <option value="JM" <?= (isset($myprofile)) ? ($myprofile->country == "JM" || $myprofile->country == "Jamaica") ? "selected" : "" : '' ?>>Jamaica</option>
                                    <option value="JP" <?= (isset($myprofile)) ? ($myprofile->country == "JP" || $myprofile->country == "Japan") ? "selected" : "" : '' ?>>Japan</option>
                                    <option value="JE" <?= (isset($myprofile)) ? ($myprofile->country == "JE" || $myprofile->country == "Jersey") ? "selected" : "" : '' ?>>Jersey</option>
                                    <option value="JO" <?= (isset($myprofile)) ? ($myprofile->country == "JO" || $myprofile->country == "Jordan") ? "selected" : "" : '' ?>>Jordan</option>
                                    <option value="KZ" <?= (isset($myprofile)) ? ($myprofile->country == "KZ" || $myprofile->country == "Kazakhstan") ? "selected" : "" : '' ?>>Kazakhstan</option>
                                    <option value="KE" <?= (isset($myprofile)) ? ($myprofile->country == "KE" || $myprofile->country == "Kenya") ? "selected" : "" : '' ?>>Kenya</option>
                                    <option value="KI" <?= (isset($myprofile)) ? ($myprofile->country == "KI" || $myprofile->country == "Kiribati") ? "selected" : "" : '' ?>>Kiribati</option>
                                    <option value="KP" <?= (isset($myprofile)) ? ($myprofile->country == "KP" || $myprofile->country == "Korea, Democratic People's Republic of") ? "selected" : "" : '' ?>>Korea, Democratic People's Republic of</option>
                                    <option value="KR" <?= (isset($myprofile)) ? ($myprofile->country == "KR" || $myprofile->country == "Korea, Republic of") ? "selected" : "" : '' ?>>Korea, Republic of</option>
                                    <option value="KW" <?= (isset($myprofile)) ? ($myprofile->country == "KW" || $myprofile->country == "Kuwait") ? "selected" : "" : '' ?>>Kuwait</option>
                                    <option value="KG" <?= (isset($myprofile)) ? ($myprofile->country == "KG" || $myprofile->country == "Kyrgyzstan") ? "selected" : "" : '' ?>>Kyrgyzstan</option>
                                    <option value="LA" <?= (isset($myprofile)) ? ($myprofile->country == "LA" || $myprofile->country == " Lao People's Democratic Republic") ? "selected" : "" : '' ?>>Lao People's Democratic Republic</option>
                                    <option value="LV" <?= (isset($myprofile)) ? ($myprofile->country == "LV" || $myprofile->country == "Latvia") ? "selected" : "" : '' ?>>Latvia</option>
                                    <option value="LB" <?= (isset($myprofile)) ? ($myprofile->country == "LB" || $myprofile->country == "Lebanon") ? "selected" : "" : '' ?>>Lebanon</option>
                                    <option value="LS" <?= (isset($myprofile)) ? ($myprofile->country == "LS" || $myprofile->country == "Lesotho") ? "selected" : "" : '' ?>>Lesotho</option>
                                    <option value="LR" <?= (isset($myprofile)) ? ($myprofile->country == "LR" || $myprofile->country == "Liberia") ? "selected" : "" : '' ?>>Liberia</option>
                                    <option value="LY" <?= (isset($myprofile)) ? ($myprofile->country == "LY" || $myprofile->country == "Libya") ? "selected" : "" : '' ?>>Libya</option>
                                    <option value="LI" <?= (isset($myprofile)) ? ($myprofile->country == "LI" || $myprofile->country == "Liechtenstein") ? "selected" : "" : '' ?>>Liechtenstein</option>
                                    <option value="LT" <?= (isset($myprofile)) ? ($myprofile->country == "LT" || $myprofile->country == "Lithuania") ? "selected" : "" : '' ?>>Lithuania</option>
                                    <option value="LU" <?= (isset($myprofile)) ? ($myprofile->country == "LU" || $myprofile->country == "") ? "selected" : "" : '' ?>>Luxembourg</option>
                                    <option value="MO" <?= (isset($myprofile)) ? ($myprofile->country == "MO" || $myprofile->country == "Macao") ? "selected" : "" : '' ?>>Macao</option>
                                    <option value="MK" <?= (isset($myprofile)) ? ($myprofile->country == "MK" || $myprofile->country == "Macedonia, the former Yugoslav Republic of") ? "selected" : "" : '' ?>>Macedonia, the former Yugoslav Republic of</option>
                                    <option value="MG" <?= (isset($myprofile)) ? ($myprofile->country == "MG" || $myprofile->country == "Madagascar") ? "selected" : "" : '' ?>>Madagascar</option>
                                    <option value="MW" <?= (isset($myprofile)) ? ($myprofile->country == "MW" || $myprofile->country == "Malawi") ? "selected" : "" : '' ?>>Malawi</option>
                                    <option value="MY" <?= (isset($myprofile)) ? ($myprofile->country == "MY" || $myprofile->country == "Malaysia") ? "selected" : "" : '' ?>>Malaysia</option>
                                    <option value="MV" <?= (isset($myprofile)) ? ($myprofile->country == "MV" || $myprofile->country == "Malaysia") ? "selected" : "" : '' ?>>Maldives</option>
                                    <option value="ML" <?= (isset($myprofile)) ? ($myprofile->country == "ML" || $myprofile->country == "Mali") ? "selected" : "" : '' ?>>Mali</option>
                                    <option value="MT" <?= (isset($myprofile)) ? ($myprofile->country == "MT" || $myprofile->country == "Malta") ? "selected" : "" : '' ?>>Malta</option>
                                    <option value="MH" <?= (isset($myprofile)) ? ($myprofile->country == "MH" || $myprofile->country == "Marshall Islands") ? "selected" : "" : '' ?>>Marshall Islands</option>
                                    <option value="MQ" <?= (isset($myprofile)) ? ($myprofile->country == "MQ" || $myprofile->country == "Martinique") ? "selected" : "" : '' ?>>Martinique</option>
                                    <option value="MR" <?= (isset($myprofile)) ? ($myprofile->country == "MR" || $myprofile->country == "Mauritania") ? "selected" : "" : '' ?>>Mauritania</option>
                                    <option value="MU" <?= (isset($myprofile)) ? ($myprofile->country == "MU" || $myprofile->country == "Mauritius") ? "selected" : "" : '' ?>>Mauritius</option>
                                    <option value="YT" <?= (isset($myprofile)) ? ($myprofile->country == "YT" || $myprofile->country == "Mayotte") ? "selected" : "" : '' ?>>Mayotte</option>
                                    <option value="MX" <?= (isset($myprofile)) ? ($myprofile->country == "MX" || $myprofile->country == "Mexico") ? "selected" : "" : '' ?>>Mexico</option>
                                    <option value="FM" <?= (isset($myprofile)) ? ($myprofile->country == "FM" || $myprofile->country == "Micronesia, Federated States of") ? "selected" : "" : '' ?>>Micronesia, Federated States of</option>
                                    <option value="MD" <?= (isset($myprofile)) ? ($myprofile->country == "MD" || $myprofile->country == "Moldova, Republic of") ? "selected" : "" : '' ?>>Moldova, Republic of</option>
                                    <option value="MC" <?= (isset($myprofile)) ? ($myprofile->country == "MC" || $myprofile->country == "Monaco") ? "selected" : "" : '' ?>>Monaco</option>
                                    <option value="MN" <?= (isset($myprofile)) ? ($myprofile->country == "MN" || $myprofile->country == "Mongolia") ? "selected" : "" : '' ?>>Mongolia</option>
                                    <option value="ME" <?= (isset($myprofile)) ? ($myprofile->country == "ME" || $myprofile->country == "Montenegro") ? "selected" : "" : '' ?>>Montenegro</option>
                                    <option value="MS" <?= (isset($myprofile)) ? ($myprofile->country == "MS" || $myprofile->country == "Montserrat") ? "selected" : "" : '' ?>>Montserrat</option>
                                    <option value="MA" <?= (isset($myprofile)) ? ($myprofile->country == "MA" || $myprofile->country == "Morocco") ? "selected" : "" : '' ?>>Morocco</option>
                                    <option value="MZ"<?= (isset($myprofile)) ? ($myprofile->country == "MZ" || $myprofile->country == "Mozambique") ? "selected" : "" : '' ?>> Mozambique</option>
                                    <option value="MM" <?= (isset($myprofile)) ? ($myprofile->country == "MM" || $myprofile->country == "Myanmar") ? "selected" : "" : '' ?>>Myanmar</option>
                                    <option value="NA" <?= (isset($myprofile)) ? ($myprofile->country == "NA" || $myprofile->country == "Namibia") ? "selected" : "" : '' ?>>Namibia</option>
                                    <option value="NR" <?= (isset($myprofile)) ? ($myprofile->country == "NR" || $myprofile->country == "Nauru") ? "selected" : "" : '' ?>>Nauru</option>
                                    <option value="NP" <?= (isset($myprofile)) ? ($myprofile->country == "NP" || $myprofile->country == "Nepal") ? "selected" : "" : '' ?>>Nepal</option>
                                    <option value="NL" <?= (isset($myprofile)) ? ($myprofile->country == "NL" || $myprofile->country == "Netherlands") ? "selected" : "" : '' ?>>Netherlands</option>
                                    <option value="NC" <?= (isset($myprofile)) ? ($myprofile->country == "NC" || $myprofile->country == "New Caledonia") ? "selected" : "" : '' ?>>New Caledonia</option>
                                    <option value="NZ" <?= (isset($myprofile)) ? ($myprofile->country == "NZ" || $myprofile->country == "New Zealand") ? "selected" : "" : '' ?>>New Zealand</option>
                                    <option value="NI" <?= (isset($myprofile)) ? ($myprofile->country == "NI" || $myprofile->country == "Nicaragua") ? "selected" : "" : '' ?>>Nicaragua</option>
                                    <option value="NE" <?= (isset($myprofile)) ? ($myprofile->country == "NE" || $myprofile->country == "Niger") ? "selected" : "" : '' ?>>Niger</option>
                                    <option value="NG" <?= (isset($myprofile)) ? ($myprofile->country == "NG" || $myprofile->country == "Nigeria") ? "selected" : "" : '' ?>>Nigeria</option>
                                    <option value="NU" <?= (isset($myprofile)) ? ($myprofile->country == "NU" || $myprofile->country == "Niue") ? "selected" : "" : '' ?>>Niue</option>
                                    <option value="NF" <?= (isset($myprofile)) ? ($myprofile->country == "NF" || $myprofile->country == "Norfolk Island") ? "selected" : "" : '' ?>>Norfolk Island</option>
                                    <option value="MP" <?= (isset($myprofile)) ? ($myprofile->country == "MP" || $myprofile->country == "Northern Mariana Islands") ? "selected" : "" : '' ?>>Northern Mariana Islands</option>
                                    <option value="NO" <?= (isset($myprofile)) ? ($myprofile->country == "NO" || $myprofile->country == "Norway") ? "selected" : "" : '' ?>>Norway</option>
                                    <option value="OM" <?= (isset($myprofile)) ? ($myprofile->country == "OM" || $myprofile->country == "Oman") ? "selected" : "" : '' ?>>Oman</option>
                                    <option value="PK" <?= (isset($myprofile)) ? ($myprofile->country == "PK" || $myprofile->country == "Pakistan") ? "selected" : "" : '' ?>>Pakistan</option>
                                    <option value="PW" <?= (isset($myprofile)) ? ($myprofile->country == "PW" || $myprofile->country == "Palau") ? "selected" : "" : '' ?>>Palau</option>
                                    <option value="PS" <?= (isset($myprofile)) ? ($myprofile->country == "PS" || $myprofile->country == "Palestinian Territory, Occupied") ? "selected" : "" : '' ?>>Palestinian Territory, Occupied</option>
                                    <option value="PA" <?= (isset($myprofile)) ? ($myprofile->country == "PA" || $myprofile->country == "Panama") ? "selected" : "" : '' ?>>Panama</option>
                                    <option value="PG" <?= (isset($myprofile)) ? ($myprofile->country == "PG" || $myprofile->country == "Papua New Guinea") ? "selected" : "" : '' ?>>Papua New Guinea</option>
                                    <option value="PY" <?= (isset($myprofile)) ? ($myprofile->country == "PY" || $myprofile->country == "Paraguay") ? "selected" : "" : '' ?>>Paraguay</option>
                                    <option value="PE" <?= (isset($myprofile)) ? ($myprofile->country == "PE" || $myprofile->country == "Peru") ? "selected" : "" : '' ?>>Peru</option>
                                    <option value="PH" <?= (isset($myprofile)) ? ($myprofile->country == "PH" || $myprofile->country == "Philippines") ? "selected" : "" : '' ?>>Philippines</option>
                                    <option value="PL" <?= (isset($myprofile)) ? ($myprofile->country == "PL" || $myprofile->country == "Poland") ? "selected" : "" : '' ?>>Poland</option>
                                    <option value="PT" <?= (isset($myprofile)) ? ($myprofile->country == "PT" || $myprofile->country == "Portugal") ? "selected" : "" : '' ?>>Portugal</option>
                                    <option value="PR" <?= (isset($myprofile)) ? ($myprofile->country == "PR" || $myprofile->country == "Puerto Rico") ? "selected" : "" : '' ?>>Puerto Rico</option>
                                    <option value="QA" <?= (isset($myprofile)) ? ($myprofile->country == "QA" || $myprofile->country == "Qatar") ? "selected" : "" : '' ?>>Qatar</option>
                                    <option value="RE" <?= (isset($myprofile)) ? ($myprofile->country == "RE" || $myprofile->country == "RÃ©union") ? "selected" : "" : '' ?>>RÃ©union</option>
                                    <option value="RO" <?= (isset($myprofile)) ? ($myprofile->country == "RO" || $myprofile->country == "Romania") ? "selected" : "" : '' ?>>Romania</option>
                                    <option value="RU" <?= (isset($myprofile)) ? ($myprofile->country == "RU" || $myprofile->country == "Russian Federation") ? "selected" : "" : '' ?>>Russian Federation</option>
                                    <option value="RW" <?= (isset($myprofile)) ? ($myprofile->country == "RW" || $myprofile->country == "Rwanda") ? "selected" : "" : '' ?>>Rwanda</option>
                                    <option value="BL" <?= (isset($myprofile)) ? ($myprofile->country == "BL" || $myprofile->country == "Saint BarthÃ©lemy") ? "selected" : "" : '' ?>>Saint BarthÃ©lemy</option>
                                    <option value="SH" <?= (isset($myprofile)) ? ($myprofile->country == "SH" || $myprofile->country == "Saint Helena, Ascension and Tristan da Cunha") ? "selected" : "" : '' ?>>Saint Helena, Ascension and Tristan da Cunha</option>
                                    <option value="KN" <?= (isset($myprofile)) ? ($myprofile->country == "KN" || $myprofile->country == "Saint Kitts and Nevis") ? "selected" : "" : '' ?>>Saint Kitts and Nevis</option>
                                    <option value="LC" <?= (isset($myprofile)) ? ($myprofile->country == "LC" || $myprofile->country == "Saint Lucia") ? "selected" : "" : '' ?> >Saint Lucia</option>
                                    <option value="MF" <?= (isset($myprofile)) ? ($myprofile->country == "MF" || $myprofile->country == "Saint Martin (French part)") ? "selected" : "" : '' ?> >Saint Martin (French part)</option>
                                    <option value="PM" <?= (isset($myprofile)) ? ($myprofile->country == "PM" || $myprofile->country == "Saint Pierre and Miquelon") ? "selected" : "" : '' ?>>Saint Pierre and Miquelon</option>
                                    <option value="VC" <?= (isset($myprofile)) ? ($myprofile->country == "VC" || $myprofile->country == "Saint Vincent and the Grenadines") ? "selected" : "" : '' ?>>Saint Vincent and the Grenadines</option>
                                    <option value="WS" <?= (isset($myprofile)) ? ($myprofile->country == "WS" || $myprofile->country == "Samoa") ? "selected" : "" : '' ?>>Samoa</option>
                                    <option value="SM" <?= (isset($myprofile)) ? ($myprofile->country == "SM" || $myprofile->country == "San Marino") ? "selected" : "" : '' ?> >San Marino</option>
                                    <option value="ST" <?= (isset($myprofile)) ? ($myprofile->country == "ST" || $myprofile->country == "Sao Tome and Principe") ? "selected" : "" : '' ?>>Sao Tome and Principe</option>
                                    <option value="SA" <?= (isset($myprofile)) ? ($myprofile->country == "SA" || $myprofile->country == "Saudi Arabia") ? "selected" : "" : '' ?>>Saudi Arabia</option>
                                    <option value="SN" <?= (isset($myprofile)) ? ($myprofile->country == "SN" || $myprofile->country == "Senegal") ? "selected" : "" : '' ?>>Senegal</option>
                                    <option value="RS" <?= (isset($myprofile)) ? ($myprofile->country == "RS" || $myprofile->country == "Serbia") ? "selected" : "" : '' ?>>Serbia</option>
                                    <option value="SC" <?= (isset($myprofile)) ? ($myprofile->country == "SC" || $myprofile->country == "Seychelles") ? "selected" : "" : '' ?>>Seychelles</option>
                                    <option value="SL" <?= (isset($myprofile)) ? ($myprofile->country == "SL" || $myprofile->country == "Sierra Leone") ? "selected" : "" : '' ?>>Sierra Leone</option>
                                    <option value="SG" <?= (isset($myprofile)) ? ($myprofile->country == "SG" || $myprofile->country == "Singapore") ? "selected" : "" : '' ?>>Singapore</option>
                                    <option value="SX" <?= (isset($myprofile)) ? ($myprofile->country == "SX" || $myprofile->country == "Sint Maarten (Dutch part)") ? "selected" : "" : '' ?> >Sint Maarten (Dutch part)</option>
                                    <option value="SK" <?= (isset($myprofile)) ? ($myprofile->country == "SK" || $myprofile->country == "Slovakia") ? "selected" : "" : '' ?>>Slovakia</option>
                                    <option value="SI" <?= (isset($myprofile)) ? ($myprofile->country == "SI" || $myprofile->country == "Slovenia") ? "selected" : "" : '' ?>>Slovenia</option>
                                    <option value="SB" <?= (isset($myprofile)) ? ($myprofile->country == "SB" || $myprofile->country == "Solomon Islands") ? "selected" : "" : '' ?>>Solomon Islands</option>
                                    <option value="SO" <?= (isset($myprofile)) ? ($myprofile->country == "SO" || $myprofile->country == "Somalia") ? "selected" : "" : '' ?>>Somalia</option>
                                    <option value="ZA" <?= (isset($myprofile)) ? ($myprofile->country == "ZA" || $myprofile->country == "South Africa") ? "selected" : "" : '' ?>>South Africa</option>
                                    <option value="GS" <?= (isset($myprofile)) ? ($myprofile->country == "GS" || $myprofile->country == "South Georgia and the South Sandwich Islands") ? "selected" : "" : '' ?>>South Georgia and the South Sandwich Islands</option>
                                    <option value="SS" <?= (isset($myprofile)) ? ($myprofile->country == "SS" || $myprofile->country == "South Sudan") ? "selected" : "" : '' ?>>South Sudan</option>
                                    <option value="ES" <?= (isset($myprofile)) ? ($myprofile->country == "ES" || $myprofile->country == "Spain") ? "selected" : "" : '' ?>>Spain</option>
                                    <option value="LK" <?= (isset($myprofile)) ? ($myprofile->country == "LK" || $myprofile->country == "Sri Lanka") ? "selected" : "" : '' ?>>Sri Lanka</option>
                                    <option value="SD" <?= (isset($myprofile)) ? ($myprofile->country == "SD" || $myprofile->country == "Sudan") ? "selected" : "" : '' ?>>Sudan</option>
                                    <option value="SR" <?= (isset($myprofile)) ? ($myprofile->country == "SR" || $myprofile->country == "Suriname") ? "selected" : "" : '' ?>>Suriname</option>
                                    <option value="SJ" <?= (isset($myprofile)) ? ($myprofile->country == "SJ" || $myprofile->country == "Svalbard and Jan Mayen") ? "selected" : "" : '' ?>>Svalbard and Jan Mayen</option>
                                    <option value="SZ" <?= (isset($myprofile)) ? ($myprofile->country == "SZ" || $myprofile->country == "Swaziland") ? "selected" : "" : '' ?>>Swaziland</option>
                                    <option value="SE" <?= (isset($myprofile)) ? ($myprofile->country == "SE" || $myprofile->country == "Sweden") ? "selected" : "" : '' ?>>Sweden</option>
                                    <option value="CH" <?= (isset($myprofile)) ? ($myprofile->country == "CH" || $myprofile->country == "Switzerland") ? "selected" : "" : '' ?>>Switzerland</option>
                                    <option value="SY" <?= (isset($myprofile)) ? ($myprofile->country == "SY" || $myprofile->country == "Syrian Arab Republic") ? "selected" : "" : '' ?>>Syrian Arab Republic</option>
                                    <option value="TW" <?= (isset($myprofile)) ? ($myprofile->country == "TW" || $myprofile->country == "Taiwan, Province of China") ? "selected" : "" : '' ?>>Taiwan, Province of China</option>
                                    <option value="TJ" <?= (isset($myprofile)) ? ($myprofile->country == "TJ" || $myprofile->country == "Tajikistan") ? "selected" : "" : '' ?>>Tajikistan</option>
                                    <option value="TZ" <?= (isset($myprofile)) ? ($myprofile->country == "TZ" || $myprofile->country == "Tanzania, United Republic of") ? "selected" : "" : '' ?>>Tanzania, United Republic of</option>
                                    <option value="TH" <?= (isset($myprofile)) ? ($myprofile->country == "TH" || $myprofile->country == "Thailand") ? "selected" : "" : '' ?>>Thailand</option>
                                    <option value="TL" <?= (isset($myprofile)) ? ($myprofile->country == "TL" || $myprofile->country == "Timor-Leste") ? "selected" : "" : '' ?>>Timor-Leste</option>
                                    <option value="TG" <?= (isset($myprofile)) ? ($myprofile->country == "TG" || $myprofile->country == "Togo") ? "selected" : "" : '' ?>>Togo</option>
                                    <option value="TK" <?= (isset($myprofile)) ? ($myprofile->country == "TK" || $myprofile->country == "Tokelau") ? "selected" : "" : '' ?>>Tokelau</option>
                                    <option value="TO" <?= (isset($myprofile)) ? ($myprofile->country == "TO" || $myprofile->country == "Tonga") ? "selected" : "" : '' ?>>Tonga</option>
                                    <option value="TT" <?= (isset($myprofile)) ? ($myprofile->country == "TT" || $myprofile->country == "Trinidad and Tobago") ? "selected" : "" : '' ?>>Trinidad and Tobago</option>
                                    <option value="TN" <?= (isset($myprofile)) ? ($myprofile->country == "TN" || $myprofile->country == "Tunisia") ? "selected" : "" : '' ?>>Tunisia</option>
                                    <option value="TR" <?= (isset($myprofile)) ? ($myprofile->country == "TR" || $myprofile->country == "Turkey") ? "selected" : "" : '' ?>>Turkey</option>
                                    <option value="TM" <?= (isset($myprofile)) ? ($myprofile->country == "TM" || $myprofile->country == "Turkmenistan") ? "selected" : "" : '' ?>>Turkmenistan</option>
                                    <option value="TC" <?= (isset($myprofile)) ? ($myprofile->country == "TC" || $myprofile->country == "Turks and Caicos Islands") ? "selected" : "" : '' ?>>Turks and Caicos Islands</option>
                                    <option value="TV" <?= (isset($myprofile)) ? ($myprofile->country == "TV" || $myprofile->country == "Tuvalu") ? "selected" : "" : '' ?>>Tuvalu</option>
                                    <option value="UG" <?= (isset($myprofile)) ? ($myprofile->country == "UG" || $myprofile->country == "Uganda") ? "selected" : "" : '' ?>>Uganda</option>
                                    <option value="UA" <?= (isset($myprofile)) ? ($myprofile->country == "UA" || $myprofile->country == "Ukraine") ? "selected" : "" : '' ?>>Ukraine</option>
                                    <option value="AE" <?= (isset($myprofile)) ? ($myprofile->country == "AE" || $myprofile->country == "United Arab Emirates") ? "selected" : "" : '' ?>>United Arab Emirates</option>
                                    <option value="GB" <?= (isset($myprofile)) ? ($myprofile->country == "GB" || $myprofile->country == "United Kingdom") ? "selected" : "" : '' ?>>United Kingdom</option>
                                    <option value="UM" <?= (isset($myprofile)) ? ($myprofile->country == "UM" || $myprofile->country == "United States Minor Outlying Islands") ? "selected" : "" : '' ?>>United States Minor Outlying Islands</option>
                                    <option value="UY" <?= (isset($myprofile)) ? ($myprofile->country == "UY" || $myprofile->country == "Uruguay") ? "selected" : "" : '' ?>>Uruguay</option>
                                    <option value="UZ" <?= (isset($myprofile)) ? ($myprofile->country == "UZ" || $myprofile->country == "Uzbekistan") ? "selected" : "" : '' ?>>Uzbekistan</option>
                                    <option value="VU" <?= (isset($myprofile)) ? ($myprofile->country == "VU" || $myprofile->country == "Vanuatu") ? "selected" : "" : '' ?>>Vanuatu</option>
                                    <option value="VE" <?= (isset($myprofile)) ? ($myprofile->country == "VE" || $myprofile->country == "Venezuela, Bolivarian Republic of") ? "selected" : "" : '' ?>>Venezuela, Bolivarian Republic of</option>
                                    <option value="VN" <?= (isset($myprofile)) ? ($myprofile->country == "VN" || $myprofile->country == "Viet Nam") ? "selected" : "" : '' ?>>Viet Nam</option>
                                    <option value="VG" <?= (isset($myprofile)) ? ($myprofile->country == "VG" || $myprofile->country == "Virgin Islands, British") ? "selected" : "" : '' ?>>Virgin Islands, British</option>
                                    <option value="VI" <?= (isset($myprofile)) ? ($myprofile->country == "VI" || $myprofile->country == "Virgin Islands, U.S.") ? "selected" : "" : '' ?>>Virgin Islands, U.S.</option>
                                    <option value="WF" <?= (isset($myprofile)) ? ($myprofile->country == "WF" || $myprofile->country == "Wallis and Futuna") ? "selected" : "" : '' ?>>Wallis and Futuna</option>
                                    <option value="EH" <?= (isset($myprofile)) ? ($myprofile->country == "EH" || $myprofile->country == "Western Sahara") ? "selected" : "" : '' ?>>Western Sahara</option>
                                    <option value="YE" <?= (isset($myprofile)) ? ($myprofile->country == "YE" || $myprofile->country == "Yemen") ? "selected" : "" : '' ?>>Yemen</option>
                                    <option value="ZM" <?= (isset($myprofile)) ? ($myprofile->country == "ZM" || $myprofile->country == "Zambia") ? "selected" : "" : '' ?>>Zambia</option>
                                    <option value="ZW" <?= (isset($myprofile)) ? ($myprofile->country == "ZW" || $myprofile->country == "Zimbabwe") ? "selected" : "" : '' ?>>Zimbabwe</option>
                                </select>
                                <span id="errorcountry" style="color:red"></span>
                            </div>
                            <div class="col-md-6 form-group" id="usa_state" style="display: none;">
                                <select id="state" name="state" class="form-control">
                                    <option value="" selected="">State</option>
                                    <option value="AK">AK</option>
                                    <option value="AL">AL</option>
                                    <option value="AR">AR</option>
                                    <option value="AZ">AZ</option>
                                    <option value="CA">CA</option>
                                    <option value="CO">CO</option>
                                    <option value="CT">CT</option>
                                    <option value="DC">DC</option>
                                    <option value="DE">DE</option>
                                    <option value="FL">FL</option>
                                    <option value="GA">GA</option>
                                    <option value="HI">HI</option>
                                    <option value="IA">IA</option>
                                    <option value="ID">ID</option>
                                    <option value="IL">IL</option>
                                    <option value="IN">IN</option>
                                    <option value="KS">KS</option>
                                    <option value="KY">KY</option>
                                    <option value="LA">LA</option>
                                    <option value="ME">ME</option>
                                    <option value="MD">MD</option>
                                    <option value="MA">MA</option>
                                    <option value="MI">MI</option>
                                    <option value="MN">MN</option>
                                    <option value="MS">MS</option>
                                    <option value="MO">MO</option>
                                    <option value="MT">MT</option>
                                    <option value="NE">NE</option>
                                    <option value="NV">NV</option>
                                    <option value="NH">NH</option>
                                    <option value="NJ">NJ</option>
                                    <option value="NM">NM</option>
                                    <option value="NY">NY</option>
                                    <option value="NC">NC</option>
                                    <option value="ND">ND</option>
                                    <option value="OH">OH</option>
                                    <option value="OK">OK</option>
                                    <option value="OR">OR</option>
                                    <option value="PA">PA</option>
                                    <option value="RI">RI</option>
                                    <option value="SC">SC</option>
                                    <option value="SD">SD</option>
                                    <option value="TN">TN</option>
                                    <option value="TX">TX</option>
                                    <option value="UT">UT</option>
                                    <option value="VT">VT</option>
                                    <option value="VA">VA</option>
                                    <option value="WA">WA</option>
                                    <option value="WV">WV</option>
                                    <option value="WI">WI</option>
                                    <option value="WY">WY</option>
                                </select>
                                <span id="errorstate" style="color:red"></span>
                            </div>
                            <div class="col-md-6 form-group" id="canada_state" style="display: none;">
                                <select id="state" name="state" class="form-control">
                                    <option value="" selected="">Province</option>
                                    <option value="AB">AB</option>
                                    <option value="BC">BC</option>
                                    <option value="MB">MB</option>
                                    <option value="NB">NB</option>
                                    <option value="NL">NL</option>
                                    <option value="NS">NS</option>
                                    <option value="NT">NT</option>
                                    <option value="NU">NU</option>
                                    <option value="ON">ON</option>
                                    <option value="PE">PE</option>
                                    <option value="QC">QC</option>
                                    <option value="SK">SK</option>
                                    <option value="YT">YT</option>
                                </select>
                                <span id="errorstate" style="color:red"></span>
                            </div>
                            <div class="col-md-6 form-group" id="other_state">
                                <input type="text" value="<?= (isset($myprofile)) ? $myprofile->state : ''; ?>" placeholder="State" name="state" id="state" class="form-control input-lg">
                                <span id="errorstate" style="color:red"></span>
                            </div>
                        </div>
                        <hr style="margin-bottom: 10px;">
                        <div class="row">
                            <div class="col-md-4 form-group" style="display: flex;">
                                <div class="col-md-1">
                                    <i class="fa fa-twitter" style="font-size: 25px; margin-top: 8px;"></i>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" value="<?= (isset($myprofile)) ? $myprofile->twitter_id : ''; ?>" placeholder="Twitter" id="twitter" name="twitter" class="form-control input-lg">
                                    <span id="errortwitter" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-md-4 form-group" style="display: flex;">
                                <div class="col-md-1">
                                    <i class="fa fa-facebook" style="font-size: 25px; margin-top: 8px;"></i>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" value="<?= (isset($myprofile)) ? $myprofile->facebook_id : ''; ?>" placeholder="Facebook" id="facebook" name="facebook" class="form-control input-lg">
                                    <span id="errorfacebook" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-md-4 form-group" style="display: flex;">
                                <div class="col-md-1">
                                    <i class="fa fa-instagram" style="font-size: 25px; margin-top: 8px;"></i>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" value="<?= (isset($myprofile)) ? $myprofile->instagram_id : ''; ?>" placeholder="Instagram" id="instagram" name="instagram" class="form-control input-lg">
                                    <span id="errorinstagram" style="color:red"></span>
                                </div>
                            </div>
                        </div>
                        <hr style="margin-bottom: 10px;">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Profile :</label>
                                <input type="file" id="profile" name="profile" class="form-control">
                                <span id="errorprofile" style="color:red"></span>
                            </div>
                        </div>
                        <hr style="margin-bottom: 10px;">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>May Forescout email you personalized offers, support updates and event news?</label>
                                <div class="col-md-2">
                                    <input type="radio" id="yes" name="event_type" checked value="FALSE">
                                    <label for="Yes">Yes</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" id="no" name="event_type" value="TRUE">
                                    <label for="no">No</label>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" value="" placeholder="Promo Code(Optional)" name="promo_code" id="promo_code" class="form-control">
                                <span id="errorpromo_code" style="color:red"></span>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="g-recaptcha" data-callback="recaptchaCallback" style="text-align: -webkit-center;" data-sitekey="6LfbHKQZAAAAAA9nhI-4GNOmLakkRGGaBTJgHFbF"></div>
                                <div class="gaps-2x"></div>
                                <span id="errorcaptcha" style="color:red"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <button class="btn btn-success" id="btn_register" type="submit">Submit</button>
                                <button type="button" class="btn btn-danger m-l-10">Cancel</button>
                            </div>
                        </div>
                        <?php
                        echo ($this->session->flashdata('msg')) ? $this->session->flashdata('msg') : '';
                        ?> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
$msg = $this->input->get("msg");
switch ($msg) {
    case "A":
        $m = "Email Alredy Exist!!!";
        $t = "error";
        break;
    case "E":
        $m = "Something went wrong, Please try again!!!";
        $t = "error";
        break;
    default:
        $m = 0;
        break;
}
?>
<script type="text/javascript">
    $(document).ready(function () {
<?php if ($msg): ?>
            alertify.<?= $t ?>("<?= $m ?>");
<?php endif; ?>
        $("#country").on("change", function () {
            var country = $(this).val();
            if (country == "US") {
                $("#usa_state").show();
                $("#other_state").hide();
                $("#canada_state").hide();
            } else if (country == "CA") {
                $("#canada_state").show();
                $("#usa_state").hide();
                $("#other_state").hide();
            } else {
                $("#canada_state").hide();
                $("#usa_state").hide();
                $("#other_state").show();
            }
        });

        $("#btn_register").on("click", function () {
            var response = grecaptcha.getResponse();
            var lowerCaseLetters = /[a-z]/g;
            var upperCaseLetters = /[A-Z]/g;
            var numbers = /[0-9]/g;
            var pwd = $("#password").val();

            if ($("#first_name").val().trim() == "")
            {
                $("#errorfirst_name").text("Please Enter First Name").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#last_name").val().trim() == "") {
                $("#errorlast_name").text("Please Enter Last Name").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#email").val().trim() == "") {
                $("#erroremail").text("Please Enter Email").fadeIn('slow').fadeOut(5000);
                return false;
            } else if (!validateEmail($("#email").val().trim())) {
                $("#erroremail").text("Enter Valid Email Id..").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#confirm_email").val() == "") {
                $("#errorconfirm_email").text("Please Enter Confirm Email").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#email").val() != $("#confirm_email").val()) {
                $("#errorconfirm_email").text("Email and Confirm Email Doesn't Match").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#password").val() == "") {
                $("#errorpassword").text("Please Enter Password").fadeIn('slow').fadeOut(5000);
                return false;
            } else if (!lowerCaseLetters.test(pwd)) {
                $("#errorpassword").text("Enter Lowercase Letter").fadeIn('slow').fadeOut(5000);
                return false;
            } else if (!upperCaseLetters.test(pwd)) {
                $("#errorpassword").text("Enter Uppercase Letter").fadeIn('slow').fadeOut(5000);
                return false;
            } else if (!numbers.test(pwd)) {
                $("#errorpassword").text("Enter Numbers").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($('#password').val().length < 8) {
                $("#errorpassword").text("Minimum 8 Characters").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#confirm_password").val() == "") {
                $("#errorconfirm_password").text("Please Enter Confirm Password").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#password").val() != $("#confirm_password").val()) {
                $("#errorconfirm_password").text("Password and Confirm Passwords Doesn't Match").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#job_title").val().trim() == "") {
                $("#errorjob_title").text("Please Enter Job Title").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#attendee_type").val().trim() == "") {
                $("#errorattendee_type").text("Select Attendee Type").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#company_name").val().trim() == "") {
                $("#errorcompany_name").text("Enter Company Name").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#number_of_employees").val().trim() == "") {
                $("#errornumber_of_employees").text("Select Number of Employees").fadeIn('slow').fadeOut(5000);
                return false;
            } else if (response.length == 0) {
                $("#errorcaptcha").text("Please check captcha").fadeIn('slow').fadeOut(5000);
                return false;
            } else {
                return true; //submit form
            }
            return false; //Prevent form to submitting
        });

        $("#promo_code").on("blur", function () {
            if ($("#promo_code").val() == "")
            {
                $("#errorpromo_code").text("Please Enter Promo Code").fadeIn('slow').fadeOut(5000);
                return false;
            } else {
                $.ajax({
                    url: "<?= site_url() ?>register/get_promo_code_details",
                    type: "POST",
                    data: {'promo_code': $("#promo_code").val()},
                    dataType: "json",
                    success: function (data, textStatus, jqXHR) {
                        if (data.status == "success") {
                            $("#errorpromo_code").text("Successfully").fadeIn('slow').fadeOut(5000);
                        } else {
                            $("#errorpromo_code").text("Invalid Promo Code").fadeIn('slow').fadeOut(5000);
                        }
                    }
                });
            }
        });


    });

    function validateEmail(sEmail) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(sEmail);
    }
</script> 
<script type="text/javascript">
    function recaptchaCallback() {
        $('#reg_login').removeAttr('disabled');
    }
</script>
<script>
    var myInput = document.getElementById("password");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
    myInput.onfocus = function () {
        document.getElementById("message").style.display = "block";
    }

// When the user starts to type something inside the password field
    myInput.onkeyup = function () {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if (myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if (myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if (myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if (myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<!-- END: SECTION -->
<!-- END: SECTION -->