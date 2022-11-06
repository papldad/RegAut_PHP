<?php
// [ CONTENT ]:
// GENEREAL:
// 1. session_error
// HEADER:
// 2. active_user
// 3. not_active_user
// MYPROFILE:
// 4. myprofile
// 5. myprofile_field
// 6. myprofile_field_title
// 7. myprofile_field_hidden
// 8. myprofile_field_basic
// 9. myprofile_action

class View // for *.php
{
    static function session_error()
    {
        return '<p>SESSION' . '&#8242;' . 's error!</p>';
    }
}

// |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
// |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
// |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

class View_Header extends View // for header.php
{
    static function active_user($id = null, $name = 'undefined')
    {
        return '
                <form id="header_form" action="" method="GET">
                    <input value="' . $id . '" type="hidden" name="id_user_active" required />
                    <p>Hello, ' . $name . '</p>
                    <input type="submit" value="Log Out" name="button_header" />
                </form>
                ';
    }

    static function not_active_user()
    {
        return '
                <form action="" method="POST">
                    <input type="submit" value="Registration" name="button_header" />
                    <input type="submit" value="Authorization" name="button_header" />
                </form>
                ';
    }
}

// |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
// |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
// |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

class View_Myprofile extends View  // for myprofile.php
{
    static function myprofile($user)
    {
        foreach ($user as $key => $value) {
            echo View_Myprofile::myprofile_field($key, $value);
        }
    }
    
    static function myprofile_field($key = "undefined", $value = "undefined")
    {
        $text_key = $key;
        $text_value = $value;
        $type = 'text';
        $type_button = 'submit';

        if ($key == 'id') {
            return View_Myprofile::myprofile_field_title($text_key, $text_value);
        }

        if ($key == 'password') {
            $type = 'password';
            $value = '';
            $text_value = '';
            return View_Myprofile::myprofile_field_hidden($key, $text_key, $type, $type_button);
        }

        if ($key == 'email') {
            $type = 'email';
        }

        return View_Myprofile::myprofile_field_basic($key, $value, $text_key, $text_value, $type, $type_button);
    }

    static function myprofile_field_title($text_key, $text_value)
    {
        return '<p>' . $text_key . ': <b>' . $text_value . '</b></p>';
    }

    static function myprofile_field_hidden($key, $text_key, $type, $type_button)
    {
        return '
                <div class="block_' . $key . '_edit_form"> 
                    <button id="show_field_edit_form">New ' . $text_key . '</button>
                <form id="' . $key . '_edit_form" method="POST">
                <div class="input-checker">
                    <input id="' . $key . '" type="' . $type . '" name="' . $key . '" placeholder="' . $key . '" required />
                    <br/>
                    <input id="' . $key . '_confirm" type="' . $type . '" name="' . $key . '_confirm" placeholder="' . $key . '_confirm" required />
                    <input type="' . $type_button . '" value="Edit" name="edit_user_btn" />
                    <label for="' . $key . '"></label>
                    <label for="' . $key . '_confirm"></label>
                </div>
                </form>
                </div>
                ';
    }

    static function myprofile_field_basic($key, $value, $text_key, $text_value, $type, $type_button)
    {
        return '
                <form id="' . $key . '_edit_form" method="POST">
                <div class="input-checker">
                    ' . View_Myprofile::myprofile_field_title($text_key, $text_value) . '
                    <input value="' . $value . '" id="' . $key . '" type="' . $type . '" name="' . $key . '" placeholder="' . $key . '" autocomplete="on" required />
                    <input type="' . $type_button . '" value="Edit" name="edit_user_btn" />
                    <label for="' . $key . '"></label>
                </div>
                </form>
                ';
    }
    
    static function myprofile_action($id = null)
    {
        return '
                <form id="profile_delete_form" method="GET">
                    <input value="' . $id . '" name="id_delete" type="hidden"/>
                    <input type="submit" value="Delete Profile" name="delete_profile" />
                </form>
                ';
    }
}
