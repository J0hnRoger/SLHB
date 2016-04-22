<?php

class UserModel {

    /**
     * Return a list of users.
     *
     * @return array
     */

    public static function all()
    {
      $users = get_users();
      return $users;
    }

    public static function hasTheRole($id, $slhb_role){
      $meta = get_user_meta($id, 'slhb_role')
        ?get_user_meta($id, 'slhb_role')[0]
        : [];

      return in_array($slhb_role, $meta);
    }

    public static function getMemberByRole($slhb_role){
      $users =  get_users();
      $selectedUsers = [];
      for ($i=0; $i < count($users); $i++) {
        if(UserModel::hasTheRole($users[$i]->ID, $slhb_role))
          $selectedUsers[] = $users[$i];
      }
      return $selectedUsers;
    }

    //TODO - Optimize this func
    public static function getDirectionMembers()
    {
      $directionMembers = UserModel::getMemberByRole('slhb_direction');
      foreach ($directionMembers as $key => $member) {
        $member->responsibility = get_user_meta($member->ID, 'slhb-responsibility')[0];
        $phone = get_user_meta($member->ID, 'slhb-phone');
        $member->phone = (count($phone) > 0 ? $phone[0] : "");
      }
      return $directionMembers;
    }

    public static function getPlayers()
    {
      $players = UserModel::getMemberByRole('slhb_player');
      // The players always have a team
      foreach ($players as $key => $player) {
        $player->teams = get_user_meta($player->ID, 'slhb_teams')[0];
      }
      return $players;
    }

    public static function getPlayersByTeam($teamName)
    {
      $allPlayers = UserModel::getPlayers();
      return array_filter($allPlayers, function ($player) use ($teamName){
        return in_array($teamName,$player->teams);
      });
    }

    public static function getCoach()
    {
      return UserModel::getMemberByRole('slhb_coach');
    }
}
