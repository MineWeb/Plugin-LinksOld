<?php

class LinksController extends AppController
{
    public function index()
    {
        $this->loadModel('Links.Links');
        $list = $this->Links->find('all');
        $this->set(compact('list'));
    }

    public function admin_index()
    {
        if ($this->isConnected AND $this->User->isAdmin()) {
            $this->layout = 'admin';
            $this->loadModel('Links.Links');
            $list = $this->Links->find('all');

            $this->set(compact('list'));

        } else {
            $this->redirect('/');
        }
    }

    public function admin_add()
    {
        if ($this->isConnected AND $this->User->isAdmin()) {
            $this->layout = 'admin';
            $this->loadModel('Links.Links');

            if ($this->request->is('ajax')) {
                $this->response->type('json');
                $this->autoRender = null;
                if ($this->request->data['type'] == 0 or empty($this->request->data['type'])) {
                    $requirement = (!empty($this->request->data['discord_id']) AND !empty($this->request->data['discord_channel']));
                } else {
                    $requirement = (!empty($this->request->data['title']) AND !empty($this->request->data['subtitle']) AND !empty($this->request->data['link']));
                }
                if ($requirement) {
                    $this->Links->add(
                        $this->request->data['type'],
                        $this->request->data['title'],
                        $this->request->data['subtitle'],
                        $this->request->data['link'],
                        $this->request->data['discord_id'],
                        $this->request->data['discord_channel']
                    );
                    $this->response->body(json_encode(array('statut' => true, 'msg' => $this->Lang->get('GLOBAL__SUCCESS'))));
                } else {
                    $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__FILL_ALL_FIELDS'))));
                }
            } else {
                $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__BAD_REQUEST'))));
            }

        } else {
            $this->redirect('/');
        }
    }

    public function admin_delete($id)
    {
        if ($this->isConnected AND $this->User->isAdmin()) {

            $this->loadModel('Links.Links');
            $this->autoRender = null;
            $this->Links->delete($id);
            $this->redirect('/admin/links');

        } else {
            $this->redirect('/');
        }
    }

    public function admin_edit($id)
    {
        if ($this->isConnected AND $this->User->isAdmin()) {
            $this->layout = 'admin';
            $this->loadModel('Links.Links');

            $list = $this->Links->find('first', array('conditions' => array('id' => $id)));
            if ($this->request->is('ajax')) {

                $this->autoRender = false;

                if ($this->request->data['type'] == 0 or empty($this->request->data['type'])) {
                    $requirement = (!empty($this->request->data['discord_id']) AND !empty($this->request->data['discord_channel']));
                } else {
                    $requirement = (!empty($this->request->data['title']) AND !empty($this->request->data['subtitle']) AND !empty($this->request->data['link']));
                }
                if ($requirement) {
                    $this->Links->edit(
                        $this->request->data['id'],
                        $this->request->data['type'],
                        $this->request->data['title'],
                        $this->request->data['subtitle'],
                        $this->request->data['link'],
                        $this->request->data['discord_id'],
                        $this->request->data['discord_channel']
                    );
                    $this->response->body(json_encode(array('statut' => true, 'msg' => $this->Lang->get('GLOBAL__SUCCESS'))));
                } else {
                    $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__FILL_ALL_FIELDS'))));
                }
            } else {
                $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__BAD_REQUEST'))));
            }

            $this->set(compact('list'));
        } else {
            $this->redirect('/');
        }
    }
}