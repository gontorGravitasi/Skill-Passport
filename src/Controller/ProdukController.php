<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Produk Controller
 *
 * @property \App\Model\Table\ProdukTable $Produk
 */
class ProdukController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Produk->find();
        $produk = $this->paginate($query);

        $this->set(compact('produk'));
    }

    /**
     * View method
     *
     * @param string|null $id Produk id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produkEntity = $this->Produk->get($id, contain: []);
        $this->set(compact('produkEntity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produkEntity = $this->Produk->newEmptyEntity();
        if ($this->request->is('post')) {
            $produkEntity = $this->Produk->patchEntity($produkEntity, $this->request->getData());
            if ($this->Produk->save($produkEntity)) {
                $this->Flash->success(__('The produk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produk could not be saved. Please, try again.'));
        }
        $this->set(compact('produkEntity'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Produk id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produkEntity = $this->Produk->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produkEntity = $this->Produk->patchEntity($produkEntity, $this->request->getData());
            if ($this->Produk->save($produkEntity)) {
                $this->Flash->success(__('The produk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produk could not be saved. Please, try again.'));
        }
        $this->set(compact('produkEntity'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Produk id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produkEntity = $this->Produk->get($id);
        if ($this->Produk->delete($produkEntity)) {
            $this->Flash->success(__('The produk has been deleted.'));
        } else {
            $this->Flash->error(__('The produk could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
