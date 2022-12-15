<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Qualitycontrol;
use Illuminate\Http\Request;

class QcController extends Controller
{
    public function qualitycontrol()
    {
        $quality_control = Qualitycontrol::all();

        return view('admin.qc.index', compact('quality_control'));
    }

    public function lolos($production_id)
    {
        $quality_control = Qualitycontrol::find($production_id);
        $quality_control->qc_status='QC Passed';
        $quality_control->save();
        return redirect()->back()->with('status', 'QC Passed');
    }

    public function tidaklolos($production_id)
    {
        $quality_control = Qualitycontrol::find($production_id);
        $quality_control->qc_status='QC No Pass';
        $quality_control->save();
        return redirect()->back()->with('status', 'QC Not passed');
    }

    
}

