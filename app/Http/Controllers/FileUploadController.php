<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\File;
 
class FileUploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $files = File::latest()->paginate(5);

        return view('uploads.index', compact('files'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('uploads.file-upload');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|max:2000',
        ]);
        $name = $request->file('file')->getClientOriginalName();
        $filename = pathinfo($name, PATHINFO_FILENAME);
        $type = $request->file('file')->extension();
        $request->file('file')->store('public/files');

        $file = new File;

        $file->name = $filename;
        $file->type = $type;
        $file->save();

        return redirect()->route('uploads.index')
            ->with('success', 'File has been uploaded successfully.');
    }

    public function show($id)
    {
        $file = File::find($id);
        return view('uploads.show', compact('file'));
    }

    public function edit($id)
    {
        $file = File::find($id);
        return view('uploads.edit', compact('file'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $file = File::find($id);
        
        $file->name = $request->name;
        $file->save();
    
        return redirect()->route('uploads.index')
                        ->with('success','Filename has been renamed successfully.');
    }

    public function destroy($id)
    {
        $file = File::find($id);
        $file->delete();

        return redirect()->route('uploads.index')
            ->with('success', 'Product deleted successfully');
    }
}
