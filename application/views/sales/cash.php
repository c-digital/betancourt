<style>
    .picture {
        border: 1px solid black;
        padding: 10px;
    }
</style>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-bd billing-panel">
			<div class="panel-heading no-print row">
                <div class="btn-group col-xs-4"> 
                    <a class="btn btn-primary" href="<?php echo '/billing/admission' ?>">
                    	<i class="fa fa-list"></i>  <?php echo 'Listado de internación' ?>
                    </a>
                </div>

                <h2 class="col-xs-8 text-left text-success"><?php echo 'Agregar venta a contado' ?></h2>
            </div>

            <div class="panel-body panel-form">
            	<div class="row">
                   <div class="col-md-4">
                       <div class="form-group">
                           <label for="admission_id">Número de internación</label>
                           <input type="text" class="form-control" name="admission_id" value="<?php echo $admission->admission_id; ?>" required>
                       </div>
                   </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                       <div class="form-group">
                           <label for="name">Nombre del paciente</label>
                           <input readonly type="text" class="form-control" name="name" value="<?php echo $admission->name; ?>">
                       </div>
                    </div>

                    <div class="col-md-4">
                       <div class="form-group">
                           <label for="email">Correo electrónico</label>
                           <input readonly type="text" class="form-control" name="email" value="<?php echo $admission->email; ?>">
                       </div>
                    </div>

                    <div class="col-md-4">
                       <div class="form-group">
                           <label for="mobile">Teléfono</label>
                           <input readonly type="text" class="form-control" name="mobile" value="<?php echo $admission->mobile; ?>">
                       </div>
                    </div>

                    <div class="col-md-4">
                       <div class="form-group">
                           <label for="sex">Sexo</label>
                           <input readonly type="text" class="form-control" name="sex" value="<?php echo display($admission->sex); ?>">
                       </div>
                    </div>

                    <div class="col-md-4">
                       <div class="form-group">
                           <label for="date_of_birth">Fecha de nacimiento</label>
                           <input readonly type="text" class="form-control" name="date_of_birth" value="<?php echo $admission->date_of_birth; ?>">
                       </div>
                    </div>

                    <div class="col-md-4">
                       <div class="form-group">
                           <label for="blood_group">Grupo sanguíneo</label>
                           <input readonly type="text" class="form-control" name="blood_group" value="<?php echo $admission->blood_group; ?>">
                       </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <textarea name="address" readonly class="form-control"><?php echo $admission->address; ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                       <div class="form-group">
                           <label for="admission_date">Fecha de internación</label>
                           <input readonly type="text" class="form-control" name="admission_date" value="<?php echo $admission->admission_date; ?>">
                       </div>
                    </div>

                    <div class="col-md-4">
                       <div class="form-group">
                           <label for="discharge_date">Fecha de alta</label>
                           <input readonly type="text" class="form-control" name="discharge_date" value="<?php echo $admission->discharge_date; ?>">
                       </div>
                    </div>

                    <div class="col-md-4">
                       <div class="form-group">
                           <label for="doctor">Doctor</label>
                           <input readonly type="text" class="form-control" name="doctor" value="<?php echo $admission->doctor; ?>">
                       </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Servicio / Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody class="items">
                                <tr>
                                    <td>                                        
                                        <input type="text" class="form-control" placeholder="Producto / Servicio" required>
                                    </td>

                                    <td>
                                        <input type="number" name="items[0][quantity]" class="form-control" value="1" required>
                                    </td>

                                    <td>
                                        <input min="0.01" name="items[0][amount]" step="0.01" type="number" class="form-control" value="0.00" required>
                                    </td>

                                    <td>
                                        <input readonly type="number" class="form-control" value="0.00" required>
                                    </td>

                                    <td class="text-center">
                                        <button type="button" class="btn btn-info btn-sm btn-add-item">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>

<script>
    $(document).ready(function () {
        i = 1;

        $('.btn-add-item').click(function () {
            html = `
                <tr>
                    <td>                                        
                        <input type="text" class="form-control" placeholder="Producto / Servicio" required>
                    </td>

                    <td>
                        <input type="number" name="items[${i}][quantity]" class="form-control" value="1" required>
                    </td>

                    <td>
                        <input min="0.01" name="items[${i}][amount]" step="0.01" type="number" class="form-control" value="0.00" required>
                    </td>

                    <td>
                        <input readonly type="number" class="form-control" value="0.00" required>
                    </td>

                    <td class="text-center">
                        <button type="button" class="btn btn-danger btn-sm" onclick="btn_remove_item(this)">
                            <i class="fa fa-remove"></i>
                        </button>
                    </td>
                </tr>
            `;

            i++;

            $('.items').append(html);
        });

    });

    function btn_remove_item(that) {
        $(that).parent().parent().remove();
    }
</script>