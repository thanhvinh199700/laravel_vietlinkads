<?php

/*
  |--------------------------------------------------------------------------
  | Broadcast Channels
  |--------------------------------------------------------------------------
  |
  | Here you may register all of the event broadcasting channels that your
  | application supports. The given channel authorization callbacks are
  | used to check if an authenticated user can listen to the channel.
  |
 */

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('test', function ($user, $id) {
    return true;
});

//Bradcast này giống như route 
// tên channel gióng như ở trên .{id} là tham số, id nó sẽ tự hiểu là id đã được truyền ở trên
//Broadcast::channel('chat', function ($user) {
//  return Auth::check();
//});
