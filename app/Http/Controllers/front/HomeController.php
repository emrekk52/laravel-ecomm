<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $count = 0;
        $markalar = DB::select('select * from markalar order by id');

        $onecikanlar = DB::select('select ts.* ,tr.adi as tur, mr.marka as marka
         from tisortler ts, markalar mr, turler tr
          where ts.marka_id=mr.id and ts.tur_id=tr.id order by ts.id');



        $turler = DB::select('select * from turler order by id');

        $rastgeleOnerilen = collect(['renk', 'marka_id', 'id', 'bedenler', 'fiyat', 'stok']);

        $slider = DB::select('select ts.* ,tr.adi as tur, mr.marka as marka
        from tisortler ts,  markalar mr, turler tr
        where ts.marka_id=mr.id and ts.tur_id=tr.id
         order by ts.' . $rastgeleOnerilen[mt_rand(0, 5)]);




        $onerilenler = DB::select('select ts.* ,tr.adi as tur, mr.marka as marka
         from tisortler ts,  markalar mr, turler tr
         where ts.marka_id=mr.id and ts.tur_id=tr.id
          order by ts.' . $rastgeleOnerilen[mt_rand(0, 5)]);


        $sliderCollection = new Collection();
        $onerilenlerCollection = new Collection();
        $collection = new Collection();


        $onerilenlerCollection->push($onerilenler[0]);
        $onerilenlerCollection->push($onerilenler[1]);
        $onerilenlerCollection->push($onerilenler[2]);
        $onerilenlerCollection->push($onerilenler[3]);
        $onerilenlerCollection->push($onerilenler[4]);
        $onerilenlerCollection->push($onerilenler[5]);


        $sliderCollection->push($slider[0]);
        $sliderCollection->push($slider[1]);
        $sliderCollection->push($slider[2]);
        $sliderCollection->push($slider[3]);
        $sliderCollection->push($slider[4]);

        foreach ($markalar as $marka) {
            $markaAdetler = DB::select('select * from tisortler where marka_id=?', [$marka->id]);
            foreach ($markaAdetler as $markaAdet) {
                $count++;
            }
            $collection->push($count);
            $count = 0;
        }

        $fiyatlar = DB::select('select * from tisortler order by fiyat desc');


        return view('front.home', compact('markalar', 'turler', 'collection', 'fiyatlar', 'onecikanlar', 'sliderCollection', 'onerilenlerCollection'));
    }


    public function urun($id)
    {
        $turler = DB::select('select * from turler order by id');
        $markalar = DB::select('select * from markalar order by marka');
        $bedenler = DB::select('select * from bedenler');


        $urun = DB::select('select ts.*, mr.marka as marka, tr.adi as tur
        from tisortler ts, markalar mr, turler tr
         where ts.marka_id=mr.id and ts.tur_id=tr.id and ts.id=?', [$id]);

        $collection = new Collection();
        $count = 0;

        foreach ($markalar as $marka) {
            $markaAdetler = DB::select('select * from tisortler where marka_id=?', [$marka->id]);
            foreach ($markaAdetler as $markaAdet) {
                $count++;
            }
            $collection->push($count);
            $count = 0;
        }

        $fiyatlar = DB::select('select * from tisortler order by fiyat desc');
        $yorumlar = DB::select('select * from yorumlar where urun_id=? order by tarih desc', [$id]);

        $yorumcount = 0;
        foreach ($yorumlar as $key => $yorum) {
            $yorumcount = $key + 1;
        }


        $rastgeleOnerilen = collect(['renk', 'marka_id', 'id', 'bedenler', 'fiyat', 'stok']);


        $onerilenler = DB::select('select ts.* ,tr.adi as tur, mr.marka as marka
        from tisortler ts,  markalar mr, turler tr
        where ts.marka_id=mr.id and ts.tur_id=tr.id
         order by ts.' . $rastgeleOnerilen[mt_rand(0, 5)]);



        $onerilenlerCollection = new Collection();


        $onerilenlerCollection->push($onerilenler[0]);
        $onerilenlerCollection->push($onerilenler[1]);
        $onerilenlerCollection->push($onerilenler[2]);
        $onerilenlerCollection->push($onerilenler[3]);
        $onerilenlerCollection->push($onerilenler[4]);
        $onerilenlerCollection->push($onerilenler[5]);

        $resimler = DB::select('select * from resimler where tshirt_id=? order by id desc', [$id]);

        $resimcount = 0;
        foreach ($resimler as $key => $resim) {
            $resimcount = $key;
        }

        $bedenstok = DB::select('select * from beden_stok where urun_id=?', [$id]);


        return view('front.urun_detay', compact('turler', 'bedenler', 'resimcount', 'resimler', 'markalar', 'collection', 'fiyatlar', 'urun', 'yorumlar', 'onerilenlerCollection', 'yorumcount', 'bedenstok'));
    }



    public function yorumekle($id, Request $request)
    {


        if (Auth::check()) {

            DB::table('yorumlar')->insert([

                'urun_id' => $id,
                'yorum' => $request->yorum,
                'ad' => $request->ad,
                'email' => $request->email,
                'user_id' => Auth::user()->id

            ]);

            return redirect('/urun/' . $id)->with('success', 'Yorum Gönderildi!');
        } else
            return redirect('/user/login')->with('message', 'Yorum göndermek için giriş yapmalısınız!');
    }

    public function favori_ekle($id)
    {


        if (Auth::check()) {

            $favoricheck = DB::select('select * from favoriler where urun_id=? and user_id=?', [$id, Auth::user()->id]);


            if ($favoricheck == null) {

                DB::table('favoriler')->insert([

                    'user_id' => Auth::user()->id,
                    'urun_id' => $id,

                ]);
            }

            return redirect('/user/favorilerim');
        } else {
            return redirect('/user/login')->with('message', 'Öncelikle giriş yapınız!');
        }
    }

    public function favori_sil($id)
    {

        $veri = DB::select('delete from favoriler where id=?', [$id]);
        return redirect('/user/favorilerim');
    }

    public function get_kategori($id)
    {

        $onecikanlar = DB::select('select ts.* ,tr.adi as tur, mr.marka as marka
        from tisortler ts, markalar mr, turler tr
         where ts.tur_id=? and ts.marka_id=mr.id and ts.tur_id=tr.id order by ts.id', [$id]);


        $turler = DB::select('select * from turler ');
        $secilentur = DB::select('select * from turler where id=? ', [$id]);
        $markalar = DB::select('select * from markalar ');
        $fiyatlar = DB::select('select * from tisortler order by fiyat desc');

        $collection = new Collection();
        $count = 0;

        foreach ($markalar as $marka) {
            $markaAdetler = DB::select('select * from tisortler where marka_id=?', [$marka->id]);
            foreach ($markaAdetler as $markaAdet) {
                $count++;
            }
            $collection->push($count);
            $count = 0;
        }

        return view('front.kategori', compact('onecikanlar', 'secilentur', 'turler', 'markalar', 'collection', 'fiyatlar'));
    }


    public function get_marka($id)
    {

        $onecikanlar = DB::select('select ts.* ,tr.adi as tur, mr.marka as marka
        from tisortler ts, markalar mr, turler tr
         where ts.marka_id=? and ts.marka_id=mr.id and ts.tur_id=tr.id order by ts.id', [$id]);


        $turler = DB::select('select * from turler ');
        $secilenmarka = DB::select('select * from markalar where id=? ', [$id]);
        $markalar = DB::select('select * from markalar ');
        $fiyatlar = DB::select('select * from tisortler order by fiyat desc');

        $collection = new Collection();
        $count = 0;

        foreach ($markalar as $marka) {
            $markaAdetler = DB::select('select * from tisortler where marka_id=?', [$marka->id]);
            foreach ($markaAdetler as $markaAdet) {
                $count++;
            }
            $collection->push($count);
            $count = 0;
        }

        return view('front.marka', compact('onecikanlar', 'secilenmarka', 'turler', 'markalar', 'collection', 'fiyatlar'));
    }
}
