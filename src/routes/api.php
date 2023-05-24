<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Book
    Route::apiResource('books', 'BookApiController');
      //menu_restoran
      Route::apiResource('menu_restorans', 'menu_restoranApiController');
});
