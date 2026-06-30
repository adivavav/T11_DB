<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // DETAIL EVENT
public function show(\App\Models\Event $event)
{
    // Mengambil daftar kategori untuk keperluan menu/footer
    $categories = \App\Models\Category::all();

    // Kirim data event dan kategori ke view
    return view('event-detail', compact('categories', 'event'));
}

}