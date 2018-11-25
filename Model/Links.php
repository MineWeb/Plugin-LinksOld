<?php
class Links extends LinksAppModel
{
    public function edit($id, $type, $title, $subtitle, $link, $discord_id)
    {
		$type = $this->getDataSource()->value($type, 'string');
		$title = $this->getDataSource()->value($title, 'string');
		$subtitle = $this->getDataSource()->value($subtitle, 'string');
		$link = $this->getDataSource()->value($link, 'string');
		$discord_id = $this->getDataSource()->value($discord_id, 'string');
		
		return $this->updateAll([
			'type' => $type,
			'title' => $title,
			'subtitle' => $subtitle,
			'link' => $link,
			'discord_id' => $discord_id
		], ['id' => $id]);
	}
    
    public function add($type, $title, $subtitle, $link, $discord_id)
    {
        $this->create();
        $this->set(array(
            'type' => $type,
            'title' => $title,
            'subtitle' => $subtitle,
            'link' => $link,
            'discord_id' => $discord_id
        ));
        $this->save();
	}
}