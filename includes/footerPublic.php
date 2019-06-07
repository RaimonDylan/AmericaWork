<footer class="site-footer">
    <div class="container">


        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-6 col-md-3 col-lg-3 mb-5 mb-lg-0">
                        <h3 class="footer-heading mb-4">Pour les candidats</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">S'inscrire</a></li>
                            <li><a href="#">Trouver un travail</a></li>
                            <li><a href="#">Poster une annonce</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-3 col-lg-3 mb-5 mb-lg-0">
                        <h3 class="footer-heading mb-4">Pour les Employeurs</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">S'inscrire</a></li>
                            <li><a href="#">Clients</a></li>
                            <li><a href="#">Trouver des candidats</a></li>
                            <li><a href="#">Poster une annonce</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <p>
                    Copyright &copy; <script>document.write(new Date().getFullYear());</script> All Rights Reserved | America Work
                </p>
            </div>

        </div>
    </div>
</footer>
</div>

<script src="http://stmncv1.fr/res/js/jquery-3.3.1.min.js"></script>
<script src="http://stmncv1.fr/res/js/jquery-migrate-3.0.1.min.js"></script>
<script src="http://stmncv1.fr/res/js/jquery-ui.js"></script>
<script src="http://stmncv1.fr/res/js/popper.min.js"></script>
<script src="http://stmncv1.fr/res/js/bootstrap.min.js"></script>
<script src="http://stmncv1.fr/res/js/owl.carousel.min.js"></script>
<script src="http://stmncv1.fr/res/js/jquery.stellar.min.js"></script>
<script src="http://stmncv1.fr/res/js/jquery.countdown.min.js"></script>
<script src="http://stmncv1.fr/res/js/jquery.magnific-popup.min.js"></script>
<script src="http://stmncv1.fr/res/js/bootstrap-datepicker.min.js"></script>
<script src="http://stmncv1.fr/res/js/aos.js"></script>

<script>
    // This example displays an address form, using the autocomplete feature
    // of the Google Places API to help users fill in the information.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&libraries=places&callback=initAutocomplete"
        async defer></script>

<script src="http://stmncv1.fr/res/js/main.js"></script>
