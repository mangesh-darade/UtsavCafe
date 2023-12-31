<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo lang('edit_tax_rate'); ?></h4>
        </div>
        <?php
        $attrib = array('id'=>'editTaxRate');
        echo form_open("system_settings/edit_tax_rate/" . $id, $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>
             <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="name"><?php echo $this->lang->line("name"); ?></label>
                        <div class="controls">
                            <?php echo form_input('name', $tax_rate->name, 'class="form-control" id="name" required="required"'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="rate"><?php echo $this->lang->line("tax_rate"); ?></label>
                        <div class="controls"> 
                            <?php echo form_input('rate', $tax_rate->rate, 'class="form-control numaric_input" id="rate" required="required"'); ?>
                        </div>
                    </div>
                 </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="code"><?php echo $this->lang->line("code"); ?></label>
                        <div class="controls">
                            <?php echo form_input('code', $tax_rate->code, 'class="form-control" id="code"'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type"><?php echo $this->lang->line("type"); ?></label>
                        <div class="controls">
                            <?php $type = array('1' => lang('percentage'), '2' => lang('fixed'));
                            echo form_dropdown('type', $type, $tax_rate->type, 'class="form-control" id="type" required="required"'); ?> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">  
                    <div class="form-group"> <?php echo $this->sma->tax_attr(unserialize($tax_rate->tax_config));?></div>
                </div>
            </div>               
        </div>
        <div class="modal-footer">
            <?php echo form_submit('edit_tax_rate', lang('edit_tax_rate'), 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<script type="text/javascript" src="<?= $assets ?>js/modal.js"></script>
<?= $tax_js ?>