<?php
  function makeNotification($title, $icon, $link, $will_view, $description="", $permission=NULL)
  {
    $data['vendor_id'] = Auth::user()->v_id;
    $data['title'] = $title;
    $data['description'] = $description;
    $data['icon'] = $icon;
    $data['link'] = $link;
    $data['will_view'] = $will_view;
    $data['permission'] = $permission;

    App\Models\Notification::create($data);

  }
  function makeNotificationAdmin($title, $icon, $link, $will_view, $description="", $permission=NULL)
  {
    $data['vendor_id'] = 0;
    $data['title'] = $title;
    $data['description'] = $description;
    $data['icon'] = $icon;
    $data['link'] = $link;
    $data['will_view'] = $will_view;
    $data['permission'] = $permission;

    App\Models\Notification::create($data);

  }


