<?php

Route::group([
    'namespace' => 'Seat\ConMan\Http\Controllers',
    'prefix' => 'conman'
], function() {
    
    /**
     * Hello Route
     */
    Route::get('/', [
        'as' => 'conman.home',
        'uses' => 'ContentController@getControls'
    ]);
});

?>