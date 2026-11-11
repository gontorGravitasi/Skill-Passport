<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Pelanggan Controller
 *
 * @property \App\Model\Table\PelangganTable $Pelanggan
 */
class PelangganController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Pelanggan->find();
        $pelanggan = $this->paginate($query);

        $this->set(compact('pelanggan'));
    }

    /**
     * View method
     *
     * @param string|null $id Pelanggan id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pelangganEntity = $this->Pelanggan->get($id, contain: []);
        $this->set(compact('pelangganEntity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pelangganEntity = $this->Pelanggan->newEmptyEntity();
        if ($this->request->is('post')) {
            $pelangganEntity = $this->Pelanggan->patchEntity($pelangganEntity, $this->request->getData());
            if ($this->Pelanggan->save($pelangganEntity)) {
                $this->Flash->success(__('The pelanggan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pelanggan could not be saved. Please, try again.'));
        }
        $this->set(compact('pelangganEntity'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pelanggan id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pelangganEntity = $this->Pelanggan->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pelangganEntity = $this->Pelanggan->patchEntity($pelangganEntity, $this->request->getData());
            if ($this->Pelanggan->save($pelangganEntity)) {
                $this->Flash->success(__('The pelanggan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pelanggan could not be saved. Please, try again.'));
        }
        $this->set(compact('pelangganEntity'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pelanggan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pelangganEntity = $this->Pelanggan->get($id);
        if ($this->Pelanggan->delete($pelangganEntity)) {
            $this->Flash->success(__('The pelanggan has been deleted.'));
        } else {
            $this->Flash->error(__('The pelanggan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
