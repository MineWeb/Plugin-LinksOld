<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title"><?= $Lang->get('LINKS__ADD') ?> &nbsp;&nbsp;<a href="<?= $this->Html->url(array('controller' => 'links', 'action' => 'add', 'admin' => true)) ?>" class="btn btn-success"><?= $Lang->get('GLOBAL__ADD') ?></a></h3>
				</div>
				<div class="box-body">

					<table class="table table-bordered dataTable">
						<thead>
							<tr>
								<th>Type</th>
								<th><?= $Lang->get('LINKS__TITLE') ?></th>
								<th><?= $Lang->get('LINKS__SUBTITLE') ?></th>
								<th><?= $Lang->get('LINKS__LINK') ?>, Discord_ID</th>
								<th class="right"></th>
							</tr>
						</thead>
						<tbody>
                            <?php if(!empty($list)) { ?>
                                <?php foreach ($list as $v) { ?>
                                    <tr>
                                        <td>
                                        <?php switch ($v["Links"]["type"]) {
                                                case 0:
                                                    echo "Discord";
                                                    break;
                                                case 1:
                                                    echo "Youtube";
                                                    break;
                                                case 2:
                                                    echo "Facebook";
                                                    break;
                                                case 3:
                                                    echo "Twitter";
                                                    break;
                                            }
                                        ?>
                                        </td>
                                        <td><?= $v["Links"]["title"] ?></td>
                                        <td><?= $v["Links"]["subtitle"] ?></td>
                                        <td><?= $v["Links"]["link"] ?>, <?= $v["Links"]["discord_id"] ?></td>
                                        <td class="right">
                                            <a href="<?= $this->Html->url(array('controller' => 'links', 'action' => 'edit/'.$v["Links"]["id"], 'admin' => true, 'plugin' => 'links')) ?>" class="btn btn-info"><?= $Lang->get('GLOBAL__EDIT') ?></a>
                                            <a onClick="confirmDel('<?= $this->Html->url(array('controller' => 'links', 'action' => 'delete/'.$v["Links"]["id"], 'admin' => true, 'plugin' => 'links')) ?>')" class="btn btn-danger"><?= $Lang->get('GLOBAL__DELETE') ?></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</section>
