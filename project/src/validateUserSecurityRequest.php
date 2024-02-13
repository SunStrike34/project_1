<?php
/**
 * Undocumented function
 *
 * @param array $request
 * @return bool | array
 */
function validateUserSecurityRequest(array $request) : bool | array
{
    if ((!is_null($request['password1']) && is_null($request['password2'])) || 
        (is_null($request['password1']) && !is_null($request['password2'])) || 
        (!is_null($request['password1']) && !is_null($request['password2']) && $request['password1'] != $request['password2'])) {
            $_SESSION['error'] = 'Пароль задан неправильно';
            return false;
    }

    $user = findUser($request['email']);

    if ($user) {
        $_SESSION['error'] = 'Такой email уже существует.';
        return false;
    }

    if (!is_null($request['password1']) && !is_null($request['password2']) && $request['password1'] == $request['password2'] && $request['email'] != $request['user']['email']) {
        $request = [
            'email' => htmlspecialchars($request['email']) ?? null,
            'password' => password_hash($request['password1'], PASSWORD_DEFAULT) ?? null
        ];
        return $request;
    }
    
    if (!is_null($request['password1']) && !is_null($request['password2']) && $request['password1'] == $request['password2'] && $request['email'] == $request['user']['email']) {
        $request = [
            'password' => password_hash($request['password1'], PASSWORD_DEFAULT) ?? null
        ];
        return $request;
    }
    
    if (is_null($request['password1']) && is_null($request['password2']) && $request['email'] != $request['user']['email']) {
        $request = [
            'email' => htmlspecialchars($request['email']) ?? null,
        ];
        return $request;
    }
    
}
