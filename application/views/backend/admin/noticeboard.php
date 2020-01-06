
<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <div class="tabs">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#list" data-toggle="tab">
                    <i class="fa fa-list"></i> 
                   <span class="hidden-xs"> <?php echo get_phrase('noticeboard_list'); ?></span>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab">
                   <i class="fa fa-plus-circle"></i>
                   <span class="hidden-xs"> <?php echo get_phrase('add_noticeboard'); ?></span>
                </a></li>
        </ul>
        <!------CONTROL TABS END------>

        <div class="tab-content">
            <br>
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
                <div class="row">

                    <div class="col-md-12">

                        <ul class="nav nav-tabs"><!-- available classes "bordered", "right-aligned" -->
                            <li class="active">
                                <a href="#running" data-toggle="tab">
                                    <span><i class="entypo-home"></i>
                                        <?php echo get_phrase('running'); ?></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#archived" data-toggle="tab">
                                    <span><i class="entypo-archive"></i>
                                        <?php echo get_phrase('archived'); ?></span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <br>
                            <div class="tab-pane active" id="running">

                                <?php include 'running_noticeboard.php'; ?>

                            </div>
                            <div class="tab-pane" id="archived">

                                <?php include 'archived_noticeboard.php'; ?>

                            </div>
                        </div>


                    </div>

                </div>
            </div>
            <!----TABLE LISTING ENDS--->


            <!----CREATION FORM STARTS---->
            <div class="tab-pane box" id="add">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/noticeboard/create', array('class' => 'form-horizontal form-bordered validate', 'target' => '_top')); ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('title'); ?> <span class="required">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" required title="<?php echo get_phrase('value_required');?>" name="notice_title"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('notice'); ?></label>
                        <div class="col-sm-5">
                            <div class="box closable-chat-box">
                                <div class="box-content padded">
                                    <div class="chat-message-box">
                                        <textarea name="notice" id="ttt" rows="5" placeholder="<?php echo get_phrase('add_notice'); ?>" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('date'); ?> <span class="required">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" data-plugin-datepicker required title="<?php echo get_phrase('value_required');?>" name="create_timestamp"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('send_sms_to_all'); ?></label>
                        <div class="col-sm-5">
                            <select class="form-control" name="check_sms" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
                                <option value="1"><?php echo get_phrase('yes'); ?></option>
                                <option value="2"><?php echo get_phrase('no'); ?></option>
                            </select>
                            <br>
                            <span class="badge badge-primary">
                                <?php
                                if ($active_sms_service == 'clickatell')
                                    echo 'Clickatell ' . get_phrase('activated');
                                if ($active_sms_service == 'twilio')
                                    echo 'Twilio ' . get_phrase('activated');
                                if ($active_sms_service == '' || $active_sms_service == 'disabled')
                                    echo get_phrase('sms_service_not_activated');
                                ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-primary"><?php echo get_phrase('add_notice'); ?></button>
                        </div>
                    </div>
                    </form>                
                </div>                
            </div>
            <!----CREATION FORM ENDS-->

        </div>
        </div>
    </div>
</div>