<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <?php
            if($this->permission->method('add_portfolio','create')->access() ){
            ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="<?php echo base_url("portfolio/create") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_portfolio') ?> </a>  
                </div>
            </div>
            <?php } ?>


            <?php
                if($this->permission->method('portfolio_list','read')->access() || $this->permission->method('portfolio_list','update')->access() || $this->permission->method('portfolio_list','delete')->access()){
                ?>
            <div class="panel-body">
                <!-- Nav tabs --> 
                <ul class="col-xs-12 nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"> 
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab"> <i class="fa fa-list"></i> <?php echo display('portfolio_list')?></a>
                    </li>
                    <li role="presentation">
                        <a href="#language" aria-controls="language" role="tab" data-toggle="tab"> <i class="fa fa-list"></i> <?php echo display('language') ?></a>
                    </li>
                </ul>  

                <!-- Tab panes --> 
                <div class="col-xs-12 tab-content">
                    <br>
                    <!-- INFORMATION -->
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="row">
                            <div class="col-md-12"> 
                                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('serial') ?></th>
                                            <th><?php echo display('language') ?></th>
                                            <th><?php echo display('doctor_name') ?></th>
                                            <th><?php echo display('designation') ?></th>
                                            <th><?php echo display('institute_name') ?></th>
                                            <th><?php echo display('from_date') ?></th>
                                            <th><?php echo display('to_date') ?></th>
                                            <th><?php echo display('description') ?></th>
                                            <th><?php echo display('status') ?></th>

                                         <?php
                                         if($this->permission->method('portfolio','update')->access() || $this->permission->method('portfolio','delete')->access()){
                                          ?>
                                            <th><?php echo display('action') ?></th>
                                          <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($portfolios)) { ?>
                                            <?php $sl = 1; ?>
                                            <?php foreach ($portfolios as $portfolio) { ?>
                                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                                <td><?php echo $sl; ?></td>
                                                <td><?php echo $portfolio->language; ?></td>
                                                <td><?php echo $portfolio->dname; ?></td>
                                                <td><?php echo $portfolio->title; ?></td>
                                                <td><?php echo $portfolio->institute; ?></td>
                                                <td><?php echo $portfolio->from_date; ?></td>
                                                <td><?php echo $portfolio->to_date; ?></td>
                                                <td><?php echo character_limiter($portfolio->description, 80); ?></td>
                                                <td><?php echo (($portfolio->status==1)?display('active'):display('inactive')); ?></td>

                                                <?php
                                                if($this->permission->method('portfolio','update')->access() || $this->permission->method('portfolio','delete')->access()){
                                                 ?>
                                                <td class="center">

                                                    <?php
                                                    if($this->permission->method('portfolio','update')->access()){
                                                    ?>
                                                        <a href="<?php echo base_url("portfolio/edit/$portfolio->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                                    <?php } ?>

                                                    <?php
                                                    if($this->permission->method('portfolio','delete')->access()){
                                                    ?>
                                                        <a href="<?php echo base_url("portfolio/delete/$portfolio->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>')"><i class="fa fa-trash"></i></a> 
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
                        </div>
                    </div> 

                    <div role="tabpanel" class="tab-pane" id="language">
                        <div class="row">
                            <div class="col-sm-12">
                               <table width="100%" class="datatable table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('serial') ?></th>
                                            <th><?php echo display('language') ?></th>
                                            <th><?php echo display('doctor_name') ?></th>
                                            <th><?php echo display('designation') ?></th>
                                            <th><?php echo display('institute_name') ?></th>
                                            <th><?php echo display('from_date') ?></th>
                                            <th><?php echo display('to_date') ?></th>
                                            <th><?php echo display('description') ?></th>
                                            <th><?php echo display('status') ?></th>

                                         <?php
                                         if($this->permission->method('portfolio','update')->access() || $this->permission->method('portfolio','delete')->access()){
                                          ?>
                                            <th><?php echo display('action') ?></th>
                                          <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($othersLang)) { ?>
                                            <?php $sl = 1; ?>
                                            <?php foreach ($othersLang as $portfolio) { ?>
                                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                                <td><?php echo $sl; ?></td>
                                                <td><?php echo $portfolio->language; ?></td>
                                                <td><?php echo $portfolio->dname; ?></td>
                                                <td><?php echo $portfolio->title; ?></td>
                                                <td><?php echo $portfolio->institute; ?></td>
                                                <td><?php echo $portfolio->from_date; ?></td>
                                                <td><?php echo $portfolio->to_date; ?></td>
                                                <td><?php echo character_limiter($portfolio->description, 80); ?></td>
                                                <td><?php echo (($portfolio->status==1)?display('active'):display('inactive')); ?></td>

                                                <?php
                                                if($this->permission->method('portfolio','update')->access() || $this->permission->method('portfolio','delete')->access()){
                                                 ?>
                                                <td class="center">

                                                    <?php
                                                    if($this->permission->method('portfolio','update')->access()){
                                                    ?>
                                                        <a href="<?php echo base_url("portfolio/edit/$portfolio->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                                    <?php } ?>

                                                    <?php
                                                    if($this->permission->method('portfolio','delete')->access()){
                                                    ?>
                                                        <a href="<?php echo base_url("portfolio/delete/$portfolio->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>')"><i class="fa fa-trash"></i></a> 
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
                        </div>
                    </div>
                </div>
            </div>
            <?php }else{
                ?>
                <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                    <h4><?php echo display('you_do_not_have_permission_to_access_please_contact_with_administrator');?>.</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            } ?>
        </div>
    </div>
</div>

