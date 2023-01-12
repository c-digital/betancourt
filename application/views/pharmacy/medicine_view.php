<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                 <?php
                 if($this->permission->method('add_medicine','create')->access()){
                 ?>
                <div class="btn-group">
                    <a class="btn btn-success" href="<?php echo base_url("pharmacy/medicine/form") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_medicine') ?> </a> 
                </div>
                <?php } ?>
            </div> 

        <?php
        if($this->permission->method('medicine_list','read')->access() || $this->permission->method('medicine_list','update')->access() || $this->permission->method('medicine_list','delete')->access()){
        ?>
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('medicine_name') ?></th>
                            <th><?php echo display('category_name') ?></th>
                            <th><?php echo display('stock_quantity') ?></th>
                            <th><?php echo display('price') ?></th>
                            <th><?php echo display('manufactured_by') ?></th>
                            <th><?php echo display('status') ?></th> 
                            <?php
                            if($this->permission->method('medicine_list','read')->access() || $this->permission->method('medicine_list','update')->access() || $this->permission->method('medicine_list','delete')->access()){
                            ?>
                            <th><?php echo display('action') ?></th> 
                            <?php } ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($medicines)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($medicines as $medicine) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $medicine->name; ?></td>
                                    <td><?php echo $medicine->category; ?></td>
                                    <td><?php echo $medicine->quantity; ?></td>
                                    <td><?php echo $medicine->price; ?></td>
                                    <td><?php echo $medicine->manufactured_by; ?></td>
                                    <td><?php echo (($medicine->status==1)?display('active'):display('inactive')); ?></td>
                                    <?php
                                     if($this->permission->method('medicine_list','read')->access() || $this->permission->method('medicine_list','update')->access() || $this->permission->method('medicine_list','delete')->access()){
                                     ?>
                                    <td class="center" width="17%">
                                        <?php
                                         if($this->permission->method('add_medicine','create')->access()){
                                         ?> 
                                          <a class="btn btn-primary btn-xs add_stock" data-id="<?= $medicine->id;?>" data-toggle="modal" data-target="#modal_form">
                                         <?= display('add_stock')?>
                                          </a>
                                        <?php } ?>

                                        <?php
                                         if($this->permission->method('add_medicine','create')->access()){
                                         ?> 
                                          <a class="btn btn-primary btn-xs move" data-id="<?= $medicine->id;?>" data-toggle="modal" data-target="#modal_move">
                                         Mover de almacen
                                          </a>
                                        <?php } ?>

                                        <?php
                                         if($this->permission->method('medicine_list','read')->access()){
                                         ?>
                                        <a href="<?php echo base_url("pharmacy/medicine/details/$medicine->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a> 
                                        <?php } ?>

                                        <?php
                                         if($this->permission->method('medicine_list','update')->access()){
                                         ?>
                                        <a href="<?php echo base_url("pharmacy/medicine/form/$medicine->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                        <?php } ?>

                                        <?php
                                         if($this->permission->method('medicine_list','delete')->access()){
                                         ?>
                                        <a href="<?php echo base_url("pharmacy/medicine/delete/$medicine->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "><i class="fa fa-trash"></i></a> 
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


 <script type="text/javascript">
    $(document).ready(function(){
       $(".add_stock").click(function(){
         var id = $(this).attr('data-id');
          $.ajax({
            url : "<?php echo site_url('pharmacy/medicine/get_stock')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
             
              $('[name="id"]').val(data.id);
              $('[name="name"]').val(data.name);
              $('[name="quantity"]').val(data.quantity);
              $('[name="price"]').val(data.price);
                
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                data = JSON.parse(jqXHR.responseText);

                $('[name="id"]').val(data.id);
                  $('[name="name"]').val(data.name);
                  $('[name="quantity"]').val(data.quantity);
                  $('[name="price"]').val(data.price);
              }
            });
       });

       $(".move").click(function(){
         var id = $(this).attr('data-id');
         $('[name="id_mover"]').val(id);
       });
    });
 </script>
 <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"><?= display('add_stock')?></h3>
        </div>
        <div class="modal-body form">
            <?php echo form_open('pharmacy/medicine/add_stock/','class="form-horizontal"') ?>
           
            <input type="hidden" value="" name="id"/> 
            <div class="form-body">
              <div class="form-group">
                <label class="control-label col-md-3"><?php echo display('medicine_name') ?></label>
                <div class="col-md-9">
                  <input name="name" placeholder="<?php echo display('medicine_name') ?>" class="form-control" type="text" readonly>
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-3"><?= display('stock_quantity')?></label>
                <div class="col-md-9">
                  <input name="quantity" placeholder="<?= display('stock_quantity')?>" class="form-control" type="number" readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3"><?= display('price')?></label>
                <div class="col-md-9">
                  <input name="price" placeholder="<?= display('price')?>" class="form-control" type="number" readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3"><?= display('add_stock')?></label>
                <div class="col-md-9">
                  <input name="add_stock" placeholder="<?= display('add_stock')?>" class="form-control" type="number" required>
                </div>
              </div>
            
           </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="btnSave" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
        <?php echo form_close() ?>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- End Bootstrap modal -->

  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_move" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"><?= 'Mover de almacen'?></h3>
        </div>
        <div class="modal-body form">
            <?php echo form_open('pharmacy/almacenes/mover','class="form-horizontal"') ?>
           
            <input type="hidden" value="" name="id_mover"/> 
            <input type="hidden" value="1" name="almacen_central"/> 
            <div class="form-body">
              <div class="form-group">
                <label class="control-label col-md-3"><?php echo 'Seleccione un almacen' ?></label>
                <div class="col-md-9">
                  <select name="id_almacen" class="form-control">
                      <option value=""></option>
                      <?php foreach ($almacenes as $almacen): ?>
                        <option value="<?php echo $almacen->id ?>"><?php echo $almacen->nombre ?></option>
                      <?php endforeach ?>
                  </select>
                </div>
              </div> 

              <div class="form-group">
                <label class="control-label col-md-3"><?= 'Cantidad'?></label>
                <div class="col-md-9">
                  <input name="cantidad" placeholder="<?= 'Cantidad'?>" class="form-control" type="number" required>
                </div>
              </div>           
           </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="btnSave" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
        <?php echo form_close() ?>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- End Bootstrap modal -->