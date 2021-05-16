<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PanelController extends Controller
{


    public function __construct()
    {
        $this->middleware('admin');
    }


    public function siparisindex()
    {

        $siparisler = DB::select('select * from siparisler order by id');

        $siparistoplam = count($siparisler);

        return view('admin.siparisler', compact('siparisler', 'siparistoplam'));
    }


    public function siparis_detay($id)
    {

        $siparisdetay = DB::select('select sip.* ,ts.*, mr.marka as marka, tr.adi as tur, bd.beden_adi as beden, bd.beden_tam_ad as beden_tam,ad.*, us.*
        ,sp.urun_adet as adet from siparisler sip,sepetler sp, tisortler ts,turler tr,markalar mr, bedenler bd, adres ad, users us
        where sp.urun_id=ts.id and sp.beden_id= bd.id and ts.marka_id=mr.id and ts.tur_id=tr.id and sp.user_id=ad.user_id and us.id=ad.user_id and sip.sepet_id=sp.sepet_id and sip.id=?', [$id]);


        return view('admin.siparis_detay', compact('siparisdetay'));
    }

    public function siparis_onayla($id)
    {

        DB::table('siparisler')
            ->where('id', [$id])
            ->update([

                'siparis_durum' => 'ONAYLANDI'

            ]);



        return redirect('/admin/siparisler')->with('message', 'Sipariş onaylandı!');
    }


    public function mesajindex()
    {
        $mesajlar = DB::select('select msj.*, us.*, msj.id as mesaj_id from mesajlar msj, users us where us.id=msj.user_id order by msj.gonderilme_saati desc');

        $mesajtoplam = count($mesajlar);

        return view('admin.mesajlar', compact('mesajlar', 'mesajtoplam'));
    }

    public function mesaj_detay($id)
    {
        $mesajdetay = DB::select('select msj.*, us.*, ad.*, msj.id as mesaj_id
        from mesajlar msj, users us, adres ad
         where msj.id=? and us.id=msj.user_id and msj.user_id=ad.user_id ', [$id]);



        return view('admin.mesaj_detay', compact('mesajdetay'));
    }


    public function mesaj_yanitla(Request $request)
    {
        DB::table('mesajlar')
            ->where('id', $request->mesaj_id)
            ->update([

                'mesaj_durumu' => 'CEVAPLANDI',
                'cevap' => $request->reply

            ]);



        return redirect('/admin/mesajlar')->with('message', 'Mesaj yanıtlandı!');
    }

    public function uyelerindex()
    {
        $users = DB::select('select * from users ');



        return view('admin.users', compact('users'));
    }

    public function get_user($id)
    {
        $user = DB::select('select * from users where id=? ', [$id]);
        $sepetler = DB::select('select sp.*,ts.*, bd.beden_adi as beden, tr.adi as tur, mr.marka as marka 
        from sepetler sp, bedenler bd, tisortler ts, turler tr, markalar mr
          where sp.user_id=? and sp.urun_id=ts.id and bd.id=sp.beden_id and ts.tur_id=tr.id and mr.id=ts.marka_id', [$id]);

        $siparisler = DB::select('select * from siparisler where userid=?', [$id]);

        $favoriler = DB::select('select fv.*,ts.*, tr.adi as tur, mr.marka as marka, fv.id as fav_id 
        from favoriler fv, tisortler ts, turler tr, markalar mr
          where fv.user_id=? and fv.urun_id=ts.id  and ts.tur_id=tr.id and mr.id=ts.marka_id', [$id]);


        $adres = DB::select('select * from  adres  where user_id=? ', [$id]);
        return view('admin.profile', compact('user', 'adres', 'sepetler', 'favoriler', 'siparisler'));
    }


    public function profil_guncelle(Request $request)
    {
        if ($request->password != null)
            DB::table('users')
                ->where('id', $request->user_id)
                ->update([

                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => $request->hesap_tipi,
                    'active' => $request->hesap_durum,
                    'password' => Hash::make($request->password)


                ]);
        else
            DB::table('users')
                ->where('id', $request->user_id)
                ->update([

                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => $request->hesap_tipi,
                    'active' => $request->hesap_durum



                ]);



        $adres = DB::select('select * from adres where user_id=?', [$request->user_id]);


        if ($adres == null) {
            DB::table('adres')
                ->insert([

                    'user_id' => $request->user_id,
                    'il' => $request->sehir,
                    'ilce' => $request->ilce,
                    'acik_adres' => $request->acik_adres,
                    'posta_kodu' => $request->posta_kodu,
                    'telefon' => $request->telefon



                ]);
        } else {
            DB::table('adres')
                ->where('user_id', $request->user_id)
                ->update([

                    'il' => $request->sehir,
                    'ilce' => $request->ilce,
                    'acik_adres' => $request->acik_adres,
                    'posta_kodu' => $request->posta_kodu,
                    'telefon' => $request->telefon

                ]);
        }




        return redirect('/user/' . $request->user_id)->with('message', 'Profil güncellendi!');
    }


    public function yorumlarindex()
    {
        $yorumlar = DB::select('select yr.*, us.*, mr.*,ad.*, tr.*,ts.*,ts.id as tisort_id, us.id as userid from yorumlar yr,adres ad, users us,markalar mr, turler tr,tisortler ts
         where yr.user_id=us.id and ad.user_id=us.id and ts.id=yr.urun_id and ts.marka_id=mr.id and tr.id=ts.tur_id order by yr.id desc');

        $yorumtoplam = count($yorumlar);

        return view('admin.yorumlar', compact('yorumlar', 'yorumtoplam'));
    }



    public function user_delete($id)
    {


        $silinen = DB::select('select * from users where id=?', [$id]);

        $user = DB::select('delete from users where id=?', [$id]);
        $yorum = DB::select('delete from yorumlar where user_id=?', [$id]);
        $adres = DB::select('delete from adres where user_id=?', [$id]);
        $favori = DB::select('delete from favoriler where user_id=?', [$id]);
        $kart = DB::select('delete from kart where user_id=?', [$id]);
        $mesaj = DB::select('delete from mesajlar where user_id=?', [$id]);
        $sepet = DB::select('delete from sepetler where user_id=?', [$id]);
        $siparis = DB::select('delete from siparisler where userid=?', [$id]);


        return redirect('/admin/uyeler')->with('message', $silinen[0]->name . ' kişisine ait tüm bilgiler silindi!');
    }
}
