<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class MyFormprovider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('bsText','components.form.text',['name','value'=>null,'attributes'=>[]]);
        Form::component('bsSubmit','components.form.submit',['value'=>'Submit','attributes'=>[]]);
        Form::component('file','components.form.image',['name','value'=>'null','attributes'=>[]]);
        Form::component('hidden','components.form.hidden',['name','value'=>'null','attributes'=>[]]);
        Form::component('csText','components.form.checkouttext',['name','id','attributes'=>[]]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
