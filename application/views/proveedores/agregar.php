<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
           
            <?php
            if($this->permission->method('medication_list','read')->access() || $this->permission->method('medication_list','update')->access() || $this->permission->method('medication_list','delete')->access()){
            ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("pharmacy/proveedores") ?>"> <i class="fa fa-list"></i>  <?php echo 'Lista de proveedores' ?> </a>  
                </div>
            </div> 
            <?php } ?>


            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open('pharmacy/proveedores/guardar','class="form-inner"') ?>

                            <div class="form-group row">
                                <label for="nombre" class="col-xs-3 col-form-label"><?php echo 'Nombre' ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="nombre"  type="text" class="form-control" id="nombre" placeholder="<?php echo 'Nombre' ?>" value="<?= $nombre;?>">
                                    <span></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nit" class="col-xs-3 col-form-label"><?php echo 'NIT' ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="nit"  type="text" class="form-control" id="nit" placeholder="<?php echo 'NIT' ?>" value="<?= $nit;?>">
                                    <span></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telefono" class="col-xs-3 col-form-label"><?php echo 'Telefono' ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="telefono"  type="text" class="form-control" id="telefono" placeholder="<?php echo 'Telefono' ?>" value="<?= $telefono;?>">
                                    <span></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-xs-3 col-form-label"><?php echo 'Email' ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="email"  type="text" class="form-control" id="email" placeholder="<?php echo display('email') ?>" value="<?= $email;?>">
                                    <span></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="direccion" class="col-xs-3 col-form-label"><?php echo 'Direccion' ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="direccion"  type="text" class="form-control" id="direccion" placeholder="<?php echo 'Direccion' ?>" value="<?= $direccion;?>">
                                    <span></span>
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