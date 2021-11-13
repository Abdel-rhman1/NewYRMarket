<?php
use App\Models\KeyLang;
 function translate($key)
{
    $lang_id = Session::get('lang_id');
    $translation = KeyLang::where('key',$key)->where('lang_id', $lang_id)->first();
    if($translation)
        return $translation->value;
    return $key;

}
function lang_keys()
  {
    return [
      'Dashboard'                      =>    'Dashboard',
      'SuperAdmin'                     =>    'SuperAdmin',
      'Languages'                      =>    'Languages',
      'POS'                            =>    'POS',
      'Search'                         =>    'Search',
      'User Name'                      =>    'User Name',
      'Email'                          =>    'Email',
      'Company Name'                   =>    'Company Name',
      'Phone Number'                   =>    'Phone Number',
      'Role'                           =>    'Role',
      'Status'                         =>    'Status',
      'Action'                         =>    'Action',
      'List'                           =>    'List',
    ];
  }
  function lang_keys_ar()
  {
    return [
      'User Name'                      =>     'اسم المسئول ',
      'Email'                          =>     'الايميل',
      'Company Name'                   =>     'اسم الشركة',
      'Phone Number'                   =>     'رقم التليفون',
      'Role'                           =>     'الدور',
      'Status'                         =>     'الحالة',
      'Action'                         =>     'تعديل او حذف',
      'List'                           =>     ' قائمة ',
    ];
  }
  function new_lang($lang_id, $lang)
  {
    if ($lang == 'en') {
      foreach (lang_keys() as $key => $value) {
        KeyLang::create([
          'lang_id' => $lang_id,
          'key'     => $key,
          'value'   => $value,
        ]);
      }
    }elseif ($lang == 'ar') {
      foreach (lang_keys_ar() as $key => $value) {
        KeyLang::create([
          'lang_id' => $lang_id,
          'key'     => $key,
          'value'   => $value,
        ]);
      }

    }
  }


