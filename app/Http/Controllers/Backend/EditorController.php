<?php
namespace App\Http\Controllers\Backend;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;

class EditorController extends Controller
{
    public function index()
    {
        $banners = User::paginate(15);
        return view('backend.Editor.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.Editor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',

        'password' => 'required|string|min:6|confirmed',

        ]);

        $banner = new User;


        $banner->name = $request->name;

        $banner->email = $request->email;

        $banner->password = Hash::make($request->password);
            $banner->user_type = $request->user_type;

        $banner->save();
        Artisan::call('cache:clear');
        return redirect()->route('editor.index')->with('success', 'banner added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $banner = User::findOrFail(decrypt($id));
        return view('backend.Editor.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',

        'password' => 'nullable|string|min:6',
        'usertype' => 'nullable|string',

        ]);
      

        $banner = User::findOrFail(decrypt($id));


        $banner->name = $request->input('name');
        $banner->email = $request->input('email');
        $banner->password = $request->input('password');
        $banner->user_type = $request->input('user_type');
        // Update the hyperlink
        // if ($request->filled('password')) {
        //     $banner->password = Hash::make($request->password); // Corrected to use $banner
        // }

        $banner->save(); // Save the updated model
        Artisan::call('cache:clear');
        return redirect()->route('editor.index')->with('success', 'banner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $banner = User::findOrFail(decrypt($id));
        $banner->delete();
        Artisan::call('cache:clear');
        return redirect()->route('editor.index')->with('success', 'banner deleted successfully.');
    }
}
