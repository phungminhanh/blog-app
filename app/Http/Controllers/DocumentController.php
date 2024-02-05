<?php
namespace App\Http\Controllers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
public function create()
{
    Storage::disk('google')->put('google-drive.txt', 'Google Drive As Filesystem In Laravel (ManhDanBlogs)');
    dd('Đã upload file lên google drive thành công!');
}
}
