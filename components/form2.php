<form id="form2-data">
    <div class="row">
        <div class="col-xl-6 col-lg-12 col-md-12">
            <div class="mb-md-3 mb-2">
                <label for="firstName">
                    <span class="text-danger">*</span>First Name
                </label>
                <input type="text" id="firstName" name="firstName" class="form-control validate" placeholder="ex. John">
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 col-md-12">
            <div class="mb-md-3 mb-2">
                <label for="lastName">
                    <span class="text-danger">*</span>Last Name
                </label>
                <input type="text" id="lastName" name="lastName" class="form-control validate" placeholder="ex. Smith">
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 col-md-12">
            <div class="mb-md-3 mb-2"><label for="address"><span class="text-danger">*</span>What is your street address?</label>
                <input type="text" id="address" name="address" class="form-control validate pac-target-input" placeholder="ex. 123 main street" autocomplete="off">
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 col-md-12">
            <div class="mb-md-3 mb-2">
                <label for="zip">
                    <span class="text-danger">*</span>What is your zip code?
                </label>
                <input type="text" id="zip" name="zip" class="form-control validate" placeholder="zipcode" maxlength="5">
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 col-md-12">
            <div class="mb-md-3 mb-2">
                <label for="email">
                    <span class="text-danger">*</span>What is your email address?
                </label>
                <input type="email" id="email" name="email" class="form-control validate" placeholder="Email">
                <div id="email-spinner">
                    <div class="spinner-icon"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 col-md-12">
            <div class="mb-md-3 mb-2">
                <label for="phone">
                    <span class="text-danger">*</span>What is your phone number?
                </label>
                <input type="text" id="phone" name="phone" class="form-control validate" placeholder="ex. 2345678911" maxlength="14">
                <div id="phone-spinner">
                    <div class="spinner-icon"></div>
                </div>
            </div>
        </div>
    </div>
    <p>
        <small>
            <input type="hidden" name="consent" id="tcpa_disclosure" value="1">
            <label for="tcpa_disclosure" id="tcpa_disclosure_text" class="tcpa_message">By
                submitting this form, I provide my signature, giving consent to Full Sail University to
                contact me by telephone (including text, autodialed and prerecorded messages) at the
                number
                I have provided and/or contact me via email to receive information about Full Sail’s
                offerings. I understand that this consent is not required in order to enroll and I can
                revoke this consent at any time using any reasonable means. Msg. &amp; data rates may
                apply.
                I agree to Full Sail University’s terms and conditions and
                <a href="https://www.fullsail.edu/policies-and-guidelines/your-privacy-rights">privacy
                    policy</a>.
            </label>
        </small>
    </p>
    <div class="text-center custom-button mb-2 mt-3">
        <button type="button" class="btn btn-secondary" data-style="zoom-in" onclick="nextTab('#form1-tab')">Back</button>
        <button id="submit-btn" type="button" class="w-75 btn btn-primary" data-style="zoom-in">Request Information</button>
    </div>
</form>

