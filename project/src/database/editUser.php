<?php
/**
 * Undocumented function
 *
 * @param array $user
 * @param string $userId
 * @return bool
 */
function editUser(array $user, string $userId) : bool
{
    $connect = connectToBD();

    $sql = 'UPDATE users SET';

    foreach ($user as $key => $value) {
        if (!is_null($value)) {
            if($value != end($user)) {
                $sql.= ' ' . $key . ' = :' . $key . ',';
            }else {
                $sql.= ' ' . $key . ' = :' . $key;
            }
        }
    }

    $sql.= ' WHERE id=' . $userId;

    $query = $connect->prepare($sql);

    foreach ($user as $index => $val) {
        if (!is_null($val)) {
            $query -> bindValue(":" . $index, $val, PDO::PARAM_STR);
        }
    }

    return $query -> execute(); 
}