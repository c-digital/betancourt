<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <?php
            if($this->permission->method('medicine_category_list','read')->access() || $this->permission->method('medicine_category_list','update')->access() || $this->permission->method('medicine_category_list','delete')->access()){
            ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("laboratorio/examenes") ?>"> <i class="fa fa-list"></i>  <?php echo 'Lista de examenes' ?> </a>  
                </div>
            </div> 
            <?php } ?>


       <?php
        if($this->permission->method('add_medicine_category','create')->access()){
        ?>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open('laboratorio/guardar_examen','class="form-inner"') ?>

                            <div class="form-group row">
                                <label for="name" class="col-xs-3 col-form-label"><?php echo 'Nombre'?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="nombre"  type="text" class="form-control" id="nombre" placeholder="<?php echo 'Nombre'?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="categoria" class="col-xs-3 col-form-label"><?php echo 'Categoria'?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <select name="categoria" class="form-control">
                                    	<option value=""></option>
                                    	<?php foreach ($categorias as $categoria): ?>
                                    		<option value="<?php echo $categoria->id ?>"><?php echo $categoria->nombre ?></option>
                                    	<?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-xs-3 col-form-label"><?php echo 'Valor de referencia'?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="valor_referencia"  type="text" class="form-control" id="valor_referencia" placeholder="<?php echo 'Valor de referencia'?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="precio" class="col-xs-3 col-form-label"><?php echo 'Precio'?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="precio"  type="text" class="form-control" id="nombre" placeholder="<?php echo 'Precio'?>">
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
    </div>

</div>