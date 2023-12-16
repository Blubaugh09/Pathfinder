<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // User Interactions
    Route::apiResource('user-interactions', 'UserInteractionsApiController');
});
