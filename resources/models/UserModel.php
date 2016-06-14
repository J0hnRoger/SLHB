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

    public static function getCurrentPlayer(){
      $user = User::current();
      $userinst = new UserModel();

      if (!UserModel::hasTheRole($user->ID, 'slhb_player'))
        return $user;
      return UserModel::bindPlayerMeta($user);
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

    //TODO - Optimize this fun
    public static function getDirectionMembers()
    {
      $directionMembers = UserModel::getMemberByRole('slhb_direction');
      foreach ($directionMembers as $key => $member) {
        $currentResponsibility = get_user_meta($member->ID, 'slhb-responsibility');
        $member->responsibility = (count($currentResponsibility) > 0)
          ? $currentResponsibility[0]
          : "" ;
        $phone = get_user_meta($member->ID, 'slhb-phone');

        $profilePicture = get_cupp_meta($member->ID, 'thumbnail');
        if (empty($profilePicture)){
          $profilePicture = themosis_assets().'/images/slhb-default-avatar.png';
        }

        $member->profilePicture = $profilePicture;

        $member->phone = (count($phone) > 0 ? $phone[0] : "");
      }
      return $directionMembers;
    }

    public static function getPlayers()
    {
      $players = UserModel::getMemberByRole('slhb_player');
      // The players always have a team
      foreach ($players as $key => $player) {
        $player =  UserModel::bindPlayerMeta($player);
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

    public static function getCoachsByTeam($teamName)
    {
      $allCoach = [];
      foreach (UserModel::getMemberByRole('slhb_coach') as $coach) {
        $teams = get_user_meta($coach->ID, 'slhb_trained_teams');
        if (count($teams) > 0 && in_array($teamName , $teams[0])){
          $phone = get_user_meta($coach->ID, 'slhb-phone');
          $coach->phone = (count($phone) > 0 ? $phone[0] : "");

          $profilePicture = get_cupp_meta($coach->ID, 'thumbnail');
          if (empty($profilePicture)){
            $profilePicture = themosis_assets().'/images/slhb-default-avatar.png';
          }
  
          $coach->profilePicture = $profilePicture;

          $allCoach[] = $coach;
        }
      }
      return $allCoach;
    }

    // Internal methods
    public static function bindPlayerMeta($player){
      $player->teams = get_user_meta($player->ID, 'slhb_teams')[0];
      $player->positions = get_user_meta($player->ID, 'slhb_positions');
      $player->thumbnail =  get_avatar($player->ID, 64);

      $player->positions =  count($player->positions) > 0
                            ? $player->positions[0]
                            : [];
      $player->nextMatch = MatchModel::getNextMatchForPlayer($player->ID);
      return $player;
    }
}
