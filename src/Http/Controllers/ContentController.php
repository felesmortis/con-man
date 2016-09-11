<?php

namespace Seat\ConMan\Http\Controllers;

use App\Ts3;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Seat\Eveapi\Models\Eve\ApiKey;
/**
	* ContentController short summary.
	*
	* ContentController description.
	*
	* @version 1.0
	* @author music
	*/
class ContentController extends Controller
{
    public function getHome()
    {
        //return view('controls');
        $parts = parse_url($url);
        parse_str($parts['query'], $query);
        echo $query['email'];
        
        $posts = getAllowedPostsForUser($this->user->id, ($query['name'] ?? ""));
        
        return view('conman::home');
    }

    public function getSettings()
    {
        return view('conman::settings');
    }

    public function getCreation()
    {
        return view('conman::creation');
    }

    public function getContent()
    {
        return view('conman::display');
    }

    private function getAllowedPostsForUser($user_id, $title)
    {
        $usersPosts = [];
        $posts = DB::table('role_user')->join('content_pages_roles', 'content_pages_roles.role_id', '=', 'role_user.role_id')
            ->join('content_pages', 'content_pages_roles.content_id', '=', 'content_pages.content_id')
            ->where('role_user.user_id', $user_id)
            ->where('content_pages.title', 'LIKE', "%" + $title + "%")
            ->select('content_id', 'title', 'views')
            ->union(
                ApiKey::join('account_api_key_info_characters', 'account_api_key_info_characters.keyID', '=',
                    'eve_api_keys.key_id')
                    ->join('content_page_corporations', 'content_page_corporations.corporation_id', '=',
                        'account_api_key_info_characters.corporationID')
                    ->join('content_pages', 'content_page_corporations.content_id', '=', 'content_pages.content_id')
                    ->where('eve_api_keys.user_id', $user_id)
                    ->where('content_pages.title', 'LIKE', "%" + $title + "%")
                    ->select('content_id', 'title', 'views')
            )->union(
                CharacterSheet::join('content_page_alliances', 'content_page_alliances.alliance_id', '=',
                    'character_character_sheets.allianceID')
                    ->join('content_pages', 'content_page_alliances.content_id', '=', 'content_pages.id')
                    ->join('account_api_key_info_characters', 'account_api_key_info_characters.characterID', '=',
                        'character_character_sheets.characterID')
                    ->join('eve_api_keys', 'eve_api_keys.key_id', '=', 'account_api_key_info_characters.keyID')
                    ->where('eve_api_keys.user_id', $user_id)
                    ->where('content_pages.title', 'LIKE', "%" + $title + "%")
                    ->select('content_id', 'title', 'views')
            )->orderBy('views', 'desc')
            ->get();

        foreach ($posts as $post) 
        {
            $userPosts[] = [$post->content_id, $post->title, $post->views];
        }
    }

}