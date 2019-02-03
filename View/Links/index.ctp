<div class="container">
    <div class="row">
        <?php if (!empty($list)) { ?>
            <?php foreach ($list as $v) {
                if ($v['Links']['type'] != 0) { ?>
                    <div class="col-md-4">
                        <div class="panel ">
                            <div class="panel-heading">
                                <h4><?= $v['Links']['title'] ?></h4>
                            </div>
                            <div style="height:400px">
                                <div style="
                                <?php switch ($v["Links"]["type"]) {
                                    case 0:
                                        echo "background: url(/links/img/img-Discord.png) center";
                                        break;
                                    case 1:
                                        echo "background: url(/links/img/img-Youtube.png) center";
                                        break;
                                    case 2:
                                        echo "background: url(/links/img/img-Facebook.png) right";
                                        break;
                                    case 3:
                                        echo "background: url(/links/img/img-Twitter.png) center";
                                        break;
                                }
                                ?>
                                        no-repeat;height: 100%;background-size: cover !important;">

                                </div>
                            </div>
                            <div class="panel-heading" style="height:150px">
                                <div style="margin-bottom:20px;height:50%">
                                    <h5><?= $v['Links']['subtitle'] ?></h5>
                                </div>
                                <a href="<?= $v['Links']['link'] ?>"
                                   class="btn btn-primary btn-block"><?= $Lang->get('LINKS__LINK') ?></a>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-md-12">
                        <iframe src="//cl2.widgetbot.io/channels/<?= $v['Links']['discord_id'] ?>/<?= $v['Links']['discord_channel'] ?>" height="600" width="100%"></iframe>
                    </div>
                <?php }}} ?>
    </div>
</div>