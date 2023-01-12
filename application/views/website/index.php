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
        <link rel="shortcut icon" href="<?= (!empty($basics->favicon)?base_url($basics->favicon):base_url('assets_web/img/placeholder/favicon.png')) ?>"/>
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?= (!empty($setting->title)?$setting->title:null) ?></title>

        <!-- CSS -->
        <link href="<?= base_url('assets_web/vendor/bootstrap/css/bootstrap.min.css')?>" type="text/css" rel="stylesheet" media="all">
        <link href="<?= base_url('assets_web/css/animate.min.css')?>" type="text/css" rel="stylesheet" media="all">
        <link href="<?= base_url('assets_web/vendor/fontawesome/css/all.min.css')?>" type="text/css" rel="stylesheet" media="all">
        <link href="<?= base_url('assets_web/vendor/themify-icons/themify-icons.min.css')?>" type="text/css" rel="stylesheet">
        <link href="<?= base_url('assets_web/vendor/et-line-font/et-line.min.css')?>" type="text/css" rel="stylesheet">
        <link href="<?= base_url('assets_web/vendor/metismenu/metisMenu.min.css')?>" type="text/css" rel="stylesheet"> 
        <link href="<?= base_url('assets_web/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css')?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url('assets_web/vendor/OwlCarousel2/dist/assets/owl.carousel.min.css')?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url('assets_web/vendor/OwlCarousel2/dist/assets/owl.theme.default.min.css')?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url('assets_web/vendor/select2/dist/css/select2.min.css')?>" type="text/css" rel="stylesheet">
        <link href="<?= base_url('assets_web/vendor/select2/dist/css/select2-bootstrap.min.css')?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url('assets_web/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url('assets_web/css/style.css')?>" type="text/css" rel="stylesheet">
        <!-- <link href="<?= base_url('assets_web/font/flaticon.css')?>" type="text/css" rel="stylesheet"> -->
        
    </head>
    <body>
        <!-- header -->
        <?php @$this->load->view('website/includes/header');?>
        <!-- /.Main header -->
        
        <!-- main content -->
        <?php echo (!empty($content)?$content:null) ?>
        <!-- end main content -->

        <div class="appointment text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?= display('make_an_appointment')?> <a href="<?= base_url()?>#appointment-form" class="appointment-link js-scroll-trigger"><?= display('go_there')?> <i class="ti-arrow-right"></i></a></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.appointment block -->
        
        <?php @$this->load->view('website/includes/footer');?>
        <!-- ./footer -->
        <!-- ./sub footer -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="<?= base_url('assets_web/vendor/jquery/jquery-3.3.1.min.js')?>"></script>
        <script src="<?= base_url('assets_web/js/popper.min.js')?>"></script>
        <script src="<?= base_url('assets_web/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
        <script src="<?= base_url('assets_web/vendor/metismenu/metisMenu.min.js')?>"></script>
        <script src="<?= base_url('assets_web/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js')?>"></script>
        <script src="<?= base_url('assets_web/vendor/OwlCarousel2/dist/owl.carousel.min.js')?>"></script>
        <script src="<?= base_url('assets_web/vendor/select2/dist/js/select2.min.js')?>"></script>
        <script src="<?= base_url('assets_web/vendor/masonry/dist/masonry.pkgd.min.js')?>"></script>
        <script src="<?= base_url('assets_web/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
        <script src="<?= base_url('assets_web/js/file-upload.js')?>"></script>
        <script src="<?= base_url('assets_web/js/jquery.easing.min.js')?>"></script>
        <script src="<?= base_url('assets_web/js/script.js')?>"></script>
        <script type="text/javascript">
            $(document).ready(function(){    
                $('#userLang').on("change",function()
                {
                    var userLang = $('#userLang').val();
                        
                    $.ajax({
                        url  : '<?= base_url('home/chane_language/') ?>',
                        type : 'post',
                        data : {
                            '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                            userLang
                        },
                        success : function(data) 
                        {
                           location.reload();
                        }, 
                        error : function()
                        {
                            alert('failed');
                        }
                    });
                }); 
            });
        </script>
    </body>
</html>