<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConsultationRequest;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $counts = [
            'total' => ConsultationRequest::query()->count(),
            'new' => ConsultationRequest::query()->status(ConsultationRequest::STATUS_NEW)->count(),
            'in_progress' => ConsultationRequest::query()->status(ConsultationRequest::STATUS_IN_PROGRESS)->count(),
            'completed' => ConsultationRequest::query()->status(ConsultationRequest::STATUS_COMPLETED)->count(),
        ];

        $recentRequests = ConsultationRequest::query()
            ->latest()
            ->limit(8)
            ->get();

        return view('admin.dashboard', compact('counts', 'recentRequests'));
    }
}
