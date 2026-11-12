<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Penjualan Controller
 *
 * @property \App\Model\Table\PenjualanTable $Penjualan
 */
class PenjualanController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Penjualan->find();
        $penjualan = $this->paginate($query);

        $this->set(compact('penjualan'));
    }

    /**
     * View method
     *
     * @param string|null $id Penjualan id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $penjualanEntity = $this->Penjualan->get($id, contain: []);
        $this->set(compact('penjualanEntity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
  public function add()
{
    $penjualan = $this->Penjualan->newEmptyEntity();
    if ($this->request->is('post')) {
        $data = $this->request->getData();
        
        $connection = $this->Penjualan->getConnection();
        
        try {
            $result = $connection->transactional(function () use ($data) {
                // Ambil data utama
                $tanggal = $data['tanggal_penjualan'] ?? date('Y-m-d H:i:s');
                $idPelanggan = $data['id_pelanggan'] ?? null;
                $items = $data['items'] ?? [];

                if (empty($items)) {
                    throw new \Exception(__('Minimal harus ada 1 produk yang dipilih!'));
                }

                $produkTable = $this->fetchTable('Produk');

                // Loop setiap baris produk yang diinput kasir
                foreach ($items as $item) {
                    $produkId = $item['produk_id'] ?? null;
                    $jumlahBeli = (int)($item['jumlah_produk'] ?? 0);

                    if (empty($produkId) || $jumlahBeli <= 0) {
                        continue; // Lewati jika baris kosong
                    }

                    // 1. Simpan data per baris ke tabel penjualan
                    $penjualanEntity = $this->Penjualan->newEmptyEntity();
                    $penjualanEntity->tanggal_penjualan = $tanggal;
                    $penjualanEntity->id_pelanggan = $idPelanggan;
                    $penjualanEntity->produk_id = $produkId;
                    $penjualanEntity->jumlah_produk = $jumlahBeli;
                    
                    // Ambil harga dari database untuk keamanan
                    $produk = $produkTable->get($produkId);
                    $penjualanEntity->harga = $produk->harga;
                    $penjualanEntity->total = $produk->harga * $jumlahBeli;

                    if (!$this->Penjualan->save($penjualanEntity)) {
                        throw new \Exception(__('Gagal menyimpan salah satu item penjualan.'));
                    }

                    // 2. Kurangi stok di tabel Produk secara otomatis
                    if ($produk->stok < $jumlahBeli) {
                        throw new \Exception(__('Stok produk "' . $produk->nama_produk . '" tidak mencukupi! Sisa stok: ' . $produk->stok));
                    }

                    $produk->stok -= $jumlahBeli;
                    if (!$produkTable->save($produk)) {
                        throw new \Exception(__('Gagal memperbarui stok produk.'));
                    }
                }

                return true;
            });

            if ($result) {
                $this->Flash->success(__('Semua data penjualan berhasil disimpan dan stok telah diperbarui.'));
                return $this->redirect(['action' => 'index']);
            }
        } catch (\Exception $e) {
            $this->Flash->error(__('Gagal menyimpan penjualan: ' . $e->getMessage()));
        }
    }

    // Ambil data produk untuk dropdown dan JavaScript
    $produksData = $this->Penjualan->Produk->find('all')->all();
    
    $produkList = [];
    $produkData = [];
    
    foreach ($produksData as $prod) {
        $produkList[$prod->id_produk] = $prod->nama_produk; 
        $produkData[$prod->id_produk] = [
            'harga' => $prod->harga ?? 0,
            'stok' => $prod->stok ?? 0
        ];
    }

    $this->set(compact('penjualan', 'produkList', 'produkData'));
}
    /**
     * Delete method
     *
     * @param string|null $id Penjualan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $penjualanEntity = $this->Penjualan->get($id);
        if ($this->Penjualan->delete($penjualanEntity)) {
            $this->Flash->success(__('The penjualan has been deleted.'));
        } else {
            $this->Flash->error(__('The penjualan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
