<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
       <?php
        if($this->permission->method('add_medicine_category','create')->access()){
        ?>
            <div class="panel-heading no-print">
                <div class="btn-group">
                    <a class="btn btn-success" href="<?php echo base_url("laboratorio/agregar_examen") ?>"> <i class="fa fa-plus"></i>  <?php echo 'Agregar examen' ?> </a> 
                </div>
            </div> 
        <?php } ?>


        <?php
        if($this->permission->method('medicine_category_list','read')->access() || $this->permission->method('medicine_category_list','update')->access() || $this->permission->method('medicine_category_list','delete')->access()){
        ?>
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo 'Nombre' ?></th>
                            <th><?php echo 'Categoria' ?></th>
                            <th><?php echo 'Valor referencia' ?></th>
                            <th><?php echo 'Precio' ?></th>
                            <?php
                            if($this->permission->method('medicine_category_list','update')->access() || $this->permission->method('medicine_category_list','delete')->access()){
                            ?>
                            <th><?php echo display('action') ?></th> 
                            <?php } ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($examenes)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($examenes as $examen) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $examen->nombre; ?></td>
                                    <td><?php echo $examen->nombre_categoria; ?></td>
                                    <td><?php echo $examen->valor_referencia; ?></td>
                                    <td><?php echo $examen->precio; ?></td>

                                    <?php
                                    if($this->permission->method('medicine_category_list','update')->access()){
                                    ?>
                                    <th
                                    <td class="center" width="80">
                                      <?php
                                      if($this->permission->method('medicine_category_list','update')->access() || $this->permission->method('medicine_category_list','delete')->access()){
                                       ?>
                                        <a href="<?php echo base_url("laboratorio/editar_examen/$examen->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                        <?php } ?>


                                        <?php
                                      if($this->permission->method('medicine_category_list','delete')->access()){
                                       ?>
                                        <a href="<?php echo base_url("laboratorio/eliminar_examen/$examen->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "><i class="fa fa-trash"></i></a> 
                                        <?php } ?>
                                    </td>
                                    <?php } ?>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
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
 
 