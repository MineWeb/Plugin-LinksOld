<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $Lang->get('LINKS__ADD') ?></h3>
                </div>
                <div class="box-body">
                    <form action="<?= $this->Html->url(array('controller' => 'links', 'action' => 'add')) ?>"
                          method="post" data-ajax="true"
                          data-redirect-url="<?= $this->Html->url(array('controller' => 'links', 'action' => 'index', 'admin' => true)) ?>">

                        <div class="ajax-msg"></div>

                        <div class="form-group" id="title" style="display:none;">
                            <label><?= $Lang->get('LINKS__TITLE') ?></label>
                            <input name="title" class="form-control" type="text">
                        </div>

                        <div class="form-group" id="subtitle" style="display:none;">
                            <label><?= $Lang->get('LINKS__SUBTITLE') ?></label>
                            <input name="subtitle" class="form-control" type="text">
                        </div>

                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control" name="type">
                                <option value="0">Discord</option>
                                <option value="1">Youtube</option>
                                <option value="2">Facebook</option>
                                <option value="3">Twitter</option>
                            </select>
                        </div>

                        <script type="text/javascript">
                            $('select[name="type"]').on('change', function (e) {
                                if ($(this).val() == '0') {
                                    $('#discord_id').slideDown();
                                    $('#discord_channel').slideDown();

                                    $('#title').slideUp();
                                    $('#subtitle').slideUp();
                                    $('#link').slideUp();
                                } else {
                                    $('#discord_id').slideUp();
                                    $('#discord_channel').slideUp();

                                    $('#title').slideDown();
                                    $('#subtitle').slideDown();
                                    $('#link').slideDown();

                                }
                            });
                        </script>

                        <div class="form-group" id="discord_id">
                            <label><?= $Lang->get('LINKS__DISCORD_ID') ?></label>
                            <input name="discord_id" class="form-control" type="text">
                        </div>

                        <div class="form-group" id="discord_channel">
                            <label><?= $Lang->get('LINKS__DISCORD_CHANNEL') ?></label>
                            <input name="discord_channel" class="form-control" type="text">
                        </div>

                        <div class="form-group" id="link" style="display:none;">
                            <label><?= $Lang->get('LINKS__LINK') ?></label>
                            <input name="link" class="form-control" type="text">
                        </div>

                        <div class="pull-right">
                            <a href="<?= $this->Html->url(array('controller' => 'links', 'action' => 'index', 'admin' => true)) ?>"
                               class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
                            <button class="btn btn-primary" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
