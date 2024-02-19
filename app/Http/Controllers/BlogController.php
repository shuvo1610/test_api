<?php

    namespace App\Http\Controllers;

    use App\Models\Blog;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    class BlogController extends Controller
    {
        public function index(): array
        {
            $blogs = Blog::latest()->paginate(10);
            return [
                "status" => 1,
                "data" => $blogs
            ];
        }

// Change return type hint from \Illuminate\Http\Response to array
        public function store(Request $request): array
        {
            $request->validate([
                'title' => 'required',
                'body' => 'required',
            ]);

            $blog = Blog::create($request->all());
            return [
                "status" => 1,
                "data" => $blog
            ];
        }

// Change return type hint from \Illuminate\Http\Response to array
        public function show(Blog $blog): array
        {
            return [
                "status" => 1,
                "data" => $blog
            ];
        }

// Change return type hint from \Illuminate\Http\Response to array
        public function update(Request $request, Blog $blog): array
        {
            $request->validate([
                'title' => 'required',
                'body' => 'required',
            ]);

            $blog->update($request->all());

            return [
                "status" => 1,
                "data" => $blog,
                "msg" => "Blog updated successfully"
            ];
        }

// Change return type hint from \Illuminate\Http\Response to array
        public function destroy(Blog $blog): array
        {
            $blog->delete();
            return [
                "status" => 1,
                "data" => $blog,
                "msg" => "Blog deleted successfully"
            ];
        }
    }
