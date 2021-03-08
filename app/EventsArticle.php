<?php

namespace App;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;

class EventsArticle extends Model
{
    use Taggable;
    //select distinct `tag_slug` as `slug`, `tag_name` as `name`, `tagging_tags`.`count` as `count` from `tagging_tagged` inner join `tagging_tags` on `tag_slug` = `tagging_tags`.`slug` where `taggable_type` = 'App\News' order by `tag_slug` asc
    
    protected $table = "tb_events_articles";

    public static function thisNewsTags($id) {
    return \Conner\Tagging\Model\Tagged::distinct()
                 ->join('tagging_tags', 'tag_slug', '=', 'tagging_tags.slug')
                 ->where('taggable_type', '=', (new static)->getMorphClass())
                 ->where('taggable_id','=',$id)
                 ->orderBy('tag_slug', 'ASC')
                 ->get(array('tag_slug as slug', 'tag_name as name','taggable_id', 'tagging_tags.count as count'));
   }

    public function contactus(){
   return $this->hasMany('App\ContactUs','event_slug','slug');
   }
}
