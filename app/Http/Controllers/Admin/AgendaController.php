<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    function index()
    {
        $data = Agenda::all();
        return view('admin.agenda.app', [
            'data' => $data
        ]);
    }

    function create()
    {
        return view('admin.agenda.form-add');
    }

    function store(Request $request)
    {
        $agenda = new Agenda();
        $agenda->judul = $request->judul;
        $agenda->konten = $request->konten;
        $agenda->tanggal = $request->tanggal;
        $agenda->save();

        return redirect('admin/agenda')->with([
            'success' => 'Data berhasil disimpan',
        ]);
    }

    function edit($id)
    {
        $data = Agenda::find($id);

        return view('admin.agenda.form-edit', [
            'data' => $data
        ]);
    }

    function update(Request $request, $id)
    {
        $agenda = Agenda::find($id);
        $agenda->judul = $request->judul;
        $agenda->tanggal = $request->tanggal;
        $agenda->konten = $request->konten;
        $agenda->update();

        return redirect('admin/agenda')->with([
            'success' => 'Data berhasil diubah'
        ]);
    }

    function destroy($id)
    {
        Agenda::find($id)->delete();

        return redirect('admin/agenda')->with([
            'success' => 'Data berhasil dihapus'
        ]);
    }
}
