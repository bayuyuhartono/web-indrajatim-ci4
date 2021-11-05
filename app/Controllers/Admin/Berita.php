<?php

namespace App\Controllers\Admin;

use App\Models\m_admin;
use App\Models\m_global;
use App\Models\BeritaListModel;
use CodeIgniter\I18n\Time;
use Config\Services;

class Berita extends AdminBaseController
{
    public function __Construct()
    {

        $this->admin = new m_admin();
        $this->global = new m_global();
    }

    public function index()
    {
        $data = array(
            'title' => 'INDRA JATIM',
            'subtitle' => 'Berita',
        );
        return view('admin/berita/index', $data);
    }

    public function tambah_data()
    {
        $data = array(
            'title' => 'INDRA JATIM',
            'subtitle' => 'Tambah Berita',
            'list_kategori' => $this->admin->getkategori(),
            'list_tag' => $this->admin->gettag(),
        );
        return view('admin/berita/tambah_data', $data);
    }

    public function actiontambah()
    {
        $date = Time::now('Asia/Jakarta', 'en_US');
        $jam = $date->format('H:i:s');
        $old_name = $_FILES["gambar"]["name"];
        $ext = pathinfo($old_name, PATHINFO_EXTENSION);
        $new_name = time() . '-brt.' . $ext;

        $tag = '';
        $tagarr = $this->request->getPost('tag');
        foreach ($tagarr as $key => $value) {
            if ($key != 0) {
                $tag .= ',';
            }

            $check = $this->admin->gettag("where nama_tag='" . strtolower($value) . "'");
            if (count($check) < 1) {
                $data = array(
                    'nama_tag' => strtolower($value),
                );
                $this->global->InsertData('tbl_tag', $data);
            }

            $tag .= $value;
        }

        $dataBerkas = $this->request->getFile('gambar');
        $image = \Config\Services::image()
            ->withFile($dataBerkas)
            ->resize(600, 600, true, 'height')
            ->save(FCPATH . 'assets/admin/upload/berita/' . $new_name);

        $dataBerkas->move(WRITEPATH . 'uploads');

        $data = array(
            'judul' => $this->request->getPost('judul'),
            'slug' => $this->request->getPost('slug'),
            'id_kategori' => $this->request->getPost('kategori'),
            'tanggal' => date($this->request->getPost('tanggal')) . ' ' . $jam,
            'tanggal_dibuat' => date('Y-m-d H:i:s') . ' ' . $jam,
            'content' => $this->request->getPost('content'),
            'caption' => $this->request->getPost('caption'),
            'judul_gambar' => $this->request->getPost('judul_gambar'),
            'slide' => $this->request->getPost('slide'),
            'gambar' => $new_name,
            'tag' => $tag,
        );
        $this->global->InsertData('tbl_berita', $data);
        session()->setFlashdata('success', 'Data Berhasil di Simpan');
        return redirect()->back();
    }

    public function edit_data($id_berita = '')
    {
        $berita = $this->admin->getberita("where id_berita='$id_berita' ");
        if (isset($berita[0]['tag'])) {
            $tag = explode(",", $berita[0]['tag']);
        } else {
            $tag = [];
        }
        $data = array(
            'title' => 'INDRA JATIM',
            'subtitle' => 'Edit Berita',
            'id_berita' => (isset($berita[0]['id_berita'])) ? $berita[0]['id_berita'] : "",
            'judul' => (isset($berita[0]['judul'])) ? $berita[0]['judul'] : "",
            'slug' => (isset($berita[0]['slug'])) ? $berita[0]['slug'] : "",
            'kategori' => (isset($berita[0]['kategori'])) ? $berita[0]['kategori'] : "",
            'tanggal' => (isset($berita[0]['tanggal'])) ? $berita[0]['tanggal'] : "",
            'tanggal_diubah' => date('Y-m-d H:i:s'),
            'content' => (isset($berita[0]['content'])) ? $berita[0]['content'] : "",
            'caption' => (isset($berita[0]['caption'])) ? $berita[0]['caption'] : "",
            'judul_gambar' => (isset($berita[0]['judul_gambar'])) ? $berita[0]['judul_gambar'] : "",
            'tag' => $tag,
            'slide' => (isset($berita[0]['slide'])) ? $berita[0]['slide'] : "0",
            'list_kategori' => $this->admin->getkategori(),
            'list_tag' => $this->admin->gettag(),
        );
        return view('admin/berita/edit_data', $data);
    }

    public function actionedit()
    {
        $date = Time::now('Asia/Jakarta', 'en_US');
        $jam = $date->format('H:i:s');
        $old_name = $_FILES["gambar"]["name"];
        $ext = pathinfo($old_name, PATHINFO_EXTENSION);
        $new_name = time() . '-brt.' . $ext;

        $tag = '';
        $tagarr = $this->request->getPost('tag');
        foreach ($tagarr as $key => $value) {
            if ($key != 0) {
                $tag .= ',';
            }

            $check = $this->admin->gettag("where nama_tag='" . strtolower($value) . "'");
            if (count($check) < 1) {
                $data = array(
                    'nama_tag' => strtolower($value),
                );
                $this->global->InsertData('tbl_tag', $data);
            }

            $tag .= $value;
        }

        if (!$_FILES["gambar"]["name"]) {
            $id_berita = $this->request->getPost('id_berita');
            $data = array(
                'judul' => $this->request->getPost('judul'),
                'slug' => $this->request->getPost('slug'),
                'id_kategori' => $this->request->getPost('kategori'),
                'content' => $this->request->getPost('content'),
                'caption' => $this->request->getPost('caption'),
                'slide' => $this->request->getPost('slide'),
                'tanggal' => date($this->request->getPost('tanggal')) . ' ' . $jam,
                'tanggal_diubah' => date('Y-m-d H:i:s') . ' ' . $jam,
                'tag' => $tag,
                'judul_gambar' => $this->request->getPost('judul_gambar'),
            );
            // $id = $this->db->where('id_berita', $id_berita);
            // $query = $this->db->get('tbl_berita');
            // $row = $query->row();
            $this->global->UpdateData('tbl_berita', $data, array('id_berita' => $id_berita));
            session()->setFlashdata('success', 'Data Berhasil di Edit');
            return redirect()->to(site_url('/admin/berita'));
        } else {
            $dataBerkas = $this->request->getFile('gambar');
            $image = \Config\Services::image()
                ->withFile($dataBerkas)
                ->resize(600, 600, true, 'height')
                ->save(FCPATH . 'assets/admin/upload/berita/' . $new_name);

            $dataBerkas->move(WRITEPATH . 'uploads');

            // $upload_data   = array('uploads' => $this->upload->data());
            // $this->load->library('image_lib', $config);
            // $this->image_lib->resize();
            $id_berita = $this->request->getPost('id_berita');
            $data = array(
                'judul' => $this->request->getPost('judul'),
                'slug' => $this->request->getPost('slug'),
                'id_kategori' => $this->request->getPost('kategori'),
                'content' => $this->request->getPost('content'),
                'caption' => $this->request->getPost('caption'),
                'tanggal' => date('Y-m-d', strtotime($this->request->getPost('tanggal'))) . ' ' . $jam,
                'tanggal_diubah' => date('Y-m-d H:i:s') . ' ' . $jam,
                'gambar' => $new_name,
                'tag' => $tag,
                'judul_gambar' => $this->request->getPost('judul_gambar'),
            );

            $this->global->UpdateData('tbl_berita', $data, array('id_berita' => $id_berita));
            session()->setFlashdata('success', 'Data Berhasil di Edit');
            return redirect()->to(site_url('/admin/berita'));
        }
    }

    public function actiondelete($id_berita)
    {
        $row = $this->admin->getberita("where id_berita='$id_berita' ");
        unlink("./assets/admin/upload/berita/" . $row[0]['gambar']);
        $this->global->DeleteData('tbl_berita', array('id_berita' => $id_berita));
        // $this->global->DeleteData('tbl_komentar', array('id_berita' => $id_berita));
        session()->setFlashdata('warning', 'Data Berhasil di Hapus');
        return redirect()->back();
    }

    public function uploadImages()
    {
        $accepted_origins = array("http://localhost:8080", "https://indrajatim.com/", "https://indrajatim.id/");
        $imgFolder = "./assets/admin/upload/thread/";
        reset($_FILES);
        $tmp = current($_FILES);
        if (is_uploaded_file($tmp['tmp_name'])) {
            // if(isset($_SERVER['HTTP_ORIGIN'])){
            //     if(in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)){
            header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
            //     }else{
            //         header("HTTP/1.1 403 Origin Denied");
            //         return $this->response->setJSON(array('message'=>'Origin Denied '.$_SERVER['HTTP_ORIGIN']));
            //     }
            // }
            // check valid file name
            if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $tmp['name'])) {
                header("HTTP/1.1 400 Invalid file name.");
                return $this->response->setJSON(array('message' => 'invalid file name'));
            }
            // check and Verify extension
            if (!in_array(strtolower(pathinfo($tmp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
                header("HTTP/1.1 400 Invalid extension.");
                return $this->response->setJSON(array('message' => 'invalid extension'));
            }

            // Accept upload if there was no origin, or if it is an accepted origin
            $filePath = $imgFolder . $tmp['name'];
            move_uploaded_file($tmp['tmp_name'], $filePath);
            // return successful JSON.
            $res = [];
            $res['location'] = base_url($filePath);
            return $this->response->setJSON($res);
        } else {
            header("HTTP/1.1 500 Server Error");
            return $this->response->setJSON(array('message' => 'Server Error'));
        }
    }

    public function ajax_list()
    {
		$notice = "Yakin mau hapus data ini?";
        $request = Services::request();
        $beritamodel = new BeritaListModel($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $beritamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
				$kategori = $beritamodel->getKategori($list->id_kategori);
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = '<img src="'.base_url('assets/admin/upload/berita/'.$list->gambar).'" width="58" height="58">';
                $row[] = $kategori[0]['kategori'];
                $row[] = $list->judul;
                $row[] = $list->tanggal;
                $row[] = '<button class="btn btn-sm btn-primary mb-2"><a class="text-white" href="'.base_url('admin/berita/edit_data/'.$list->id_berita).'">Edit</a></button><button class="btn btn-sm btn-danger" onclick="return confirm('.$notice.')"><a class="text-white" href="'.base_url('admin/berita/actiondelete/'.$list->id_berita).'">Delete</a></button>';
                $data[] = $row;
            }
            $output = ["draw" => $request->getPost('draw'),
                "recordsTotal" => $beritamodel->count_all(),
                "recordsFiltered" => $beritamodel->count_filtered(),
                "data" => $data];
            echo json_encode($output);
        }
    }
}
