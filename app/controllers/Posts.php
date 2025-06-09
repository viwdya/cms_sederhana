<?php
class Posts extends Controller {
    public function __construct() {
        $this->postModel = $this->model('Post');
    }

    public function index() {
        // Get posts
        $posts = $this->postModel->getPosts();

        $data = [
            'posts' => $posts
        ];

        $this->view('posts/index', $data);
    }

    public function add() {
        if(!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'title_err' => '',
                'content_err' => ''
            ];

            // Validate title
            if(empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }

            // Validate content
            if(empty($data['content'])) {
                $data['content_err'] = 'Please enter content';
            }

            // Make sure no errors
            if(empty($data['title_err']) && empty($data['content_err'])) {
                // Validated
                if($this->postModel->addPost($data)) {
                    flash('post_message', 'Post Added');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('posts/add', $data);
            }

        } else {
            $data = [
                'title' => '',
                'content' => ''
            ];

            $this->view('posts/add', $data);
        }
    }

    public function edit($id) {
        if(!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'title_err' => '',
                'content_err' => ''
            ];

            // Validate title
            if(empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }

            // Validate content
            if(empty($data['content'])) {
                $data['content_err'] = 'Please enter content';
            }

            // Make sure no errors
            if(empty($data['title_err']) && empty($data['content_err'])) {
                // Validated
                if($this->postModel->updatePost($data)) {
                    flash('post_message', 'Post Updated');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('posts/edit', $data);
            }

        } else {
            // Get existing post
            $post = $this->postModel->getPostById($id);

            $data = [
                'id' => $id,
                'title' => $post->title,
                'content' => $post->content
            ];

            $this->view('posts/edit', $data);
        }
    }

    public function delete($id) {
        if(!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($this->postModel->deletePost($id)) {
                flash('post_message', 'Post Removed');
                redirect('posts');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('posts');
        }
    }

    public function show($id) {
        $post = $this->postModel->getPostById($id);
        $data = [
            'post' => $post
        ];
        $this->view('posts/show', $data);
    }
} 