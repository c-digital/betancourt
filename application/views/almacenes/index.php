<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">

        <div class="panel-heading no-print">
             <?php
             if($this->permission->method('add_medicine','create')->access()){
             ?>
            <div class="btn-group">
                <a class="btn btn-success" href="<?php echo '/pharmacy/almacenes/create' ?>"> <i class="fa fa-plus"></i>  Agregar nuevo almacen </a> 
            </div>
            <?php } ?>
        </div> 

        <?php
        if($this->permission->method('medicine_list','read')->access() || $this->permission->method('medicine_list','update')->access() || $this->permission->method('medicine_list','delete')->access()){
        ?>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo '#' ?></th>
                            <th><?php echo 'Nombre' ?></th>
                            <th><?php echo 'Cantidad de productos' ?></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($almacenes)) { ?>
                            <?php $contador = 1; ?>
                            <?php foreach ($almacenes as $almacen) { ?>
                                <tr class="<?php echo ($contador & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $contador; ?></td>
                                    <td><?php echo $almacen->nombre; ?></td>
                                    <td><?php
                                        echo $this->db->query("SELECT * FROM almacenes_productos WHERE id_almacen = $almacen->id GROUP BY name")->num_rows();
                                    ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-success" href="/pharmacy/almacenes/ver/<?php echo $almacen->id; ?>">
                                            <i class="fa fa-eye"></i> 
                                            Ver almacen
                                        </a>

                                        <a class="btn btn-xs btn-success" href="/pharmacy/almacenes/editar/<?php echo $almacen->id; ?>">
                                            <i class="fa fa-eye"></i> 
                                            Editar almacen
                                        </a>

                                        <a class="btn btn-xs btn-danger" href="/pharmacy/almacenes/delete/<?php echo $almacen->id; ?>">
                                            <i class="fa fa-trash"></i> 
                                            Eliminar almacen
                                        </a>                            
                                    </td>
                                </tr>
                                <?php $contador++; ?>
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
