<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatisticsController extends Controller
{
    public function dashboard()
    {
        $postStatistics = [
            'totalPosts' => Post::count(),
            'publishedPosts' => Post::where('status', 'published')->count(),
            'draftPosts' => Post::where('status', 'draft')->count(),
        ];

        $contactStatistics = [
            'totalMessages' => ContactMessage::count(),
            'resolvedMessages' => ContactMessage::where('status', true)->count(),
            'unresolvedMessages' => ContactMessage::where('status', false)->count(),
        ];

        $postViews = Post::select('title', 'views')->get();

        Carbon::setLocale('tr');

        // Son 7 günün tarihlerini ve mesaj sayılarını al
        $dailyMessages = DB::table('contact_messages')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Tarih ve sayıların ayrıştırılması
        $dailyMessagesData = $dailyMessages->mapWithKeys(function ($item) {
            return [$item->date => $item->count];
        });

        // Eksik tarihleri sıfır ile doldur
        $startDate = Carbon::now()->subDays(6);
        $endDate = Carbon::now();
        $dailyMessages = [];
        $dailyMessageLabels = [];
        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $formattedDate = $date->format('Y-m-d');
            $dailyMessages[$formattedDate] = $dailyMessagesData[$formattedDate] ?? 0;
            $dailyMessageLabels[] = $date->translatedFormat('l'); // Türkçe gün adı
        }

        return view('admin.dashboard', compact('postStatistics', 'contactStatistics', 'postViews', 'dailyMessages', 'dailyMessageLabels'));
    }
}
