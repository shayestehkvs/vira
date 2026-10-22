<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateConsultationRequest;
use App\Models\ConsultationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ConsultationRequestController extends Controller
{
    public function index(Request $request): View
    {
        $validated = $request->validate([
            'q' => ['nullable', 'string', 'max:120'],
            'status' => ['nullable', 'string', 'in:'.implode(',', array_keys(ConsultationRequest::statuses()))],
            'from' => ['nullable', 'date'],
            'to' => ['nullable', 'date', 'after_or_equal:from'],
        ]);

        $requests = ConsultationRequest::query()
            ->search($validated['q'] ?? null)
            ->when($validated['status'] ?? null, fn ($query, $status) => $query->status($status))
            ->when($validated['from'] ?? null, fn ($query, $from) => $query->whereDate('created_at', '>=', $from))
            ->when($validated['to'] ?? null, fn ($query, $to) => $query->whereDate('created_at', '<=', $to))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.consultation-requests.index', [
            'requests' => $requests,
            'filters' => $validated,
            'statuses' => ConsultationRequest::statuses(),
        ]);
    }

    public function show(ConsultationRequest $consultationRequest): View
    {
        return view('admin.consultation-requests.show', [
            'consultationRequest' => $consultationRequest,
            'statuses' => ConsultationRequest::statuses(),
        ]);
    }

    public function update(
        UpdateConsultationRequest $request,
        ConsultationRequest $consultationRequest,
    ): RedirectResponse {
        $consultationRequest->forceFill([
            'status' => $request->validated('status'),
            'admin_notes' => $request->validated('admin_notes'),
        ])->save();

        return redirect()
            ->route('admin.consultation-requests.show', $consultationRequest)
            ->with('success', 'وضعیت و یادداشت درخواست به‌روزرسانی شد.');
    }
}
