<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{




    public function index()
    {

        $turler = DB::select('select * from turler order by id');
        if (Auth::check()) {
            $data = DB::select('select * from users where id=?', [Auth::user()->id]);
            $adres = DB::select('select * from adres where user_id=?', [Auth::user()->id]);
            $kart = DB::select('select * from kart where user_id=?', [Auth::user()->id]);


            return view('front.user_panel', compact('turler', 'data', 'adres', 'kart'));
        } else
            return redirect('/user/login')->with('message', 'Öncelikle giriş yapınız!');
    }

    public function sepete_ekle($id, Request $request)
    {



        if (Auth::check()) {

            $sepetler = DB::select('select * from sepetler order by sepet_id desc');
            $sepetim = DB::select('select * from sepetler where user_id=? and urun_id=? and beden_id=? and sepet_durum=0', [Auth::user()->id, $id, $request->get('secilen_beden')]);
            $mysepet = DB::select('select * from sepetler where user_id=? and sepet_durum=0', [Auth::user()->id]);

            if ($mysepet == null)
                $simdisepetid = $sepetler[0]->sepet_id + 1;
            else
                $simdisepetid = $mysepet[0]->sepet_id;


            if ($sepetim == null)
                DB::table('sepetler')->insert([

                    'user_id' => Auth::user()->id,
                    'urun_id' => $id,
                    'beden_id' => $request->get('secilen_beden'),
                    'urun_adet' => $request->get('urun_adet'),
                    'sepet_id' => $simdisepetid

                ]);

            return redirect('/user/sepetim');
        } else
            return redirect('/user/login')->with('message', 'Öncelikle giriş yapınız!');
    }


    public function sepet_sil($id)
    {

        $sepet_sil = DB::select('delete from sepetler where id=? ', [$id]);

        return redirect('/user/sepetim');
    }

    public function profile($id)
    {

        $turler = DB::select('select * from turler order by id');

        return view('front.profile', compact('turler'));
    }


    public function adres_save(Request $request)
    {

        $adres = DB::select('select * from adres where user_id=?', [Auth::user()->id]);
        $message = 'Adres bilgileri güncellendi!';
        try {

            if (count($adres) > 0) {
                DB::table('adres')
                    ->where('user_id', Auth::user()->id)
                    ->update(
                        [
                            'il' => $request->get('il'),
                            'ilce' => $request->get('ilce'),
                            'acik_adres' => $request->get('acikadres'),
                            'posta_kodu' => $request->get('postakodu'),
                            'telefon' => $request->get('telefon'),
                            'adres_basligi' => $request->get('adresbaslik')
                        ]
                    );
            } else {
                DB::table('adres')->insert([

                    'user_id' => Auth::user()->id,
                    'il' => $request->get('il'),
                    'ilce' => $request->get('ilce'),
                    'acik_adres' => $request->get('acikadres'),
                    'posta_kodu' => $request->get('postakodu'),
                    'telefon' => $request->get('telefon'),
                    'adres_basligi' => $request->get('adresbaslik')

                ]);
            }
        } catch (\Illuminate\Database\QueryException $ex) {

            $message = ['error' => 'error update user'];
        }

        return redirect('/user/profile')->with('m2', $message);
    }


    public function kart_save(Request $request)
    {

        $kart = DB::select('select * from kart where user_id=?', [Auth::user()->id]);
        $message = 'Kart bilgileri güncellendi!';
        try {

            if (count($kart) > 0) {
                DB::table('kart')
                    ->where('user_id', Auth::user()->id)
                    ->update(
                        [
                            'kart_baslik' => $request->get('kartbaslik'),
                            'kart_sifre' => $request->get('kartpassword'),
                            'kart_numara' => $request->get('kartnumber'),
                            'kart_cvv' => $request->get('kartcvv'),
                            'kart_skt' => $request->get('kartsonskt')

                        ]
                    );
            } else {
                DB::table('kart')->insert([

                    'user_id' => Auth::user()->id,
                    'kart_baslik' => $request->get('kartbaslik'),
                    'kart_sifre' => $request->get('kartpassword'),
                    'kart_numara' => $request->get('kartnumber'),
                    'kart_cvv' => $request->get('kartcvv'),
                    'kart_skt' => $request->get('kartsonskt')

                ]);
            }
        } catch (\Illuminate\Database\QueryException $ex) {

            $message = ['error' => 'error update user'];
        }

        return redirect('/user/profile')->with('m3', $message);
    }


    public function kisisel_save(Request $request)
    {

        $message = 'Kişisel bilgiler güncellendi!';
        try {

            if ($request->get('password') != null) {
                DB::table('users')
                    ->where('id', Auth::user()->id)
                    ->update(
                        [
                            'name' => $request->get('ad'),
                            'email' => $request->get('email'),
                            'password' => Hash::make($request->get('password')),
                            'active' => $request->get('durum')
                        ]
                    );
            } else {
                DB::table('users')
                    ->where('id', Auth::user()->id)
                    ->update(
                        [
                            'name' => $request->get('ad'),
                            'email' => $request->get('email'),
                            'active' => $request->get('durum')
                        ]
                    );
            }
        } catch (\Illuminate\Database\QueryException $ex) {

            $message = ['error' => 'error update user'];
        }

        return redirect('/user/profile')->with('m1', $message);
    }


    public function favorindex()
    {
        $turler = DB::select('select * from turler order by id');
        if (Auth::check()) {

            $favoriler = DB::select('select ts.*,fv.id as favori_id, mr.marka as marka, tr.adi as tur from favoriler fv, tisortler ts, markalar mr, turler tr 
        where ts.marka_id=mr.id and ts.tur_id=tr.id and fv.urun_id=ts.id and fv.user_id=? order by fv.id desc', [Auth::user()->id]);



            return view('front.favoriler', compact('turler', 'favoriler'));
        } else
            return redirect('/user/login')->with('message', 'Öncelikle giriş yapınız!');
    }


    public function sepetindex()
    {
        $turler = DB::select('select * from turler order by id');

        if (Auth::check()) {
            $sepetler = DB::select('select ts.*,sp.id as sepet_id,sp.sepet_id as sepetid,sp.urun_adet as urun_adet,bd.beden_adi as beden_adi, mr.marka as marka, tr.adi as tur 
            from sepetler sp, tisortler ts, markalar mr, turler tr ,bedenler bd
        where ts.marka_id=mr.id and ts.tur_id=tr.id and sp.urun_id=ts.id and sp.user_id=? and bd.id=sp.beden_id and sp.sepet_durum=0 order by sp.id desc', [Auth::user()->id]);



            return view('front.sepetler', compact('turler', 'sepetler'));
        } else
            return redirect('/user/login')->with('message', 'Öncelikle giriş yapınız!');
    }


    public function yorumsil($id)
    {

        $yorumum = DB::select('delete  from yorumlar where id=?', [$id]);

        return redirect('/user/yorumlarim')->with('message', 'Yorum silindi!');
    }


    public function yorumindex()
    {
        $turler = DB::select('select * from turler order by id');
        $yorumlar = DB::select('select yr.*,mr.marka as marka, tr.adi as tur
        from yorumlar yr ,markalar mr, turler tr,tisortler ts
        where yr.user_id=? and yr.urun_id=ts.id and ts.marka_id=mr.id and ts.tur_id=tr.id order by yr.id', [Auth::user()->id]);

        return view('front.yorumlar', compact('turler', 'yorumlar'));
    }


    public function mesajindex()
    {

        if (Auth::check()) {

            $turler = DB::select('select * from turler order by id');

            $mesajlar = DB::select('select * from mesajlar where user_id=? order by id', [Auth::user()->id]);

            return view('front.mesajlar', compact('turler', 'mesajlar'));
        } else
            return redirect('/user/login')->with('message', 'Öncelikle giriş yapınız!');
    }

    public function mesaj_ekle(Request $request)
    {



        DB::table('mesajlar')
            ->insert([

                'user_id' => Auth::user()->id,
                'mesaj' => $request->mesaj,
                'konu' => $request->konu

            ]);


        return redirect('user/mesajlarim')->with('message', 'Mesaj gönderildi! en kısa zamanda geri dönülecektir.');
    }


    public function mesaj_sil($id)
    {


        $mesaj_sil = DB::select('delete  from mesajlar where id=?', [$id]);



        return redirect('user/mesajlarim')->with('message', 'Mesaj silindi!');
    }



    public function kartindex()
    {

        if (Auth::check()) {
            $turler = DB::select('select * from turler order by id');
            $kartlar = DB::select('select kr.*, us.name as ad from kart kr, users us where kr.user_id=us.id and kr.user_id=? order by kr.id', [Auth::user()->id]);


            return view('front.kartlar', compact('turler', 'kartlar'));
        } else
            return redirect('/user/login')->with('message', 'Öncelikle giriş yapınız!');
    }



    public function siparisindex()
    {
        $turler = DB::select('select * from turler order by id');

        if (Auth::check()) {
            $siparisler = DB::select('select ts.*,sp.id as sepet_id,sp.sepet_id as sepetid,ad.*,sp.urun_adet as urun_adet,bd.beden_adi as beden_adi, mr.marka as marka, tr.adi as tur ,sip.id as siparis_id,sip.siparis_saati as siparis_saati
            ,sip.siparis_durum as siparis_durum,sip.siparis_notu as siparis_notu,sip.sepet_toplam as toplam_fiyat
            from sepetler sp, tisortler ts, markalar mr, turler tr ,bedenler bd, siparisler sip, adres ad
        where ts.marka_id=mr.id and ts.tur_id=tr.id and sp.urun_id=ts.id and sp.user_id=? and ad.user_id=sp.user_id and bd.id=sp.beden_id and sip.sepet_id=sp.sepet_id order by sip.id desc', [Auth::user()->id]);



            return view('front.siparisler', compact('turler', 'siparisler'));
        } else
            return redirect('/user/login')->with('message', 'Öncelikle giriş yapınız!');
    }

    public function siparis_ekle(Request $request)
    {
        $adres = DB::select('select * from adres where user_id=?', [Auth::user()->id]);
        $kart = DB::select('select * from kart where user_id=?', [Auth::user()->id]);

        if ($adres != null && $kart != null) {

            DB::table('sepetler')
                ->where('sepet_id', $request->sepet_id)
                ->update(
                    [
                        'sepet_durum' => 1
                    ]
                );

            DB::table('siparisler')
                ->insert(
                    [
                        'sepet_id' => $request->sepet_id,
                        'sepet_toplam' => $request->toplam,
                        'siparis_notu' => $request->siparis_notu,
                        'userid' => Auth::user()->id

                    ]
                );

            return redirect('/user/siparislerim');
        } else {
            if ($adres == null && $kart == null)
                return redirect('/user/profile')->with('m2', 'Adres bilgilerinizi doldurunuz!')->with('m3', 'Kart bilgilerinizi doldurunuz!');
            else if ($adres == null)
                return redirect('/user/profile')->with('m2', 'Adres bilgilerinizi doldurunuz!');
            else if ($kart == null)
                return redirect('/user/profile')->with('m3', 'Kart bilgilerinizi doldurunuz!');
        }
    }
}
