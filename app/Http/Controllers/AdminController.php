<?php

namespace App\Http\Controllers;

use App\Http\Requests\KaryawanRequest;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Jabatan;
use App\Models\Jobselesai;
use App\Models\Karyawan;
use App\Models\Layanan;
use App\Models\Listjob;
use App\Models\User;
use App\Models\Mobile\History;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $kry = Karyawan::count();
        return view('inti.main.dashboard', compact('data', 'kry'));
    }

    ///////////////////////////
    // FUNGSI UNTUK KARYAWAN //
    ///////////////////////////
    public function karyawan()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $kry = Karyawan::with('jabatan')->paginate(10);
        //return $kry;
        return view('inti.main.table', compact('data', 'kry'));
    }

    public function carikaryawan(Request $request)
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $jabatan = Jabatan::select('id')->where('nama', 'like', "%" . $request->keyword . "%")->first();
        if ($jabatan != null){
            $kry = Karyawan::with('jabatan')
            ->where('jabatan_id', 'like', "%" . $jabatan->id . "%")->paginate(10);
        } else {
            $kry = Karyawan::with('jabatan')
            ->where('nik', 'like', "%" . $request->keyword . "%")
            ->orWhere('nama', 'like', "%" . $request->keyword . "%")
            ->orWhere('username', 'like', "%" . $request->keyword . "%")
            ->paginate(10);
        }
        //return $kry;
        return view('inti.main.table', compact('data', 'kry'));
    }

    public function detailkaryawan($id)
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $kry = Karyawan::with('jabatan')->find($id);
        return view('inti.main.detail_karyawan', compact('data', 'kry'));
    }

    public function tambahkaryawan()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        return view('inti.main.tambah_karyawan', compact('data'));
    }

    public function storekaryawan(KaryawanRequest $request)
    {
        $user = User::where('username', '=', $request['username'])->first();
        if ($user !== null) {
            return back()->withErrors(['error' => 'Username Sudah Terpakai']);
        } else {
            $nik = Karyawan::where('nik', '=', $request['nik'])->first();
            if ($user !== null) {
                return back()->withErrors(['error' => 'Data Sudah Terdaftar']);
            } else {
                DB::table('karyawan')->insert([
                    'nik' => $request->nik,
                    'nama' => $request->nama,
                    'foto' => null,
                    'tlpn' => $request->tlpn,
                    'email' => $request->email,
                    'alamat' => $request->alamat,
                    'username' => $request->username,
                ]);
                DB::table('users')->insert([
                    'username' => $request->username,
                    'password' => bcrypt($request['password']),
                    'role' => 'karyawan',
                ]);
                return redirect('admin/karyawan');
            }
        }
    }

    public function hapuskaryawan($id)
    {
        $kry = Karyawan::select('username','foto')->where('id', $id)->first();
        if($kry->foto != null){
            unlink(storage_path('app/public/'.$kry->foto));
        };
        DB::table('users')->where('username', $kry)->delete();
        DB::table('jobselesai')->where('karyawan_id', $id)->delete();
        DB::table('karyawan')->where('id', $id)->delete();
        return back();
    }

    public function editkaryawan($id)
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $kry = Karyawan::where('id', $id)->first();;
        return view('inti.main.edit_karyawan', compact('data', 'kry'));
    }

    public function updatekaryawan(Request $request)
    {
        DB::table('karyawan')->where('id', $request->id)->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tlpn' => $request->tlpn,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'username' => $request->username,
        ]);
        DB::table('users')->where('username', $request->username)->update([
            'username' => $request->username,
        ]);
        return redirect('admin/karyawan');
    }

    //////////////////////////
    // FUNGSI UNTUK LISTJOB //
    //////////////////////////
    public function listjob()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $lj = Listjob::paginate(10);
        return view('inti.main.table', compact('data', 'lj'));
    }

    public function carilistjob(Request $request)
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $lj = Listjob::where('nama', 'like', "%" . $request->keyword . "%")->paginate(10);
        return view('inti.main.table', compact('data', 'lj'));
    }

    public function tambahlistjob()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        return view('inti.main.tambah_listjob', compact('data'));
    }

    public function storelistjob(Request $request)
    {
        DB::table('listjob')->insert([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'file' => $request->file,
        ]);
        return redirect('admin/listjob');
    }

    public function hapuslistjob($id)
    {
        DB::table('jobselesai')->where('listjob_id', $id)->delete();
        DB::table('listjob')->where('id', $id)->delete();
        return back();
    }

    public function editlistjob($id)
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $kry = listjob::where('id', $id)->first();;
        return view('inti.main.edit_listjob', compact('data', 'kry'));
    }

    public function updatelistjob(Request $request)
    {
        DB::table('listjob')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'file' => $request->file,
        ]);
        return redirect('admin/listjob');
    }

    /////////////////////////////////////////////
    // FUNGSI UNTUK JOB / JOBSELESAI / LAPORAN //
    /////////////////////////////////////////////
    public function job()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $job = Jobselesai::paginate(10);
        $lj = Listjob::all();
        $kry = Karyawan::all();
        return view('inti.main.table', compact('data', 'job', 'lj', 'kry'));
    }

    public function carijob(Request $request)
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $lj = Listjob::all();
        $kry = Karyawan::all();
        $datalj = Listjob::select('id')->where('nama', 'like', "%" . $request->keyword . "%")->first();
        $datakry = Karyawan::select('id')->where('nama', 'like', "%" . $request->keyword . "%")->first();
        if ($datalj != null){
            $job = Jobselesai::where('listjob_id', 'like', "%" . $datalj->id . "%")->paginate(10);
        } else {
            $job = Jobselesai::where('karyawan_id', 'like', "%" . $datakry->id . "%")->paginate(10);
        }
        //return $kry;
        return view('inti.main.table', compact('data', 'job', 'lj', 'kry'));
    }

    public function tambahjob()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $lj = Listjob::all();
        $kry = Karyawan::all();
        return view('inti.main.tambah_job', compact('data', 'lj', 'kry'));
    }

    public function storejob(Request $request)
    {
        DB::table('jobselesai')->insert([
            'listjob_id' => $request->lj,
            'karyawan_id' => $request->kry,
            'bukti' => null,
            'status' => 'Belum Selesai',
        ]);
        return redirect('admin/job');
    }

    public function hapusjob($id)
    {
        DB::table('jobselesai')->where('id', $id)->delete();
        return back();
    }

    public function editjob($id)
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $job = Jobselesai::where('id', $id)->first();;
        $lj = Listjob::all();
        $kry = Karyawan::all();
        return view('inti.main.edit_job', compact('data', 'job', 'lj', 'kry'));
    }

    public function updatejob(Request $request)
    {
        DB::table('jobselesai')->where('id', $request->id)->update([
            'listjob_id' => $request->lj,
            'karyawan_id' => $request->kry,
            'status' => $request->hasil,
        ]);
        return redirect('admin/job');
    }

    ///////////////////////
    // FUNGSI UNTUK BLOG //
    ///////////////////////
    public function blog()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $blog = Blog::paginate(10);
        return view('inti.main.table', compact('data', 'blog'));
    }

    public function cariblog(Request $request)
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $blog = Blog::where('judul', 'like', "%" . $request->keyword . "%")->paginate(10);
        return view('inti.main.table', compact('data', 'blog'));
    }

    public function tambahblog()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        return view('inti.main.tambah_blog', compact('data'));
    }

    public function storeblog(Request $request)
    {
        // return $request;
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('storage'), $imageName);
        Blog::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $imageName,
        ]);
        return redirect('admin/blog');
    }

    public function hapusblog($id)
    {
        $file = Blog::select('gambar')->where('id', $id)->first();
        //return $file;
        unlink(storage_path('app/public/'.$file->gambar));
        DB::table('blog')->where('id', $id)->delete();
        return back();
    }

    public function editblog($id)
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $kry = Blog::where('id', $id)->first();;
        return view('inti.main.edit_blog', compact('data', 'kry'));
    }

    public function updateblog(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('storage'), $imageName);
        DB::table('blog')->where('id', $request->id)->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $imageName,
        ]);
        return redirect('admin/blog');
    }

    //////////////////////////
    // FUNGSI UNTUK LAYANAN //
    //////////////////////////
    public function layanan()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $lyn = Layanan::paginate(10);
        return view('inti.main.table', compact('data', 'lyn'));
    }

    public function carilayanan(Request $request)
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $lyn = Layanan::where('nama', 'like', "%" . $request->keyword . "%")->paginate(10);
        return view('inti.main.table', compact('data', 'lyn'));
    }

    public function tambahlayanan()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        return view('inti.main.tambah_layanan', compact('data'));
    }

    public function storelayanan(Request $request)
    {
        DB::table('layanan')->insert([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
        ]);
        return redirect('admin/layanan');
    }

    public function hapuslayanan($id)
    {
        DB::table('layanan')->where('id', $id)->delete();
        return back();
    }

    public function editlayanan($id)
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $kry = Layanan::where('id', $id)->first();;
        return view('inti.main.edit_layanan', compact('data', 'kry'));
    }

    public function updatelayanan(Request $request)
    {
        DB::table('layanan')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga
        ]);
        return redirect('admin/layanan');
    }

    //////////////////////////
    // FUNGSI UNTUK JABATAN //
    //////////////////////////
    public function jabatan()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $jabatan = Jabatan::paginate(10);
        return view('inti.main.table', compact('data', 'jabatan'));
    }

    public function carijabatan(Request $request)
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $jabatan = Jabatan::where('nama', 'like', "%" . $request->keyword . "%")->paginate(10);
        return view('inti.main.table', compact('data', 'jabatan'));
    }

    public function detailjabatan($id)
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $jabatan = Jabatan::with('karyawan')->find($id);
        return view('inti.main.detail_jabatan', compact('data', 'jabatan'));
    }

    public function editjabatan($id)
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $kry = Karyawan::with('jabatan')->where('jabatan_id', $id)->orWhere('jabatan_id', null)->paginate(10);
        return view('inti.main.edit_jabatan_karyawan', compact('data', 'kry', 'id'));
    }

    public function updatejabatan(Request $request, $id)
    {
        $data = $request->all();
        $karyawan = Karyawan::where('jabatan_id', '=', $id)->orWhere('jabatan_id', '=', null)->get();
        $jabatan = Jabatan::where('id', $id)->first();
        $admin = Admin::all();
        //return $jabatan;
        //return $data;
        //return $id;
        if (!$request->has('checkbox')) {
            foreach ($karyawan as $kry) {
                karyawan::where('id', '=', $kry->id)->update(['jabatan_id' => null]);
                DB::table('jobselesai')->where('karyawan_id', '=', $kry->id)->delete();
            }
        } else {
            $x = 0;
            foreach ($karyawan as $kry) {
                if ($data['checkbox'] == null) {
                    if ($kry->jabatan_id == $id) {
                        karyawan::where('id', '=', $kry->id)->update(['jabatan_id' => null]);
                        $kryid = karyawan::select('id')->where('id', '=', $kry->id)->first();
                        DB::table('jobselesai')->where('karyawan_id', '=', $kry->id)->delete();
                        foreach ($admin as $adm) {
                            if ($adm->nama == $kry->nama) {
                                if ($adm->jabatan == 'Ketua Divisi Marketing' || $adm->jabatan == 'Ketua Divisi Keuangan' || $adm->jabatan == 'Ketua Divisi Kemitraan' || $adm->jabatan == 'Ketua Divisi TI') {
                                    DB::table('users')->where('username', $adm->username)->delete();
                                    DB::table('admin')->where('username', $adm->username)->delete();
                                }
                            }
                        }
                    }
                }
                foreach ($data['checkbox'] as $item => $value) {
                    if ($kry->id != $data['checkbox'][$item]) {
                        if ($kry->jabatan_id == $id) {
                            karyawan::where('id', '=', $kry->id)->update(['jabatan_id' => null]);
                            $kryid = karyawan::select('id')->where('id', '=', $kry->id)->first();
                            DB::table('jobselesai')->where('karyawan_id', '=', $kryid->id)->delete();
                            foreach ($admin as $adm) {
                                if ($adm->nama == $kry->nama) {
                                    if ($adm->jabatan == 'Ketua Divisi Marketing' || $adm->jabatan == 'Ketua Divisi Keuangan' || $adm->jabatan == 'Ketua Divisi Kemitraan' || $adm->jabatan == 'Ketua Divisi TI') {
                                        DB::table('users')->where('username', $adm->username)->delete();
                                        DB::table('admin')->where('username', $adm->username)->delete();
                                    }
                                }
                            }
                            break;
                        }
                    } else {
                        if ($kry->jabatan_id == null) {
                            karyawan::where('id', '=', $data['checkbox'][$item])->update(['jabatan_id' => $id]);
                            if ($jabatan->nama == 'Ketua Divisi Marketing' || $jabatan->nama == 'Ketua Divisi Keuangan' || $jabatan->nama == 'Ketua Divisi Kemitraan' || $jabatan->nama == 'Ketua Divisi TI') {
                                DB::table('users')->insert([
                                    'username' => $kry->nik,
                                    'password' => bcrypt('admin'),
                                    'role' => 'admin',
                                ]);
                                DB::table('admin')->insert([
                                    'username' => $kry->nik,
                                    'password' => bcrypt('admin'),
                                    'nama' => $kry->nama,
                                    'jabatan' => $jabatan->nama
                                ]);
                            }
                        }
                        unset($data['checkbox'][$x]);
                        // return $data['checkbox'];
                        $x++;
                        break;
                    }
                }
            }
        }
        return redirect('admin/jabatan');
    }

    ////////////////////////
    // FUNGSI UNTUK ADMIN //
    ////////////////////////
    public function admin()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $admin = Admin::paginate(10);
        return view('inti.main.table', compact('data', 'admin'));
    }

    public function cariadmin(Request $request)
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $admin = Admin::where('nama', 'like', "%" . $request->keyword . "%")
        ->orWhere('username', 'like', "%" . $request->keyword . "%")
        ->orWhere('jabatan', 'like', "%" . $request->keyword . "%")
        ->paginate(10);
        return view('inti.main.table', compact('data', 'admin'));
    }

    public function hapusadmin($id)
    {
        DB::table('admin')->where('id', $id)->delete();
        return back();
    }

    public function editadmin($id)
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $kry = admin::where('id', $id)->first();;
        return view('inti.main.edit_admin', compact('data', 'kry'));
    }

    public function updateadmin(Request $request)
    {
        DB::table('admin')->where('id', $request->id)->update([
            'username' => $request->username,
        ]);
        return redirect('admin/admin');
    }

    public function chartHistory()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $history =0;
        $histori = [];
        $date = date('Y-m-d');
        $hari = ['minggu','senin','selasa','rabu','kamis','jumat','sabtu'];
        for($i=0; $i<=6; $i++){
            $histori[$i][$hari[$i]] = History::where('hari',$i)->where('tanggal',$date)->count();
            
        }
            $harga = History::where('tanggal',$date)->get();
            foreach($harga as $h)
            {
                $history += floatval($h->harga);
            } 
        //return $data1;
        // return $history;
        return view('inti.History.history', compact('data', 'histori','history'));
    }
}
