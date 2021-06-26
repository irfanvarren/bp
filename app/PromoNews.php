<?php

namespace App;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;

class PromoNews extends Model
{
	use Taggable;
    //select distinct `tag_slug` as `slug`, `tag_name` as `name`, `tagging_tags`.`count` as `count` from `tagging_tagged` inner join `tagging_tags` on `tag_slug` = `tagging_tags`.`slug` where `taggable_type` = 'App\News' order by `tag_slug` asc
    
    protected $table = "promo_news";
    public static function thisNewsTags($id) {
    return \Conner\Tagging\Model\Tagged::distinct()
                 ->join('tagging_tags', 'tag_slug', '=', 'tagging_tags.slug')
                 ->where('taggable_type', '=', (new static)->getMorphClass())
                 ->where('taggable_id','=',$id)
                 ->whereNull('tag_group_id')
                 ->orderBy('tag_slug', 'ASC')
                 ->get(array('tag_slug as slug', 'tag_name as name','taggable_id', 'tagging_tags.count as count'));
   }
    public static function thisJenjangTags($id,$group_id) {
    return \Conner\Tagging\Model\Tagged::distinct()
                 ->join('tagging_tags', 'tag_slug', '=', 'tagging_tags.slug')
                 ->where('taggable_type', '=', (new static)->getMorphClass())
                 ->where('taggable_id','=',$id)
                 ->where('tag_group_id',$group_id)
                 ->orderBy('tag_slug', 'ASC')
                 ->get(array('tag_slug as slug', 'tag_name as name','taggable_id', 'tagging_tags.count as count'));
   }

   public function contact_us(){
    return $this->hasMany('App\ContactUs','event_slug','slug');
   }

   
}
