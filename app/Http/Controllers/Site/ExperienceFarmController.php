<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CropPlantAnimal;
use App\Models\ExperienceFarm;
use App\Models\ExperienceFarmLike;
use App\Models\Food;
use App\Models\Insecticide;
use App\Models\PostLike;
use App\Models\Product;
use App\Models\Seasonal;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class ExperienceFarmController extends BaseController
{
    // public function __construct()
    // {
    //     $this->middleware('permissions:experience-farm-list|experience-farm-list|experience-farm-list|experience-farm-list')
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $seasons = Seasonal::with(['year', 'days', 'weathers'])->get();
        $erf = ExperienceFarm::with(['categories', 'season','product'])->get();
        $products = Product::all();
        $this->setPageTitle('Index Experience farm', 'Index Experience farm');
        return view('site.experience_farms.index', compact('categories', 'seasons', 'erf','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCalendar()
    {
        return view('site.experience_farms.add_calendar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $erf = new ExperienceFarm();
        $erf->category_id      = $request->get('category_id');
        $erf->experience_farm_name      = $request->get('experience_farm_name');
        $erf->experience_farm_time_farm = $request->get('experience_farm_time_farm');
        $erf->season_id                 = $request->get('season_id');
        $erf->experience_farm_water     = $request->get('experience_farm_water');
        $erf->experience_farm_soil_properties   = $request->get('experience_farm_soil_properties');
        $erf->experience_farm_start_to_do       = $request->get('experience_farm_start_to_do');
        $erf->experience_farm_end_to_do         = $request->get('experience_farm_end_to_do');
        $erf->experience_farm_notes             = $request->get('experience_farm_notes');
        $erf->experience_farm_published         = $request->get('published');
        $erf->product_id = $request->get('product_id');
        $erf->user_id         = Auth::user()->id;
        $erf->save();
        if (!$erf) {
            return $this->responseRedirectBack('Error occurred while create experience farm.', 'error', true, true);
        }
        return $this->responseRedirect('site.experience_farms.index', 'Create experience farm successfully', 'success', false, false);
    }

    public function list()
    {
        $this->setPageTitle("Experience farm list", "Experience farm list");
        $exs = ExperienceFarm::with(['categories','season','user','product', 'experience_farm_likes'])->where('experience_farm_published','1')->get();
        // dd($exs);
        // $exs = DB::table('experience_farms')
        // ->leftJoin('experience_farm_likes','experience_farms.experience_farm_id','=','experience_farm_likes.experience_farm_id')
        // ->join('users','experience_farms.user_id','=','users.id')
        // ->join('categories','experience_farms.category_id','=','categories.category_id')
        // ->leftJoin('products','experience_farms.product_id','=','products.product_id')
        // ->select('experience_farm_likes.*','experience_farms.*','users.*','categories.*','products.*')
        // ->get();
        return view('site.experience_farms.list',compact('exs'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modify($id)
    {
        $this->setPageTitle("Modify Experience farm","Modify Experience farm");
        return view('site.experience_farms.modify');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $ef = ExperienceFarm::with(['categories', 'season'])->get();
        $ef = ExperienceFarm::with(['categories', 'season', 'user', 'product', 'experience_farm_likes'])->find($id);
        $categories = Category::with(['products', 'experience_farms'])->get();
        $seasons = Seasonal::with(['weathers', 'experience_farms', 'year','days'])->get();
        $this->setPageTitle('Edit experience farm', 'Edit experience farm');
        return view('site.experience_farms.edit',compact('ef', 'seasons','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->has('experience_farm_published') == true){
            $published = "1";
        }else{
            $published = "0";
        }
        $ef = ExperienceFarm::find($id);
        $ef->category_id = $request->get('category_id');
        $ef->experience_farm_time_farm = $request->get('experience_farm_time_farm');
        $ef->experience_farm_name = $request->get('experience_farm_name');
        $ef->season_id = $request->get('season_id');
        $ef->experience_farm_water = $request->get('experience_farm_water');
        $ef->experience_farm_soil_properties = $request->get('experience_farm_soil_properties');
        $ef->experience_farm_start_to_do = $request->get('experience_farm_start_to_do');
        $ef->experience_farm_end_to_do = $request->get('experience_farm_end_to_do');
        $ef->experience_farm_notes = $request->get('experience_farm_notes');
        $ef->experience_farm_published = $published;
        $ef->update();
        if (!$ef) {
            return $this->responseRedirectBack('Error occurred while update experience farm.', 'error', true, true);
        }
        return $this->responseRedirect('site.experience_farms.index', 'Update experience farm successfully', 'success', false, false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ajaxToggleLike(Request $request)
    {
        $checkData = PostLike::whereRaw('post_id <> ""')->get();
        // if no data in table post_like to insert
        if(count($checkData) == 0){
            $postId = $request->get('postId');
            $countLike = $request->get('countLike');
            $insertData = PostLike::create([
                'post_like_like' => $countLike,
                'post_id' => $postId,
                'user_id' => Auth::user()->id
            ]);

            return Response::json(['success' => "Insert data success"]);
        }
        // if has data to update
        else{
            $postId = $request->get('postId');
            $countLike = $request->get('countLike');
            $updateData = PostLike::where('post_like_like',$countLike)
            ->update(['post_id' => $postId]);

            return Response::json(['success' => "Update data success"]);
        }
    }

    public function like(Request $request)
    {
        $like = ExperienceFarmLike::find($request->expId);
        if($like == null){
            $newLike = new ExperienceFarmLike();
            $newLike->like = (int)$request->countLike + 1;
            $newLike->experience_farm_id = $request->expId;
            $newLike->user_id = Auth::user()->id;
            $newLike->save();
            return response()->json([
                'exp_like' => $newLike->like,
            ]);
        }else{
            $value = $like->like;
            $like->like = $value + 1;
            $like->update();
            return response()->json([
                'exp_like' => $like->like,
            ]);
        }
    }

    public function dislike(Request $request)
    {
        $dislike = ExperienceFarmLike::find($request->expId);
        if ($dislike == null) {
            $newLike = new ExperienceFarmLike();
            $newLike->dislike = (int)$request->countLike + 1;
            $newLike->experience_farm_id = $request->expId;
            $newLike->user_id = Auth::user()->id;
            $newLike->save();
            return response()->json([
                'exp_dislike' => $newLike->dislike,
            ]);
        } else {
            $value = $dislike->dislike;
            $dislike->dislike = $value + 1;
            $dislike->update();
            return response()->json([
                'exp_dislike' => $dislike->dislike,
            ]);
        }
    }
}
