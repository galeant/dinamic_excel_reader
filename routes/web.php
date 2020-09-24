<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
    return view('welcome');
});
// Route::get('liat', function () {
//     $model = new \App\Models\Document;
//     $data = $model->where('main_category_id', 1)
//         ->with('category', 'mainCategory', 'horizontalField.field', 'horizontalField.value.field')
//         ->where(['year' => '2020', 'month' => '09'])
//         // ->where('category_id', 11)
//         ->orderBy('order', 'ASC')->get();
//     $return = [];
//     foreach ($data as $dt) {
//         $return[$dt->category->name] = [];
//         foreach ($dt->grouping_horizontal_field as $ghf) {
//             // dd($ghf->toArray());
//             $unnormalize = [];
//             $normalize = [];
//             $x_field = $ghf->pluck('field.name')->toArray();
//             $y_field = [];
//             // dd($ghf);
//             foreach ($ghf as $cghf) {
//                 $y_field = $cghf->value->pluck('field_id');
//                 $y_field = in_array(NULL, $y_field->toArray(), true) ? [] : $cghf->value->pluck('field.name')->toArray();
//                 if (!empty($y_field)) {
//                     foreach ($cghf->value as $cghfv) {
//                         $unnormalize[$cghfv->order][$cghfv->field->name][] = $cghfv->value;
//                     }
//                 } else {
//                     $unnormalize[$cghf->field->name] = $cghf->value->pluck('value')->toArray();
//                 }
//             }
//             if (!empty($y_field)) {
//                 array_unshift($x_field, NULL);
//                 $normalize['header'] = $x_field;
//                 foreach ($unnormalize as $un) {
//                     foreach ($un as $ival => $val) {
//                         $temp_var = $val;
//                         array_unshift($temp_var, $ival);
//                         $normalize[] = $temp_var;
//                     }
//                 }
//             } else {
//                 $normalize['header'] = $x_field;
//                 foreach ($unnormalize as $iun => $un) {
//                     $key = array_search($iun, $normalize['header']);
//                     foreach ($un as $ival => $val) {
//                         $normalize[$ival][$key] = $val;
//                     }
//                 }
//             }
//             $return[$dt->category->name][] = $normalize;
//         }
//     }
//     // dd($return);
//     // foreach ($return as $irt => $rt) {
//     //     // dd($rt);
//     //     foreach ($rt as $crt) {
//     //         foreach ($crt as $icrt => $vcrt) {
//     //             dd($icrt);
//     //             foreach ($vcrt as $ivcrt => $t) {
//     //                 dd($ivcrt);
//     //             }
//     //         }
//     //         // dd($crt);
//     //     }
//     // }
//     return view('ayam', ['return' =>  $return]);
//     // dd($data->toArray());
// });
// Route::get('/', function () {
//     // dd(csrf());
//     return view('bebek');
// });

// // Route::group(['middleware' => 'auth:api'], function () {
// Route::post('bebek', 'BebekController@index');
// // });


// Route::get('create', function (Request $request) {
//     // dd($request->header());
//     $data = User::create([
//         'email' => 'aaaa@mail.com',
//         'name' => 'mail',
//         'password' => bcrypt('password')
//     ]);
//     $token = $data->createToken(time());
//     return $token->plainTextToken;
// });
