<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Tshirts;
use SebastianBergmann\Environment\Console;


class UrunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {

        $sql = 'select ts.*,tr.adi,mr.marka
         from tisortler ts, turler tr,  markalar mr
         where ts.tur_id=tr.id and ts.marka_id=mr.id order by ts.id';

        $tisortler = DB::select($sql);
        $databaseLength = 0;
        foreach ($tisortler as $t)
            $databaseLength++;

        return view('admin.urunler', ['tisortler' => $tisortler], ['databaseLength' => $databaseLength]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $turler = DB::select('select * from turler order by id');
        $markalar = DB::select('select * from markalar order by marka');
        $bedenler = DB::select('select * from bedenler order by id');

        return view('admin.urun_ekleme_form', compact('turler', 'bedenler', 'markalar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('resim')) {

            $file = $request->file('resim');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/tisortimage/', $name);
        }




        if ($request->stok > 0)
            $durum = 'STOKTA';
        else
            $durum = "STOK DIŞI";

        DB::table('tisortler')->insert([

            'marka_id' => $request->marka_id,
            'renk' => $request->renk,
            'fiyat' => $request->fiyat,
            'keywords' => $request->keywords,
            'description' => $request->description,
            'resim' => $name,
            'stok' => $request->stok,
            'durum' => $durum,
            'tur_id' => $request->tur_id,
            'bedenler' =>  ''



        ]);


        $tisortler = DB::select('select * from tisortler order by id desc');
        $bedenler = DB::select('select * from bedenler');

        $bedenArr = '';

        for ($num = 1; $num < count($bedenler) + 1; $num++) {

            DB::table('beden_stok')->insert([

                'urun_id' => $tisortler[0]->id,
                'beden_id' => $num,
                'beden_stok' => $request->get('beden_' . $num)

            ]);

            if ($request->get('beden_' . $num) != 0)
                $bedenArr .= $bedenler[$num - 1]->beden_adi . ' ';
        }


        DB::table('tisortler')
            ->where('id', $tisortler[0]->id)
            ->update(
                [

                    'bedenler' => $bedenArr


                ]
            );




        return redirect('admin/urunler')->with('success', 'T-Shirt Kaydedildi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $turler = DB::select('select * from turler order by id');
        $bedenler = DB::select('select * from bedenler order by id');
        $markalar = DB::select('select * from markalar order by id');
        $bedenstok = DB::select('select * from beden_stok where urun_id=?', [$id]);

        $sql = 'select ts.* ,mr.marka as marka, tr.adi as tur,  tr.id as turid
          from tisortler ts, turler tr,  markalar mr
           where ts.tur_id=tr.id and  ts.marka_id=mr.id and ts.id=? order by ts.id';

        $data = DB::select($sql, [$id]);



        return view('admin.urun_duzenleme_form', compact('data', 'turler', 'bedenler', 'markalar', 'bedenstok'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if ($request->hasFile('resim')) {

            $file = $request->file('resim');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/tisortimage/', $name);
        } else
            $name = $request->resim2;

        if ($request->stok > 0)
            $durum = 'STOKTA';
        else
            $durum = "STOK DIŞI";

        $bedenler = DB::select('select * from bedenler');
        $bedenArr = '';

        for ($num = 1; $num < count($bedenler) + 1; $num++) {

            if ($request->get('beden_' . $num) != 0)
                $bedenArr .= $bedenler[$num - 1]->beden_adi . ' ';
        } {
            DB::table('tisortler')
                ->where('id', $id)
                ->update(
                    [
                        'marka_id' => $request->marka_id,
                        'renk' => $request->renk,
                        'fiyat' => $request->fiyat,
                        'keywords' => $request->keywords,
                        'description' => $request->description,
                        'stok' => $request->stok,
                        'durum' => $durum,
                        'resim' => $name,
                        'tur_id' => $request->tur_id,
                        'bedenler' => $bedenArr


                    ]
                );
        } {
            $bedenstok = DB::select('select * from beden_stok where urun_id=?', [$id]);
            for ($num = 1; $num < count($bedenler) + 1; $num++) {

            
                if ($bedenstok != null) {

                    DB::table('beden_stok')
                        ->where('urun_id', $id)->where('beden_id', $num)
                        ->update(
                            [
                                'beden_stok' => $request->get('beden_' . $num),

                            ]
                        );
                } else {

                    DB::table('beden_stok')->insert([

                        'urun_id' => $id,
                        'beden_id' => $num,
                        'beden_Stok' => $request->get('beden_' . $num)

                    ]);
                }
            }
        }



        $urunadi = DB::select('select * from markalar where id=?', [$request->marka_id]);

        return redirect('admin/urunler')->with('success', $urunadi[0]->marka . ' Düzenlendi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $veri = DB::select('delete from tisortler where id=?', [$id]);
        $veri2 = DB::select('delete from resimler where tshirt_id=?', [$id]);
        $veri3 = DB::select('delete from beden_stok where urun_id=?', [$id]);
        return redirect('admin/urunler')->with('success', 'T-Shirt Silindi!');
    }



    public function resimlerform($id)
    {


        $veri = DB::select('select ts.*,mr.marka as marka from tisortler ts, markalar mr where ts.marka_id=mr.id and ts.id=?', [$id]);
        $resimler = DB::select('select * from resimler where tshirt_id=?', [$id]);




        return view('admin.urun_resimler_form', compact('veri', 'resimler'));
    }


    public function resim_ekle(Request $request)
    {
        if ($request->hasFile('resim')) {

            $file = $request->file('resim');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/tisortimage/', $name);
        }




        DB::table('resimler')->insert([

            'tshirt_id' => $request->id,
            'resim' => $name
        ]);

        return redirect('admin/urun/resimler/' . $request->id)->with('success', 'Resim Eklendi!');
    }


    public function resim_sil($id, $tshirt_id)
    {

        $veri = DB::select('delete from resimler where id=?', [$id]);
        return redirect('admin/urun/resimler/' . $tshirt_id)->with('success', 'Resim Silindi!');
    }
}
