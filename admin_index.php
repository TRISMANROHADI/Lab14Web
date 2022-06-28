public function admin_index() 
 {
 $title = 'Daftar Artikel';
 $model = new ArtikelModel();
 $data = [
 'title' => $title,
 'artikel' => $model->paginate(10), #data dibatasi 10 record per 
halaman
 'pager' => $model->pager,
 ];
 return view('artikel/admin_index', $data);
 }
 public function admin_index() 
 {
 $title = 'Daftar Artikel';
 $q = $this->request->getVar('q') ?? '';
 $model = new ArtikelModel();
 $data = [
 'title' => $title,
 'q' => $q,
 'artikel' => $model->like('judul', $q)->paginate(10), # data 
dibatasi 10 record per halaman
 'pager' => $model->pager,
 ];
 return view('artikel/admin_index', $data);
 }
 
 public function add() 
 {
 // validasi data.
 $validation = \Config\Services::validation();
 $validation->setRules(['judul' => 'required']);
 $isDataValid = $validation->withRequest($this->request)->run();

 if ($isDataValid)
 {
 $file = $this->request->getFile('gambar');
 $file->move(ROOTPATH . 'public/gambar');
 $artikel = new ArtikelModel();
 $artikel->insert([
 'judul' => $this->request->getPost('judul'),
 'isi' => $this->request->getPost('isi'),
 'slug' => url_title($this->request->getPost('judul')),
 'gambar' => $file->getName(),
 ]);
 return redirect('admin/artikel');
 }
 $title = "Tambah Artikel";
 return view('artikel/form_add', compact('title'));
 }
