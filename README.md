# MG WordPress Custom Logger
This WordPress plugin exposes public PHP functions to log custom activities in your developments. It also creates a menu in the WordPress Admin to see the list of logs.

## Fields
1. **Description** _(string)_: main field to describe the custom activity.
2. **User_id** _(int)_: use this field to relate the log with a WP_User.
3. **IP** _(string)_: use this field to record the User's IP.

## Usage
Create a new instance of the _MGWPCL\Models\Log_ Class and fill its fields. Then call the _save()_ method to store the values in the database.

```php
$log = new \MGWPCL\Models\Log();
$log->set_description("Prueba de datos");
$log->set_user_id(1);
$log->set_IP('200.2000.198.65');
$log->save();
```

## Logs List in WordPress Admin
The plugin creates a new page called _Logs_ in the left toolbar in the WordPress admin. Click to access to the logs list.
![alt text](https://raw.githubusercontent.com/maugelves/mg-wpcl/master/screenshot.png "mgwpcl screenshot")