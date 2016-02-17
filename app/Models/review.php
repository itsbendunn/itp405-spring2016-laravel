<?

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class review{
    public function __construct($data){
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->rating = $data['rating'];
        $this->dvd_id = $data['id'];
    }

    public function save(){
        DB::table('reviews')->insert([
            'title' => $this->title,
            'description' => $this->description,
            'rating' => $this->rating,
            'dvd_id' => $this->dvd_id
        ]);
    }

}