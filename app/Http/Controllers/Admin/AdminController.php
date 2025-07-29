<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function ClearAll(){
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        return redirect()->route('dashboard')->with('success', 'Caches cleared successfully.');
    }

    public function backUp(){
        Artisan::call('backup:run', ['--only-db' => true]);

        $diskName = config('backup.backup.destination.disks')[0];
        $disk = Storage::disk($diskName);

        $files = collect($disk->allFiles(config('backup.backup.name')))
                    ->filter(fn ($file) => Str::endsWith($file, '.zip'))
                    ->sortDesc();

        $latestBackup = $files->first();

        if (!$latestBackup) {
            return back()->with('error', 'No backup file found!');
        }

        $path = $disk->path($latestBackup);

        return response()->download($path);
    }
}
