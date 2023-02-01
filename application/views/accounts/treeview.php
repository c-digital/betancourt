 <style type="text/css">
     .fa-folder{
        color:#D4AC0D;
     }
     .fa-folder-open-o{
        color:#D4AC0D;
     }
     .dsply{
      display: block;;
     }
 </style> 
            
             <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                           <?= display('chart_of_account')?>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                <div class="col-md-6">
                    
                    <div id="jstree1">
                        <ul>
                          <?php

                        $visit=array();
                        for ($i = 0; $i < count($userList); $i++)
                        {

                            $visit[$i] = false;

                        }
                          $this->accounts_model->dfs("Plan de cuentas","0",$userList,$visit,0);

                        ?>
                        </ul>
                    </div>
                </div> 
                <?php if($this->permission->method('account_list','update')->access() || $this->permission->method('account_list','create')->access()): ?>
                <div class="col-md-6" id="newform">
                    <form name="form" id="form" action="<?php echo base_url('accounts/accounts/insert_coa')?>" method="post" enctype="multipart/form-data">
                    <div id="newData">
                       <table width="100%" border="0" cellspacing="0" cellpadding="5">
                        
                          <tr>
                            <td>Código</td>
                            <td><input type="text" name="txtHeadCode" id="txtHeadCode" class="form_input"  value="<?php echo $role_reult->HeadCode?>" readonly="readonly"/></td>
                          </tr>
                          <tr>
                            <td>Nombre</td>
                            <td><input type="text" name="txtHeadName" id="txtHeadName" class="form_input" value="<?php echo $role_reult->HeadName?>"/>
                             <input type="hidden" name="HeadName" id="HeadName" class="form_input" value="<?php echo $role_reult->HeadName?>"/>
                            </td>
                          </tr>
                          <tr>
                            <td>Pertenece a</td>
                            <td><input type="text" name="txtPHead" id="txtPHead" class="form_input" readonly="readonly" value="<?php echo $role_reult->PHeadName?>"/></td>
                          </tr>
                          <tr>

                            <td>Nivel</td>
                            <td><input type="text" name="txtHeadLevel" id="txtHeadLevel" class="form_input" readonly="readonly" value="<?php echo $role_reult->HeadLevel?>"/></td>
                          </tr>
                           <tr>
                            <td>Tipo</td>
                            <td><input type="text" name="txtHeadType" id="txtHeadType" class="form_input" readonly="readonly" value="<?php echo $role_reult->HeadType?>"/></td>
                          </tr>

                           <tr>
                            <td>&nbsp;</td>
                            <td><input type="checkbox" name="IsTransaction" value="1" id="IsTransaction" size="28"  onchange="IsTransaction_change();"
                                <?php if($role_reult->IsTransaction==1){ echo "checked";}?>"/>
                                <label for="IsTransaction"> Transacción</label>
                            <input type="checkbox" value="1" name="IsActive" id="IsActive"
                           <?php if($role_reult->IsActive==1){ echo "checked";}?>
                              size="28" checked="" /><label for="IsActive"> Activo</label>
                            <input type="checkbox" value="1" name="IsGL" id="IsGL" size="28"
                             <?php if($role_reult->IsGL==1){ echo "checked";}?>
                            onchange="IsGL_change();"/><label for="IsGL"> GL</label>

                            </td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                            <td>
                            <?php
                           if( $this->permission->method('accounts','create')->access()){?>
                            <input type="button" name="btnNew" id="btnNew" value="Nuevo" onClick="newdata(<?= $role_reult->HeadCode?>)" />
                             <input type="submit" name="btnSave" id="btnSave" value="Guardar" disabled="disabled"/>
                             <?php }
                            if($this->permission->method('accounts','update')->access()){?>
                            <input type="submit" name="btnUpdate" id="btnUpdate" value="Actualizar" />
                            <?php }?>
                            </td>
                          </tr>
                      
                    </table>
                    </div>
                 </form>
                </div>
                 <?php endif; ?>
            </div>
         </div> 
      </div>
   </div> 
</div>
       
<script type="text/javascript">
$(document).ready(function () {
  $('#jstree1').jstree({
            'core' : {
                'check_callback' : true
            },
            'plugins' : [ 'types', 'dnd' ],
            'types' : {
                'default' : {
                    'icon' : 'fa fa-folder'
                },
                'html' : {
                    'icon' : 'fa fa-file-code-o'
                },
                'svg' : {
                    'icon' : 'fa fa-file-picture-o'
                },
                'css' : {
                    'icon' : 'fa fa-file-code-o'
                },
                'img' : {
                    'icon' : 'fa fa-file-image-o'
                },
                'js' : {
                    'icon' : 'fa fa-file-text-o'
                }

            }
        });
  });
</script>
 <script type="text/javascript">
function loadData(id){
   // alert(id);
    $.ajax({
        url : "<?php echo site_url('accounts/accounts/selectedform/')?>" + id,
        type: "GET",
        dataType: "json",
        success: function(data)
        {
            $('#newform').html(data);
             $('#btnSave').hide();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            data = jqXHR.responseText;
            $('#newform').html(data);
            $('#btnSave').hide();
        }
    });
}


</script>
<script type="text/javascript">
    function newdata(id){
     $.ajax({
        url : "<?php echo site_url('accounts/accounts/newform/')?>" + id,
        type: "GET",
        dataType: "json",
        success: function(data)
        {
          // console.log(data.headcode);
           console.log(data.rowdata);
           var headlabel = data.headlabel;
           $('#txtHeadCode').val(data.headcode);
            document.getElementById("txtHeadName").value = '';
            $('#txtPHead').val(data.rowdata.HeadName);
            $('#txtHeadLevel').val(headlabel);
            $('#btnSave').prop("disabled", false);
             $('#btnSave').show();
            $('#btnUpdate').hide();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            data = JSON.parse(jqXHR.responseText);

            console.log(data.rowdata);
           var headlabel = data.headlabel;
           $('#txtHeadCode').val(data.headcode);
            document.getElementById("txtHeadName").value = '';
            $('#txtPHead').val(data.rowdata.HeadName);
            $('#txtHeadLevel').val(headlabel);
            $('#btnSave').prop("disabled", false);
             $('#btnSave').show();
            $('#btnUpdate').hide();
        }
    });
}

</script>
