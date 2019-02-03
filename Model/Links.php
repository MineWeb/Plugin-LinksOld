<?php
class Links extends LinksAppModel
{
    public function edit($id, $type, $title, $subtitle, $link, $discord_id, $discord_channel)
    {
        $type = $this->getDataSource()->value($type, 'string');
        $title = $this->getDataSource()->value($title, 'string');
        $subtitle = $this->getDataSource()->value($subtitle, 'string');
        $link = $this->getDataSource()->value($link, 'string');
        $discord_id = $this->getDataSource()->value($discord_id, 'string');
        $discord_id = $this->getDataSource()->value($discord_id, 'string');

        return $this->updateAll([
            'type' => $type,
            'title' => $title,
            'subtitle' => $subtitle,
            'link' => $link,
            'discord_id' => $discord_id,
            'discord_channel' => $discord_channel
        ], ['id' => $id]);
    }

    public function add($type, $title, $subtitle, $link, $discord_id, $discord_channel)
    {
        $this->create();
        $this->set(array(
            'type' => $type,
            'title' => $title,
            'subtitle' => $subtitle,
            'link' => $link,
            'discord_id' => $discord_id,
            'discord_channel' => $discord_channel
        ));
        $this->save();
    }
}