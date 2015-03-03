<?php namespace App;

class Rbac {

  private static $accessMap = ['admin' => ['create', 'store', 'show', 'listURLs'],
                                'user' => ['create', 'store', 'show']];

  static function hasAccess(User $user, $action) {
    return array_key_exists($user->role,Rbac::$accessMap) && in_array($action, Rbac::$accessMap[$user->role]);
  }

}