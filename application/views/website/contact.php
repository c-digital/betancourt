<div class="map-content">
    <!-- The element that will contain our Google Map. This is used in both the Javascript and CSS above. -->
    <?php if($basics->map_active==0){ ?>
      <div id="map"></div>
    <?php }else{
        echo $basics->google_map;
    }?>
</div>
<div class="contact-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7">
                <div class="contect-des">
                    <div class="contact-header"> 
                        <h2>
                            <span class="superheadline"><?= (!empty($setting->title)?$setting->title:null)?></span>
                            <span class="headline"><?= (!empty($setting->address)?$setting->address:null)?></span>
                        </h2>
                        <p>
                            <?= (!empty($instruction->short_instruction)?$instruction->short_instruction:null)?>
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="media contact-service">
                                <i class="flaticon-world mr-3"></i>
                                <div class="media-body">
                                    <h4 class="mt-0"><?= display('address')?></h4>
                                    <div><?= (!empty($setting->address)?$setting->address:null)?></div>
                                </div>
                            </div>
                            <div class="media contact-service">
                                <i class="flaticon-24-hours mr-3"></i>
                                <div class="media-body">
                                    <h4><?= display('working_hours')?></h4>
                                    <div>
                                        <?= (!empty($setting->open_day)?$setting->open_day:null)?> <br>
                                        <?= $setting->closed_day;?>: <?= display('closed')?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="media contact-service">
                                <i class="flaticon-email mr-3"></i>
                                <div class="media-body">
                                    <h4><?= display('write_us')?></h4>
                                    <div>
                                        <?php
                                           $email = (!empty($basics->email)?$basics->email:null);
                                           $arr = explode(",",$email);
                                           echo implode("<br>", $arr);
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="media contact-service">
                                <i class="flaticon-phone-call  mr-3"></i>
                                <div class="media-body">
                                    <h4><?= display('call_us')?></h4>
                                    <div>
                                        <?php
                                           $phone = (!empty($setting->phone)?$setting->phone:null);
                                           $arr = explode(",",$phone);
                                           echo implode("<br>", $arr);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-5">
                <div class="contact-form">
                    <h3><?= display('lets_talk')?></h3>
                     
                    <!-- Message & exception --> 
                    <div class="msg"> 
                    </div> 
                
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label><?= display('full_name')?> <i class="text-danger"><b>*</b></i></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="<?= display('full_name')?>">
                            </div>
                            <div class="form-group">
                                <label><?= display('email')?> <i class="text-danger"><b>*</b></i></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="<?= display('email')?>">
                            </div>
                            <div class="form-group">
                                <label><?= display('subject')?> <i class="text-danger"><b>*</b></i></label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="<?= display('subject')?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?= display('message')?> <i class="text-danger"><b>*</b></i></label>
                        <textarea class="form-control" id="enquiry" name="enquiry" rows="5" placeholder="<?= display('message')?>"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <?php
                                 $first =(rand(1, 9) );
                                 $second =(rand(1, 5) );
                                 $total = $first + $second;
                                 ?>
                                <label><?= display('are_you_human').' '. $first.' + '.$second?> =</label>
                                <input type="text" class="form-control" id="human" name="human">
                                <input type="hidden" id="capcha" value="<?= $total?>">
                            </div>
                        </div>
                    </div>
                    <button type="submit" onclick="datasubmit()" class="btn btn-primary btn-outline-primary"><?= display('submit')?></button>
                   
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=<?= (!empty($basics->google_map_api)?$basics->google_map_api:'AIzaSyBDHeh9zEbXo-YCWJcicXH2VRwVwAf_tq0')?>"></script>
<script>

    // When the window has finished loading create our google map below
    google.maps.event.addDomListener(window, 'load', init);

    function init() {
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 4, scrollwheel: false,
            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(<?= (!empty($basics->latitude)?$basics->latitude:23.8281494)?>, <?= (!empty($basics->longitude)?$basics->longitude:90.41964940000003)?>), //Dhaka

            // How you would like to style the map. 
            // This is where you would paste any style found on Snazzy Maps.
            styles: [{"featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{"color": "#444444"}]}, {"featureType": "administrative.locality", "elementType": "labels.text.stroke", "stylers": [{"visibility": "on"}]}, {"featureType": "administrative.locality", "elementType": "labels.icon", "stylers": [{"visibility": "on"}, {"color": "#f1c40f"}]}, {"featureType": "landscape", "elementType": "all", "stylers": [{"color": "#f2f2f2"}]}, {"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "road", "elementType": "all", "stylers": [{"saturation": -100}, {"lightness": 45}]}, {"featureType": "road.highway", "elementType": "all", "stylers": [{"visibility": "simplified"}]}, {"featureType": "road.arterial", "elementType": "labels.icon", "stylers": [{"visibility": "off"}]}, {"featureType": "transit", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "water", "elementType": "all", "stylers": [{"color": "#037d71"}, {"visibility": "on"}]}]
        };

        // image from external URL

        var myIcon = '<?= base_url()?>assets_web/img/marker.png';

        //preparing the image so it can be used as a marker
        //https://developers.google.com/maps/documentation/javascript/reference#Icon
        //includes hacky fix "size" to allow for wobble
        var catIcon = {
            url: myIcon
        };

        // Get the HTML DOM element that will contain your map 
        // We are using a div with id="map" seen below in the <body>
        var mapElement = document.getElementById('map');

        // Create the Google Map using our element and options defined above
        var map = new google.maps.Map(mapElement, mapOptions);

        // Let's also add a marker while we're at it
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(<?= (!empty($basics->latitude)?$basics->latitude:23.8103968)?>, <?= (!empty($basics->longitude)?$basics->longitude:90.41256666)?>), //Dhaka
            map: map,
            icon: catIcon,
            title: 'Snazzy!',
            animation: google.maps.Animation.DROP
        });
    }

   // insert contact info
    function datasubmit() {

            var target = $('.msg');
            var name      = $('#name').val();
            var subject   = $('#subject').val();
            var email     = $('#email').val();
            var enquiry   = $('#enquiry').val();
            var human     = $('#human').val();
            var capcha     = $('#capcha').val();

            $.ajax({
                url      : '<?= base_url('contact/create') ?>',
                type     : 'post',
                dataType : 'json',
                data     : {
                    '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                    name, 
                    subject,
                    email,
                    enquiry,
                    human,
                    capcha
                },
                success : function(data) { 
                    if (data.message) {
                        target.removeClass('alert alert-danger');
                        target.addClass('alert alert-info');
                        target.html(data.message);
                    } else {
                        target.removeClass('alert alert-info');
                        target.addClass('alert alert-danger');
                        target.html(data.exception);
                    } 

                    setInterval(function(){ 
                        history.go(0);
                    }, 3000);

                },
                error   : function(exc){
                    alert('failed');
                }
            });
         
       }
</script>