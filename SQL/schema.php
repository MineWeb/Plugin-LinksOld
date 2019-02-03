<?php
class LinksAppSchema extends CakeSchema
{
	public $file = 'schema.php';

	public function before($event = [])
	{
		return true;
	}

	public function after($event = [])
	{
	}
	
	public $links__links = [
		'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'],
		'type' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => false],
		'title' => ['type' => 'string', 'null' => false, 'default' => null, 'length' => 255, 'unsigned' => false],
		'subtitle' => ['type' => 'string', 'null' => false, 'default' => null, 'length' => 255, 'unsigned' => false],
		'link' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 255, 'unsigned' => false],
		'discord_id' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 255, 'unsigned' => false],
        'discord_channel' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 255, 'unsigned' => false],
	];
}
