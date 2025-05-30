<?php

namespace App\Http\View\Composers;

use App\Models\PageSetting;
use Illuminate\View\View;

class PageSettingComposer
{
    public function compose(View $view)
    {
        $currentRoute = request()->route()->getName();
        $pageName = str_replace('admin.', '', $currentRoute);
        $pageName = explode('.', $pageName)[0];

        $pageSetting = PageSetting::where('page_name', $pageName)->first();
        
        $view->with('pageSetting', $pageSetting);
    }
}
