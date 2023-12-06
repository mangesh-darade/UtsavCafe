<style>
    .sms_preview{display:none;font-size: 12px;
                 color: initial;
                 border: 1px solid #ccc;
                 padding: 1%;
                 overflow-y: scroll;}
    .sms_preview_d{display:inline}   

</style>
<?php $DisSMSLink = (int) $sms_limit < 1 ? '<br><a href="https://simplypos.in/login.php" target="_blank" style="font-size:11px;color:#ff0000">Please Login on merchant panel & Rechagre Now</a>' : ''; ?>
<div class="section-heading">
    <i class="fa fa-newspaper-o" aria-hidden="true"></i> <?= lang('SMS Award Point'); ?>
    <ul id="myTab2" class="nav nav-tabs sms_tab">
        <li id="single-sms-award-1" class="active"><a href="#single-sms-award" id="sa1" class="tab-grey">Send Single SMS</a></li>
        <li class="" id="group-sms-award-1"><a href="#group-sms-award" id="sa2" class="tab-grey">Send Group SMS</a></li>
    </ul>
</div>
<div class="row"><div class="col-md-12 "  id="sms-loader"></div></div>
<div class="row">
    <div class="tab-content col-sm-12">
        <div id="single-sms-award" class="tab-pane  in active">
            <?php
            $attrib = array('role' => 'form', 'name' => "sms-single-award", id => "sms-single-award");
            echo form_open_multipart("", $attrib)
            ?>
            <input type="hidden" name="hiddencust_sms"  id="hiddencust_sms_award" >
            <input type="hidden" name="sms_promotional_header"  id="sms_promotional_header" value="<?= $Settings->sms_promotional_header ?>" >
            <!--<input type="hidden" name="sms_template_key" id="sms_template_key" >-->
            <input type="hidden" name="dlt_te_id" id="dlt_te_id" value="1207164931673510000" >
            <div class="row">
                <div class="col-lg-7">

                    <div class="form-group all"> 
                     
                        <?php
                        if (!$Settings->sms_promotional_header) {
                            ?>
                            <div class="col-lg-12 alert alert-danger">Promotional SMS header is not define. <a href="<?= base_url("system_settings/#sms_promotional_header") ?>" target="new">Define Header</a></div>
                            <?php
                        }
                        ?>
                        <div class="col-lg-12">
                            
                            <?= lang("List *", "product_details") ?>
                            <select id="customers_sms_award" multiple="multiple"  >
                                <?php foreach($customerlist as $customer_list){  ?>
                                <option value="<?= $customer_list->id ?>"> <?=  $customer_list->name.' ('.$customer_list->phone.')' ?> </option>
                                <?php } ?>
                            </select> 
                        </div>
<!--                        <div class="col-lg-12">
                            <?php // lang("Message *", "product_details") ?>
                            <textarea name="sms_body" cols="40" rows="7" class="form-control skip sms_body" id="sms_body1"></textarea>
                        </div>
                        <input type="hidden" name="sms_length" class="sms_length" >
                        <p> -->
<!--                            <strong> Note : </strong><br/>
                            1. Character Limit of single SMS is 160 for English and 70 for Unicode (including Space & Special Characters )</br>
                            2. For any Indian language other than English select Unicode under MSG Content selection option before typing the message.
                        </p>-->
                        <div class="col-lg-4">    
                            <?php echo form_submit('send_sms', lang('Send SMS'), 'class="btn btn-primary  "' ); ?>
                        </div>  
                        <div class="col-lg-8">    
                            <div class="sms_note blue"> <span id="max_sms_chars1" class="max_sms_chars"></span> </div> 
                            <div class="sms_note blue"> <span class="sms_preview"><div class="sms_preview_d">##message##</div></span> </div> 
                            <div class="sms_note blue">(Note : Available SMS limit <span id="sms_count_limit"><?php print((int) $sms_limit) ?></span><?php echo $DisSMSLink ?>)</div>
                        </div>  
                    </div>
                </div>
                
            </div>
            <?= form_close(); ?>   
        </div>
        <div id="group-sms-award" class="tab-pane fade in">
            <?php
            $attrib = array('role' => 'form', 'name' => "sms-group-award", id => "sms-group-award");
            echo form_open_multipart("", $attrib)
            ?>
            <input type="hidden" name="group_id"  id="sms_group_id"  class="group_id">
            <input type="hidden" name="group_count"  class="group_count" value="<?php echo $GroupCount ?>">
            <input type="hidden" name="sms_promotional_header"  id="sms_promotional_header" value="<?= $Settings->sms_promotional_header ?>" >
            <!--<input type="hidden" name="sms_template_key" id="sms_template_key_group" >-->
            <input type="hidden" name="dlt_te_id" id="dlt_te_id_group" value="1207164931673510000" >
            <div class="row">
                <div class="col-lg-7">
                    <div class="form-group all"> 

                        <div class="col-lg-12">
                            <label for="product_details">  Group</label>
                            <ul class="contact-group">
                                <div class="row"> <?php echo $GroupGrid ?></div>
                            </ul>
                        </div>     

<!--                       
                        <div class="col-lg-12">
                            <?php //lang("Message *", "product_details") ?>
                            <textarea name="sms_body" cols="40" rows="7" class="form-control skip sms_body" id="sms_body2"></textarea>
                        </div>     -->
                        <input type="hidden" name="sms_length" class="sms_length" >
                         
                        <div class="col-lg-12">
                            <div class="col-lg-4">    
                                <?php echo form_submit('send_sms', lang('Send SMS'), 'class="btn btn-primary  "'); ?>
                            </div>  
                            <div class="col-lg-8">    
                                <div class="sms_note blue"> <span id="max_sms_chars2" class="max_sms_chars"></span> </div> 
                                <div class="sms_note blue"> <span class="sms_preview"><div class="sms_preview_d">##message##</div></span> </div> 
                                <div class="sms_note blue">(Note : Available SMS limit <span id="sms_count_limit"><?php print((int) $sms_limit) ?></span><?php echo $DisSMSLink ?>)</div>
                            </div>  
                        </div> 
                    </div>
                </div>
                
            </div>
            <?= form_close(); ?>   
        </div>
    </div>
</div>
<script>
    var smsLength = <?php echo $sms_text_limit ?>;
    $(document).ready(function () {
        var type = $('.messageContents').val();
        smsType(type);
        $('.messageContents').change(function () {
            smsType($(this).val());
        });

        function smsType(type) {
            if (type == 'uni') {
                smsLength = '70';
            } else {
                smsLength = <?php echo $sms_text_limit ?>;
            }
        }


        /*---------------------------- Set Group Id  in  hidden  ----------------------------*/
        /*$('.sms_body').keyup(function (event) {
            $('#' + smsId + ' .max_sms_chars').css("display", "block");
            var length = $(this).val().length;


            var smsId = getSmsTabIndex();
            $('#' + smsId + ' .max_sms_chars').text('SMS count : ' + Math.ceil(length / smsLength) + ' ');
            $('.sms_length').val(Math.ceil(length / smsLength));
            $('#' + smsId + ' .sms_preview').css('display', 'block');
            $('#' + smsId + ' .sms_preview_d').text($(this).val());
            if ($(this).val() == '') {
                $('#' + smsId + ' .sms_preview').css('display', 'none');
            }
        });*/

        /*---------------------------- Set Group Id  in  hidden  ----------------------------*/
        $(document).on('click', '#group-sms-award a.group_button', function () {
            gid = $(this).attr('data-value');
            if (gid > 0) {
                $('#group-sms-award #sms_group_id').val(gid);
            }
        });

        /*----------------------------SMS FROM SUBMIT 1  ----------------------------*/
        $("#sms-single-award").submit(function (event) {
//            alert($("#customers_sms_award").val());
//            var cust_list  = $("#customers_sms_award").val();
            var cust_list = $.trim($('#sms-single-award #customers_sms_award').select2('val'));
            //var sms_content = $.trim($('#sms-single-award .sms_body').val());
            if (cust_list == '') {
                alert('Please select customer ');
                return false;
            }
          
            $('#hiddencust_sms_award').val(cust_list);
    
            $('#sms-loader').html('<div class="alert alert-success"><i class="fa fa-refresh  fa-spin fa-fw"></i><span class="">Loading...</span></div>');

            setTimeout(function () {
                console.log('loading')
            }, 1000);
            $.ajax({
                type: "POST",
                async: true,
                url: "<?= site_url('smsdashboard/addAwardSingleSMS') ?>",
                data: $("#sms-single-award").serialize(),
                dataType: "json",
                beforeSend: function () {
                    $("#sms-loader").html('<div class="alert alert-info"><button data-dismiss="alert" class="close" type="button">×</button><i class="fa fa-refresh fa-spin fa-fw"></i> <span >Loading...</span></span></div>');
                },
                success: function (data) {
                    if (data['error']) {
                        $('#sms-loader').html('<div class="alert alert-danger"><button data-dismiss="alert" class="close" type="button">×</button> ' + data['error'] + ' </div>');
                    } else if (data['success']) {
                        $('#sms-single-award #customers_sms_award').select2("val", "");
                        $('#sms-single-award .sms_preview').css('display', 'none');
                        $('#sms-single-award .sms_preview_d').html('');
                        $('#sms-single-award #sms_count_limit').text(data['sms_count']);
                        $('#sms-single-award')[0].reset();
                        $('#sms-loader').html('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button> ' + data['success'] + ' </div>');
                    }
                },
                error: function () {
                }
            });
            event.preventDefault();
        });
        /*----------------------------SMS FROM SUBMIT Group  ----------------------------*/
        $("#sms-group-award").submit(function (event) {
            event.preventDefault();
            var group_count = $.trim($('#sms-group-award .group_count').val());
            if (group_count == 0) {
                alert('No contact group available  ');
                return false;
            }

            var group_id = $.trim($('#sms-group-award #sms_group_id').val());
//            var sms_content = $.trim($('#sms-group-award .sms_body').val());
            if (group_id == '') {
                alert('Please select contact group ');
                return false;
            }
//            if (sms_content == '') {
//                alert('SMS content is empty ');
//                return false;
//            }

            $('#sms-loader').css('display', 'block');
            $('#sms-loader').html('<div class="alert alert-info"><i class="fa fa-refresh  fa-spin fa-fw"></i><span class="">Loading...</span></div>');
            $.ajax({
                type: "POST",
                async: true,
                url: "<?= site_url('smsdashboard/addAwardGroupSMS') ?>",
                data: $("#sms-group-award").serialize(),
                dataType: "json",
                beforeSend: function () {
                    $("#sms-loader").html('<div class="alert alert-info"><button data-dismiss="alert" class="close" type="button">×</button><i class="fa fa-refresh fa-spin fa-fw"></i> <span >Loading...</span></span></div>');
                },
                success: function (data) {
                    if (data['error']) {
                        $('#sms-loader').html('<div class="alert alert-danger"><button data-dismiss="alert" class="close" type="button">×</button> ' + data['error'] + ' </div>');
                    } else if (data['success']) {
                        $('#sms-group-award .group_id').val('');
                        $('#sms-group-award a.group_button').removeClass('active');

                        $('#sms-group-award .sms_preview').css('display', 'none');
                        $('#sms-group-award .sms_preview_d').html('');
                        $('#sms-group-award #sms_count_limit').text(data['sms_count']);
                        $('#sms-group-award')[0].reset();
                        $('#sms-loader').html('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button> ' + data['success'] + ' </div>');
                    }
                },
                error: function () {
                }
            });
        });
        /*----------------------------SMS FROM SUBMIT  ----------------------------*/
    });
</script>    