<?php

namespace App\Http\Controllers\Api;

use App\Model\Lesson;
use App\Model\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Support\Facades\DB;

class ContentController extends CommonController
{
    public function tags() {
        return $this->response(Tag::get());
    }
    public function lesson($id){
        return $this->response(Lesson::where('id', $id)->get());
    }
    public function tlesson($tid) {
        if ($tid) {
            $data = DB::table('lessons')
                      ->join('tag_lessons','lessons.id','=','tag_lessons.lesson_id')
                      ->where('tag_id', $tid)
                      ->get();
        } else {
            $data = Lesson::get();
        }
        return $this->response($data);
    }
    public function commendLesson($row) {
        $data = Lesson::where('iscommend',1)->limit($row)->get();
        return $this->response($data);
    }
    public function hotLesson($row) {
        $data = Lesson::where('ishot',1)->limit($row)->get();
        return $this->response($data);
    }
    public function videos($lessonId){
        $data = Video::where('lesson_id', $lessonId)->get();
        return $this->response($data);
    }

}
















