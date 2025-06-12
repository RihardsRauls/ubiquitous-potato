<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\AuditLog;

class AuditLogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $logs = AuditLog::with('user')->latest()->get();

        return view('admin.index', compact('logs'));
    }
}
