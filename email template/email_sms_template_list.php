<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fs-17 font-weight-600 mb-0"><?php echo (!empty($title)?$title:null) ?></h6>
                    </div>
                    <div class="text-right">
                        <div class="actions">
                            <a href="#" class="action-item"><i class="ti-reload"></i></a>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="card-body">
                <table id="example" class="table display table-bordered table-striped table-hover">
                    <thead>
                        <tr> 
                            <th><?php echo lan('sl_no') ?></th>
                            <th>Type</th>
                            <th>Template name</th>
                            <th>Template FR title/subject</th>
                            <th>Template FR title/subject</th>
                            <th>Template EN</th> 
                            <th>Template FR</th> 
                            <th>Action</th>
                        </tr>
                    </thead>    
                    <tbody>
                        <?php if (!empty($template)) ?>
                        <?php $sl = 1; ?>
                        <?php foreach ($template as $value) { ?>
                        <tr>
                            <td><?php echo esc($sl++); ?></td> 
                            <td><?php echo esc($value->sms_or_email); ?></td>
                            <td><?php echo esc($value->template_name); ?></td>
                            <td><?php echo esc($value->subject_en); ?></td>
                            <td><?php echo esc($value->subject_fr); ?></td>
                            <td><?php echo esc($value->template_en); ?></td>
                            <td><?php echo esc($value->template_fr); ?></td>
                            <td>
                                <a href="<?php echo base_url("admin/setting/smsemail_templateform/$value->id") ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fas fa-edit" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php } ?>  
                    </tbody>
                </table>
                <?php echo $pager ?>
            </div> 
        </div>
    </div>
</div>