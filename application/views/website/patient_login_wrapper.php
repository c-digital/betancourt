<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="keyword" content="<?= (!empty($setting->meta_keyword)?$setting->meta_keyword:null) ?>" />
        <meta name="description" content="<?= (!empty($setting->meta_tag)?$setting->meta_tag:null) ?>" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?= (!empty($setting->favicon)?base_url($setting->favicon):base_url('assets_web/img/placeholder/favicon.png')) ?>"/>
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?= (!empty($title)?$title:null) ?></title>

        <!-- CSS -->
        <link href="<?= base_url('assets_web/vendor/bootstrap/css/bootstrap.min.css')?>" type="text/css" rel="stylesheet" media="all">
        <link href="<?= base_url('assets_web/css/animate.min.css')?>" type="text/css" rel="stylesheet" media="all">
        <link href="<?= base_url('assets_web/vendor/fontawesome/css/all.min.css')?>" type="text/css" rel="stylesheet" media="all">
        <link href="<?= base_url('assets_web/vendor/themify-icons/themify-icons.min.css')?>" type="text/css" rel="stylesheet">
        <link href="<?= base_url('assets_web/css/style.css')?>" type="text/css" rel="stylesheet">
        
    </head>
    <body class="bg-grey">
        <div class="wrapper">
            <div class="container-center">
                <div class="register-logo text-center mb-3">
                    <img src="<?= (!empty($setting->logo)?base_url($setting->logo):base_url('assets_web/img/placeholder/logo.png'))?>" alt="">
                </div>
                <!-- main contents -->
                <?php echo $contents;?>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="<?= base_url('assets_web/vendor/jquery/jquery-3.3.1.min.js')?>"></script>
        <script src="<?= base_url('assets_web/js/popper.min.js')?>"></script>
        <script src="<?= base_url('assets_web/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
        <script src="<?= base_url('assets_web/js/script.js')?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                var source = $('#submit');
                var target = $('.msg');
                source.on('click', function() {
                    var firstname    = $('#firstname').val();
                    var lastname     = $('#lastname').val();
                    var email        = $('#email').val();
                    var password     = $('#password').val();
                    
                    $.ajax({
                        url      : '<?= base_url('dashboard/save_registration') ?>',
                        type     : 'post',
                        dataType : 'json',
                        data     : {
                            '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                            firstname, 
                            lastname,
                            email,
                            password
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

                            setTimeout(function(){ 
                                if(data.message){
                                    window.location="<?= base_url('patient_login')?>";
                                }else{
                                    history.go(0);
                                }
                                
                            }, 1500);

                        },
                        error   : function(exc){
                            alert('failed');
                        }
                    });
             

                }); 
            });
        </script>
    </body>
</html>