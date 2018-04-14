<?php
namespace app\modules\instagram\component;

class Parser{

    public function refreshAccount($account){
        $site = file_get_contents('https://www.instagram.com/' . $account . '/');
        $start = '{"activity_counts":';
        $end = ';</script>';

        $num1 = strpos($site, $start);
        $num2 = substr($site, $num1);

        $parse = substr($num2, 0, strpos($num2, $end));

        $rez = json_decode($parse);

        $info = array_shift($rez->entry_data->ProfilePage)->graphql->user;

        $allInfo = ['avatar' => $info->profile_pic_url_hd,
            'name' => $info->full_name,
            'descr' => $info->biography,
            'followers' => $info->edge_followed_by->count,
            'following' => $info->edge_follow->count,
            'posts' => $info->edge_owner_to_timeline_media->count,];

        return $allInfo;
    }

}
?>