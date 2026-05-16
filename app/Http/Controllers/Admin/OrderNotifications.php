<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class OrderNotifications extends Controller
{
    public function getNotifications(){
      $admin=Admin::first();
      $data=[];
        foreach ($admin->notifications as $key=>$item ){
            $data[$key]=$item->data;
            $data[$key]['id']=$item->id;
            $data[$key]['created_at']=date_format($item->created_at ,' D M Y - H:i');
            $data[$key]['read_at']=$item->read_at;
        }
      return  response()->json($data);
    }

    public function showNotification($id){
        $notification = DB::table('notifications')->where('id', $id)->first();
        if (empty($notification->read_at)) {
            DB::table('notifications')->where('id', $id)->update(['read_at' => now()]);
        }
        $notificationData = json_decode($notification->data, true);
        if ($notificationData['type'] == 'شحن') {
            return redirect()->route('admin.showOrderCharges');
        } else {
            return redirect()->route('admin.showOrders');
        }
    }

    public function readAllNotification(){
        $admin=Admin::first();
        $admin->unreadNotifications->markAsRead();
        return response()->json('ok');
    }

}
