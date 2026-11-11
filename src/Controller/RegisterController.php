<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Register Controller
 *
 * @property \App\Model\Table\RegisterTable $Register
 */
class RegisterController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Register->find();
        $register = $this->paginate($query);

        $this->set(compact('register'));
    }

    /**
     * View method
     *
     * @param string|null $id Register id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $registerEntity = $this->Register->get($id, contain: []);
        $this->set(compact('registerEntity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $registerEntity = $this->Register->newEmptyEntity();
        if ($this->request->is('post')) {
            $registerEntity = $this->Register->patchEntity($registerEntity, $this->request->getData());
            if ($this->Register->save($registerEntity)) {
                $this->Flash->success(__('The register has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The register could not be saved. Please, try again.'));
        }
        $this->set(compact('registerEntity'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Register id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $registerEntity = $this->Register->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $registerEntity = $this->Register->patchEntity($registerEntity, $this->request->getData());
            if ($this->Register->save($registerEntity)) {
                $this->Flash->success(__('The register has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The register could not be saved. Please, try again.'));
        }
        $this->set(compact('registerEntity'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Register id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registerEntity = $this->Register->get($id);
        if ($this->Register->delete($registerEntity)) {
            $this->Flash->success(__('The register has been deleted.'));
        } else {
            $this->Flash->error(__('The register could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
