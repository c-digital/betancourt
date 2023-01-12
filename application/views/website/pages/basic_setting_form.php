<div class="row">
    <?php
    if($this->permission->method('setting','read')->access() || $this->permission->method('setting','update')->access()){
    ?>
    <div class="col-sm-12">
       <div class="panel panel-default thumbnail"> 
            <?php
            if($this->permission->method('setting','read')->access()){
            ?>
                <div class="panel-heading no-print">
                    <div class="btn-group"> 
                        <a class="btn btn-primary" href="<?php echo base_url("website/setting/") ?>"> <i class="fa fa-list"></i>  <?php echo display('setting') ?> </a>  
                    </div>
                </div> 
            <?php } ?>
 
            <div class="panel-body  panel-form"> 
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <?php echo form_open_multipart('website/setting/update_common/'.$setting->id,'class="form-inner"') ?>
                            <?php echo form_hidden('id',$setting->id) ?>
 

                            <div class="form-group row">
                                <label for="email" class="col-xs-3 col-form-label"><?php echo display('email') ?> <i class="fa fa-exclamation-triangle" data-toggle="tooltip" data-placement="top" title="Email Separate by Comma"></i> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="email" type="text" class="form-control" id="email" placeholder="<?php echo display('email') ?>"  value="<?php echo $setting->email ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="app_url" class="col-xs-3 col-form-label"><?php echo display('app_store').' '.display('url') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="app_url" type="text" class="form-control" id="app_url" placeholder="<?php echo display('app_store').' '.display('url') ?>"  value="<?php echo $setting->AppStoreUrl ?>">
                                </div>
                            </div>
 
                            <!-- if setting favicon is already uploaded -->
                            <?php if(!empty($setting->favicon)) {  ?>
                            <div class="form-group row">
                                <label for="faviconPreview" class="col-xs-3 col-form-label"></label>
                                <div class="col-xs-9">
                                    <img src="<?php echo base_url($setting->favicon) ?>" alt="Favicon" class="img-thumbnail" />
                                </div>
                            </div>
                            <?php } ?>

                            <div class="form-group row">
                                <label for="favicon" class="col-xs-3 col-form-label"><?php echo display('favicon') ?> </label>
                                <div class="col-xs-9">
                                    <input type="file" name="favicon" placeholder="Logo" id="favicon" value="<?php echo $setting->favicon ?>">
                                    <input type="hidden" name="old_favicon" value="<?php echo $setting->favicon ?>">
                                </div>
                            </div>

                            <!-- if setting logo is already uploaded -->
                            <?php if(!empty($setting->logo)) {  ?>
                            <div class="form-group row">
                                <label for="logoPreview" class="col-xs-3 col-form-label"></label>
                                <div class="col-xs-9">
                                    <img src="<?php echo base_url($setting->logo) ?>" alt="Logo" class="img-thumbnail" />
                                </div>
                            </div>
                            <?php } ?>

                            <div class="form-group row">
                                <label for="logo" class="col-xs-3 col-form-label"><?php echo display('logo') ?> </label>
                                <div class="col-xs-9">
                                    <input type="file" name="logo"  id="logo" value="<?php echo $setting->logo ?>">
                                    <input type="hidden" name="old_logo" value="<?php echo $setting->logo ?>">
                                </div>
                            </div>  

                            <div class="form-group row">
                                <label for="twitter_api" class="col-xs-3 col-form-label"><?php echo display('twitter_api') ?></label>
                                <div class="col-xs-9">
                                    <textarea name="twitter_api" class="form-control"  placeholder="<?php echo display('twitter_api') ?>" rows="2"><?php echo $setting->twitter_api ?></textarea>
                                </div>
                            </div>  

                            <div class="form-group row">
                                <label for="google_map" class="col-xs-3 col-form-label"><?php echo display('google_map_embed') ?> <i class="fa fa-exclamation-triangle" data-toggle="tooltip" data-placement="top" title="For Embed code: https://www.embedgooglemap.net/ Hieight=500px and width=100%"></i></label>
                                <div class="col-xs-9">
                                    <textarea name="google_map" class="form-control"  placeholder="<?php echo display('google_map_embed') ?>" rows="2"><?php echo $setting->google_map ?></textarea>
                                </div>
                            </div>  

                            <div class="form-group row">
                                <label for="google_map_api" class="col-xs-3 col-form-label"><?php echo display('google_map_api') ?> <i class="fa fa-exclamation-triangle" data-toggle="tooltip" data-placement="top" title="For Map api: https://cloud.google.com/"></i></label>
                                <div class="col-xs-9">
                                    <textarea name="google_map_api" class="form-control"  placeholder="<?php echo display('google_map_api') ?>" rows="2"><?php echo $setting->google_map_api ?></textarea>
                                </div>
                            </div>  

                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('map_show_by') ?></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="map_active" value="1" <?php if($setting->map_active==1){echo 'checked';}?>><?php echo display('embed') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="map_active" value="0" <?php if($setting->map_active==0){echo 'checked';}?> ><?php echo display('api') ?>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="facebook" class="col-xs-3 col-form-label"><?php echo display('facebook_url') ?></label>
                                <div class="col-xs-9">
                                    <input name="facebook" type="text" class="form-control" id="facebook" placeholder="http://facebook/"  value="<?php echo $setting->facebook ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="twitter" class="col-xs-3 col-form-label"><?php echo display('twitter_url') ?></label>
                                <div class="col-xs-9">
                                    <input name="twitter" type="text" class="form-control" id="twitter" placeholder="http://twitter.com/"  value="<?php echo $setting->twitter ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="instagram" class="col-xs-3 col-form-label"><?php echo display('instagram_url') ?></label>
                                <div class="col-xs-9">
                                    <input name="instagram" type="text" class="form-control" id="instagram" placeholder="http://instagram.com/"  value="<?php echo $setting->instagram ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="google_plus" class="col-xs-3 col-form-label"><?php echo display('google_plus_url') ?></label>
                                <div class="col-xs-9">
                                    <input name="google_plus" type="text" class="form-control" id="google_plus" placeholder="http://plus.google.com/"  value="<?php echo $setting->google_plus ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dribbble" class="col-xs-3 col-form-label"><?php echo display('dribbble_url') ?></label>
                                <div class="col-xs-9">
                                    <input name="dribbble" type="text" class="form-control" id="dribbble" placeholder="http://dribbble.com/"  value="<?php echo $setting->dribbble ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="skype" class="col-xs-3 col-form-label"><?php echo display('skype_url') ?></label>
                                <div class="col-xs-9">
                                    <input name="skype" type="text" class="form-control" id="skype" placeholder="http://skype.com/"  value="<?php echo $setting->skype ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="vimeo" class="col-xs-3 col-form-label"><?php echo display('vimeo_url') ?></label>
                                <div class="col-xs-9">
                                    <input name="vimeo" type="text" class="form-control" id="vimeo" placeholder="http://vimeo.com/"  value="<?php echo $setting->vimeo ?>">
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="direction" class="col-xs-3 col-form-label"><?php echo display('map_directions') ?></label>
                                <div class="col-xs-9">
                                    <input name="direction" type="text" class="form-control" id="direction" placeholder="<?php echo display('map_directions'). ' '.display('url') ?>"  value="<?php echo $setting->direction ?>">
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="latitude" class="col-xs-3 col-form-label"><?php echo display('map_latitude') ?></label>
                                <div class="col-xs-9">
                                    <input name="latitude" type="text" class="form-control" id="latitude" placeholder="<?php echo display('map_latitude') ?>"  value="<?php echo $setting->latitude ?>">
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="vimeo" class="col-xs-3 col-form-label"><?php echo display('map_longitude') ?></label>
                                <div class="col-xs-9">
                                    <input name="longitude" type="text" class="form-control" id="longitude" placeholder="<?php echo display('map_longitude') ?>"  value="<?php echo $setting->longitude ?>">
                                </div>
                            </div> 


                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('website_status') ?></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="1" <?php if($setting->status==1){echo 'checked';}?>><?php echo display('active') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="0" <?php if($setting->status==0){echo 'checked';}?>><?php echo display('inactive') ?>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <?php
                            if($this->permission->method('setting','update')->access()){
                            ?>
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                        <div class="or"></div>
                                        <button class="ui positive button"><?php echo display('save') ?></button>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
}
 else{
 ?>
    <div class="col-sm-12">
       <div class="panel panel-bd lobidrag">
        <div class="panel-heading">
          <div class="panel-title">
            <h4><?php echo display('you_do_not_have_permission_to_access_please_contact_with_administrator');?>.</h4>
           </div>
           </div>
         </div>
        </div>
 <?php
 }
 ?>

</div>

     