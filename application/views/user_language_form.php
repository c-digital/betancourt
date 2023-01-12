<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("doctor/languages") ?>"> <i class="fa fa-list"></i>  <?php echo display('language') ?> </a>  
                </div>
            </div> 
           
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open('doctor/create_language','class="form-inner"') ?>

                            <div class="form-group row">
                                <label for="user_id" class="col-xs-3 col-form-label"><?php echo display('doctor_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                <?php echo form_dropdown('user_id', $doctor_list, '', 'class="form-control" id="user_id"') ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="language" class="col-xs-3 col-form-label"><?php echo display('language_proficiency') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <table id="fixTable" class="table table-striped">
                                        <tbody id="languages">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                        <div class="or"></div>
                                        <button class="ui positive button"><?php echo display('save') ?></button>
                                    </div>
                                </div>
                            </div>

                        <?php echo form_close() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){

    // #-------ADD OR REMOVE LANGUAGE ITEM--------#
    var languages_html = "<tr>"+
    "<td><input name=\"name[]\" class=\"form-control\" type=\"text\" placeholder=\"<?php echo display('language').' '.display('name') ?>\"></td>"+
    "<td><input name=\"rating[]\" class=\"form-control rate\" type=\"number\" placeholder=\"<?= display('rating_out_of_10')?>\"><br><label ><input name=\"type[]\" type=\"checkbox\" value=\"Native\"> <?php echo display('native')?></label> <label><input name=\"type[]\" type=\"checkbox\" value=\"Fluent\"> <?php echo display('fluent')?></label> <label><input name=\"type[]\" type=\"checkbox\" value=\"Beginner\"> <?php echo display('beginner')?></label></td>"+
    "<td><div class=\"btn btn-group\">"+
        "<button type=\"button\" class=\"addMore btn btn-sm btn-success\">+</button>"+
        "<button type=\"button\" class=\"remove btn btn-sm btn-danger\">-</button>"+
    "</div></td>"+
    "</tr>";

    $("#languages").append(languages_html);
    $('body').on('click', '.addMore', function() {
        $("#languages").append(languages_html); 
    });


    $('body').on('click', '.remove', function() {
       $(this).parent().parent().parent().remove();
    });

    $('.rate').change(function() {
      var n = $('.rate').val();
      if (n > 10)
        $('.rate').val(1);
    });
    
});

</script>
