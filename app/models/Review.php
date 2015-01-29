<?php

class Review extends Eloquent {



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'review';

    public static function addReview($task_id,$rating_star,$title,$content){
        if(!$task_id || !$rating_star || !$rating_star|| !$rating_star){
            return false;
        }
        $review = new Review();
        $review->task_id= $task_id;
        $review->rating_start = $rating_star;
        $review->review_title = $title;
        $review->review_content = $rating_star;
        if($review->save()){
            return true;
        }else {
            return false;
        }
    }

}