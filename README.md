#Routes

- |        | GET|HEAD  | api/assets            | assets.index                | App\Http\Controllers\api\Assets\AssetsController@index            | api        |
- |        | POST      | api/assets            | assets.store                | App\Http\Controllers\api\Assets\AssetsController@store            | api        |
- |        | GET|HEAD  | api/assets/{asset}    | assets.show                 | App\Http\Controllers\api\Assets\AssetsController@show             | api        |
- |        | PUT|PATCH | api/assets/{asset}    | assets.update               | App\Http\Controllers\api\Assets\AssetsController@update           | api        |
- |        | DELETE    | api/assets/{asset}    | assets.destroy              | App\Http\Controllers\api\Assets\AssetsController@destroy          | api        |
- |        | GET|HEAD  | asset                 | asset.index                 | App\Http\Controllers\web\Assets\AssetsCreateFormController@index  | web        |
- |        | POST      | asset                 | asset.store                 | App\Http\Controllers\web\Assets\AssetsCreateFormController@store  | web        |
- |        | GET|HEAD  | asset/{asset}         | asset.show                  | App\Http\Controllers\web\Assets\AssetsUpdateFormController@show   | web        |
- |        | PUT|PATCH | asset/{asset}         | asset.update                | App\Http\Controllers\web\Assets\AssetsUpdateFormController@update | web        |
- |        | POST      | custom-login          | login.custom                | App\Http\Controllers\CustomAuthController@customLogin             | web        |
- |        | POST      | custom-registration   | register.custom             | App\Http\Controllers\CustomAuthController@customRegistration      | web        |
- |        | GET|HEAD  | dashboard             | dashboard.index             | App\Http\Controllers\web\Assets\AssetsController@index            | web        |
- |        | DELETE    | dashboard/{dashboard} | dashboard.destroy           | App\Http\Controllers\web\Assets\AssetsController@destroy          | web        |
- |        | GET|HEAD  | login                 | login                       | App\Http\Controllers\CustomAuthController@index                   | web        |
- |        | GET|HEAD  | registration          | register-user               | App\Http\Controllers\CustomAuthController@registration            | web        |
- |        | GET|HEAD  | signout               | signout                     | App\Http\Controllers\CustomAuthController@signOut                 | web        |

#Docker

To start project you have to run "sudo ./vendor/bin/sail up"

#USD conversion

To fill up conversion rates run "fetch:UsaRates" command

#Api auth

To be able to auth via api client needs to provide headers:
- Authorization:Bearer {{token}}
- Accept:application/json

Token can be retrieved from database after user registers.
