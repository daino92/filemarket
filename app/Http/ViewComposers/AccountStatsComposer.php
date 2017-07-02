<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class AccountStatsComposer
{
    public function compose(View $view)
    {
        $user = auth()->user();

        $files = $user->files()->finished();
        $sales = $user->sales;

        $view->with([
            'fileCount' => $files->count(),
            'saleCount' => $sales->count(),
            'thisMonthEarned' => $user->saleValueThisMonth(),
            'lifetimeEarned' => $user->saleValueOverLifetime(),
        ]);
    }
}