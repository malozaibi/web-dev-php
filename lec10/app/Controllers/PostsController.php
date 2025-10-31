<?php // app/Controllers/PostsController.php

class PostsController extends Controller
{
    public function index()
    {
        $post = new Post();
        $posts = $post->all();
        return $this->view('posts/index', ['posts' => $posts]);
    }

    public function show($id)
    {
        $post = new Post();
        $item = $post->find($id);
        if (!$item) {
            http_response_code(404);
            echo 'Post not found';
            return;
        }
        return $this->view('posts/show', ['post' => $item]);
    }

    public function store()
    {
        $title = $_POST['title'] ?? '';
        $body  = $_POST['body'] ?? '';
        if (trim($title) === '' || trim($body) === '') {
            http_response_code(422);
            echo 'Title and body are required';
            return;
        }
        $post = new Post();
        $id = $post->create($title, $body);
        header('Location: /posts/show/' . $id);
    }
}
