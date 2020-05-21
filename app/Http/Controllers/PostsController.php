<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Category;
use DB;

class PostsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts= = Post::all();
        // return Post::where('title', 'Gombak Run')->get();
        // $posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('created_at', 'desc')->get();

        $posts = Post::orderBy('created_at', 'desc')->paginate(15);
        return view('posts.index')->with ('posts', $posts);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('update', $post);

        return view('posts.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->authorize('update', $post);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'discipline' => 'required',
            'event_address' => 'required',
            'event_city' => 'required',
            'event_postcode' => 'required',
            'event_state' => 'required',
            'event_country' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'event_enddate' => 'required',
            'event_endtime' => 'required',
            'reg_opendate' => 'required',
            'reg_opentime' => 'required',
            'reg_closedate' => 'required',
            'reg_closetime' => 'required',
            'event_waiver' => 'required',
            'event_image' => 'image|nullable|max:7999|required', //2499 : file size  , nullable : as optional
            'event_shirt' => 'image|nullable|max:7999|required' ,
            'event_medal' => 'image|nullable|max:7999|required' 
        ]);

        //Handle File Upload
        if($request->hasFile('event_image')){
            //Get filename with the extension
            $fileNameWithExt = $request->file('event_image')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('event_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore_eventImage = $fileName.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('event_image')->storeAs('public/storage/event_images', $fileNameToStore_eventImage);
        } 
        else{
            $fileNameToStore_eventImage = 'noimage.jpg';
        }

        if($request->hasFile('event_shirt')){
            //Get filename with the extension
            $fileNameWithExt = $request->file('event_shirt')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('event_shirt')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore_shirt = $fileName.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('event_shirt')->storeAs('public/storage/event_shirts', $fileNameToStore_shirt);
        } 
        else{
            $fileNameToStore_shirt = 'noimage.jpg';
        }

        if($request->hasFile('event_medal')){
            //Get filename with the extension
            $fileNameWithExt = $request->file('event_medal')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('event_medal')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore_medal = $fileName.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('event_medal')->storeAs('public/storage/event_medals', $fileNameToStore_medal);
        } 
        else{
            $fileNameToStore_medal = 'noimage.jpg';
        }

        // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->discipline = $request->input('discipline');
        $post->event_address = $request->input('event_address');
        $post->event_city = $request->input('event_city');
        $post->event_postcode = $request->input('event_postcode');
        $post->event_state = $request->input('event_state');
        $post->event_country = $request->input('event_country');
        $post->event_date = $request->input('event_date');
        $post->event_time = $request->input('event_time');
        $post->event_enddate = $request->input('event_enddate');
        $post->event_endtime = $request->input('event_endtime');
        $post->reg_opendate = $request->input('reg_opendate');
        $post->reg_opentime = $request->input('reg_opentime');
        $post->reg_closedate = $request->input('reg_closedate');
        $post->reg_closetime = $request->input('reg_closetime');
        $post->event_waiver = $request->input('event_waiver');
        $post->user_id = auth()->user()->id;
        $post->event_image = $fileNameToStore_eventImage;
        $post->event_shirt = $fileNameToStore_shirt;
        $post->event_medal = $fileNameToStore_medal;
        $post->save();

        // return redirect('/posts')->with('success', 'Event Published !');

        $request->session()->reflash();

        return view('categories.create')->with('post_id', $post->post_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
    {
        $post = Post::find($post_id);

        // $post = DB::table(DB::raw('runna.posts AS runna_posts'))
        // ->join(DB::raw('runna.categories AS runna_categories'),
        // 'runna_posts.post_id','=','runna_categories.post_id')->where($post_id);
        
        return view ('posts.show')->with('post', $post);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
        $post = Post::find($post_id);

        // $this->authorize('update', $post);

        // Check for correct user
            // if(auth()->user()->id !== $post->user_id ){
            //     return redirect ('/posts')->with('error', 'You are not the creator !');
            // }

        return view ('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post_id)
    {
        // $this->authorize('update', $post);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'discipline' => 'required',
            'event_address' => 'required',
            'event_city' => 'required',
            'event_postcode' => 'required',
            'event_state' => 'required',
            'event_country' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'event_enddate' => 'required',
            'event_endtime' => 'required',
            'reg_opendate' => 'required',
            'reg_opentime' => 'required',
            'reg_closedate' => 'required',
            'reg_closetime' => 'required',
            'event_waiver' => 'required',
            'event_image' => 'image|nullable|max:7999|required', //2499 : file size  , nullable : as optional
            'event_shirt' => 'image|nullable|max:7999|required' ,
            'event_medal' => 'image|nullable|max:7999|required' 
        ]);

        //Handle File Upload
        if($request->hasFile('event_image')){
            //Get filename with the extension
            $fileNameWithExt = $request->file('event_image')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('event_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore_eventImage = $fileName.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('event_image')->storeAs('public/storage/event_images', $fileNameToStore_eventImage);
        } 
        else{
            $fileNameToStore_eventImage = 'noimage.jpg';
        }

        if($request->hasFile('event_shirt')){
            //Get filename with the extension
            $fileNameWithExt = $request->file('event_shirt')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('event_shirt')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore_shirt = $fileName.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('event_shirt')->storeAs('public/storage/event_shirts', $fileNameToStore_shirt);
        } 
        else{
            $fileNameToStore_shirt = 'noimage.jpg';
        }

        if($request->hasFile('event_medal')){
            //Get filename with the extension
            $fileNameWithExt = $request->file('event_medal')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('event_medal')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore_medal = $fileName.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('event_medal')->storeAs('public/storage/event_medals', $fileNameToStore_medal);
        } 
        else{
            $fileNameToStore_medal = 'noimage.jpg';
        }

        // Update Post
        $post = Post::find($post_id);
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->discipline = $request->input('discipline');
        $post->event_address = $request->input('event_address');
        $post->event_city = $request->input('event_city');
        $post->event_postcode = $request->input('event_postcode');
        $post->event_state = $request->input('event_state');
        $post->event_country = $request->input('event_country');
        $post->event_date = $request->input('event_date');
        $post->event_time = $request->input('event_time');
        $post->event_enddate = $request->input('event_enddate');
        $post->event_endtime = $request->input('event_endtime');
        $post->reg_opendate = $request->input('reg_opendate');
        $post->reg_opentime = $request->input('reg_opentime');
        $post->reg_closedate = $request->input('reg_closedate');
        $post->reg_closetime = $request->input('reg_closetime');
        $post->event_waiver = $request->input('event_waiver');
        if($request->hasFile('event_image')){
            Storage::delete('public/storage/event_images/' . $post->event_image);
            $post->event_image = $fileNameToStore_eventImage;
        }
        if($request->hasFile('event_shirt')){
            Storage::delete('public/storage/event_shirts/' . $post->event_shirt);
            $post->event_shirt = $fileNameToStore_shirt;
        }
        if($request->hasFile('event_medal')){
            Storage::delete('public/storage/event_medals/' . $post->event_medal);
            $post->event_medal = $fileNameToStore_medal;
        }
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id)
    {
        $post= Post::find($post_id);

        // $this->authorize('update', $post);

        // Check for correct user
        if(auth()->user()->id !== $post->user_id ){
            return redirect ('/posts')->with('error', 'You are not the creator !');
        }
        if($post->event_image != 'noimage.jpg'){
            //Delete Image when post deleted
            Storage::delete('public/storage/event_images/'.$post->event_image);
        }
        if($post->event_shirt != 'noimage.jpg'){
            //Delete Image when post deleted
            Storage::delete('public/storage/event_shirts/'.$post->event_shirt);
        }
        if($post->event_medal != 'noimage.jpg'){
            //Delete Image when post deleted
            Storage::delete('public/storage/event_medals/'.$post->event_medal);
        }
        $post->delete();
        return redirect('/dashboard')->with('success', 'Post Deleted !');
    }

    public function storeRating(Request $request)
    {
        $request->validate([
            'post_id' => ['required', 'numeric', 'exists:posts'],
            'rating' => ['required', 'numeric', 'min:1', 'max:5'],
            'review' => ['required', 'string'],
        ]);

        if(\App\Rating::where('user_id', auth()->user()->id)->where('post_id', $request->post_id)->first()){
            return back()->with('info', 'You can not submit more than one reviews.');
        }

        $rating = new \App\Rating;
        
        $rating->post_id  = $request->post_id;
        $rating->user_id = auth()->user()->id;

        $rating->rating =$request->rating;
        $rating->review = $request->review;

        if($rating->save()){
            return back()->with('success', 'Your rating has been saved successfully.');
        }else{
            return back()->with('error', 'An error occured while saving your rating/review.');
        }
    }

    public function cart()
    {
        return view('posts.cart');
    }

    public function addToCart($post_id)
    {
    $post = Post::find($post_id);

        if(!$post) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                $post_id => [
                    "title" => $post->title,
                    "quantity" => 1,
                    "description" => $post->description,
                    "discipline" => $post->discipline,
                    "event_image" => $post->event_image,
                    // "cat_fee" => $post->categories->cat_fee,
                    // "cat_distance" => $post->categories->cat_distance,
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$post_id])) {

            $cart[$post_id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$post_id] = [
            "title" => $post->title,
            "quantity" => 1,
            "description" => $post->description,
            "discipline" => $post->discipline,
            "event_image" => $post->event_image,
            // "cat_fee" => $post->categories->cat_fee,
            // "cat_distance" => $post->categories->cat_distance,
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function updateCart(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            $subTotal = $cart[$request->id]['quantity'] * $cart[$request->id]['price'];

            $total = $this->getCartTotal();

            $htmlCart = view('_header_cart')->render();

            return response()->json(['msg' => 'Cart updated successfully', 'data' => $htmlCart, 'total' => $total, 'subTotal' => $subTotal]);

            //session()->flash('success', 'Cart updated successfully');
        }
    }

    public function removeCart(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            $total = $this->getCartTotal();

            $htmlCart = view('_header_cart')->render();

            return response()->json(['msg' => 'Product removed successfully', 'data' => $htmlCart, 'total' => $total]);

            //session()->flash('success', 'Product removed successfully');
        }

    }
}