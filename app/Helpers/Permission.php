<?php
use App\Models\Feature;
use App\Models\Package_Has_Feature;
use Illuminate\Support\Facades\DB;

function PackagePermission($feature)
  {
    $get_feature = Feature::where('features', $feature)->first();
    $feature_active = Package_Has_Feature::where([
        ['feature_id', $get_feature->id],
        ['Package_id', Auth::user()->package_id]
    ])->first();

    return $feature_active;

  }
  function userPermission($permission)
  {
      $add_permission = DB::table('permissions')->where([
          ['name', $permission],
          ['guard_name', 'admin']
      ])->first();
      $userPermission_active = DB::table('role_has_permissions')->where([
          ['permission_id', $add_permission->id],
          ['role_id', Auth::user()->id]
      ])->first();

  return $userPermission_active;

  }


